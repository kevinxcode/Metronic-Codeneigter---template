function errorAlert(msg) {
	Swal.fire({
		text: msg + " !",
		icon: "error",
		confirmButtonText: "Ok, got it!",
		customClass: {
			confirmButton: "btn btn-danger",
		},
		timer: 4500,
	});
}

function successAlert(msg) {
	Swal.fire({
		text: msg + ".",
		icon: "success",
		showConfirmButton: false,
		timer: 1800,
	});
}