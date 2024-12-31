<style>
    .image-upload {
        position: relative;
        width: 160px;
        height: 120px;
        border: 2px dashed #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .image-upload input[type="file"] {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .image-preview {
        width: 160px;
        height: 120px;
        position: relative;
    }

    .image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: none;
        border-radius: 15px;
        padding: 5%;
    }

    .plus-icon {
        position: absolute;
        font-size: 36px;
        color: #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }
</style>

<div class="form-group mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <div class="image-upload">
        <input type="file" id="{{ $id }}" name="{{ $id }}" accept="image/*" style="display: none;" />
        <div class="image-preview" style="position: relative; cursor: pointer;">
            <img id="{{ $id }}_preview" src="{{ $imageSrc }}" alt="Image Preview"
                style="display: {{ $imageSrc ? 'block' : 'none' }}; max-width: 100%;" />
            <div class="plus-icon">+</div>
        </div>
    </div>
    <div id="{{ $id }}_error" class="invalid-feedback d-block error-text"></div>
</div>

<script>
    $(document).ready(function() {
        var previewImg = $('#{{ $id }}_preview');
        if (previewImg.attr('src') !== '') {
            previewImg.show();
            $('.plus-icon').hide();
        }

        $('#{{ $id }}').change(function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImg.attr('src', e.target.result);
                previewImg.show();
                $('.plus-icon').hide();
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });

        $('.plus-icon').click(function() {
            $('#{{ $id }}').click();
        });

        $("#{{ $id }}_preview").click(function() {
            $('#{{ $id }}').click();
        });
    });
</script>
