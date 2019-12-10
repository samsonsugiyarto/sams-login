$(function () {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 5000
	});

	$('.toastrDefaultSuccess').click(function () {

	});

	const flashData = $('.flash-menu').data('menu');

	if (flashData) {
		toastr.success(flashData)
	}



});
