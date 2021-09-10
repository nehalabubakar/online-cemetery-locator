<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Edit Obituary</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Edit Obituary <small></small></h2>

						<!-- <div class="notification"></div> -->
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br/>
						<form id="edit_obituary" data-parsley-validate class="form-horizontal form-label-left"
							  enctype="multipart/form-data">

							<div class="from-group">
								<div class="col-12">
									<div class="notification"></div>
								</div>
							</div>

							<input type="hidden" name="id" value="<?php echo $obituary_data['id'] ?>">

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Person Name
									<span class="required" style="color: red">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="name" name="name" required="required" value="<?php echo $obituary_data['person_name']; ?>" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth
									- Date Of Death <span class="required" style="color: red">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<div class="input-group date" id="myDatepicker2">
											<input type="text" class="form-control" name="dates"
												   value="<?php echo $obituary_data['dates']; ?>">
											<span class="input-group-addon">
                               					<span class="glyphicon glyphicon-calendar"></span>
                            				</span>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Prayers <span class="required" style="color: red">*</span></label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea id="prayers" class="form-control col-md-7 col-xs-12" type="text" name="prayers" rows="10" spellcheck="false"><?php echo $obituary_data['prayers']; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Person Image
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input id="personImage" type="file" name="image"/> <br>
									<img src="<?php echo base_url('assets/obituaries/').$obituary_data['image']; ?>" width="100" height="100">
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

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$('#edit_obituary').on('submit', function (e) {
		e.preventDefault();
		// var obituary = $('#add_obituary').serialize();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>dashboard/edit_obituary_data",
			data: new FormData(this),
			// data: $('#cemeteryForm').serialize(),
			dataType: 'json',
			contentType: false,
			cache: false,
			processData: false,
			success: function (data) {
				$('.notification').html('<div id="message" class="alert ' + data.class + ' alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + data.message + '</div>');
				if (data.class == 'alert-success') {
					window.location = '<?php echo base_url(); ?>dashboard/obituary_list';
				}
			}
		});
	});
</script>
