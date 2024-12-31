<?php

namespace App\Http\Controllers;

use App\Models\LogTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class LayoutController extends Controller
{
    public static function loadAdmin($data = [])
    {
        return view('admin/layout', $data);
    }
    public static function loadEmployee($data = [])
    {
        return view('employee/layout', $data);
    }

    public static function addEditCommon($id, $data = [])
    {
        if ($id > 0) {
            $data['mode'] = "Edit";
            $data['btntext'] = "Update";
            $data['btnloadertext'] = "Updating";
            $data['id'] = $id;
        } else {
            $data['mode'] = "Add";
            $data['btntext'] = "Save";
            $data['btnloadertext'] = "Saving";
            $data['mode'] = "Add";
            $data['id'] = 0;
        }
        return $data;
    }


    public function logActivity(Request $request, $table, $rowId)
    {
        $table = str_replace(' ', '', $table);
        $result["logData"] = LogTable::where(['table_name' => $table, 'row_id' => $rowId])->with('user')->get();
        $result["tableCol"] = Schema::getColumnListing($table);
        return view('admin/log', $result)->render();
    }

}
