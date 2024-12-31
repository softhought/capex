<div class="{{ $column }}">
    <label for="{{ $id }}">&nbsp;</label>
    <div class="form-check mt-3">
        <input class="form-check-input" type="checkbox" value="{{ $value }}" name="{{ $name }}" id="{{ $id }}"  {{ $isChecked }} />
        <label class="form-check-label" for="{{ $id }}">
          {{ $label }}
        </label>
      </div>    
</div>