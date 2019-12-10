$(function () {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 5000
	});
	const flashData = $('.flash-role').data('role');
	const role = 'Role';

	if (flashData) {
		Toast.fire({
			title: 'Data ' + role,
			text: 'Berhasil ' + flashData,
			type: 'success'
		});
	}
});
