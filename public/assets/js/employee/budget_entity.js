$(function () {
    
    var base_url = $("#base_url").val();
    loadData(base_url); 
        $(document).on("click", ".status", function (e) {    
        e.preventDefault();
        var id = $(this).data("id");
        var icon = $(this).find("i");
        var urlpath = base_url + "/budgetentity/status";
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var $statusElement = $(this);

        $.ajax({
            type: "POST",
            url: urlpath,
            data: { id: id },
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                changeStatusIcon(response.status,$statusElement);
                // if (response.status === "Y") {
                //     $statusElement.removeClass("text-danger")
                //         .addClass("text-success");
                //     $statusElement.html(`
                //         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square stroke-1.5 mr-1 h-4 w-4"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                //         Active
                //     `);
                // } else {
                //     $statusElement.removeClass("text-success")
                //         .addClass("text-danger")
                //         .text("Inactive");
                //     $statusElement.html(`
                //         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square stroke-1.5 mr-1 h-4 w-4"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                //         Inactive
                //     `);
                // }
              
            },
            error: function (xhr, status, error) {
                console.error("Error updating question status:", error);
            },
        });
    });

    $(document).on("click", ".leftSideModel", function (e) {    
        e.preventDefault();
        var mode = $(this).data("mode");
        var title = mode+" Budget Entity";
        var tableid = $(this).data("tableid");;
        var icon = $(this).find("i");
        var urlpath = base_url + "/budgetentity/addedit";
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

    $(document).on("click", ".leftSideModelAllocation", function (e) {    
        e.preventDefault();
        var mode = $(this).data("mode");
        var title = mode+" Budget Allocation";
        var tableid = $(this).data("tableid");
        var tabledtlid = $(this).data("tabledtlid");
      //  var urlpath = base_url + "/budgetallocation/addedit";
       // var csrfToken = $('meta[name="csrf-token"]').attr("content");

        loadAllocationData(base_url,tableid,tabledtlid,mode);

      
    });


    
    $(document).on("submit", "#businessEntityForm", function (e) {
        e.preventDefault();
        var urlpath = base_url + "/budgetentityaddeditajax";
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
                        $("#" + key).siblings('.ts-wrapper').find('.ts-control').css('border', '1px solid red');

                    });
                }
                if (response.msg_status == 2) {
                    $("#error_msg").text(response.msg_data);
                }
                if (response.msg_status == 1) {

                    if (mode == "Add") {
                       $('#businessEntityForm')[0].reset();
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


    $(document).on("change", "#asset_group_id", function (e) {
        e.preventDefault();
        var asset_group_id = $("#asset_group_id").val();      
        var urlpath = base_url + "/assettypedrp";
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            type: "POST",
            url: urlpath,
            data: { asset_group_id: asset_group_id },
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#asset_type_drp").html(response);
                 TomSelectBYID('asset_type_id');                         
            },
        });
    });


    $(document).on("change", "#location_id", function (e) {
        e.preventDefault();
        var location_id = $("#location_id").val();      
        var urlpath = base_url + "/businessdivdrp";
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            type: "POST",
            url: urlpath,
            data: { location_id: location_id },
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (response) {
                $("#business_division_drp").html(response);
                 TomSelectBYID('business_division_id');                         
            },
        });
    });

    $(document).on("submit", "#AllocationForm", function (e) {
        e.preventDefault();
        var urlpath = base_url + "/budgetallocationaddeditajax";
        var mode = $("#mode").val();
        var id = $("#id").val();
        var budget_master_id = $("#budget_master_id").val();
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
                        $("#" + key).siblings('.ts-wrapper').find('.ts-control').css('border', '1px solid red');

                    });
                }
                if (response.msg_status == 2) {
                    $("#error_msg").text(response.msg_data);
                }
                if (response.msg_status == 1) {

                    if (mode == "Add") {
                       $('#AllocationForm')[0].reset();
                       $(".error-text").text('');
                    
                       
                    } else {
                   //  window.location.href = basepath+'/employee'
                    }
                   // loadData(base_url); 
                    $("#success_msg").text(response.msg_data);
                    setTimeout(() => {
                        loadAllocationData(base_url,budget_master_id,0,'Add');
                    }, 500); 
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
    var urlpath = base_url + "/getdatabudgetentity";
    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
        type: "POST",
        url: urlpath,
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        success: function (response) {
            $("#table_data").html(response);
            $("#example").DataTable({"lengthChange": false });
           
        },
    });
    
}




  function loadAllocationData(base_url,tableid,tabledtlid,mode){

    var urlpath = base_url + "/budgetallocation/addedit";
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var title = mode+" Budget Allocation";

    $.ajax({
        type: "post",
        url: urlpath,
        data: {
            id: tableid,table_dtl_id:tabledtlid  
        },
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        success: function (response) {
            $("#model_data_details").html(response);
            $("#slide-over-title").html(title);
          //  initializeTomSelect();
          TomSelectBYID('year');  
          onlynumber();
           
           
        },
    });


  }
  
 
  

