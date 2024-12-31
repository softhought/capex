$(function () {

    var basepath = $("#admin_url").val();

    $(document).on("submit", "#employeeFrom", function (e) {
        e.preventDefault();
        var urlpath = basepath + "/employee/addeditaction";
        var mode = $("#mode").val();
        var formData = new FormData($(this)[0]);
        $("#savebtn").addClass("d-none");
        $("#loaderbtn").removeClass("d-none");

        $.ajax({
            type: "POST",
            url: urlpath,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {

                if (!$.isEmptyObject(response.errors)) {
                    $.each(response.errors, function (key, value) {
                        $("#" + key + "_error").text(value);
                        $("#" + key).css('border', '1px solid red');
                        $("#" + key).siblings('.select2-container').find('.select2-selection').css('border', '1px solid red');

                    });
                }
                if (response.msg_status == 2) {
                    $("#error_msg").text(response.msg_data);
                }
                if (response.msg_status == 1) {

                    if (mode == "Add") {
                       $('#employeeFrom')[0].reset();
                       $("#gender").val("").change();
                    } else {
                     window.location.href = basepath+'/employee'
                    }
                    $("#success_msg").text(response.msg_data);
                }

                $("#savebtn").removeClass("d-none");
                $("#loaderbtn").addClass("d-none");

            },
            error: function (error) {
                console.error("Error:", error);
            },
        });
    });

    $(document).on('submit', '#importEmployeeForm', function (e) {
        e.preventDefault();

        if (1) {

            var formData = new FormData($(this)[0]);
            $('#employeeModal #bodyContent').html("");
            $("#uploadbtn").css('display', 'none');
            $("#loaderbtn").css('display', 'block');

            var type = "POST"; //for creating new resource
            var urlpath = basepath + '/employee/import';

            $.ajax({
                url: urlpath,
                type: type,
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // alert(response.errors.length);

                    if (!$.isEmptyObject(response.errors)) {
                        $.each(response.errors, function (key, value) {
                            $("#" + key + "_error").text(value);
                            $("#" + key).css('border', '1px solid red');
                            $("#" + key).siblings('.select2-container').find('.select2-selection').css('border', '1px solid red');

                        });
                    }
                    if (response.msg_status == 2) {
                        $("#errormsg").text(response.msg_data);
                    }
                    if (response.msg_status == 0) {
                        refreshData();
                        $('#employeeModal #bodyContent').html(response.html);
                        $('#employeeModal #header_title').text("Not Uploaded Employee Details");

                        if ($.fn.DataTable.isDataTable('.not-upload-datatable')) {
                            $('.not-upload-datatable').DataTable().destroy();
                        }

                        // Initialize DataTable after modal is fully shown
                        $('#employeeModal').on('shown.bs.modal', function () {
                            $('.not-upload-datatable').DataTable({
                                scrollY: '50vh',
                                scrollX: true,
                                autoWidth: false,
                                paging:false,
                            }).columns.adjust().draw(); // Adjust column sizes and redraw
                        });
                        $('#employeeModal').modal('show');

                    }

                    if (response.msg_status == 1) {
                        $("#importEmployeeForm")[0].reset();
                        refreshData();
                        showMsg('Uploaded Successfully', 'success', '');
                    }
                    $("#loaderbtn").css('display', 'none');
                    $("#uploadbtn").css('display', 'block');
                    // console.log(response);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                    var errors = xhr.responseJSON.errors;
                    if (errors) {
                        $.each(errors, function (field, messages) {
                            var errorHtml = '<ul class="list-unstyled">';
                            $.each(messages, function (index, message) {
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


})


