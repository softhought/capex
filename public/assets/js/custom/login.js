
$(document).ready(function() {

    $(document).on('keyup change', 'input, select', function() {
        var inputValue = $(this).val();
        var id = $(this).attr('id');
        if (inputValue !== "") {
            $("#" + id + "_error").text("");
            $("#" + id).css('border-bottom', '1px solid #b0afaf');
            $("#" + id).siblings('.select2-container').find('.select2-selection').css('border-bottom', '1px solid #b0afaf');
        }
    });

    $(".onlynumber").bind("keyup paste", function() {
        this.value = this.value.replace(/[^0-9]/g, "");
    });

    var base_url = $("#base_url").val();


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
                            $("#" + key).css('border-bottom', '1px solid red');
                            $("#" + key).siblings('.select2-container').find('.select2-selection').css('border', '1px solid red');

                        });
                    }
                    if (response.msg_status == 2) {
                        $("#errormsg").text(response.msg_data);
                    }
                    $("#login_btn").removeClass('d-none');
                    $("#loader_btn").addClass('d-none');

                    if (response.msg_status == 1) {
                        window.location.href = "admin/dashboard";
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

    $(document).on('click', '#admin_send_otp', function(e) {
        e.preventDefault();

        var mobile_no = $("#admin_mobile_no").val();

        var type = "POST"; //for creating new resource
        var urlpath = base_url + '/login/send_admin_otp';

        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $("#admin_send_otp").addClass('d-none');
        $("#admin_loader_btn").removeClass('d-none');

        $("#admin_mobile_no_error").text("");
        $("#admin_mobile_no").css('border-bottom', 'none');


        $.ajax({
            url: urlpath,
            type: type,
            data: { mobile_no: mobile_no },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                // alert(response.errors.length);

                if (!$.isEmptyObject(response.errors)) {
                    $.each(response.errors, function(key, value) {
                        $("#admin_mobile_no_error").text(value);
                        $("#admin_mobile_no").css('border-bottom', '1px solid red');
                    });
                }
                if (response.msg_status == 2) {
                    $("#admin_errormsg").text(response.msg_data);
                }
                $("#admin_loader_btn").addClass('d-none');
                $("#admin_send_otp").removeClass('d-none');

                if (response.msg_status == 1) {
                    var html = '';
                    countdown = 120;
                    setInterval(updateAdminTimer, 1000);
                    html += '<div class="sminputs">';
                    html += '<div class="input full">';
                    html += '<label class="string optional" for="otp">OTP *</label>';
                    html += '<input class="string optional form-control onlynumber pl-1" maxlength="6" id="admin_otp" name="admin_otp" placeholder="Enter otp" type="text" value="' + response.otp + '"/>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div id="otp_error" class="invalid-feedback d-block error-text ml-4"></div>';
                    html += '<p class="text-right pr-4"> <span class="text-dark">Resend : <span id="admin_timer"></span></span> <a class="d-none" href="javascript:void(0);" id="admin_send_otp">Send</a> <span id="loader_btn" class = "spinner-border d-none" role = "status"  style = "width: 1rem; height: 1rem; "></span></p>';

                    $("#admin_otp_div").html(html);

                    var submit_btn = '';
                    submit_btn += '<button class="btn btn-dark btn-sm" type="submit" id="admin_submit_otp">Submit</button>';
                    submit_btn += '<button class="btn btn-dark btn-sm d-none" type="button" id="admin_loader_sub_btn">';
                    submit_btn += '<div class = "spinner-border" role = "status"  style = "width: 1.35rem; height: 1.35rem; "></div></button>';
                    $("#admin_login_btn").html(submit_btn);
                    $("#admin_mobile_no").attr('readonly', true);
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

    });


    $(document).on('submit', '#adminLoginForm', function(e) {
        e.preventDefault();

        if (1) {

            var formData = new FormData($(this)[0]);
            var csrfToken = $('input[name="_token"]').val();


            $("#savebtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');

            var type = "POST"; //for creating new resource
            var urlpath = base_url + '/login/admin_auth';

            $("#admin_errormsg").text('');

            $("#admin_submit_otp").addClass('d-none');
            $("#admin_loader_sub_btn").removeClass('d-none');

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
                            $("#" + key).css('border', '1px solid red');

                        });
                    }
                    if (response.msg_status == 2) {
                        $("#admin_errormsg").text(response.msg_data);
                    }
                    $("#admin_submit_otp").removeClass('d-none');
                    $("#admin_loader_sub_btn").addClass('d-none');

                    if (response.msg_status == 1) {
                        window.location.href = "dashboard";
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
