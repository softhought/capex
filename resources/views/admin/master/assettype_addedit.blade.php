
<form name="assetTypeForm" id="assetTypeForm">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ $id }}">
    <input type="hidden" name="mode" id="mode" value="{{ $mode }}">
<div class="mt-5 grid grid-cols-12 gap-4 gap-y-5">

    {{-- <div class="intro-y col-span-12 sm:col-span-6">
        <label for="input-wizard-6"
            class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
            Asset Owner
        </label>
        <select id="input-wizard-6"
            class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1">
            <option value="1">GEPL</option>
        </select>
    </div> --}}

    <x-select-component :data="$company" arraykey="id" arrayValue="company_name" column="col-span-12 sm:col-span-6"
    label="Asset Owner *" name="company_id" id="company_id" class="" placeholder="Select Asset Owner"
    value="{{ getEditData($mode, $editData, 'company_id') }}" />

    {{-- <div class="intro-y col-span-12 sm:col-span-6">
        <label for="input-wizard-6" class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
            Asset Group
        </label>
        <select data-placeholder="Select Asset Group" class="tom-select w-full" id="asset_group_id" name="asset_group_id">
            <option value="">Select</option>   
            @foreach ($assetgroup as $asset_group)
            <option value="{{ $asset_group->id }}">{{ $asset_group->asset_group }}</option>
            @endforeach         
        </select>
        <div id="asset_group_id_error" class="text-danger error-text">ten</div>
    </div> --}}

    <x-select-component :data="$assetgroup" arraykey="id" arrayValue="asset_group" column="col-span-12 sm:col-span-6"
        label="Asset Group *" name="asset_group_id" id="asset_group_id" class="" placeholder="Select Asset Group"
        value="{{ getEditData($mode, $editData, 'asset_group_id') }}" />

    {{-- <div class="intro-y col-span-12 sm:col-span-12">
        <label for="input-wizard-1"
            class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
            Asset Type
        </label>
        <input id="input-wizard-1" type="text" placeholder=""
            class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
    </div> --}}

    <x-input-component column="col-span-12 sm:col-span-12" type="text" label="Asset Type" name="asset_type"
    id="asset_type" class="" placeholder="Enter Asset Type"
    value="{{ getEditData($mode, $editData, 'asset_type') }}"  />  

    <x-input-component column="col-span-12 sm:col-span-6" type="text" label="Sap Asset Class" name="sap_asset_class"
    id="sap_asset_class" class="" placeholder="Enter Sap Asset Class"
    value="{{ getEditData($mode, $editData, 'sap_asset_class') }}"  />  

    <x-input-component column="col-span-12 sm:col-span-6" type="text" label="Block Key" name="block_key"
    id="block_key" class="" placeholder="Enter Block Key"
    value="{{ getEditData($mode, $editData, 'block_key') }}"  />  

    <div class="intro-y col-span-12 sm:col-span-12">
        <label>Procurement Indicator</label>
        <div class="mt-3 flex flex-col sm:flex-row">
            <div class="flex items-center mr-2"><input @php
                if($mode=='Edit' && $editData->is_procurement_indicator=='Y'){
                    echo 'checked';
                }
            @endphp type="radio" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type='radio']]:checked:bg-primary [&amp;[type='radio']]:checked:border-primary [&amp;[type='radio']]:checked:border-opacity-10 [&amp;[type='checkbox']]:checked:bg-primary [&amp;[type='checkbox']]:checked:border-primary [&amp;[type='checkbox']]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50" id="radio-switch-4" name="is_procurement_indicator" value="Y">
                <label for="radio-switch-4" class="cursor-pointer ml-2">Yes</label>
            </div>
            <div class="flex items-center mr-2 mt-2 sm:mt-0">
                <input  @php
                if($mode=='Edit' && $editData->is_procurement_indicator=='N'){
                    echo 'checked';
                }
            @endphp type="radio" class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type='radio']]:checked:bg-primary [&amp;[type='radio']]:checked:border-primary [&amp;[type='radio']]:checked:border-opacity-10 [&amp;[type='checkbox']]:checked:bg-primary [&amp;[type='checkbox']]:checked:border-primary [&amp;[type='checkbox']]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50" id="radio-switch-5" name="is_procurement_indicator" value="N">
                <label for="radio-switch-5" class="cursor-pointer ml-2">No</label>
            </div>           
        </div>
        <div id="is_procurement_indicator_error" class="text-danger error-text mt-2"></div>
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
