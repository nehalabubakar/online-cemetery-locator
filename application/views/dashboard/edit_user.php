<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Edit User</h3>
			</div>

		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Edit User <small></small></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br/>
						<form id="edit_user" data-parsley-validate class="form-horizontal form-label-left"
							  enctype="multipart/form-data">

							<div class="from-group">
								<div class="col-12">
									<div class="notification"></div>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name
									<span class="required" style="color: red">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="first_name" name="firstName" required="required"
										   value="<?php echo $edit_user_details['first_name'] ?>"
										   class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name <span
											class="required" style="color: red">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="last_name" name="lastName"
										   value="<?php echo $edit_user_details['last_name'] ?>" required="required"
										   class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span
											class="required" style="color: red">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="email" name="email"
										   value="<?php echo $edit_user_details['email'] ?>" readonly="readonly"
										   required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">User Role <span
											class="required" style="color: red">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<label class="radio-inline">
										<input type="radio" name="role"
											   value="admin" <?php if ($edit_user_details['user_status'] == 'admin') {
											echo 'checked';
										} ?>> Admin
									</label>
									<label class="radio-inline">
										<input type="radio" name="role" value="visitor" <?php if($edit_user_details['user_status'] == 'visitor'){ echo 'checked';} ?>> Visitor
									</label>
								</div>
							</div>
							<input type="hidden" name="id" value="<?php echo $edit_user_details['id']; ?>"/>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<button class="btn btn-primary" type="reset">Reset</button>
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$('#edit_user').on('submit', function (e) {
		e.preventDefault();
		var userEdit = $('#edit_user').serialize();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>dashboard/updateUser",
			data: new FormData(this),
			// data: $('#cemeteryForm').serialize(),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData: false,
			success: function (data) {
				$('.notification').html('<div id="message" class="alert ' + data.class + ' alert-dismissible">' +
						'<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + data.message + '</div>');
				if (data.class == 'alert-success') {
					// $("#edit_user")[0].reset();
					window.location = '<?php echo base_url(); ?>dashboard/Userslist';
				}
			}
		});
		/*}*/
	});
</script>
