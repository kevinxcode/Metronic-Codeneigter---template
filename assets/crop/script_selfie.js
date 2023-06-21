// vars
let result_2 = document.querySelector('.result_2'),
img_result_2 = document.querySelector('.img-result_2'),
img_w_2 = document.querySelector('.img-w_2'),
img_h_2 = document.querySelector('.img-h_2'),
options_2 = document.querySelector('.options_2'),
save_2 = document.querySelector('.save_2'),
cropped_2 = document.querySelector('.cropped_2'),
dwn_2 = document.querySelector('.download_2'),
rotate_btn_2 = document.querySelector('.rotate_btn_2'),
upload_2 = document.querySelector('#file-input_2'),
cropper_2 = '';

// on change show image with crop options
upload_2.addEventListener('change', e => {
  var file_data_2  = $(upload_2).val();
  var ext_2 = file_data_2.split(".");
  ext_2 = ext_2[ext_2.length-1].toLowerCase();
  var arrayExtensions_2 = ["jpg", "JPG", "JPEG", "PNG", "png", "bitmap"];
  console.log('aaa');
  if (arrayExtensions_2.lastIndexOf(ext_2) == -1) {
      errorAlert('Wrong extension type Allowed jpg, png');
      $("#file-input_2").val('');
      return false;
  }
  var fileSize = (upload_2.files[0].size);
  if(fileSize > 4500000) {
      errorAlert('Image file Max 4 MB');
      $("#file-input_2").val('');
      return false;
  };
  if (e.target.files.length) {
    $('#box_upload_2').hide();
    $('#btn_crop_2').show();
    $('#rotate_btn_2').show();
    $('#ganti_selfie').show();
    $('#img_result_2').show();
    // start file reader
    const reader_2 = new FileReader();
    reader_2.onload = e => {
      if (e.target.result) {
        // create new image
        let img = document.createElement('img');
        img.id = 'image';
        img.src = e.target.result;
        // clean result before
        result_2.innerHTML = '';
        // append new image
        result_2.appendChild(img);
        // show save btn and options
        save_2.classList.remove('hide_2');
        options_2.classList.remove('hide_2');
        // init cropper
        cropper_2 = new Cropper(img, {
            dragMode: 'none',
            aspectRatio: 6 / 8,
            autoCropArea: 1,
            restore: false,
            guides: false,
            center: false,
            highlight: false,
            cropBoxMovable: true,
            cropBoxResizable: true,
            toggleDragModeOnDblclick: false,
            zoomable: false,
            zoomOnWheel: false,
        });
      }
    };
    reader_2.readAsDataURL(e.target.files[0]);
  }
});
// rotate
rotate_btn_2.addEventListener('click', e => {
  cropper_2.rotate(90);
});
// end rotate
// save on click
save_2.addEventListener('click', e => {
  e.preventDefault();
  $('#box_upload_2').hide();
  $('#btn_crop_2').hide();
  $('#rotate_btn_2').hide();
  $('#ganti_selfie').show();
  $('#img_result_2').hide();
  $('#img_crop_2').show();
  // get result to data uri
  let imgSrc_2 = cropper_2.getCroppedCanvas({
    width: img_w_2.value // input value
  }).toDataURL();
  // remove hide class of img
  cropped_2.classList.remove('hide_2');
  img_result_2.classList.remove('hide_2');
  // show image cropped
  cropped_2.src = imgSrc_2;
  // dwn.classList.remove('hide');
  // dwn.download = 'imagename.png';
  // dwn.setAttribute('href', imgSrc);
  $('#avatar_img').val(imgSrc_2);
  // alert(imgSrc_2);
});

function ganti_selfie(){
  result_2.innerHTML = '';
  $('#box_upload_2').show();
  $('#img_result_2').show();
  $('#btn_crop_2').hide();
  $('#rotate_btn_2').hide();
  $('#ganti_selfie').hide();
  $('#img_crop_2').hide();
  $('#avatar_img').val('');
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

function imageNotFound() {
  alert('That image was not found.');
}
