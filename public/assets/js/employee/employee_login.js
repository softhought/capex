
$(document).ready(function() {
    alert()

    $(document).on('keyup change', 'input, select', function() {
        var inputValue = $(this).val();
        var id = $(this).attr('id');
        if (inputValue !== "") {
            $("#" + id + "_error").text("");
            // $("#" + id).css('border-bottom', '1px solid #b0afaf');
            // $("#" + id).siblings('.select2-container').find('.select2-selection').css('border-bottom', '1px solid #b0afaf');
        }
    });

    $(".onlynumber").bind("keyup paste", function() {
        this.value = this.value.replace(/[^0-9]/g, "");
    });

    var base_url = $("#base_url").val();

    $("#reload").click(function () {
        var urlpath = base_url + "/reload-captach";
        var csrfToken = $('input[name="_token"]').val();
        $.ajax({
            type: "POST",
            url: urlpath,
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (data) {
                $("#captcha").val(data.operand1 + " + " + data.operand2);
            },
        });
    });


    $(document).on('submit', '#loginForm', function(e) {
        e.preventDefault();

        if (1) {

            var formData = new FormData($(this)[0]);
            var csrfToken = $('input[name="_token"]').val();


            var type = "POST"; //for creating new resource
            var urlpath = base_url + '/login/auth';

            $("#errormsg").text('');

            $("#login_btn").addClass('d-none');
            $("#loader_btn").removeClass('d-none');

            $.ajax({
                url: urlpath,
                type: type,
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    // alert(response.errors.length);

                    if (!$.isEmptyObject(response.errors)) {
                        $.each(response.errors, function(key, value) {
                            $("#" + key + "_error").text(value);
                        });
                    }
                    if (response.msg_status == 2) {
                        $("#errormsg").text(response.msg_data);
                    }
                    $("#login_btn").removeClass('d-none');
                    $("#loader_btn").addClass('d-none');

                    if (response.msg_status == 1) {
                        window.location.href = base_url+"/emp-dashboard";
                    }

                    // console.log(response);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        $.each(errors, function(field, messages) {
                            var errorHtml = '<ul class="list-unstyled">';
                            $.each(messages, function(index, message) {
                                errorHtml += '<li>' + message + '</li>';
                            });
                            errorHtml += '</ul>';
                            $('#my-form').find('[name="' + field + '"]').after(errorHtml);
                        });
                    }
                }
            });


        }

    });




});
