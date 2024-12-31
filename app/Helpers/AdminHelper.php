<?php

use App\Models\LogTable;
use App\Models\Menu;
use App\Models\Requisition;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;

function getTopNavCat($roleId, $baseUrl = "")
{
    
    
    $menus = Menu::parents($roleId)->with('childrenRecursive')->get();
    // pre($menus->toarray());exit;
    return generateMenuHtml($menus, 0, $baseUrl);
}

 function getRequisitionData($id)
    { 
        $requisitionData = Requisition::where('id', $id)->first();
        if ($requisitionData) {
            return $requisitionData;
        } else {
            return 0;
        }
    }


function generateMenuHtml($menus, $level, $baseUrl)
{

    $html = '';

   

    if ($level == 1) {
        $html .= '<ul class="menu-sub">';
    }

    foreach ($menus as $item) {

        $isOpen = request()->is($baseUrl . $item['url']) || isActiveChildMenu($item['children'], $baseUrl) ? 'open' : '';
        $isActive = request()->is($baseUrl . $item['url']) || isActiveChildMenu($item['children'], $baseUrl) ? 'active' : '';

        // pre(count($item['children']));
        if (count($item['children']) > 0) {
            $url = url($baseUrl . $item['url']);
            $html .= '<li class="menu-item ' . $isOpen . '"><a class="menu-link menu-toggle" href="javascript:void(0);"> ' . $item['icon'] . ' ' . $item['name'] . '
            </a>';
            $html .= generateMenuHtml($item['children'], 1, $baseUrl);
        } else {
            $url = url($baseUrl . $item['url']);
            $html .= '<li class="menu-item ' . $isActive . '"><a class="menu-link" href="' . $url . '"> ' . $item['icon'] . '' . $item['name'] . '</a>';
        }

        $html .= '</li>';
        // pre($html);exit;
    }
    if ($level == 1) {
        $html .= '</ul>';
    }

    return $html;
}

function isActiveChildMenu($children, $baseUrl)
{
    foreach ($children as $item) {
        if (request()->is($baseUrl . $item['url']) || isActiveChildMenu($item['children'], $baseUrl)) {
            return true;
        }
    }

    return false;
}


if (!function_exists('getUserBrowserName')) {
    function getUserBrowserName()
    {
        $agent = new Agent();
        $browserName = $agent->browser();
        return $browserName;

    }
}

if (!function_exists('getUserPlatform')) {
    function getUserPlatform()
    {
        $agent = new Agent();
        $platform = $agent->platform();
        return $platform;

    }
}

if (!function_exists('getUserIPAddress')) {
    function getUserIPAddress()
    {
        $agent = new Agent();
        $ipAddress = request()->ip();
        return $ipAddress;

    }
}

if (!function_exists('getIpAddress')) {
    function getIpAddress()
    {
        return request()->ip();
    }
}


function getMenuTree($userId)
{
    $menus = Menu::parents($userId)->with('childrenRecursive')->get();
    // pre($menus->toarray());exit;
    return generateMenuTree($menus, 0);
}

function generateMenuTree($menus, $level)
{

    $html = '';
    if ($level == 1) {
        $html .= '<ul>';
    }
    // pre($menus->toArray());
    foreach ($menus as $item) {
        $html .= '<li id="' . $item['id'] . '">' . $item['name'];
        $html .= generateMenuTree($item['children'], 1);
        $html .= '</li>';
        // pre($html);exit;
    }
    if ($level == 1) {
        $html .= '</ul>';
    }

    return $html;
}

function getEditData($mode, $arrayData, $filled, $imagePath = "")
{
    $value = "";
    if ($mode == "Edit" && !empty($arrayData)) {
        $value = $arrayData->$filled;
        if ($imagePath != "" && $arrayData->$filled != "") {
            $value = $imagePath . "/" . $arrayData->$filled;
        }
    }
    return $value;
}

function getUrlWithAdmin($url)
{
    return url('admin/' . $url);
}

function getEditDate($mode, $arrayData, $filled)
{
    $value = "";
    if ($mode == "Edit" && !empty($arrayData)) {
        $value = date_dmy_dp($arrayData->$filled);

    }
    return $value;
}

if (!function_exists('excelToArray')) {
    function excelToArray($file)
    {
        $path = $file->getPathname();
        $spreadsheet = IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [];

        foreach ($sheet->getRowIterator(1)->current()->getCellIterator() as $cell) {
            $header = $cell->getValue();
            $header = str_replace(' ', '_', $header);
            $headers[] = $header;
        }

        $data = [];

        if ($sheet->getHighestRow() > 1) {
            foreach ($sheet->getRowIterator(2) as $row) {
                $rowData = [];

                foreach ($row->getCellIterator() as $cell) {
                    $value = $cell->getValue();
                    $rowData[] = $value;
                }

                if (array_filter($rowData, fn($value) => $value !== null && $value !== '') == []) {
                    continue;
                }

                $rowKeyValue = array_combine($headers, array_map('strval', $rowData));
                $data[] = $rowKeyValue;
            }
        }

        return (object) $data;
    }
}
if (!function_exists('validateData')) {
    function validateData($data, $table, $uniqueFields = [], $fieldRules = [], $fieldMapping = [], $dbChecks = [])
    {
        $errorArray = [];
        foreach ($data as $row => $value) {
            // Check for unique fields
            foreach ($uniqueFields as $field) {
                // Map to the database field if a mapping exists
                $dbField = $fieldMapping[$field] ?? $field;

                if (!empty($value[$field])) {
                    // Check uniqueness in the database using the mapped field
                    $rowData = DB::table($table)->where($dbField, $value[$field])->first();
                    if ($rowData) {
                        $errorArray[] = ['row' => $row, 'col' => [$field]];
                    }
                }
            }

            // Check for any database existence checks
            foreach ($dbChecks as $field => $dbCheck) {
                if (!empty($value[$field])) {
                    $exists = DB::table($dbCheck['table'])->where([$dbCheck['column'] => $value[$field], 'is_active' => 'Y'])->exists();
                    if (!$exists) {
                        $errorArray[] = ['row' => $row, 'col' => [$field]];
                    }
                }
            }

            // Validate fields based on provided rules
            foreach ($fieldRules as $field => $rule) {
                if (!empty($value[$field]) && !preg_match($rule, $value[$field])) {
                    $errorArray[] = ['row' => $row, 'col' => [$field]];
                }
            }

            // Check for empty required fields
            $emptyCols = [];
            foreach (array_keys($fieldRules) as $field) {
                if (empty($value[$field])) {
                    $emptyCols[] = $field;
                }
            }

            if (!empty($emptyCols) && count($emptyCols) != count($fieldRules)) {
                $errorArray[] = ['row' => $row, 'col' => $emptyCols];
            }
        }

        return $errorArray;
    }

}


function arrConvertToAssociativeJsonObject($data)
{
    return json_decode(json_encode($data), true);
}

function insertLog($model, $mode)
{
    $table = $model->getTable();
    $data = $model->toArray();
    $insertedId = $model->id;
    $logType = $mode == "Edit" ? config('constants.LOG_U') : config('constants.LOG_I');
    LogTable::insertLogData($table, $data, $insertedId, $logType);
}

if (!function_exists('excelToArrayQuotation')) {
    function excelToArrayQuotation($file)
    {
        $path = $file->getPathname();
        $spreadsheet = IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [];

        // Limit headers to columns A-F
        foreach ($sheet->getRowIterator(1)->current()->getCellIterator('A', 'G') as $cell) {
            $header = $cell->getValue();
            $header = str_replace(' ', '_', $header);
            $headers[] = $header;
        }

        $data = [];

        if ($sheet->getHighestRow() > 1) {
            foreach ($sheet->getRowIterator(2) as $row) {
                $rowData = [];

                // Limit data to columns A-F
                foreach ($row->getCellIterator('A', 'G') as $cell) {
                    $value = $cell->getValue();
                   
                    if (Date::isDateTime($cell)) {
                        // Convert the Excel serial number to a PHP DateTime object
                        $dateTime = Date::excelToDateTimeObject($value);
            
                        // Format the DateTime object as 'dd-mm-yyyy'
                        $value = $dateTime->format('d-m-Y');
                    }
                    $rowData[] = $value;
                }

                // Check if row is empty
                if (array_filter($rowData, fn($value) => $value !== null && $value !== '') == []) {
                    continue;
                }

                $rowKeyValue = array_combine($headers, array_map('strval', $rowData));
                $data[] = $rowKeyValue;
            }
        }

        return (object) $data;
    }
}
