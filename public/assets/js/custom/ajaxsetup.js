$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(function() {

// showToast('test message');


});

function showToast(msg,error=0) {
    const e = document.querySelector(".toast-ex")
    let a, n, i, l, r;
    if(error){
        $(function() { l && c(l), a = 'bg-danger', n = 'animate__bounceIn', e.classList.add(a, n), (l = new bootstrap.Toast(e)).show() });
        $("#toast_body_content").html('<i class="fa-solid fa-close fs-4"></i>&emsp;<span>' + msg + '</span>');
    }else{
        $(function() { l && c(l), a = 'bg-green', n = 'animate__bounceIn', e.classList.add(a, n), (l = new bootstrap.Toast(e)).show() });
        $("#toast_body_content").html('<i class="fa-solid fa-check fs-4"></i>&emsp;<span>' + msg + '</span>');
    }

}


function refreshData(groupColumn=0,colspan=0,group=0) {
    // $('#dataContainer').html('');
    $.ajax({
        url: window.location.href,
        method: 'GET',
        success: function(response) {
            var specificDivData = $(response).find('#dataContainer').html();
           // console.log(specificDivData);
            $('#dataContainer').html(specificDivData);
            if(group){
                dataTableGroup(groupColumn,colspan);
            }else{

                $(".datatables-basic").DataTable({scrollX: true});
                $(".datatables-basic2").DataTable({scrollX: true});
                $(".datatables-basic3").DataTable({scrollX: true});
            }

            // initializeModal();
        },
        error: function(xhr) {
            // Handle error case
        }
    });

}


function enableButton(status, mode = 'Save') {
    if (status) {
        $("#savebtn").html("Processing...");
        $("#savebtn").prop("disabled", true);
    } else {
        if(mode == "Add") {
            var text = "Save";
        } else {
            var text = "Update";
        }
        $("#savebtn").html(text);
        $("#savebtn").prop("disabled", false);
    }
}


function initializeTomSelect() {
    $(".tom-select").each(function () {
      // Skip if already initialized
      if ($(this).data("tomselect")) return;

      let e = { plugins: { dropdown_input: {} } };
      if ($(this).data("placeholder")) {
        e.placeholder = $(this).data("placeholder");
      }
      if ($(this).attr("multiple") !== undefined) {
        e = {
          ...e,
          plugins: {
            ...e.plugins,
            remove_button: { title: "Remove this item" },
          },
          persist: false,
          create: true,
          onDelete: function (t) {
            return confirm(
              t.length > 1
                ? "Are you sure you want to remove these " + t.length + " items?"
                : 'Are you sure you want to remove "' + t[0] + '"?'
            );
          },
        };
      }
      if ($(this).data("header")) {
        e = {
          ...e,
          plugins: {
            ...e.plugins,
            dropdown_header: { title: $(this).data("header") },
          },
        };
      }

      // Initialize TomSelect
      new TomSelect(this, e);
    });
}

function TomSelectBYID(id) {
  // Select the specific element by ID
  $("#"+id).each(function () {
    // Skip if already initialized
    if ($(this).data("tomselect")) return;

    // Define the options object
    let e = { plugins: { dropdown_input: {} } };
    if ($(this).data("placeholder")) {
      e.placeholder = $(this).data("placeholder");
    }
    if ($(this).attr("multiple") !== undefined) {
      e = {
        ...e,
        plugins: {
          ...e.plugins,
          remove_button: { title: "Remove this item" },
        },
        persist: false,
        create: true,
        onDelete: function (t) {
          return confirm(
            t.length > 1
              ? "Are you sure you want to remove these " + t.length + " items?"
              : 'Are you sure you want to remove "' + t[0] + '"?'
          );
        },
      };
    }
    if ($(this).data("header")) {
      e = {
        ...e,
        plugins: {
          ...e.plugins,
          dropdown_header: { title: $(this).data("header") },
        },
      };
    }

    // Initialize TomSelect
    new TomSelect(this, e);
  });
}


function tomReset() {
    $(".tom-select").each(function () {
      $(this).data("tomselect").setValue("1");
    });
}

function initializeDatepicker(selector, singleMode = false) {
  $(selector).each(function () {
      let options = {
          autoApply: false,
          singleMode: singleMode,
          numberOfColumns: singleMode ? 1 : 2,
          numberOfMonths: singleMode ? 1 : 2,
          showWeekNumbers: true,
          format: "DD-MM-YYYY", // Updated format
          dropdowns: {
              minYear: 1990,
              maxYear: null,
              months: true,
              years: true
          }
      };

      if ($(this).data("single-mode")) {
          options.singleMode = true;
          options.numberOfColumns = 1;
          options.numberOfMonths = 1;
      }

      if ($(this).data("format")) {
          options.format = $(this).data("format");
      }

      if (!$(this).val()) {
          let defaultDate = dayjs().format(options.format);
          defaultDate += options.singleMode ? "" : " - " + dayjs().add(1, "month").format(options.format);
          $(this).val(defaultDate);
      }

      new Litepicker({
          element: this,
          ...options
      });
  });
}