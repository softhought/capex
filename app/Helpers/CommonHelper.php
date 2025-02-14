<?php

use App\Models\ApprovalPath;
use App\Models\Approver;
use App\Models\CapexRequest;
use App\Models\Coapprover;
use App\Models\Pptc;
use App\Models\SerialMaster;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;


if (!function_exists('pre')) {
    function pre($data)
    {
        echo "<pre>";
        // if (is_object($data)) {
        //     $data = $data->toArray();
        // }
        print_r($data);
        echo "</pre>";
    }
}

if (!function_exists('prea')) {
    function prea($data)
    {
        echo "<pre>";
        print_r($data->toArray());
        echo "</pre>";
    }
}




if (!function_exists('date_ymd')) {

    function date_ymd($date)
    {

        if ($date != "") {
            $date = str_replace('/', '-', $date);
            $date = date("Y-m-d", strtotime($date));
        } else {
            $date = NULL;
        }

        return $date;
    }
}

if (!function_exists('date_dmy')) {

    function date_dmy($date)
    {
        if ($date != "") {
            $date = date("d-m-Y", strtotime($date));
        } else {
            $date = NULL;
        }
        return $date;
    }
}

if (!function_exists('date_dmy_dp')) {

    function date_dmy_dp($date)
    {
        if ($date != "") {
            $date = date("d/m/Y", strtotime($date));
        } else {
            $date = NULL;
        }
        return $date;
    }
}

if (!function_exists('date_dmy_to_ymd')) {
    function date_dmy_to_ymd($date)
    {
        if ($date != "") {
            $dateEx = explode('/', $date);
            $month = $dateEx[1];
            $day = $dateEx[0];
            $year = $dateEx[2];
            $stringDate = $day . "-" . $month . "-" . $year;
            $formated_date = date("Y-m-d", strtotime($stringDate));
            return $formated_date;
        } else {
            return NULL;
        }
    }
}

function customReturn($p)
{
    // Check if $p is an integer or has decimal places
    if ($p != "" && (is_int($p) || $p == floor($p))) {
        // Return the integer part
        return floor($p);
    } else {
        // Return the value as it is
        return $p;
    }
}



// if (!function_exists('sendEmail')) {
//     function sendEmail($to, $subject, $content, $data = [], $cc = [], $bcc = [], $attachments = [])
//     {
//         try {
//             // Render the view content to a string if necessary
//             if ($content instanceof Illuminate\View\View) {
//                 $content = $content->render();
//             } elseif (is_string($content)) {
//                 $content = View::make($content, $data)->render();
//             }

//             Mail::send([], $data, function ($message) use ($to, $subject, $content, $cc, $bcc, $attachments) {
//                 $message->to($to)
//                     ->subject($subject);

//                 // Set the body content as HTML
//                 $message->html($content); // For HTML content

//                 // Add CC recipients if any
//                 if (!empty($cc)) {
//                     $message->cc($cc);
//                 }

//                 // Add BCC recipients if any
//                 if (!empty($bcc)) {
//                     $message->bcc($bcc);
//                 }

//                 // Attach files if any
//                 foreach ($attachments as $attachment) {
//                     $message->attach($attachment);
//                 }
//             });

//             return true;
//         } catch (\Exception $e) {
//             return $e->getMessage(); // Return the exception message for debugging
//         }
//     }
// }

// if (!function_exists('sendSms')) {
//     function sendSms($phone_no, $template, $data)
//     {
//         return 1;
//         exit;
//         $message = str_replace(" ", "%20", Lang::get('sms_templates.' . $template, $data));
//         $username = 'raktimb';
//         $password = 'api@2019';
//         $from = 'GCPLIN';
//         $route = 'Informative';
//         $type = 'text';

//         $url = "https://apps.malert.io/api/api_http.php?username=" . $username . "&password=" . $password . "&senderid=" . $from . "&to=" . $phone_no . "&text=" . $message . "&route=" . $route . "&type=" . $type;

//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $url);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         $response = curl_exec($ch);

//         if ($response === false) {
//             $error = curl_error($ch);
//             curl_close($ch);
//             return "cURL Error: " . $error;
//         }
//         curl_close($ch);

//         if (strpos($response, 'OK') !== false) {
//             // CommonDataModel::insertLogData('sms', str_replace("%20", " ", $message), $phone_no, config('constants.LOG_I'));
//             return true;
//         } else {
//             return $response;
//         }
//     }
// }

if (!function_exists('yearList')) {

    function yearList()
    {
        $startYear = 2022;
        $currentYear = date('Y');
        $yearList = array_reverse(range($startYear, $currentYear));
        return $yearList;
    }
}

function getStartAndEndDate($startMonth, $endMonth, $year)
{
    // Get the first date of the start month
    $startDate = Carbon::create($year, $startMonth, 1)->startOfMonth()->toDateString();

    // Get the last date of the end month
    $endDate = Carbon::create($year, $endMonth, 1)->endOfMonth()->toDateString();

    return [
        'start_date' => $startDate,
        'end_date' => $endDate,
    ];
}

function getSubMonthsNewDate($startMonth, $months)
{
    $date = Carbon::parse($startMonth); // Given date
    $newDate = $date->subMonths($months); // Subtract 3 months
    return $newDate->format('Y-m-d');
}

if (!function_exists('expiryDate')) {
    function expiryDate($date, $months)
    {
        if ($date != "" && $months != "") {
            $date = new DateTime($date);
            $date->modify("+$months months");
            $expiry_date = $date->format('Y-m-d');
        } else {
            $expiry_date = $date;
        }
        return $expiry_date;
    }
}


if (!function_exists('sendEmail')) {
    function sendEmail($to, $subject, $content, $data = [], $cc = [], $bcc = [], $attachments = [])
    {
        $development = DB::table('test')->where(['id' => 1, 'is_production' => 'N'])->first();
        if ($development) {
            $to = $development->email;
        }

        try {
            // Render the view content to a string if necessary
            if ($content instanceof Illuminate\View\View) {
                $content = $content->render();
            } elseif (is_string($content)) {
                $content = View::make($content, $data)->render();
            }

            Mail::send([], $data, function ($message) use ($to, $subject, $content, $cc, $bcc, $attachments) {
                $message->to($to)
                    ->subject($subject);

                // Set the body content as HTML
                $message->html($content); // For HTML content

                // Add CC recipients if any
                if (!empty($cc)) {
                    $message->cc($cc);
                }

                // Add BCC recipients if any
                if (!empty($bcc)) {
                    $message->bcc($bcc);
                }

                // Attach files if any
                foreach ($attachments as $attachment) {
                    $message->attach($attachment);
                }
            });
            // CommonDataModel::insertNotificationLogData('E', strip_tags($subject), $to);
            return true;
        } catch (\Exception $e) {
            return $e->getMessage(); // Return the exception message for debugging
        }
    }
}

if (!function_exists('vasset')) {
    function vasset($path)
    {
        $file = public_path($path);
        if (file_exists($file)) {
            return asset($path) . '?v=' . filemtime($file);
        }
        return asset($path);
    }
}

// if (!function_exists('sendSms')) {
//     function sendSms($phone_no, $template, $data)
//     {
//         $development = DB::table('test')->where(['id' => 1, 'is_production' => 'N'])->first();
//         if ($development) {
//             $phone_no = "91$development->mobile";
//         } else {
//             $phone_no = "91$phone_no";
//         }

//         $message =Lang::get('sms_templates.' . $template, $data);

//         $curl = curl_init();

//         curl_setopt_array(
//             $curl,
//             array(
//                 CURLOPT_URL => 'https://4558p.api.infobip.com/sms/2/text/advanced',
//                 CURLOPT_RETURNTRANSFER => true,
//                 CURLOPT_ENCODING => '',
//                 CURLOPT_MAXREDIRS => 10,
//                 CURLOPT_TIMEOUT => 0,
//                 CURLOPT_FOLLOWLOCATION => true,
//                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                 CURLOPT_CUSTOMREQUEST => 'POST',
//                 CURLOPT_POSTFIELDS => '{ "messages":
//                                             [
//                                                 {
//                                                     "destinations": [
//                                                         {
//                                                             "to": "917003319369"
//                                                         }
//                                                     ],
//                                                     "from": "GCPLHO",
//                                                     "text": "' . $message . '"

//                                                 }
//                                             ]
//                                         }',

//                 CURLOPT_HTTPHEADER => array(
//                     'Content-Type: application/json',
//                     'Authorization: App 960fc129fc68eae1cb25759f15629373-e9e11df0-c72f-4c08-8ea3-6accf6f7bd2c'
//                 ),
//             )
//         );

//         $response = curl_exec($curl);
//         curl_close($curl);
//         CommonDataModel::insertNotificationLogData('P', $response, $phone_no);
//         return true;
//     }
// }






function conSql($query)
{
    $sql = $query->toSql();
    foreach ($query->getBindings() as $binding) {
        $sql = preg_replace('/\?/', is_numeric($binding) ? $binding : "'{$binding}'", $sql, 1);
    }
    echo $sql;
}


function formatINR($number)
{
    $decimal = ''; // Add decimals if required, e.g., '.00'
    if (strpos($number, '.') !== false) {
        [$number, $decimal] = explode('.', $number);
        $decimal = '.' . $decimal;
    }
    $lastThree = substr($number, -3);
    $rest = substr($number, 0, -3);
    if ($rest != '') {
        $rest = preg_replace("/\B(?=(\d{2})+(?!\d))/", ",", $rest);
    }
    return $rest . ',' . $lastThree . $decimal;
}

function nameShortCode($name)
{

    return $initials = implode('', array_map(function ($word) {
        return $word[0];
    }, explode(' ', $name)));
}

function checkPriorityLevelApproval($capex_request_id, $priority_level, $version)
{

    $approvedPending = ApprovalPath::where('capex_request_id', $capex_request_id)
        ->where('priority_level', $priority_level)
        ->where('version', $version)
        ->where('is_approved', 'N')
        ->count();
    if ($approvedPending == 0) {     
        $updateNext = ApprovalPath::where('capex_request_id', $capex_request_id)
            ->where('priority_level', $priority_level + 1)
            ->where('version', $version)
            ->update(['is_open' => 'Y']);
    }
}


function checkApprovalProcessDone($capex_request_id, $version)
{
    $approvalProcessDone = ApprovalPath::where('capex_request_id', $capex_request_id)
        ->where('version', $version)
        ->where('is_approved', 'N')
        ->count();

    if ($approvalProcessDone == 0) {
        // update pptc_master set is_approved = 'Y' where id = $pptc_master_id
        $updatePptcMaster = CapexRequest::where('id', $capex_request_id)
            ->update(['approval_status' => 'A', 'approved_on' => date('Y-m-d'),'sanction_number' => generateSanctionNumber()]);

        /** send data for vendor info #PENDING_WORK */
    }
}


 function generateSanctionNumber()
{
    $serialdata = SerialMaster::where(['module' => 'SANCTION_NUMBER'])->first();
    $lastnumber = $serialdata->lastnumber;
    $row_id = $serialdata->id;
    $autoSerialeNo = $lastnumber + 1;
    $serialModel = SerialMaster::find($row_id);
    $serialModel->lastnumber = $autoSerialeNo;
    $serialModel->save();
    $paddedNumber = str_pad($autoSerialeNo, 5, '0', STR_PAD_LEFT);
    $serialNumber = $serialdata->moduleTag . '/' . $paddedNumber;
    return $serialNumber;
}


function checkApprover()
{
    $aprover="";
    $session = session('capexEmployee');  
    $approverData=Approver::where(['emp_code' => $session['empCode']])->first();
    if ($approverData) {
        // Data exists
        $aprover=$approverData->approver_name;
    }
    
   return $aprover;
}

