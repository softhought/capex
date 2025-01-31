<label for="input-wizard-6" class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
    Asset Type
</label>
<select data-placeholder="Select Asset Type" class="tom-select w-full" id="asset_type_id" name="asset_type_id">
    <option value="">Select</option>   
    @foreach ($assetType as $asset_type)
    <option value="{{ $asset_type->id }}">{{ $asset_type->asset_type }}</option>
    @endforeach         
</select>
<div id="asset_type_id_error" class="text-danger error-text"></div>