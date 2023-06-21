function saveTalent() {
	var email = $('#email').val();
	var password = $('#password').val();
	var re_password = $('#re_password').val();
	if(email=='' || password=='' || re_password==''){
		errorAlert('Email or password cannot empty');
        return false;
	}
    if(password!==re_password){
        errorAlert('Password not match');
        return false;
    }
	var avatar_img = $('#avatar_img').val();
	var full_name = $('#full_name').val();
	var phone = $('#phone').val();
	alert(full_name);
	return false;
	var place_birth = $('#place_birth').val();
	var date_birth = $('#date_birth').val();
	var marital = $('#marital option:selected').val();
	var body_height = $('#body_height').val();
	var religion = $('#religion').val();
	var body_weight = $('#body_weight').val();
	var linkedin = $('#linkedin').val();
	var about_me = $('#about_me').val();
	var nationality = $('#nationality option:selected').val();
	var province = $('#province option:selected').val();
	var city_data = $('#city_data option:selected').val();
	var address = $('#address').val();
	var ktp = $('#ktp').val();
	var img_ktp = $('#img_ktp').val();
	var bpjs_no = $('#bpjs_no').val();
	var img_bpjs = $('#img_bpjs').val();
	var bpjs_kes = $('#bpjs_kes').val();
	var img_bpjs_kes = $('#img_bpjs_kes').val();
	var family_card = $('#family_card').val();
	var img_fam = $('#img_fam').val();
	var job_seeker = $('#job_seeker').val();
	var img_job = $('#img_job').val();
	var job_status = $('#job_status option:selected').val();
	var company_name = $('#company_name').val();
	var job_position = $('#job_position').val();
	if(full_name=='' || phone=='' || gender=='' || place_birth=='' || date_birth=='' || marital=='' || nationality=='' || province=='' || city_data=='' || ktp=='' || img_ktp==''){
        errorAlert('Please fill the required form');
        return false;
    }
	$.ajax({
		url: defaultUrl + "talent/saveTalent",
        method: 'post',
        data: {email: email, password: password,avatar_img: avatar_img,full_name: full_name,phone:phone,gender: gender,place_birth: place_birth,date_birth: date_birth,marital: marital,body_height: body_height,
            religion: religion,body_weight: body_weight,linkedin: linkedin,about_me: about_me,nationality: nationality,province: province,city_data: city_data,address: address,ktp: ktp,img_ktp: img_ktp,
            bpjs_no: bpjs_no,img_bpjs: img_bpjs,bpjs_kes: bpjs_kes,img_bpjs_kes: img_bpjs_kes,family_card: family_card,img_fam: img_fam,job_seeker: job_seeker,img_job: img_job,job_status: job_status,company_name: company_name,job_position: job_position},
		dataType: "html",
		success: function (data) {
			successAlert('Success');
		},
		error: function (data) {
			console.log(JSON.stringify(data));
			errorAlert(data.statusText);
		},
	});
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
