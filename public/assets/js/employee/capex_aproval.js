$(function () {
    var base_url = $("#base_url").val();

    // $(document).on("click", "#toggleButton", function (e) {    
    //     $("#approval_details").toggle();
    //     $(this).text(function(i, text){
    //         return text === "Show Details" ? "Hide Details" : "Show Details";
    //     });
    // });
    $(document).on("click", "#toggleButton", function (e) {    
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
    $(document).on("click", ".approvalDetails", function (e) {    
        e.preventDefault();
        var tableid = $(this).data("tableid");
        var urlpath = base_url + "/approvaldetailsmodel";
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            type: "post",
            url: urlpath,
            data: {id: tableid},
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



});/** end of document ready */