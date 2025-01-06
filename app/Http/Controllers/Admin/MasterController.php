<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LayoutController;
use App\Models\AssetGroup;
use App\Models\AssetType;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;



class MasterController extends Controller
{

    public function test()
    {
        // $result['plantList'] = Plant::select('plant_master.*', 'employee_master.employee_name', 'employee_master.employee_code')
        //     ->leftJoin('employee_master', 'employee_master.id', '=', 'plant_master.head_emp_id')->get();
        $result=[];
        $data['bodyView'] = view('admin/master/test_list', $result);
        return LayoutController::loadAdmin($data);
    }

    public function assetsgroup()
    {     
        $result['assetgroup']=AssetGroup::get();
        $data['bodyView'] = view('admin/master/asset_group_list', $result);
        return LayoutController::loadAdmin($data);
    }

    public function assetstype()
    {     
        $result['assetType']=AssetType::Join('asset_group', 'asset_group.id', '=', 'asset_type.asset_group_id')
        ->Join('company_master', 'company_master.id', '=', 'asset_type.company_id')
        ->select('asset_type.*','asset_group','company_name')->get();

       // pre($result['assetType']->toArray());exit;
        $data['bodyView'] = view('admin/master/asset_type_list', $result);
        return LayoutController::loadAdmin($data);
    }

    public function getdataassetstype()
    {     
        $result['assetType']=AssetType::Join('asset_group', 'asset_group.id', '=', 'asset_type.asset_group_id')
        ->Join('company_master', 'company_master.id', '=', 'asset_type.company_id')
        ->select('asset_type.*','asset_group','company_name')->get();

       // pre($result['assetType']->toArray());exit;
      return $data['bodyView'] = view('admin/master/asset_type_partial_view', $result);
      //  return LayoutController::loadAdmin($data);
    }

    public function assetsTypeStatus(Request $request)
    {
        $id = $request->post('id');
        $status = AssetType::where(['id' => $id])->first();
        $updatedStatus = $status->is_active == "Y" ? "N" : "Y";

        $status->is_active = $updatedStatus;
        $status->save();

        insertLog($status, "Edit");
        return response()->json(['success' => true, 'status' => $updatedStatus, 'message' => 'Status updated successfully']);
    }


    public function assetsTypeAddEdit($id = '')
    {
        $data = LayoutController::addEditCommon($id);
        $data['editData'] = [];

        if ($id > 0) {
            $data['editData'] = AssetType::find($id);
        }
     
        return view('admin/master/assettype_addedit', $data);
       // return LayoutController::loadAdmin($data);
    }

    public function plantAddEditAction(Request $request)
    {
        $id = $request->post('id');
        $mode = $request->post('mode');
        $plant_name = $request->post('plant_name');
        $head_emp_id = $request->post('head_emp_id');

        $validator = Validator::make($request->all(), [
            'plant_name' => [
                'required',
                Rule::unique('plant_master', 'plant_name')->ignore($id, 'id')
            ]
        ]);


        if ($validator->fails()) {
            return response()->json(['msg_status' => 0, 'errors' => $validator->errors()]);
        }

        if ($mode == "Edit") {
            $model = Plant::find($id);
        } else {
            $model = new Plant();
        }

        $model->plant_name = $plant_name;
        $model->head_emp_id = $head_emp_id;
        $model->save();

        insertLog($model, $mode);

        return response()->json(['errors' => [], 'msg_status' => 1, 'msg_data' => '']);
    }

    

  
   
}
