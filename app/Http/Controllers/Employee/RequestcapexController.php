<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LayoutController;
use App\Models\ApprovalPath;
use App\Models\Approver;
use App\Models\AssetGroup;
use App\Models\BudgetType;
use App\Models\BusinessDivision;
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
    public function requestHistory()
    {   $capexEmployee = session()->get('capexEmployee');
        // $result['requestList'] = capexRequest::where('emp_code', $capexEmployee['empCode'])
        // ->leftJoin('asset_group_master','asset_group_master.id','=','capex_request.asset_group_id')
        // ->leftJoin('asset_type_master','asset_type_master.id','=','capex_request.asset_type_id')
        // ->select('capex_request.*','asset_group_master.asset_group','asset_type_master.asset_type')
        // ->get();
        $result['requestList'] = capexRequest::where('emp_code', $capexEmployee['empCode'])
        ->leftJoin('asset_group_master', 'asset_group_master.id', '=', 'capex_request.asset_group_id')
        ->leftJoin('asset_type_master', 'asset_type_master.id', '=', 'capex_request.asset_type_id')
        ->with(['approvalPathDetails' => function ($query) {
            $query->join('approver_details', 'approver_details.id', '=', 'capex_approval_path_details.approver_id')
            ->where('capex_approval_path_details.is_open', 'Y')
            ->where('capex_approval_path_details.is_approved', 'N')
            ->select('approver_id', 'capex_request_id','approver_name')->first();  // Only select approver_id and capex_request_id
        }])
        ->select('capex_request.*', 'asset_group_master.asset_group', 'asset_type_master.asset_type')
        ->get();
      //  pre($result['requestList']->toArray());exit;
    
       $data['bodyView'] = view('employee/capex/request_list_view', $result);
       return LayoutController::loadEmployee($data);
    }
    public function capexRequest()
    { 

        $capexEmployee = session()->get('capexEmployee');
        // pre($capexEmployee);
        // $this->SetApprovalPathData(2);exit;
      
       // pre($capexEmployee['empCode']);exit;
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
        $required_by = $request->post('required_by');
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
            'required_by' => 'required',
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
            'required_by.required' => 'Required By is required.', 
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

        $model->request_date = date('Y-m-d');
        $model->required_by = date_ymd($required_by);
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

        $this->SetApprovalPathData($capex_request_id);

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

    function SetApprovalPathData($capex_request_id)
    {  $current_version=1;
        $dataArray = [];
        $capexRequest = capexRequest::find($capex_request_id);
        if ($capexRequest) {
            $dataArray = $capexRequest->toArray(); // Convert model to an array
        } 
       
        //  $dataArray['emp_code'] = $capexRequest->emp_code;
      
        $asset_group_id = $capexRequest->asset_group_id;
        $asset_type_id = $capexRequest->asset_type_id;
        $budget_type_id = $capexRequest->budget_type_id;

        $employeeData = Employee::where('emp_no', $dataArray['emp_code'])->first();
        $dataArray['business_division_id']  = $employeeData->business_division_id;
        $dataArray['location_id']  = $employeeData->location_id;
        $manager_code = $employeeData->manager_code;
        $businessDivisionData=BusinessDivision::where('id',  $dataArray['business_division_id'])->first();
       
         if($asset_group_id==1){
            $approver_for=['IT','BOTH'];
         }else{
            $approver_for=['NONIT','BOTH'];
         }

         $approvalDetails=Approver::wherein('approver_for',$approver_for)->get();

      //   pre($approvalDetails->toArray());
      $priority_level=1;
      foreach($approvalDetails as $key => $approval_details){

        $approval_details->approver_name."-";
        $approver_employee_code=$approval_details->emp_code;
        $approver_id=$approval_details->id;
        if($approval_details->is_dynamic=="Y"){
                  //  echo "No Approver ";
                    $table_name=$approval_details->table_name;
                    $where_col=$approval_details->where_col;
                    $where_col_val=$approval_details->where_col_val;
                    $data_col=$approval_details->data_col;
                    if($table_name!=""){
                        $approver_employee_code=$this->getApproverEmployeeCode($table_name, $where_col, $where_col_val, $data_col,$dataArray);
                    }
            }
            $ApprovalPathModel = new ApprovalPath();
            $ApprovalPathModel->capex_request_id = $capex_request_id;
            $ApprovalPathModel->approver_id = $approver_id;
            $ApprovalPathModel->approver_emp_code = $approver_employee_code;
            $ApprovalPathModel->is_open = ($priority_level==1)?'Y':'N';
            $ApprovalPathModel->priority_level = $priority_level++;
            $ApprovalPathModel->version = $current_version;            
            $ApprovalPathModel->save();
       
       
      }

    }



    function getApproverEmployeeCode($table_name, $where_col, $where_col_val, $data_col,$dataArray) {
       $where_val = $dataArray[$where_col_val];
        if (!$where_val) {
            return null; 
        }
        $employeeData = DB::table($table_name)
                          ->where($where_col, $where_val)
                          ->first();   
        return $employeeData ? $employeeData->$data_col : null;
      }


      public function getRequestDetailsModel(Request $request)
      { 
          $capex_request_id=$request->post('id');
          $data['capexRequest'] = capexRequest::where('capex_request.id', $capex_request_id)
          ->join('employees','employees.emp_no','=','capex_request.emp_code')
          ->leftJoin('location_master','location_master.id','=','employees.location_id')
          ->leftJoin('business_division_master','business_division_master.id','=','employees.business_division_id')
          ->leftJoin('asset_group_master', 'asset_group_master.id', '=', 'capex_request.asset_group_id')
          ->leftJoin('asset_type_master', 'asset_type_master.id', '=', 'capex_request.asset_type_id')
          ->leftJoin('budget_type_master', 'budget_type_master.id', '=', 'capex_request.budget_type_id')
          ->select('capex_request.*','employees.emp_name','business_division_master.business_division','location_master.location_name',
          'asset_group_master.asset_group', 'asset_type_master.asset_type','budget_type_master.budget_type')
          ->first();


          $data['proposedVendor']=CapexproposedVendor::where('capex_request_id', $capex_request_id)
          ->get();
       

        $data['approvalProcess']=ApprovalPath::where('capex_request_id', $capex_request_id)
                                ->join('approver_details', 'approver_details.id', '=', 'capex_approval_path_details.approver_id')
                                ->join('employees','employees.emp_no','=','capex_approval_path_details.approver_emp_code')
                                ->select('capex_approval_path_details.*','approver_name','employees.emp_name')
                                ->get();

          return view('employee/capex/request_data_model_partial_view', $data);
         // return LayoutController::loadAdmin($data);
      }


      public function requestApproval()
      {   
        
        $capexEmployee = session()->get('capexEmployee');

      
   
        $result['pendingCapexList']  = ApprovalPath::join('capex_request', 'capex_request.id', '=', 'capex_approval_path_details.capex_request_id')
                                    ->join('approver_details', 'approver_details.id', '=', 'capex_approval_path_details.approver_id')   
                                    ->join('employees','employees.emp_no','=','capex_request.emp_code')   
                                    ->leftJoin('asset_group_master', 'asset_group_master.id', '=', 'capex_request.asset_group_id')
                                    ->leftJoin('asset_type_master', 'asset_type_master.id', '=', 'capex_request.asset_type_id')                          
                                    ->where('approver_emp_code', $capexEmployee['empCode'])
                                    ->where('capex_approval_path_details.is_open', 'Y')
                                    ->where('capex_approval_path_details.is_approved', 'N')
                                    ->select('capex_request.*','capex_approval_path_details.approver_emp_code','approver_name',
                                    'employees.emp_name as requester', 'asset_group_master.asset_group', 'asset_type_master.asset_type')
                                    ->get();

                                   // pre($result['pendingCapexList']->toArray());exit;
      
         $data['bodyView'] = view('employee/capex/approval_request_list_view', $result);
         return LayoutController::loadEmployee($data);
      }


      /** Calling for approval Interface */
      public function getApprovalDetailsModel(Request $request)
      { 
          $capex_request_id=$request->post('id');
          $data['capexRequest'] = capexRequest::where('capex_request.id', $capex_request_id)
                                ->join('employees','employees.emp_no','=','capex_request.emp_code')
                                ->leftJoin('location_master','location_master.id','=','employees.location_id')
                                ->leftJoin('business_division_master','business_division_master.id','=','employees.business_division_id')
                                ->leftJoin('asset_group_master', 'asset_group_master.id', '=', 'capex_request.asset_group_id')
                                ->leftJoin('asset_type_master', 'asset_type_master.id', '=', 'capex_request.asset_type_id')
                                ->leftJoin('budget_type_master', 'budget_type_master.id', '=', 'capex_request.budget_type_id')
                                ->select('capex_request.*','employees.emp_name','business_division_master.business_division','location_master.location_name',
                                'asset_group_master.asset_group', 'asset_type_master.asset_type','budget_type_master.budget_type')
                                ->first();


          $data['proposedVendor']=CapexproposedVendor::where('capex_request_id', $capex_request_id)->get();
       

          $data['approvalProcess']=ApprovalPath::where('capex_request_id', $capex_request_id)
                                ->join('approver_details', 'approver_details.id', '=', 'capex_approval_path_details.approver_id')
                                ->join('employees','employees.emp_no','=','capex_approval_path_details.approver_emp_code')
                                ->select('capex_approval_path_details.*','approver_name','employees.emp_name')
                                ->get();

          return view('employee/capex/approval_data_model_partial_view', $data);
         // return LayoutController::loadAdmin($data);
      }




}/** end of class */
