@section('title', 'Request')

<style>
.border-primary-600{
  border-color: #3e5480;
}
.form-select-xs {
    font-size: 0.75rem; /* text-xs equivalent */
    padding: 0.25rem 0.5rem; /* py-1 px-2 equivalent */
}

</style>
<form name="capexRequestForm" id="capexRequestForm">
  @csrf

  <input type="hidden" name="id" id="id" value="{{ $id }}">
  <input type="hidden" name="mode" id="mode" value="{{ $mode }}">

<div class="col-span-12 mt-8 xl:col-span-9"></div>
    <!-- ----------Start  My Details Block-- -->
    <div class="preview-component intro-y box mt-5 p-2">
        <div class="flex flex-col items-center border-b border-slate-200/60 p-2 dark:border-darkmode-400 sm:flex-row">
            <h2 class="mr-auto text-base font-medium" style="color: #1b3174;">
                My Details
            </h2>          
        </div>
       
        <div class="grid grid-cols-4 gap-4 mt-1">  
            <div class="box zoom-in ml-4 flex-1 px-5 py-3 ">
              <button class="transition duration-200 border shadow-sm items-center justify-center py-1 px-2 rounded-md font-medium cursor-pointer text-sm focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-primary text-primary dark:border-primary [&amp;:hover:not(:disabled)]:bg-primary/10 mb-2 mr-1 inline-block w-40">
                 Company code 
              </button>
                <div class="flex items-center">
                    <div class="font-medium">
                      GEPL 
                    </div>                  
                </div>    
            </div>

             
        <div class="box zoom-in ml-4 flex-1 px-5 py-3">
              <button class="transition duration-200 border shadow-sm items-center justify-center py-1 px-2 rounded-md font-medium cursor-pointer text-sm focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-primary text-primary dark:border-primary [&amp;:hover:not(:disabled)]:bg-primary/10 mb-2 mr-1 inline-block w-40">
                  Employee Name 
                </button>
            <div class="flex items-center">
                <div class="font-medium">
                 {{ $employeeData->emp_name }}
                </div>             
            </div>          
        </div>

      <div class="box zoom-in ml-4 flex-1 px-5 py-3">
          <button class="transition duration-200 border shadow-sm items-center justify-center py-1 px-2 rounded-md font-medium cursor-pointer text-sm focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-primary text-primary dark:border-primary [&amp;:hover:not(:disabled)]:bg-primary/10 mb-2 mr-1 inline-block w-40">
             Location 
            </button>
          <div class="flex items-center">
              <div class="font-medium">
                {{ $employeeData->location_name }} 
              </div>            
          </div>       
      </div>

      <div class="box zoom-in ml-4 flex-1 px-5 py-3">
        <button class="transition duration-200 border shadow-sm items-center justify-center py-1 px-2 rounded-md font-medium cursor-pointer text-sm focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-primary text-primary dark:border-primary [&amp;:hover:not(:disabled)]:bg-primary/10 mb-2 mr-1 inline-block w-40">
          Business Division
          </button>
        <div class="flex items-center">
            <div class="font-medium">
              {{ $employeeData->business_division }}  
            </div>           
        </div>       
     </div>

        </div>

    </div>
     <!-- ----------End  My Details Block-- -->

<!-- ----------Start  Generate Request Block-- -->
<div class="preview-component intro-y box mt-5 p-3">
  <div class="flex flex-col items-center border-b border-slate-200/60 p-2 dark:border-darkmode-400 sm:flex-row">
      <h2 class="mr-auto text-base font-medium" style="color: #1b3174;">
        Generate Request
      </h2>        
  </div>

  <div class="mt-5 grid grid-cols-12 gap-4 gap-y-5">       
    <x-input-component column="col-span-12 sm:col-span-4" type="text" label="Request Date*" name="request_date"
    id="request_date" class="" placeholder=""
    value="{{ getEditData($mode, $editData, 'request_date') }}" readonly="readonly"  />  

    <x-select-component :data="$assetgroup" arraykey="id" arrayValue="asset_group" column="col-span-12 sm:col-span-4"
      label="Asset Group *" name="asset_group_id" id="asset_group_id" class="" placeholder="Select Asset Group"
      value="{{ getEditData($mode, $editData, 'asset_group_id') }}" />

    <div class=" col-span-12 sm:col-span-4" id="asset_type_drp">
        <label for="input-wizard-6" class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
            Asset Type*
        </label>
        <select data-placeholder="Select " class="tom-select w-full" id="asset_type_id" name="asset_type_id">
            <option value="">Select</option>   
            @if($mode=='Edit')
            @foreach ($assetType as $asset_type)
            <option value="{{ $asset_type->id }}" {{ ($asset_type->id == $editData->asset_type_id) ? 'selected' : '' }}>{{ $asset_type->asset_type }}</option>
            @endforeach

            @endif
        </select>
        <div id="asset_type_id_error" class="text-danger error-text"></div>
    </div>
  
   
  </div>

  <div class="mt-5 grid grid-cols-12 gap-4 gap-y-5"> 
    <x-select-component :data="$budgetType" arraykey="id" arrayValue="budget_type" column="col-span-12 sm:col-span-4"
    label="Budget Type *" name="budget_type_id" id="budget_type_id" class="" placeholder="Select Budget Type"
    value="{{ getEditData($mode, $editData, 'budget_type_id') }}" />

    <x-input-component column="col-span-12 sm:col-span-4" type="text" label="Manufacturer*" name="manufacturer"
    id="manufacturer" class="" placeholder=""
    value="{{ getEditData($mode, $editData, 'manufacturer') }}"  />  

    <x-input-component column="col-span-12 sm:col-span-4" type="text" label="Asset Name*" name="asset_name"
    id="asset_name" class="" placeholder=""
    value="{{ getEditData($mode, $editData, 'asset_name') }}"  /> 
    
  </div>
  <div class="mt-5 grid grid-cols-12 gap-4 gap-y-5"> 
    <x-textarea-component column="col-span-12 sm:col-span-6" label="Requirement Description *" name="requirement_description"
    id="requirement_description" class="" placeholder="" cols="2" rows="2"
    value="{{ getEditData($mode, $editData, 'requirement_description') }}" />
    <x-textarea-component column="col-span-12 sm:col-span-6" label="Justification* " name="justification"
    id="justification" class="" placeholder="" cols="2" rows="2"
    value="{{ getEditData($mode, $editData, 'justification') }}" />
  </div>
  <div class="mt-5 grid grid-cols-12 gap-4 gap-y-5"> 
    <x-input-component column="col-span-12 sm:col-span-4" type="text" label="Quantity*" name="quantity"
    id="quantity" class="onlynumber" placeholder=""
    value="{{ getEditData($mode, $editData, 'quantity') }}"  />  

    <x-input-component column="col-span-12 sm:col-span-4" type="text" label="Total Cost of Procurement*" name="procurement_cost"
    id="procurement_cost" class="onlynumber" placeholder=""
    value="{{ getEditData($mode, $editData, 'procurement_cost') }}"  /> 

   

    <div class=" col-span-12 sm:col-span-4">
      <label for="file_input" class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
        Asset Quotation *
      </label>
      <div class="relative w-full">
          <input id="file_input" type="file" name="assetQuotationFile" id="assetQuotationFile" class="hidden" onchange="displayFileName()">
          <label for="file_input" class="flex items-center justify-center px-4 py-2 w-full text-sm font-medium text-white bg-blue-600 rounded-lg cursor-pointer hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800 border-2 border-dashed border-primary-600" id="file_label">
               <span id="file_name" class="block  text-sm text-gray-600 dark:text-gray-300">Choose File</span>
          </label>
         
      </div>
      <div id="assetQuotationFile_error" class="text-danger error-text"></div>
  </div>

  


 

  </div>

  <div id="vendor_container">
    <!-- First row (fixed, no remove button) -->
    <div class="vendor_details mt-5 grid grid-cols-12 gap-4 gap-y-5" data-index="1"> 
        <div class="col-span-12 sm:col-span-4 ">
            <label class="vendor-label" for="vendor_name_1">Proposed Vendor Name </label>
            <input type="text" id="vendor_name_1" name="vendor_name[]" placeholder="Vendor Name" class="mt-2 vendor_name w-full text-sm border-slate-200 shadow-sm rounded-md">

      <!-- Suggestions Dropdown (unique per input) -->
     <div class="vendor_suggestions absolute bg-white border border-gray-300 rounded-md shadow-md hidden"></div>
          </div>
        <div class="col-span-12 sm:col-span-4">
            <label class="vendor-code-label" for="vendor_code_1">SAP Vendor Code </label>
            <input type="text" id="vendor_code_1" name="vendor_code[]" placeholder="SAP Vendor Code" class=" mt-2 vendor_code w-full text-sm border-slate-200 shadow-sm rounded-md">
        </div>
    </div>
</div>

<div class="grid grid-cols-12 gap-4 gap-y-5"> 
  <div class="col-span-12 sm:col-span-12">
      <div class="py-3">   
          <button type="button" id="AddVendorRow" class="transition duration-200 border shadow-sm inline-flex items-center justify-center rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-xs py-1.5 px-2 bg-pending border-pending text-white dark:border-primary mb-2 mr-1 w-24 w-30">Add Vendor</button>
      </div>
  </div>
</div>


  <!--   start Save button   ----- -->
  <div class="mt-5 grid grid-cols-12 gap-4 gap-y-5"> 
    <div class="col-span-12 sm:col-span-12">
      <div class="flex float-end mt-4 px-5 py-3 text-right ">   
        <button data-tw-merge="" type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-20" id="savebtn">{{ $btntext }}</button>
      </div>
   </div>   
  </div>
    <!--   End Save button   ----- -->

 

  

  
 
  

  </div>
<!-- ----------End  Generate Request Block-- -->
 

</form>
   
   



 <script src="{{ asset('assets/js/employee') }}/capex_request.js"></script>