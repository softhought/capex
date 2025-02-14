<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LayoutController;
use App\Models\Approver;
use App\Models\AssetGroup;
use App\Models\AssetType;
use App\Models\BusinessDivision;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Location;
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
        $result['assetType']=AssetType::Join('asset_group_master', 'asset_group_master.id', '=', 'asset_type_master.asset_group_id')
        ->Join('company_master', 'company_master.id', '=', 'asset_type_master.company_id')
        ->select('asset_type_master.*','asset_group','company_name')->get();

       // pre($result['assetType']->toArray());exit;
        $data['bodyView'] = view('admin/master/asset_type_list', $result);
        return LayoutController::loadAdmin($data);
    }

    public function getdataassetstype()
    {     
        $result['assetType']=AssetType::Join('asset_group_master', 'asset_group_master.id', '=', 'asset_type_master.asset_group_id')
        ->Join('company_master', 'company_master.id', '=', 'asset_type_master.company_id')
        ->select('asset_type_master.*','asset_group','company_name')->get();

      //  pre($result['assetType']->toArray());exit;
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


    public function assetsTypeAddEdit(Request $request)
    { $id=$request->post('id');
        $data = LayoutController::addEditCommon($id);
        $data['editData'] = [];

        if ($id > 0) {
            $data['editData'] = AssetType::find($id);
        }

       // pre($data);exit;

        $data['assetgroup']=AssetGroup::get();
        $data['company']=Company::get();
     
        return view('admin/master/assettype_addedit', $data);
       // return LayoutController::loadAdmin($data);
    }

    public function assettypeAddEditAction(Request $request)
    {
        $id = $request->post('id');
        $mode = $request->post('mode');
        $company_id = $request->post('company_id');
        $asset_group_id = $request->post('asset_group_id');
        $asset_type = $request->post('asset_type');
        $sap_asset_class = $request->post('sap_asset_class');
        $block_key = $request->post('block_key');
        $is_procurement_indicator = $request->post('is_procurement_indicator');

        $validator = Validator::make($request->all(), [
            // 'email' => [
            //     'required',
            //     Rule::unique('users', 'username')->ignore($id, 'id')
            // ],
            'company_id' => 'required',
            'asset_group_id' => 'required',
            'asset_type' => 'required',
            'sap_asset_class' => 'required',
            'block_key' => 'required',
            'is_procurement_indicator' => 'required',
           

        ],[
            'company_id.required' => 'Asset Owner is required.', 
            'asset_group_id.required' => 'Asset Group is required.', 
            'asset_type.required' => 'Asset Type is required.', 
            'sap_asset_class.required' => 'Sap asset class is  required.', 
            'block_key.required' => 'Block key is  required.', 
            'is_procurement_indicator.required' => 'Procurement Indicator is  required.', 
          
          ]);


        if ($validator->fails()) {
            return response()->json(['msg_status' => 0, 'errors' => $validator->errors()]);
        }

        if ($mode == "Edit") {
            $model = AssetType::find($id);
        } else {
            $model = new AssetType();
        }

        $model->company_id = $company_id;
        $model->asset_group_id = $asset_group_id;
        $model->asset_type = $asset_type;
        $model->sap_asset_class = $sap_asset_class;
        $model->block_key = $block_key;
        $model->is_procurement_indicator = $is_procurement_indicator;
        $model->save();

        insertLog($model, $mode);

        return response()->json(['errors' => [], 'msg_status' => 1, 'msg_data' => 'Data Successfully Saved']);
    }

    public function employees()
    {     
        $result['employeeList'] = Employee::with(['manager' => function ($query) {
            $query->select('emp_no', 'emp_name'); // Select only necessary fields
        }])->join('location_master', 'location_master.id', '=', 'employees.location_id')
        ->join('business_division_master', 'business_division_master.id', '=', 'employees.business_division_id')
        ->get();

        // foreach ($result['employeeList'] as $employee) {
        //    // echo "Employee: " . $employee->emp_name . "\n";
        //     echo "<br>Manager: " . ($employee->manager ? $employee->manager->emp_name : 'No Manager Found') . "\n";
        // }
        // exit;
        // pre($result['employeeList']->toArray());exit;
        $data['bodyView'] = view('admin/master/employee_list', $result);
        return LayoutController::loadAdmin($data);
    }

    public function location()
    {     
        $result['locationList'] = Location::get();
    //    pre($result['locationList']);exit;
        $data['bodyView'] = view('admin/master/location_list', $result);
        return LayoutController::loadAdmin($data);
    }

    public function businessdivision()
    {     
       
        $result=[];
        $data['bodyView'] = view('admin/master/business_division_list', $result);
        return LayoutController::loadAdmin($data);
    }


    public function getbusinessdivision()
    {     
        $result['BusinessDivisionList'] = BusinessDivision::join('location_master', 'location_master.id', '=', 'business_division_master.location_id')
        ->select('business_division_master.*','location_name')
        ->get();
      return $data['bodyView'] = view('admin/master/business_division_partial_view', $result);
    }

    public function businessdivisionStatus(Request $request)
    {
        $id = $request->post('id');
        $status = BusinessDivision::where(['id' => $id])->first();
        $updatedStatus = $status->is_active == "Y" ? "N" : "Y";

        $status->is_active = $updatedStatus;
        $status->save();

        insertLog($status, "Edit");
        return response()->json(['success' => true, 'status' => $updatedStatus, 'message' => 'Status updated successfully']);
    }

    public function businessdivisionAddEdit(Request $request)
    {
        $id=$request->post('id');
        $data = LayoutController::addEditCommon($id);
        $data['editData'] = [];

        if ($id > 0) {
            $data['editData'] = BusinessDivision::find($id);
        }

        $data['location']=Location::get();
        $data['employeeList']=Employee::
        select('employees.*', DB::raw('concat(employees.emp_name," (",employees.emp_no, ")") as select_text'))
        ->orderBy('emp_name', 'asc')
        ->get();
     
      //  pre($data['employeeList']->toArray());exit;
        return view('admin/master/businessdivision_addedit', $data);
    }

    public function businessdivisionAddEditAction(Request $request)
    {
        $id = $request->post('id');
        $mode = $request->post('mode');

        $location_id = $request->post('location_id');
        $business_division = $request->post('business_division');
        $business_head_emp_code = $request->post('business_head_emp_code');

        $validator = Validator::make($request->all(), [
            'location_id' => 'required',
            'business_division' => 'required',
        ],[
            'location_id.required' => 'Location is required.', 
            'business_division.required' => 'Business Division is required.', 
          ]);


        if ($validator->fails()) {
            return response()->json(['msg_status' => 0, 'errors' => $validator->errors()]);
        }

        if ($mode == "Edit") {
            $model = BusinessDivision::find($id);
        } else {
            $model = new BusinessDivision();
        }


        $model->location_id = $location_id;
        $model->business_division = $business_division;
        $model->business_head_emp_code = $business_head_emp_code;
        $model->save();
        insertLog($model, $mode);
        return response()->json(['errors' => [], 'msg_status' => 1, 'msg_data' => 'Data Successfully Saved']);
    }


    public function approver()
    { 
        $data['bodyView'] = view('admin/master/approver_list', []);
        return LayoutController::loadAdmin($data);
    }

    public function getApprover()
    {     
        $result['approverList'] = Approver::leftjoin('employees', 'employees.emp_no', '=', 'approver_details.emp_code')
        ->select('approver_details.*','employees.emp_no','employees.emp_name')
        ->get();
         $result['ItpathApproval']=Approver::wherein('approver_for',['IT','BOTH'])->get();
         $result['nonItpathApproval']=Approver::wherein('approver_for',['NONIT','BOTH'])->get();

       //  pre($result['ItpathApproval']->toArray());exit;
         
      return $data['bodyView'] = view('admin/master/approver_list_partial_view', $result);
    }

    public function ApproverAddEdit(Request $request)
    {
        $id=$request->post('id');
        $data = LayoutController::addEditCommon($id);
        $data['editData'] = [];

        if ($id > 0) {
            $data['editData'] = Approver::find($id);
        }

        $data['location']=Location::get();
        $data['employeeList']=Employee::
        select('employees.*', DB::raw('concat(employees.emp_name," (",employees.emp_no, ")") as select_text'))
        ->orderBy('emp_name', 'asc')
        ->get();
     
      //  pre($data['employeeList']->toArray());exit;
        return view('admin/master/approver_addedit', $data);
    }

    public function approverAddEditAction(Request $request)
    {
        $id = $request->post('id');
        $mode = $request->post('mode');

        $approver_name = $request->post('approver_name');
        $emp_code = $request->post('emp_code');

        $validator = Validator::make($request->all(), [
            'approver_name' => 'required',
            'emp_code' => 'required',
        ],[
            'approver_name.required' => 'Approver Name is required.', 
            'emp_code.required' => 'Employee is required.', 
          ]);


        if ($validator->fails()) {
            return response()->json(['msg_status' => 0, 'errors' => $validator->errors()]);
        }

        if ($mode == "Edit") {
            $model = Approver::find($id);
        } else {
            $model = new Approver();
        }


        $model->approver_name = $approver_name;
        $model->emp_code = $emp_code;
        $model->save();
        insertLog($model, $mode);
        return response()->json(['errors' => [], 'msg_status' => 1, 'msg_data' => 'Data Successfully Saved']);
    }

    

  
   
}
