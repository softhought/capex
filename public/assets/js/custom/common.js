$(function () {
    var base_url = $("#base_url").val();
    $(".datatables-basic").DataTable({ scrollX: true });
    $(".datatables-basic2").DataTable();
    $(".datatables-basic3").DataTable({ scrollX: true });
    $("#example").DataTable({"lengthChange": false });
    
    getCommon();
    $(document).on('click', '.openModal', function (e) {
        e.preventDefault();

        var urlpath = $(this).attr('data-href');
        var id = $(this).attr('data-id');
        var title = $(this).attr('data-title');

        var type = "POST"; //for creating new resource

        $.ajax({
            url: urlpath,
            type: type,
            data: { id: id, title: title },
            async: false,
            success: function (response) {
                $('#commonModal').modal('show');
                $('#commonModal #bodyContent').html(response);
                $('#commonModal #header_title').text(title);
                getCommon();

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

    });

    $(document).on('click', '.openLeftModal', function (e) {
        e.preventDefault();


        var title = $(this).attr('data-title');

        $('#commonLeftModal').modal('show');
        $('#commonModal #header_title').text(title);
        getCommon();


   

});

$(document).on('keyup change', 'input, select', function () {
    var inputValue = $(this).val();
    $("#error_msg").text('');
    $("#success_msg").text('');
    var id = $(this).attr('id');
    if (inputValue !== "") {
        $("#" + id + "_error").text("");
        $("#" + id).css('border', '1px solid #c7ccd0');
        $("#" + id).siblings('.select2-container').find('.select2-selection').css('border', '1px solid #c7ccd0');
        $("#" + id).siblings('.ts-wrapper').find('.ts-control').css('border', '1px solid #c7ccd0');
    }
});


$(document).on('change', '.readUrl', function () {
    var imagePreview = $(this).attr('data-showImage');
    $(".upload-text").hide();
    readURL(this, imagePreview);
});



// $(".datepicker").flatpickr({ dateFormat: "d/m/Y" });
// $(".datepicker2").datepicker({ format: "dd/mm/yyyy",autoclose:true });
// $(".flatpickr-range").flatpickr({
//     dateFormat: "d-m-Y",
//     mode: "range",
//     minDate: "20.09.2023",
//     maxDate: "20.10.2023",
// });

// $(document).on('change', '.check-in-date', function() {
//     $("#check_out_date").val("");
//     var dateString = $(this).val();
//     var dateParts = dateString.split('-');
//     var year = parseInt(dateParts[2]);
//     var month = parseInt(dateParts[1]) - 1;
//     var day = parseInt(dateParts[0]) + 1;
//     var check_in_date = new Date(year, month, day);

//     var base_url = $("#base_url").val();
//     var fromDate = formatDateToDDMMYYYY(check_in_date);
//     var toDate = formatDateToDDMMYYYY(new Date(check_in_date.getTime() + 4 * 24 * 60 * 60 * 1000));
//     var urlpath = base_url + '/booking/getDisabledDates';

//     $.ajax({
//         url: urlpath, // Replace with the actual URL of your endpoint
//         method: 'POST',
//         dataType: 'json',
//         data: { fromDate: fromDate, toDate: toDate },
//         success: function(response) {
//             var disabledDates = response.disabledDates;

//             $(".check-out-date").flatpickr({
//                 dateFormat: "d-m-Y",
//                 mode: "range",
//                 minDate: fromDate,
//                 maxDate: toDate,
//                 disable: disabledDates
//                     // Add onClose callback to update minDate and maxDate when check-in date changes
//                     // onClose: function(selectedDates, dateStr, instance) {
//                     //     var newMinDate = formatDateToDDMMYYYY(new Date(selectedDates[0].getTime() + 1 * 24 * 60 * 60 * 1000));
//                     //     var newMaxDate = formatDateToDDMMYYYY(new Date(selectedDates[0].getTime() + 5 * 24 * 60 * 60 * 1000));
//                     //     instance.set('minDate', newMinDate);
//                     //     instance.set('maxDate', newMaxDate);
//                     // }
//             });
//         },
//         error: function(xhr, status, error) {
//             console.error(error);
//         }
//     });


// });


$(document).on('change', '#event_id', function () {

    var event_id = $("#event_id").val();
    var urlpath = base_url + '/event/categories';

    $.ajax({
        url: urlpath, // Replace with the actual URL of your endpoint
        method: 'POST',
        dataType: 'json',
        data: { event_id: event_id },
        success: function (response) {
            $("#event_category_id").html(response.data);
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });


});
numberwithdecimal();
onlynumber();

})

function numberwithdecimal() {
    $(".numberwithdecimal").bind("keyup paste", function () {
        this.value = this.value.replace(/[^0-9\.]/g, "");
    });
}
function onlynumber() {
    $(".onlynumber").bind("keyup paste", function () {
        this.value = this.value.replace(/[^0-9]/g, "");
    });
}

function calculateAge(birthdate) {
    var ageInYears = '';
    // Check if the birthdate is in valid format (dd-mm-yyyy)
    if (birthdate.match(/^\d{2}-\d{2}-\d{4}$/)) {
        // Split the birthdate string by "-" and rearrange it to "mm-dd-yyyy" format
        var parts = birthdate.split("-");
        var birthYear = parseInt(parts[2], 10); // Extract birth year
        var currentYear = (new Date()).getFullYear(); // Get current year
        // Calculate the age in years
        var ageInYears = currentYear - birthYear;

    }
    return ageInYears;
}



function showMsg(msg, icon, url, text = "") {
    var base_url = $("#base_url").val();
    Swal.fire({
        title: msg,
        text: text,
        icon: icon,
        width: 350,
        padding: '1em',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ok',
        customClass: {
            title: 'fs-5 text-center m-auto',
            content: 'alerttext',
            confirmButton: 'btn btn-primary btn-sm',
            icon: 'fs-8'
        },
        allowOutsideClick: false

    }).then((result) => {
        if (result.value) {
            if (url != "") {
                window.location.href = base_url + url;
            }

        }
    });
}

function getCommon() {

    $(function () {
        var t = $(".select2");
        // t.length && t.each(function () {
        //     var e = $(this);
        //     e.wrap('<div class="position-relative"></div>').select2({ placeholder: "Select value", dropdownParent: e.parent() })
        // })
        t.length && t.each(function () {
            var e = $(this);
            e.wrap('<div class=""></div>').select2({ placeholder: "Select value", dropdownParent: $('body') })

                e.wrap('<div class=""></div>').select2({
                    placeholder: "Select value",
                    dropdownParent: $('body'), // Use the body to avoid table-related issues
                    
                });
        })
    });

    $(".numberwithdecimal").bind("keyup paste", function () {
        this.value = this.value.replace(/[^0-9\.]/g, "");
    });

    $(".onlynumber").bind("keyup paste", function () {
        this.value = this.value.replace(/[^0-9]/g, "");
    });

    $('.numberlength').on('keyup paste', function () {
        var maxLength = parseInt($(this).attr('maxlength'));
        var currentLength = $(this).val().length;

        if (currentLength > maxLength) {
            $(this).val($(this).val().substr(0, maxLength)); // Truncate the input
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        var noAutocompleteFields = document.querySelectorAll('.no-autocomplete');
        noAutocompleteFields.forEach(function (field) {
            field.setAttribute('autocomplete', 'new-password');
        });
    });

}



function readURL(input, imagePreview) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#' + imagePreview).attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function changeStatusIcon(status,$statusElement) {
    if (status === "Y") {
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

}
