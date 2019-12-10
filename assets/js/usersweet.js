$(function () {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 5000
	});
	const flashData = $('.flash-user').data('user');
	const user = 'User';

	if (flashData) {
		Toast.fire({
			title: 'Data ' + user,
			text: 'Berhasil ' + flashData,
			type: 'success'
		});
	}
	const flashDataWarning = $('.flash-userwarning').data('userwarning');

	if (flashDataWarning) {
		Toast.fire({
			title: flashDataWarning,
			type: 'warning'
		});
	}
	const flashDataPass = $('.flash-userpass').data('userpass');

	if (flashDataPass) {
		Toast.fire({
			type: 'success',
			title: flashDataPass
		});
	}

	const flashDataError = $('.flash-usererror').data('usererror');

	if (flashDataError) {
		Toast.fire({
			type: 'error',
			title: flashDataError
		});
	}
});
