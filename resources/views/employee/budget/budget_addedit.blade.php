
<form name="businessEntityForm" id="businessEntityForm">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $id }}">
    <input type="hidden" name="mode" id="mode" value="{{ $mode }}">
<div class="mt-5 grid grid-cols-12 gap-4 gap-y-5">

    <x-input-component column="col-span-12 sm:col-span-6" type="text" label="Budget Entity" name="budget_entity"
    id="budget_entity" class="" placeholder="Enter Budget Entity"
    value="{{ getEditData($mode, $editData, 'budget_entity') }}"  />  


    <x-select-component :data="$assetgroup" arraykey="id" arrayValue="asset_group" column="col-span-12 sm:col-span-6"
        label="Asset Group *" name="asset_group_id" id="asset_group_id" class="" placeholder="Select Asset Group"
        value="{{ getEditData($mode, $editData, 'asset_group_id') }}" />

    <div class="intro-y col-span-12 sm:col-span-6" id="asset_type_drp">
        <label for="input-wizard-6" class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
            Asset Type
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

    <x-select-component :data="$budgetType" arraykey="id" arrayValue="budget_type" column="col-span-12 sm:col-span-6"
    label="Budget Type *" name="budget_type_id" id="budget_type_id" class="" placeholder="Select Budget Type"
    value="{{ getEditData($mode, $editData, 'budget_type_id') }}" />

    <x-select-component :data="$locationList" arraykey="id" arrayValue="location_name" column="col-span-12 sm:col-span-6"
    label="Location " name="location_id" id="location_id" class="" placeholder="Select Location"
    value="{{ getEditData($mode, $editData, 'location_id') }}" />

    <div class="intro-y col-span-12 sm:col-span-6" id="business_division_drp">
        <label for="input-wizard-6" class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
            Business Division
        </label>
        <select data-placeholder="Select " class="tom-select w-full" id="business_division_id" name="business_division_id">
            <option value="">Select</option>   
            @if($mode=='Edit')
                @foreach ($businessDivisionList as $business_div)
                <option value="{{ $business_div->id }}" {{ ($business_div->id == $editData->business_division_id) ? 'selected' : '' }}>{{ $business_div->business_division }}</option>
                @endforeach 
            @endif       
        </select>
        <div id="asset_type_id_error" class="text-danger error-text"></div>
    </div>

    

   

  

    
</div>
<div class="mt-2 text-success" id="success_msg"></div>
<br>
   <!-- BEGIN: Slide Over Footer -->
   <div class="flex float-end mt-4 px-5 py-3 text-right ">
    <button data-tw-merge="" data-tw-dismiss="modal" type="button" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 w-20 mr-1">Cancel</button>
    <button data-tw-merge="" type="submit" class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-20" id="savebtn">Save</button>
</div>

</form>
