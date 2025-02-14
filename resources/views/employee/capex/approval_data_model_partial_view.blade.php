
<style>
.boxborder {
  border: 1px solid #3969aa;
}
</style>

<form name="capexApprovalForm" id="capexApprovalForm">
    @csrf
<h5 class="mt-1 text-lg font-medium leading-none text-primary mb-2">
    Employee Details
</h5>
<input type="hidden" name="approval_action" id="approval_action" value="">
<input type="hidden" name="capex_request_id" id="capex_request_id" value="{{ $capex_request_id }}">
<input type="hidden" name="approval_path_details_id" id="approval_path_details_id" value="{{ $approval_path_dtl_id }}">
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400 custom-thead">
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Employee Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Employee Code
                </th>
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                    Location
                </th>
                <th scope="col" class="px-6 py-3">
                    Business Division
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                    <span class="mr-1 rounded-full bg-success px-1 text-xs text-white">
                        {{ $capexRequest->emp_name }}
                    </span>   
                </th>
                <td class="px-2 py-2">
                    {{ $capexRequest->emp_code }}
                </td>
                <td class="px-2 py-2 bg-gray-50 dark:bg-gray-800">
                    {{ $capexRequest->location_name }}
                </td>
                <td class="px-2 py-2">
                    {{ $capexRequest->business_division }}
                </td>
            </tr>
   
        
        </tbody>
    </table>
</div>

<h5 class="mt-4 text-lg font-medium leading-none text-primary mb-2">
    Request Detail
</h5>

<div class="grid grid-cols-12 gap-x-6 gap-y-6 2xl:gap-x-0 2xl:pl-6"> 

   <!-- -------- ----------------start Row 1-------------------- -->
    <div class="col-span-12 mt-3 md:col-span-4 2xl:col-span-12">
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Request NO</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ $capexRequest->request_no }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Asset Type</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ $capexRequest->asset_type }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Asset Name</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ $capexRequest->asset_name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <!-- -------- ----------------end Row 1-------------------- -->

          <!-- -------- ----------------start Row 2-------------------- -->
    <div class="col-span-12 mt-3 md:col-span-4 2xl:col-span-12">
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Request Date</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ date_dmy($capexRequest->request_date) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Budget Type</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ $capexRequest->budget_type }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Quantity</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ $capexRequest->quantity }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <!-- -------- ----------------end Row 2-------------------- -->

                 <!-- -------- ----------------start Row 3-------------------- -->
    <div class="col-span-12 mt-3 md:col-span-4 2xl:col-span-12">
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Asset Group</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ $capexRequest->asset_group }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary"> Manufacturer</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            {{ $capexRequest->manufacturer }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="intro-x">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Total Cost of Procurement</div>
                        <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                            <i class="fa fa-inr" aria-hidden="true"></i>
                            {{ $capexRequest->procurement_cost }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <!-- -------- ----------------end Row 3-------------------- -->


</div>
<div class="grid grid-cols-12 gap-x-6 gap-y-6 2xl:gap-x-0 2xl:pl-6"> 
    <div class="col-span-12 mt-3 md:col-span-6 2xl:col-span-12">
        <div role="alert" class="alert relative border rounded-md px-5 py-2 bg-pending border-warning text-slate-900 dark:border-warning mb-2 bg-opacity-20">
            <div class="flex items-center">
                <div class="text-lg font-medium">
                    Requirement Description
                </div>
                
            </div>
            <div class="mt-1">
                {{ $capexRequest->requirement_description }}
            </div>
        </div>
    </div>

    <div class="col-span-12 mt-3 md:col-span-6 2xl:col-span-12">
        <div role="alert" class="alert relative border rounded-md px-5 py-2 bg-warning border-warning text-slate-900 dark:border-warning mb-2 bg-opacity-20">
            <div class="flex items-center">
                <div class="text-lg font-medium">
                    Justification
                </div>
                
            </div>
            <div class="mt-1">
                {{ $capexRequest->justification }}
            </div>
        </div>
    </div>

</div>


<div id="vendor_container">
    <!-- First row (fixed, no remove button) -->
    @foreach($proposedVendor as $key => $proposed_vendor)
    <div class="vendor_details mt-5 grid grid-cols-12 gap-4 gap-y-5" data-index="{{ $key+1 }}"> 
        <div class="col-span-12 sm:col-span-6 ">
            <label class="vendor-label" for="vendor_name_{{ $key+1 }}">Proposed Vendor Name </label>
            <input type="hidden" id="capvenid_{{ $key+1 }}" name="capvenid[]"  value="{{ $proposed_vendor->id }}">
            <input type="text" id="vendor_name_{{ $key+1 }}" name="vendor_name[]" placeholder="Vendor Name" class="mt-2 vendor_name w-full text-sm border-slate-200 shadow-sm rounded-md" value="{{ $proposed_vendor->vendor_name }}">

      <!-- Suggestions Dropdown (unique per input) -->
     <div class="vendor_suggestions absolute bg-white border border-gray-300 rounded-md shadow-md hidden"></div>
          </div>
        <div class="col-span-12 sm:col-span-4">
            <label class="vendor-code-label" for="vendor_code_{{ $key+1 }}">SAP Vendor Code </label>
            <input type="text" id="vendor_code_{{ $key+1 }}" name="vendor_code[]" placeholder="SAP Vendor Code" class=" mt-2 vendor_code w-full text-sm border-slate-200 shadow-sm rounded-md" value="{{ $proposed_vendor->vendor_code }}">
        </div>
    </div>
    @endforeach
</div>
<div class="grid grid-cols-12 gap-4 gap-y-5"> 
    <div class="col-span-12 sm:col-span-12">
        <div class="py-3">   
            <button type="button" id="AddVendorRow" class="transition duration-200 border shadow-sm inline-flex items-center justify-center rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 bg-pending border-pending text-white dark:border-primary mb-2 mr-1 w-24 w-30">Add Vendor</button>
        </div>
    </div>
  </div>


<div class="intro-y mt-5 grid grid-cols-11 gap-5">
    {{-- <div class="col-span-12 lg:col-span-7 2xl:col-span-3">
        <div class="box rounded-md p-3">
            <div class="mb-1 flex items-center border-b border-slate-200/60 pb-2 dark:border-darkmode-400">
                <div class="truncate text-base font-medium text-primary">
                    Proposed Vendor
                </div>
             
            </div>
            @foreach($proposedVendor as $key => $proposed_vendor)
            <div class="flex items-center">              
                {{ $key+1 }}.
                <a class="ml-1 decoration-dotted" href="#">
                    {{ $proposed_vendor->vendor_name }}-{{ $proposed_vendor->vendor_code }}
                </a>
            </div>
            @endforeach
          

           
        </div>
 
    </div> --}}

    <div class="col-span-12 lg:col-span-3 2xl:col-span-3">
        <div class="box rounded-md p-3">
            <div class="mb-1 flex items-center border-b border-slate-200/60 pb-2 dark:border-darkmode-400">
                <div class="truncate text-base font-medium text-primary">
                    Asset Quotation
                </div>             
            </div>

              @php
                $files = json_decode($capexRequest->asset_quotation_file, true);
            @endphp       
                    <div class="flex items-center">
                        @if (!empty($files) && is_array($files))
                        @foreach ($files as $file)
                        <a href="{{ asset('storage/asset_quotation_file/' . $file) }}" target="_blank">
                            <button class="transition duration-200 border shadow-sm inline-flex items-center justify-center rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-1 bg-primary border-primary text-white dark:border-primary mb-2 mr-1 w-30">
                                 &nbsp;
                                 <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-paperclip">
                                    <path d="M9 17V7a5 5 0 0 1 10 0v10a5 5 0 0 1-10 0V9a3 3 0 0 1 6 0v8"></path>
                                </svg>
                            </button>
                        </a>
                        @endforeach
                        @endif
                    </div>
       
         
        </div>
 
    </div>

</div>


{{-- <div class="intro-y box col-span-12 lg:col-span-6 mt-2">
    <div class="flex items-center border-b border-slate-200/60 px-5 py-5 dark:border-darkmode-400 sm:py-3">
        <h2 class="mr-auto text-base font-medium text-primary">Budget Details</h2>
        <button id="toggleButtonBudget" class="mr-1 rounded-full bg-dark px-1 text-xs text-white">Show Details</button>
      
    </div>
    <div class="p-2 hidden" id="budget_details">
       
 <div class="grid grid-cols-12 gap-x-6 gap-y-6 2xl:gap-x-0 2xl:pl-6"> 
                <!-- -------- ----------------start Budget Row 1-------------------- -->
            <div class="col-span-12 mt-3 md:col-span-4 2xl:col-span-12">
                <div class="mt-2">
                    <div class="intro-x">
                        <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                            <div class="ml-4 mr-auto">
                                <div class="font-medium text-primary">Total Budget</div>
                                <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                                    {{ $capexRequest->request_no }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="intro-x">
                        <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                            <div class="ml-4 mr-auto">
                                <div class="font-medium text-primary">Total Budget Consumed</div>
                                <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                                    {{ $capexRequest->asset_type }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="intro-x">
                        <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                            <div class="ml-4 mr-auto">
                                <div class="font-medium text-primary">Total Budget Remeaning</div>
                                <div class="mt-0.5 text-xs text-slate-500  text-dark font-extrabold">
                                    {{ $capexRequest->asset_name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- -------- ----------------end Budget Row 1-------------------- -->

    </div>
 
    </div>
</div> --}}

<div class="intro-y box col-span-12 lg:col-span-6 mt-2 boxborder">
    <div class="flex items-center border-b border-slate-200/60 px-5 py-5 dark:border-darkmode-400 sm:py-3">
        <h2 class="mr-auto text-base font-medium text-primary">Budget Details</h2>
        <button id="toggleButtonBudget" class="mr-1 rounded-full bg-dark px-1 text-xs text-white">Show Details</button>
    </div>
    <div class="p-2 hidden" id="budget_details">

        <div class="flex flex-wrap gap-4">
            <div class="intro-x flex-1 min-w-[250px]">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Total Budget</div>
                        <div class="mt-0.5 text-xs text-slate-500 text-dark font-extrabold">
                            {{-- {{ $capexRequest->request_no }} --}}---
                        </div>
                    </div>
                </div>
            </div>

            <div class="intro-x flex-1 min-w-[250px]">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Total Budget Consumed</div>
                        <div class="mt-0.5 text-xs text-slate-500 text-dark font-extrabold">
                            {{-- {{ $capexRequest->asset_type }} --}}---
                        </div>
                    </div>
                </div>
            </div>

            <div class="intro-x flex-1 min-w-[250px]">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Total Budget Remaining</div>
                        <div class="mt-0.5 text-xs text-slate-500 text-dark font-extrabold">
                            {{-- {{ $capexRequest->asset_name }} --}}---
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap gap-4">
            <div class="intro-x flex-1 min-w-[250px]">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Budget Description</div>
                        <div class="mt-0.5 text-xs text-slate-500 text-dark font-extrabold">
                            {{-- {{ $capexRequest->request_no }} --}}----
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap gap-4">
            <div class="intro-x flex-1 min-w-[250px]">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Average value of same asset for same employee grade as requester</div>
                        <div class="mt-0.5 text-xs text-slate-500 text-dark font-extrabold">
                            {{-- {{ $capexRequest->request_no }} --}}----
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap gap-4">
            <div class="intro-x flex-1 min-w-[250px]">
                <div class="box zoom-in mb-3 flex items-center px-5 py-2">             
                    <div class="ml-4 mr-auto">
                        <div class="font-medium text-primary">Total No Request Raised by {{ $capexRequest->emp_name }} in {{ date('Y') }}</div>
                        <div class="mt-0.5 text-xs text-slate-500 text-dark font-extrabold">
                            {{-- {{ $capexRequest->request_no }} --}}----
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>







<div class="intro-y box col-span-12 lg:col-span-6 mt-2 boxborder">
    <div class="flex items-center border-b border-slate-200/60 px-5 py-5 dark:border-darkmode-400 sm:py-3">
        <h2 class="mr-auto text-base font-medium text-primary">Approval Process</h2>
        <button id="toggleButton" class="mr-1 rounded-full bg-dark px-1 text-xs text-white">Show Details</button>
      
    </div>
    <div class="p-2 hidden" id="approval_details">
        @foreach ($approvalProcess as $key2 => $approval_process)
            
        
        <div class="relative flex items-center mb-2 border-b border-slate-200/60">
            <button class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed h-10 w-10 rounded-full bg-slate-100  dark:border-darkmode-400 dark:bg-darkmode-400 text-primary border-primary">
                {{ $key2+1 }}</button>
            <div class="ml-4 mr-auto">
                <a class="font-medium" href="#">
                  {{ $approval_process->approver_name }} - {{ $approval_process->emp_name }} ({{ $approval_process->approver_emp_code }})
                </a>
                <div class="mr-5 text-slate-500 sm:mr-5">
                    Comment:-{{ $approval_process->comment }} 
                     @if ( $approval_process->review_date!="")
                     &nbsp;(Dt:-{{  date_dmy($approval_process->review_date)}})
                    @endif
                </div>
            </div>
            <div class="font-medium text-slate-600 dark:text-slate-500">
               @if($approval_process->is_open=='Y')
                  @if($approval_process->is_approved=='N')
                     <h5 class=" font-medium leading-none text-warning"> Pending</h5>
                  @elseif($approval_process->is_approved=='A')
                       <h5 class=" font-medium leading-none text-success" style="color: rgb(130, 200, 23);"> Approved</h5>
                  @else
                       <h5 class=" font-medium leading-none text-danger"> Rejected</h5>
                  @endif
               @else
                --
               @endif
            </div>
        </div>
        @endforeach
     
   
 
    </div>
</div>

<div class="mt-5 grid grid-cols-12 gap-4 gap-y-5"> 
    <x-textarea-component column="col-span-12 sm:col-span-8" label="Comment *" name="comment"
    id="comment" class="" placeholder="" cols="2" rows="2"
    value="{{ $ApproverPathData->comment }}" />


  
  </div>

  @if($ApproverPathData->is_approved=="A")

  <div class="flex justify-between items-center">
    @if($capexRequest->sanction_number!='')
    <div role="alert" class="alert relative border rounded-md px-5 py-2 bg-success border-success text-slate-900 dark:border-success mb-2 mt-2 w-60" style="background-color: rgb(130, 200, 23);">
        <b>Sanction No: {{ $capexRequest->sanction_number }}</b></div>  @endif
   
     <div class="mt-1.5 rounded bg-success/20 px-2 text-success w-20 mb-4" style="float: right;float: right;
  font-weight: bold;
  font-size: 15px;
">
        Approved
    </div>
</div>
  @elseif($ApproverPathData->is_approved=="R")
  Reject
  @else
  <div class="flex float-end mt-4 px-5 py-3 text-right ">
    <button data-tw-merge="" type="button" class="actBtn transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-danger border-danger text-white dark:border-danger mr-1 w-20" id="RejectBtn" data-act="R">Reject</button>
    <button data-tw-merge="" type="button" class="actBtn transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-successX border-successX text-white dark:border-success w-20" id="RejectBtn" data-act="A">Approve</button>
   </div>
  @endif

</form>



<!-- Confirmation Modal -->
<div id="confirmationModal" class="fixed inset-0 z-50 hidden bg-black/60 flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg w-[90%] sm:w-[460px] lg:w-[500px]">
        
        <!-- Modal Header -->
        <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400" style="background-color: #1d3885 !important;color: #fff !important;">
            <h2 class="mr-auto text-base font-medium">
                Confirm Action
            </h2>         
        </div>
        
        <!-- Modal Body -->
        <div class="p-5 text-gray-700">
            <p id="modalMessage" class="text-base font-medium"></p>
        </div>
        
        <!-- Modal Footer with Your Button Design -->
        <hr>
        <div class="flex float-end mt-4 px-5 py-2 text-right">
            <button id="cancelBtn" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-danger/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 bg-danger text-white w-20 mr-1">
                Cancel
            </button>
            <button id="confirmBtn" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-successX border-successX text-white dark:border-success w-20">
                Confirm
            </button>
        </div>
    </div>
</div>



