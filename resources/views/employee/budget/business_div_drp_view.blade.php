<label for="input-wizard-6" class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
    Business Division
</label>
<select data-placeholder="Select " class="tom-select w-full" id="business_division_id" name="business_division_id">
    <option value="">Select</option>   
    @foreach ($businessDivisionList as $business_div)
    <option value="{{ $business_div->id }}">{{ $business_div->business_division }}</option>
    @endforeach         
</select>
<div id="asset_type_id_error" class="text-danger error-text"></div>