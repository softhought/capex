<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LayoutController;
use App\Models\AssetGroup;
use App\Models\BudgetType;
use App\Models\CapexproposedVendor;
use App\Models\CapexRequest;
use App\Models\Employee;
use App\Models\SerialMaster;
use App\Models\Vendor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestcapexController extends Controller
{
    public function capexRequest()
    { 

        $capexEmployee = session()->get('capexEmployee');

      
        pre($capexEmployee['empCode']);exit;
        $id=0;
        $data = LayoutController::addEditCommon($id);
        $data['employeeData']=Employee::where('emp_no',$capexEmployee['empCode'])
        ->leftJoin('location_master','location_master.id','=','employees.location_id')
        ->leftJoin('business_division_master','business_division_master.id','=','employees.business_division_id')
        ->select('employees.*','location_master.location_name','business_division_master.business_division')
        ->first();
      //  pre($data['employeeData']->toArray());exit;
        $data['editData'] = [];
        $data['assetgroup']=AssetGroup::get();
        $data['budgetType']=BudgetType::get();
        $data['bodyView'] = view('employee/capex/request_add_edit', $data);     
        return LayoutController::loadEmployee($data);
    }

    public function capexRequestAddEditAction(Request $request)
    {
        $id = $request->post('id');
        $mode = $request->post('mode');
        $request_date = $request->post('request_date');
        $asset_group_id = $request->post('asset_group_id');
        $asset_type_id = $request->post('asset_type_id');
        $budget_type_id = $request->post('budget_type_id');
        $manufacturer = $request->post('manufacturer');
        $asset_name = $request->post('asset_name');
        $requirement_description = $request->post('requirement_description');
        $justification = $request->post('justification');
        $asset_name = $request->post('asset_name');
        $quantity = $request->post('quantity');
        $procurement_cost = $request->post('procurement_cost');
     
    

        $validator = Validator::make($request->all(), [
            'request_date' => 'required',
            'asset_group_id' => 'required', 
            'asset_type_id' => 'required', 
            'budget_type_id' => 'required', 
            'asset_name' => 'required', 
            'requirement_description' => 'required', 
            'manufacturer' => 'required', 
            'justification' => 'required', 
            'asset_name' => 'required', 
            'quantity' => 'required', 
            'procurement_cost' => 'required', 
            'assetQuotationFile' => 'required', 
          
        ],[
            'request_date.required' => 'Budget amount is required.', 
            'asset_group_id.required' => 'Asset group is required.', 
            'asset_type_id.required' => 'Asset type is required.', 
            'budget_type_id.required' => 'Budget type is required.', 
            'manufacturer.required' => 'Manufacturer is required.', 
            'asset_name.required' => 'Asset name is required.', 
            'requirement_description.required' => 'Requirement description is required.', 
            'manufacturer.required' => 'Manufacturer is required.', 
            'justification.required' => 'Justification is required.', 
            'asset_name.required' => 'Asset name is required.', 
            'quantity.required' => 'Quantity is required.', 
            'procurement_cost.required' => 'procurement cost is required.', 
            
          ]);


        if ($validator->fails()) {
            return response()->json(['msg_status' => 0, 'errors' => $validator->errors()]);
        }

        if ($mode == "Edit") {
            $model = CapexRequest::find($id);
        } else {
            $capexEmployee = session()->get('capexEmployee');
            $model = new CapexRequest();
            $model->emp_code = $capexEmployee['empCode'];
        }

        if ($request->hasFile('assetQuotationFile')) {
            $QuotationFile = $request->file('assetQuotationFile');
            $docName = "AN" . time() . 'IL.' . $QuotationFile->getClientOriginalExtension();
            $QuotationFile->storeAs('public/asset_quotation_file', $docName);
            $model->asset_quotation_file = $docName;
        }


        $model->request_date = date_ymd($request_date);
        $model->request_no = $this->generateRequestNumber();
        $model->asset_group_id = $asset_group_id;
        $model->asset_type_id = $asset_type_id;
        $model->budget_type_id = $budget_type_id;
      // $model->is_budget_exist = $budget_type_id;// need to discuss 
        $model->manufacturer = $manufacturer;
        $model->asset_name = $asset_name;
        $model->requirement_description = $requirement_description;
        $model->justification = $justification;
        $model->quantity = $quantity;
        $model->procurement_cost = $procurement_cost;
        $model->save();
        $capex_request_id=$model->id;

        insertLog($model, $mode);


        $vendor_name = $request->post('vendor_name');
        $vendor_code = $request->post('vendor_code');
        foreach ($vendor_name as $key => $value) {
            $vendorModel = new CapexproposedVendor();
            $vendorModel->capex_request_id = $capex_request_id;
            $vendorModel->vendor_name = $vendor_name[$key];
            $vendorModel->vendor_code = $vendor_code[$key];
            $vendorModel->save();
        }

        return response()->json(['errors' => [], 'msg_status' => 1, 'msg_data' => 'Data Successfully Saved']);
    }


    public function generateRequestNumber()
    {
        $serialdata = SerialMaster::where(['module' => 'CAPEX_REQ'])->first();
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


    public function vendorSearchByName(Request $request)
    {
        $query = $request->input('query');

        $vendors = Vendor::where('vendor_name', 'LIKE', "%{$query}%")
        ->select(DB::raw("CONCAT(vendor_name, '-', vendor_code) AS vendor_full"))
        ->pluck('vendor_full'); // Pluck the concatenated result

        return response()->json($vendors);
    }
}
