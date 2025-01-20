$(function () {

    var base_url = $("#base_url").val();
    loadData(base_url);
 

    $(document).on("click", ".leftSideModel", function (e) {
        e.preventDefault();
        var mode = $(this).data("mode");
        var title = mode + " Approver";
        var tableid = $(this).data("tableid");;
        var icon = $(this).find("i");
        var urlpath = base_url + "/admin/approver/addedit";
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            type: "post",
            url: urlpath,
            data: {
                id: tableid
            },
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#model_data_details").html(response);
                $("#slide-over-title").html(title);
                initializeTomSelect();


            },
        });



    });



    $(document).on("submit", "#dataForm", function (e) {
        e.preventDefault();
        var urlpath = base_url + "/admin/approverajax";
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
                        $('#dataForm')[0].reset();
                        $(".error-text").text('');


                    } else {
                        //  window.location.href = basepath+'/employee'
                    }
                    loadData(base_url);
                    $("#success_msg").text(response.msg_data);
                    setTimeout(() => {
                        document.querySelector('[data-tw-dismiss="modal"]').click();
                    }, 500); // 2000 milliseconds = 2 seconds
                }

                $("#savebtn").removeClass("d-none");
                $("#loaderbtn").addClass("d-none");

            },
            error: function (error) {
                console.error("Error:", error);
            },
        });
    });


});


function loadData(base_url) {
    var urlpath = base_url + "/admin/approver/getdata";
    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
        type: "POST",
        url: urlpath,
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        success: function (response) {
            $("#table_data").html(response);
            $("#example").DataTable({ "lengthChange": false });

        },
    });

}