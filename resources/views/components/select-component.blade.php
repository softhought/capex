<div class=" {{ $column }}">
    <label for="{{ $id }}"
        class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:xs:mb-0 group-[.form-inline]:xs:mr-5 group-[.form-inline]:xs:text-right">
        {{ $label }}
    </label>
    <select  class="tom-select w-full "  name="{{ $name }}" id="{{ $id }}">
        <option value="">Select</option>   
        @foreach ($data as $list)
        <option value="{{ is_object($list) ? $list->$arraykey : $list[$arraykey] }}"
            @if ($value == (is_object($list) ? $list->$arraykey : $list[$arraykey])) {{ 'selected' }} @endif>
            {{ is_object($list) ? $list->$arrayValue : $list[$arrayValue] }}
        </option>
    @endforeach
    </select>
    <div id="{{ $id }}_error" class="text-danger error-text"></div>
</div>
