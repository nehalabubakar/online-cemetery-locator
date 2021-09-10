<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Add Cemetery</h3>
			</div>

		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Add Cemetery <small></small></h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br/>
						<form id="cemeteryForm" data-parsley-validate class="form-horizontal form-label-left"
							  enctype="multipart/form-data">

							<div class="from-group">
								<div class="col-12">
									<div class="notification"></div>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Title
									<span class="required" style="color: red">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="title" name="title" required="required"
										   class="form-control col-md-7 col-xs-12"
										   placeholder="Rest Haven Memorial Park">
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name"
									   class="control-label col-md-3 col-sm-3 col-xs-12">Street <span
											class="required" style="color: red">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="street" name="street" required="required"
										   class="form-control col-md-7 col-xs-12"
										   placeholder="12345 Plainfield Rd Cincinnati">
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name"
									   class="control-label col-md-3 col-sm-3 col-xs-12">Zip Code<span
											class="required" style="color: red">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="zip" name="zip" required="required"
										   class="form-control col-md-7 col-xs-12" placeholder="OH 12345">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Latitude<span
											class="required" style="color: red">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="latitude" name="latitude" required="required"
										   class="form-control col-md-7 col-xs-12" placeholder="39.251561">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Longitude<span
											class="required" style="color: red">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="longitude" name="longitude" required="required"
										   class="form-control col-md-7 col-xs-12" placeholder="-84.395756">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Phone Number <span
											class="required" style="color: red">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="phone" class="date-picker form-control col-md-7 col-xs-12"
										   required="required" name="phone" type="text" placeholder="(111) 111-1112">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Image
									<span class="required" style="color: red">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="uploadImage" type="file" name="image"/>
								</div>
							</div>


							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<!--<button class="btn btn-primary" type="button">Cancel</button>-->
									<button class="btn btn-primary" type="reset">Reset</button>
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>

							<input type="hidden" name="user_id" value="<?php echo $user_details['id']; ?>">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$('#cemeteryForm').on('submit', function (e) {
		e.preventDefault();
		if ($('#uploadImage').val() == '') {
			alert("Please Select the File");
		} else {
			var cemeteryForm = $('#cemeteryForm').serialize();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>dashboard/cemetery",
				data: new FormData(this),
				// data: $('#cemeteryForm').serialize(),
				dataType: 'json',
				contentType: false,
				cache: false,
				processData: false,
				success: function (data) {
					$('.notification').html('<div id="message" class="alert ' + data.class + ' alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + data.message + '</div>');

					/*$('.notification').html('<div id="message" class="text-center text-danger">' + data.message +  '</div>');*/
					if (data.status == 'success') {
						$("#cemeteryForm")[0].reset();
					}
				}
			});
		}
	});

</script>
