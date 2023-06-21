var button = document.querySelector("#kt_button_1");
button.addEventListener("click", function() {
    button.setAttribute("data-kt-indicator", "on");
      setTimeout(function() {
        var username = $('#txt_username').val();
        var password = $('#txt_password').val();
        $.ajax({
      		url: host_url+'auth/zimbra',
            method: 'post',
            header: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            data: JSON.stringify({ username: username, password: password }),
      		dataType: "html",
      		success: function (data) {
                // console.log(data);
                const obj = JSON.parse(data);
                if(obj.loginCodes=='error'){
                    errorAlert(obj.details);
                    return false;
                }
                successAlert('Login Success');
                setTimeout(function() {
                    set_session(obj.details);
                }, 1500);
      		},
      		error: function (data) {
      			console.log(JSON.stringify(data));
      			errorAlert(data.statusText);
      		},
      	});
      }, 1000);
    setTimeout(function() {
        button.removeAttribute("data-kt-indicator");
    }, 3000);
});

function set_session(response){
    $.ajax({
        url: host_url+'login/session',
        method: 'post',
        header: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
        data: JSON.stringify(response),
        dataType: "html",
        success: function (data) {
         if(data=='error'){
            errorAlert('invalid request');
            return falsel;
         }
          window.location.href = host_url+"home";
        },
        error: function (data) {
            console.log(JSON.stringify(data));
            errorAlert(data.statusText);
        },
    });
}