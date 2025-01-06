$(function () {
    
    var base_url = $("#base_url").val();
    loadData(base_url); 
        $(document).on("click", ".status", function (e) {    
        e.preventDefault();
        var id = $(this).data("id");
        var icon = $(this).find("i");
        var urlpath = base_url + "/admin/assettype/status";
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
                    icon.removeClass("fa-times-circle")
                        .addClass("fa-check-circle")
                        .css("color", "green");
                } else {
                    icon.removeClass("fa-check-circle")
                        .addClass("fa-times-circle")
                        .css("color", "red");
                }
                showToast(response.message);
            },
            error: function (xhr, status, error) {
                console.error("Error updating question status:", error);
            },
        });
    });

    $(document).on("click", ".leftSideModel", function (e) {    
        e.preventDefault();
        var mode = $(this).data("mode");
        var title = mode+" Asset Type";
        var tableid = $(this).data("tableid");;
        var icon = $(this).find("i");
        var urlpath = base_url + "/admin/assettype/addedit";
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            type: "get",
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
               
               
            },
        });


      
    });

});


function loadData(base_url) {
    var urlpath = base_url + "/admin/assettype/getdata";
    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
        type: "POST",
        url: urlpath,
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        success: function (response) {
            $("#assettype_data").html(response);
            $("#example").DataTable({"lengthChange": false });
           
        },
    });
    
}