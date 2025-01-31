<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LayoutController;
use App\Models\AssetGroup;
use App\Models\AssetType;
use App\Models\BudgetDetails;
use App\Models\BudgetMaster;
use App\Models\BudgetType;
use App\Models\BusinessDivision;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BudgetController extends Controller
{
    public function budget()
    { 
        $data['bodyView'] = view('employee/budget/budget_list', []);     
        return LayoutController::loadEmployee($data);
    }

    public function getdataabudgetEntity()
    {     
        $result['budgetList']=BudgetMaster::Join('asset_group_master', 'asset_group_master.id', '=', 'budget_master.asset_group_id')
        ->Join('asset_type_master', 'asset_type_master.id', '=', 'budget_master.asset_type_id')
        ->Join('budget_type_master', 'budget_type_master.id', '=', 'budget_master.budget_type_id')
        ->Join('business_division_master', 'business_division_master.id', '=', 'budget_master.business_division_id')
        ->Join('location_master', 'location_master.id', '=', 'budget_master.location_id')
        ->select('budget_master.*','asset_group_master.asset_group','asset_type_master.asset_type',
        'budget_type_master.budget_type','business_division_master.business_division','location_master.location_name')->get();
       // pre($result['budgetList']->toArray());

      // return $data['bodyView'] = view('admin/master/asset_type_partial_view', $result);
      return $data['bodyView'] = view('employee/budget/budget_list_partial_view', $result);
      //  return LayoutController::loadAdmin($data);
    }


    public function budgetStatus(Request $request)
    {
        $id = $request->post('id');
        $status = BudgetMaster::where(['id' => $id])->first();
        $updatedStatus = $status->is_active == "Y" ? "N" : "Y";

        $status->is_active = $updatedStatus;
        $status->save();

        insertLog($status, "Edit");
        return response()->json(['success' => true, 'status' => $updatedStatus, 'message' => 'Status updated successfully']);
    }

    public function budgetEntityAddEdit(Request $request)
    { $id=$request->post('id');
        $data = LayoutController::addEditCommon($id);
        $data['editData'] = [];
        $data['assetType']= [];
        $data['businessDivisionList']= [];

        if ($id > 0) {
            $data['editData'] = BudgetMaster::find($id);
            $data['assetType']=AssetType::where(['asset_group_id'=> $data['editData']->asset_group_id])->get();
            $data['businessDivisionList']=BusinessDivision::where(['location_id'=>$data['editData']->location_id])->get();
        }

      

        $data['assetgroup']=AssetGroup::get();
        $data['budgetType']=BudgetType::get();
        $data['locationList'] = Location::get();
      
        return view('employee/budget/budget_addedit', $data);
       // return LayoutController::loadAdmin($data);
    }


    public function assettypedrpView(Request $request)
    {     
        $asset_group_id=$request->post('asset_group_id'); 
        $result['assetType']=AssetType::where(['asset_group_id'=>$asset_group_id])->get();
      return $data['bodyView'] = view('employee/budget/asset_type_drp_view', $result);
     
    }

    public function businessdivdrpView(Request $request)
    {     
        $location_id=$request->post('location_id'); 
        $result['businessDivisionList']=BusinessDivision::where(['location_id'=>$location_id])->get();
      return $data['bodyView'] = view('employee/budget/business_div_drp_view', $result);
     
    }


    public function budgetEntityAddEditAction(Request $request)
    {
        $id = $request->post('id');
        $mode = $request->post('mode');
        $budget_entity = $request->post('budget_entity');
        $asset_group_id = $request->post('asset_group_id');
        $asset_type_id = $request->post('asset_type_id');
        $budget_type_id = $request->post('budget_type_id');
        $location_id = $request->post('location_id');
        $business_division_id = $request->post('business_division_id');

        $validator = Validator::make($request->all(), [
            'budget_entity' => 'required',
            'asset_group_id' => 'required',
            'asset_type_id' => 'required',
            'budget_type_id' => 'required',

        ],[
            'budget_entity.required' => 'Budget entity is required.', 
            'asset_group_id.required' => 'Asset group is required.', 
            'asset_type_id.required' => 'Asset type is required.', 
            'budget_type_id.required' => 'Budget type is required.', 
            
          
          ]);


        if ($validator->fails()) {
            return response()->json(['msg_status' => 0, 'errors' => $validator->errors()]);
        }

        if ($mode == "Edit") {
            $model = BudgetMaster::find($id);
        } else {
            $model = new BudgetMaster();
        }

        $model->budget_entity = $budget_entity;
        $model->asset_group_id = $asset_group_id;
        $model->asset_type_id = $asset_type_id;
        $model->budget_type_id = $budget_type_id;
        $model->location_id = $location_id;
        $model->business_division_id = $business_division_id;
        $model->save();

        insertLog($model, $mode);

        return response()->json(['errors' => [], 'msg_status' => 1, 'msg_data' => 'Data Successfully Saved']);
    }


    public function budgetallocationAddEdit(Request $request)
    { 
        $id=$request->post('id');
        $table_dtl_id=$request->post('table_dtl_id');
        $data = LayoutController::addEditCommon($table_dtl_id);
        $data['editData'] = [];
        $data['assetType']= [];
        $data['businessDivisionList']= [];
        $data['editDetailsData'] = [];
        $data['allocationData']=[];
        $data['budget_master_id']=$id;

        if ($id > 0) {
            $data['editData'] = BudgetMaster::find($id);
            $data['assetType']=AssetType::where(['asset_group_id'=> $data['editData']->asset_group_id])->get();
            $data['businessDivisionList']=BusinessDivision::where(['location_id'=>$data['editData']->location_id])->get();
            $data['allocationData']=BudgetDetails::where(['budget_master_id'=> $id])->get();
        } 
        
        if ($table_dtl_id > 0) {
            $data['editDetailsData'] = BudgetDetails::find($table_dtl_id);
         
          
        }  

        $data['assetgroup']=AssetGroup::get();
        $data['budgetType']=BudgetType::get();
        $data['locationList'] = Location::get();

        $data['yearList'] = array_map(function($year) {
            return ['id' => $year, 'value' => $year];
        }, range(2024, date('Y') + 1));

    
      
        return view('employee/budget/budget_allocation_addedit', $data);
       // return LayoutController::loadAdmin($data);
    }


    public function budgetAllocationAddEditAction(Request $request)
    {
        $id = $request->post('id');
        $mode = $request->post('mode');
        $budget_amount = $request->post('budget_amount');
        $year = $request->post('year');
        $budget_master_id = $request->post('budget_master_id');
        

        $validator = Validator::make($request->all(), [
            'budget_amount' => 'required',
            //'year' => 'required', 
            'year' => [
                'required',
                Rule::unique('budget_details', 'year')
                    ->where('budget_master_id', $budget_master_id) // Add condition for budget_master_id
                    ->ignore($id, 'id'), // Ignore the current record by id
            ]
        ],[
            'budget_amount.required' => 'Budget amount is required.', 
            'year.required' => 'Year is required.', 
          ]);


        if ($validator->fails()) {
            return response()->json(['msg_status' => 0, 'errors' => $validator->errors()]);
        }

        if ($mode == "Edit") {
            $model = BudgetDetails::find($id);
        } else {
            $model = new BudgetDetails();
        }

        $model->budget_master_id = $budget_master_id;
        $model->budget_amount = $budget_amount;
        $model->year = $year;
        $model->save();

        insertLog($model, $mode);

        return response()->json(['errors' => [], 'msg_status' => 1, 'msg_data' => 'Data Successfully Saved']);
    }





}
