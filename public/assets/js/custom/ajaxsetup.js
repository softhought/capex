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
