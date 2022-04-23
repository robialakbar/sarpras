function getData(url, elementId){
    Swal.fire({title: 'Memuat data..', icon: 'info', toast: true, position: 'top-end', showConfirmButton: false, timer: 0});
    $.ajax({
        url: url,
        type: "get",
        datatype: "html",
        beforeSend: function() {
            Swal.fire({title: 'Memuat data..', icon: 'info', toast: true, position: 'top-end', showConfirmButton: false, timer: 0});
        },
        complete: function(data){
            Swal.fire({title: 'Selesai', icon: 'success', toast: true, position: 'top-end', showConfirmButton: false, timer: 2500, timerProgressBar: false,});
        },
        success: function(data){
            $(elementId).empty().html(data);
            $('[data-toggle="tooltip"]').tooltip();
        },
        error: function(jqXHR, ajaxOptions, thrownError){
            Swal.fire({html: 'No response from server', icon: 'error', toast: true, position: 'top', showConfirmButton: true, timer: 0});
        }
    })
}
