<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div class="container-xxl" id="kt_content_container">
							<!--begin::Navbar-->
							<div class="card mb-8">
								<div class="card-body pt-9 pb-0">

							<!--end::Navbar-->
							<!--begin::Toolbar-->
							<div class="d-flex flex-wrap flex-stack pb-7">
								<!--begin::Title-->
								<div class="d-flex flex-wrap align-items-center my-1">
									<span  class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#kt_modal_1">Add</span>
								</div>
								<!--end::Title-->
							</div>
							<!--end::Toolbar-->
							<!--begin::Tab Content-->
							<div class="tab-content">
								<!--begin::Tab pane-->
								<div id="kt_project_users_card_pane" class="tab-pane fade show active">
									<!--begin::Row-->
									<div class="row g-6 g-xl-9">
										<!--begin::Col-->
										<div class="col-md-12 col-xxl-12">
											<!--begin::Card-->


<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <thead>
        <tr class="fw-bold fs-6 text-gray-800 px-7">
            <th>#</th>
						<th>Company</th>
            <th>Type</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
			<?php $i = 1; ?>
			<?php foreach($list as $dt): ?>
        <tr>
            <td><?php echo $i++; ?></td>
						<td><?php echo $dt->company; ?></td>
            <td><?php echo $dt->type; ?></td>
            <td><?php echo $dt->company_description; ?></td>

            <td><span onclick="editCompany('<?php echo $dt->company_token; ?>')" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_1_edit">EDIT</span></td>
        </tr>
			<?php endforeach; ?>
    </tbody>
</table>
<script>
function editCompany(company_token){
	$("#modal_body_edit").html('Loading...');
	$('#modal_title_edit').html('Edit');
	$.ajax({
			url: '<?php echo prefix_url;?>html/editCompany',
			method: 'post',
			data: {company_token: company_token},
			dataType: "html",
			success: function (data) {
				$("#modal_body_edit").html(data);
			},
			error: function (data) {
				console.log(JSON.stringify(data));
				errorAlert(data.statusText);
			},
	});

}
</script>
											<!--end::Card-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->

								</div>
								<!--end::Tab pane-->

							</div>
							<!--end::Tab Content-->
							<!--begin::Modals-->


							<!--end::Modals-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->
				</div>
			</div>


			<!--begin::Modal-->
			<div class="modal fade" tabindex="-1" id="kt_modal_1_edit">
					<div class="modal-dialog modal-lg">
							<div class="modal-content">
									<div class="modal-header">
											<h5 class="modal-title" id="modal_title_edit">Create Company</h5>
											<!--begin::Close-->
											<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
													<span class="svg-icon fs-2x"></span>
											</div>
											<!--end::Close-->
									</div>
			<div class="modal-body" id="modal_body_edit">


			</div>
									<div class="modal-footer">
											<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>

									</div>
							</div>
					</div>
			</div>
			<!--end::Modal-->




<!--begin::Modal-->
<div class="modal fade" tabindex="-1" id="kt_modal_1">
		<div class="modal-dialog modal-lg">
				<div class="modal-content">
						<div class="modal-header">
								<h5 class="modal-title" id="modal_title">Create Company</h5>
								<!--begin::Close-->
								<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
										<span class="svg-icon fs-2x"></span>
								</div>
								<!--end::Close-->
						</div>
<div class="modal-body" id="modal_body">
<form class="form w-100" novalidate="novalidate" method="POST" action="<?php echo prefix_url;?>app/setting/addCompany">
	<div class="d-flex flex-column mb-8">
		<label class="fs-6 fw-semibold mb-2">Company / School *</label>
		<input type="text" class="form-control form-control-solid" name="company"  autocomplete="off" required />
	</div>

	<div class="d-flex flex-column mb-6">
			<label class="fs-6 fw-semibold mb-2">Type</label>
			<select class="form-control" name="type" id="type" >
				<option value="Company">Company</option>
			<option value="School">School</option>

			</select>
		</div>

	<div class="d-flex flex-column mb-8">
		<label class="fs-6 fw-semibold mb-2">Description *</label>
		<input type="text" class="form-control form-control-solid" name="description" autocomplete="off" required />
	</div>

</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</form>
						</div>
				</div>
		</div>
</div>
<!--end::Modal-->
