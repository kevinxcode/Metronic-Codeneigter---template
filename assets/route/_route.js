function loader() {
	const loadingEl2 = document.createElement("span");
	document.body.prepend(loadingEl2);
	loadingEl2.classList.add("page-loader");
	loadingEl2.classList.add("flex-column");
	loadingEl2.classList.add("bg-dark");
	loadingEl2.classList.add("bg-opacity-15");
	loadingEl2.innerHTML = `
        <span class="spinner-border text-primary" role="status"></span>
        <span class="text-gray-900 fs-6 fw-semibold mt-5">Loading...</span>
    `;
	// Show page loading
	KTApp.showPageLoading();
	// Hide after 3 seconds
	// setTimeout(function() {
	//     KTApp.hidePageLoading();
	//     loadingEl.remove();
	// }, 3000);
}
function removeLoad() {
	setTimeout(function () {
		KTApp.hidePageLoading();
		loadingEl.remove();
	}, 100);
}

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

// var route_url = window.location.origin + "/onedrive/1.elite/1.elite_new/";

function profile() {
	// loader();
	$.ajax({
		url: defaultUrl + "_route/profile",
		dataType: "html",
		success: function (data) {
			// removeLoad();
			$("#body-profile").html(data);
		},
		error: function (data) {
			console.log(JSON.stringify(data));
			errorAlert(data.statusText);
			// removeLoad();
		},
	});
}

function notif() {
	// loader();
	$.ajax({
		url: defaultUrl + "_route/notif",
		dataType: "html",
		success: function (data) {
			// removeLoad();
			$("#body-notif").html(data);
		},
		error: function (data) {
			console.log(JSON.stringify(data));
			errorAlert(data.statusText);
			// removeLoad();
		},
	});
}


