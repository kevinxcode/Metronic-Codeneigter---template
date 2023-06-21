// vars
let result = document.querySelector('.result'),
img_result = document.querySelector('.img-result'),
img_w = document.querySelector('.img-w'),
img_h = document.querySelector('.img-h'),
options = document.querySelector('.options'),
save = document.querySelector('.save'),
cropped = document.querySelector('.cropped'),
dwn = document.querySelector('.download'),
rotate_btn = document.querySelector('.rotate_btn'),
upload = document.querySelector('#file-input'),
cropper = '';

// on change show image with crop options
upload.addEventListener('change', e => {
  var file_data  = $(upload).val();
  var ext = file_data.split(".");
  ext = ext[ext.length-1].toLowerCase();
  var arrayExtensions = ["jpg", "JPG", "JPEG", "PNG", "png", "bitmap"];

  if (arrayExtensions.lastIndexOf(ext) == -1) {
      error_msg('format foto salah');
      return false;
  }
  if (e.target.files.length) {
    $('#box_upload').hide();
    $('#btn_crop').show();
    $('#rotate_btn').show();
    $('#ganti_ktp').show();
    $('#img_result').show();
    
    // $('#img_crop').show();
    // start file reader
    const reader = new FileReader();
    reader.onload = e => {
      if (e.target.result) {
        // create new image
        let img = document.createElement('img');
        img.id = 'image';
        img.src = e.target.result;
        // clean result before
        result.innerHTML = '';
        // append new image
        result.appendChild(img);
        // show save btn and options
        save.classList.remove('hide');
        options.classList.remove('hide');
        // init cropper
        cropper = new Cropper(img, {
            dragMode: 'none',
            aspectRatio: 12 / 8,
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
    reader.readAsDataURL(e.target.files[0]);
  }
});

rotate_btn.addEventListener('click', e => {
  cropper.rotate(90);
});

// save on click
save.addEventListener('click', e => {
  e.preventDefault();
  $('#box_upload').hide();
  $('#btn_crop').hide();
  $('#rotate_btn').hide();
  $('#ganti_ktp').show();
  $('#img_result').hide();
  $('#img_crop').show();
  // get result to data uri
  let imgSrc = cropper.getCroppedCanvas({
    width: img_w.value // input value
  }).toDataURL();
  // remove hide class of img
  cropped.classList.remove('hide');
  img_result.classList.remove('hide');
  // show image cropped
  cropped.src = imgSrc;
  // dwn.classList.remove('hide');
  // dwn.download = 'imagename.png';
  // dwn.setAttribute('href', imgSrc);
  $('#fotoKTP').val(imgSrc);
  // alert(imgSrc);
});

function ganti_ktp(){
  result.innerHTML = '';
  $('#box_upload').show();
  $('#img_result').show();
  $('#btn_crop').hide();
  $('#rotate_btn').hide();
  $('#ganti_ktp').hide();
  $('#img_crop').hide();
  $('#fotoKTP').val('');
}
