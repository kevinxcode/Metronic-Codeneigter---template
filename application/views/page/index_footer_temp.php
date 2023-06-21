<script src="<?php echo prefix_url;?>assets/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
<script>
const button_load = document.querySelector(".kt_loader");
button_load.addEventListener("click", function() {
    // const loadingEl = document.createElement("div");
    document.body.prepend(loadingEl);
    loadingEl.classList.add("page-loader");
    loadingEl.classList.add("flex-column");
    loadingEl.classList.add("bg-dark");
    loadingEl.classList.add("bg-opacity-25");
    loadingEl.innerHTML = `
        <span class="spinner-border text-danger" role="status"></span>
        <span class="text-gray-900 fs-6 fw-semibold mt-5">Loading...</span>
    `;
    // Show page loading
    KTApp.showPageLoading();
});
</script>
<script>
const showLoading = document.querySelector(".btn_show_load");
showLoading.addEventListener("click", function() {
  show_loading();
});

// window.addEventListener("load", (event) => {
// });
</script>

<script>
// const form_id_1 = document.querySelector('.form_id_1');
// form_id_1.addEventListener('submit', event => {
//   event.preventDefault();
//   show_loading();
// });
</script>

<script>
$(document).ready(function(){
	$(".form_id").submit(function() {
	  show_loading_short();
	});
});
</script>

<script>
$(document).ready(function(){
	$(".class_link").click(function() {
	  show_loading();
	});
});
</script>

<script>
function show_loading(){
      let timerInterval
      Swal.fire({
        title: 'please wait..',
        html: '',
        timer: 200000,
        timerProgressBar: true,
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
          }, 100)
        },
        willClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
          console.log('I was closed by the timer')
        }
      })
}
function show_loading_short(){
      let timerInterval
      Swal.fire({
        title: 'please wait..',
        html: '',
        timer: 5000,
        timerProgressBar: true,
        allowOutsideClick: false,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
          }, 100)
        },
        willClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
          console.log('I was closed by the timer')
        }
      })
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
</script>


<!--begin::Footer-->
<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
	<!--begin::Container-->
	<div class="container-xxl d-flex flex-column flex-md-row flex-stack">
		<!--begin::Copyright-->
		<div class="text-dark order-2 order-md-1">
			<span class="text-gray-400 fw-semibold me-1">Created by</span>
			<a href="https://fadeintech.com/" target="_blank" class="text-muted text-hover-primary fw-semibold me-2 fs-6">Fade Digital Development</a>
		</div>
		<!--end::Copyright-->
		<!--begin::Menu-->
		<ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
			<li class="menu-item">
				<a href="#" target="_blank" class="menu-link px-2">About</a>
			</li>
			<li class="menu-item">
				<a href="#" target="_blank" class="menu-link px-2">Support</a>
			</li>

		</ul>
		<!--end::Menu-->
	</div>
	<!--end::Container-->
</div>
<!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Root-->

<!--begin::Javascript-->
<script>var hostUrl = "<?php echo prefix_url;?>assets/";</script>
<script>var defaultUrl = '<?php echo prefix_url;?>';</script>
<script src="<?php echo prefix_url;?>assets/route/_route.js"></script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="<?php echo prefix_url;?>assets/plugins/global/plugins.bundle.js"></script>
<script src="<?php echo prefix_url;?>assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)--
<script src="<?php echo prefix_url;?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="<?php echo prefix_url;?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="<?php echo prefix_url;?>assets/js/widgets.bundle.js"></script>
<script src="<?php echo prefix_url;?>assets/js/custom/widgets.js"></script>
<script src="<?php echo prefix_url;?>assets/js/custom/apps/chat/chat.js"></script>
<script src="<?php echo prefix_url;?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="<?php echo prefix_url;?>assets/js/custom/utilities/modals/create-app.js"></script>
<script src="<?php echo prefix_url;?>assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->

<!--begin::Javascript-->
<!-- <script>var hostUrl = "<?php echo prefix_url;?>assets/";</script> -->
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<!-- <script src="<?php echo prefix_url;?>assets/plugins/global/plugins.bundle.js"></script> -->
<!-- <script src="<?php echo prefix_url;?>assets/js/scripts.bundle.js"></script> -->
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="<?php echo prefix_url;?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<!-- <script src="<?php echo prefix_url;?>assets/js/custom/apps/ecommerce/sales/listing.js"></script> -->

<script src="<?php echo prefix_url;?>assets/js/widgets.bundle.js"></script>
<script src="<?php echo prefix_url;?>assets/js/custom/widgets.js"></script>

<!--end::Custom Javascript-->
</body>
<!--end::Body-->
</html>

<script>
document.addEventListener("DOMContentLoaded", () => {
			$("#kt_datatable_dom_positioning").DataTable({
				"language": {
					"lengthMenu": "Show _MENU_",
				},
				"dom":
					"<'row'" +
					"<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
					"<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
					">" +

					"<'table-responsive'tr>" +

					"<'row'" +
					"<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
					"<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
					">"
			});
});
</script>
