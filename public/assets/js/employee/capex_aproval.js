$(function () {
    var base_url = $("#base_url").val();

    // $(document).on("click", "#toggleButton", function (e) {    
    //     $("#approval_details").toggle();
    //     $(this).text(function(i, text){
    //         return text === "Show Details" ? "Hide Details" : "Show Details";
    //     });
    // });
    $(document).on("click", "#toggleButton", function (e) {    
        e.preventDefault();
        $("#approval_details").toggle(function() {
            if ($("#approval_details").is(":visible")) {
                $("html, body").animate({
                    scrollTop: $("#approval_details").offset().top
                }, 500);
            }
        });
   
        $(this).text(function(i, text){
            return text === "Show Details" ? "Hide Details" : "Show Details";
        });
    });

    $(document).on("click", "#toggleButtonBudget", function (e) {  
        e.preventDefault();  
        $("#budget_details").toggle(function() {
            if ($("#budget_details").is(":visible")) {
                $("html, body").animate({
                    scrollTop: $("#budget_details").offset().top
                }, 500);
            }
        });
   
        $(this).text(function(i, text){
            return text === "Show Details" ? "Hide Details" : "Show Details";
        });
    });

    $(document).on("click", ".approvalDetails", function (e) {    
        e.preventDefault();
        var tableid = $(this).data("tableid");
        var approval_path_dtl_id = $(this).data("approvalpathdtlid");
        var urlpath = base_url + "/approvaldetailsmodel";
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            type: "post",
            url: urlpath,
            data: {id: tableid,approval_path_dtl_id:approval_path_dtl_id},
            headers: { "X-CSRF-TOKEN": csrfToken},
            success: function (response) {
                $("#model_request_data_details").html(response);          
            },
        }); 
    });
    $(document).on("click", "#AddVendorRow", function () {
        let lastIndex = $(".vendor_details:last").data("index"); // Get last index
        let newIndex = lastIndex + 1; // Increment index
        
        let newRow = $(".vendor_details:first").clone(); // Clone first row
        newRow.attr("data-index", newIndex); // Update index
        
        // Update label and input IDs
        newRow.find(".vendor-label").text("Proposed Vendor Name " + newIndex);
        newRow.find(".vendor-code-label").text("SAP Vendor Code " + newIndex);
        
        newRow.find("input").each(function () {
            let inputType = $(this).attr("name").includes("vendor_name") ? "vendor_name" : "vendor_code";
            $(this).attr("id", inputType + "_" + newIndex).val(""); // Update ID and clear value
        });

        // Add Remove Button (only for new rows)
        newRow.append('<div class="col-span-12 sm:col-span-4 flex items-end"><button type="button" class="remove-vendor bg-red-500 text-danger px-3 py-2 rounded-md">Remove</button></div>');

        $("#vendor_container").append(newRow); // Append to container
    });

    // Remove row on clicking "Remove"
    $(document).on("click", ".remove-vendor", function () {
        $(this).closest(".vendor_details").remove(); // Remove row
    });


    $(document).on("click", ".actBtn", function (e) {
        e.preventDefault();
    
        let action = $(this).hasClass("bg-danger") ? "R" : "A"; // Detect if Reject or Approve
        $("#approval_action").val(action);
    
        var form = $("#capexApprovalForm"); 
        var formData = new FormData(form[0]);
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var urlpath = base_url + "/capexapprovalactionajax";

        let comment = $("#comment").val();
      // Check if comment is empty
        if (comment == "") {
            $("#comment").css("border", "2px solid red").focus();
            return false;
        } else {
            $("#comment").css("border", "1px solid #ced4da"); // Reset border if filled
        }

        var titleText = action === "R" ? "Are you sure you want to reject?" : "Are you sure you want to approve?";
        
        // Show the confirmation modal and update text
        $("#modalMessage").text(titleText);
        $("#confirmationModal").removeClass("hidden").addClass("flex");
    
        // Handle confirm button click
        $("#confirmBtn").off("click").on("click", function () {
            $("#confirmationModal").addClass("hidden"); // Hide modal
            $.ajax({
                url: urlpath,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                success: function (response) {
                    if (!$.isEmptyObject(response.errors)) {
                        $.each(response.errors, function (key, value) {
                            $("#" + key + "_error").text(value);
                            $("#" + key).css('border', '1px solid red');
                            $("#" + key).siblings('.ts-wrapper').find('.ts-control').css('border', '1px solid red');
                        });
                    
                    }

                    if (response.msg_status == 1) {
                        showToast("Data successfully saved.");
                        setTimeout(function () {
                            window.location.href = `${base_url}/request-approval`;
                        }, 500);
                    }
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                },
            });
        });
    
        // Handle cancel button click
        $("#cancelBtn").off("click").on("click", function () {
            $("#confirmationModal").addClass("hidden");
        });
    });
    



});/** end of document ready */