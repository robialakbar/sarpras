$(document).on("click", ".modal-button", function() {
	let modalID = $(this).data('url');
	let modalSize = $(this).data('mode');
	let modalBG = $(this).data('color');
	let modalTarget = $(this).data('target');
	if( modalBG === undefined ) {
		$('.modal').children().children('#content').removeClass().addClass('modal-content');
	}else{
		$('.modal').children().children('#content').removeClass().addClass('modal-content '+modalBG);
	}
	if( modalSize === undefined || modalSize === false || modalSize === 'md') {
		$('.modal').children().removeClass().addClass('modal-dialog modal-dialog-centered');
	}else {
		$('.modal').children().removeClass().addClass('modal-dialog modal-dialog-centered modal-'+modalSize);
	}
	if( modalTarget === 'alt' ) {
		$('#ModalFormAlt').modal('show').find('.modal-content-form').load(modalID);
	} else {
		$('#ModalForm').modal('show').find('.modal-content-form').load(modalID);
	}
});

function getDataTable(url, target){
	$.ajax({
		url: url,
		type: "get",
		datatype: "html"
	}).done(function(data){
		Swal.fire({title: 'Selesai', icon: 'success', toast: true, position: 'top-end', showConfirmButton: false, timer: 5000, timerProgressBar: true,});
		$(target).empty().html(data);
		$('[data-toggle="tooltip"]').tooltip();
	}).fail(function(jqXHR, ajaxOptions, thrownError){
		Swal.fire({html: 'No response from server', icon: 'error', toast: true, position: 'top-end', showConfirmButton: false, timer: 10000, timerProgressBar: true,});
	});
}

