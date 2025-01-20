$(function () {

    var base_url = $("#base_url").val();
    loadData(base_url);
    $(document).on("click", ".status", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        var icon = $(this).find("i");
        var $statusElement = $(this);
        var urlpath = base_url + "/admin/businessdivision/status";
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            type: "POST",
            url: urlpath,
            data: { id: id },
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {

                if (response.status === "Y") {
                    $statusElement.removeClass("text-danger")
                        .addClass("text-success");
                    $statusElement.html(`
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square stroke-1.5 mr-1 h-4 w-4"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        Active
                    `);
                } else {
                    $statusElement.removeClass("text-success")
                        .addClass("text-danger")
                        .text("Inactive");
                    $statusElement.html(`
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square stroke-1.5 mr-1 h-4 w-4"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                        Inactive
                    `);
                }
                // loadData(base_url); 

            },
            error: function (xhr, status, error) {
                console.error("Error updating question status:", error);
            },
        });
    });

    $(document).on("click", ".leftSideModel", function (e) {
        e.preventDefault();
        var mode = $(this).data("mode");
        var title = mode + " Business Division";
        var tableid = $(this).data("tableid");;
        var icon = $(this).find("i");
        var urlpath = base_url + "/admin/businessdivision/addedit";
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
        var urlpath = base_url + "/admin/businessdivisionajax";
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
    var urlpath = base_url + "/admin/businessdivision/getdata";
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