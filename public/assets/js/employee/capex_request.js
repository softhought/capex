$(function () {
    var base_url = $("#base_url").val();
    initializeTomSelect();
  
    initializeDatepicker("#request_date", true);
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

    $(document).on("submit", "#capexRequestForm", function (e) {
        e.preventDefault();
        var urlpath = base_url + "/capexrequestaddeditajax";
        var mode = $("#mode").val();
        var formData = new FormData($(this)[0]);
       
        $("#savebtn").attr("disabled", true);
        $("#savebtn").text('Processing...');
      
        

        $.ajax({
            type: "POST",
            url: urlpath,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                $("#savebtn").attr("disabled", false);
                $("#savebtn").text('Save');

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
                  
                    if(mode == "Add") {
                       $('#capexRequestForm')[0].reset();
                       $(".error-text").text('');                                        
                    } else {
                     //  window.location.href = basepath+'/employee'
                    }
                 //   loadData(base_url); 
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

    $("#AddVendorRow").click(function () {
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
  //  var urlpath = base_url + "/searchvendorbyname";
  $(document).on("keyup", ".vendor_name", function () {
    let query = $(this).val();
    let inputField = $(this);
    let suggestionsBox = inputField.next(".vendor_suggestions"); // Target only the suggestions box of this input

    if (query.length > 1) {
        var urlpath = base_url + "/searchvendorbyname";
        $.ajax({
            url: urlpath,
            type: "POST",
            data: { query: query },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    let suggestions = "";
                    data.forEach(function (vendor) {
                        suggestions += `<div class="px-3 py-2 cursor-pointer hover:bg-gray-200 suggestion-item">${vendor}</div>`;
                    });

                    suggestionsBox.html(suggestions).removeClass("hidden");

                    // Position dropdown below input
                    suggestionsBox.css({
                        position: "absolute",
                        width: inputField.outerWidth(),
                        "z-index": 1000,
                    });
                } else {
                    suggestionsBox.addClass("hidden");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error fetching vendors:", error);
            }
        });
    } else {
        suggestionsBox.addClass("hidden");
    }
});

// Select suggestion for the correct row
// $(document).on("click", ".suggestion-item", function () {
//     let selectedText = $(this).text();
//     let inputField = $(this).closest(".vendor_suggestions").prev(".vendor_name");
//     inputField.val(selectedText);
//     $(this).closest(".vendor_suggestions").addClass("hidden");
    
// });
$(document).on("click", ".suggestion-item", function () {
    let selectedText = $(this).text();
    let parts = selectedText.split("-");
    console.log("parts"+parts);
    let vendorName= parts[0];
    let vendorCode = parts[1] ? parts[1] : "";
   

    let inputField = $(this).closest(".vendor_suggestions").prev(".vendor_name");
    let vendorCodeInput = inputField.closest(".grid").find(".vendor_code");

    inputField.val(vendorName); // Set vendor name
    vendorCodeInput.val(vendorCode); // Set vendor code

    $(this).closest(".vendor_suggestions").addClass("hidden");
});

// Hide suggestions when clicking outside
$(document).click(function (e) {
    if (!$(e.target).closest(".vendor_name, .vendor_suggestions").length) {
        $(".vendor_suggestions").addClass("hidden");
    }
});


$(document).on("click", ".requestDetails", function (e) {    
    e.preventDefault();

    var tableid = $(this).data("tableid");
    var urlpath = base_url + "/requestdetailsmodel";
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
            $("#model_request_data_details").html(response);          
        },
    });


  
});


});

function displayFileName() {
    var fileInput = document.getElementById('file_input');
    var fileName = fileInput.files.length > 0 ? fileInput.files[0].name : "No file selected";
    document.getElementById('file_name').textContent = fileName;
}



