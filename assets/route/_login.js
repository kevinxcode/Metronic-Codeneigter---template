
document.addEventListener("DOMContentLoaded", () => {
	$.ajax({
		url: defaultUrl + "_route/login",
		dataType: "html",
		success: function (data) {
			$("#body_login").html(data);
		},
		error: function (data) {
			console.log(JSON.stringify(data));
		},
	});
});
