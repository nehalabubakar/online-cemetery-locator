
<div class="limiter">

	<div class="container-login100"
		 style="background-image: url('<?php echo base_url(); ?>assets/login/images/bg-01.jpg');">
		<div class="wrap-login100">
			<div class="row">
				<div class="col-md-12">
					<?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
				</div>
			</div>
			<?php
			$this->load->helper('form');
			$error = $this->session->flashdata('error');
			$send = $this->session->flashdata('send');
			$notsend = $this->session->flashdata('notsend');
			$unable = $this->session->flashdata('unable');
			$invalid = $this->session->flashdata('invalid');
			if ($error) {
				?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<?php echo $this->session->flashdata('error'); ?>
				</div>
			<?php }?>


			<form id="resetPassword" name="resetPassword" method="post"
				  action="<?php echo base_url(); ?>dashboard/ForgotPassword" onsubmit='return validate()'>
			<?/*= form_open() */?>
			<span class="login100-form-logo">
						<i class="zmdi zmdi-lock"></i>
					</span>

				<span class="login100-form-title p-b-34 p-t-27">
						Forgot Password
					</span>
				<div class="notification"></div>
				<div class="wrap-input100 validate-input" data-validate="Enter email">
					<input class="input100" type="email" id="email" name="email" placeholder="Email">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

				<div class="container-login100-form-btn">

					<button class="login100-form-btn" name="submit" type="submit">
						Submit
					</button>
				</div>
			</form>
		</div>

	</div>
</div>

<script type="text/javascript">
	$('#resetPassword').submit(function (e) {
		e.preventDefault();
		var loginForm = $(this);
		$.ajax({
			url: '<?php echo base_url(); ?>dashboard/ForgotPassword',
			data: new FormData($('#resetPassword')[0]),
			type: 'POST',
			dataType: 'json',
			processData: false,
			contentType: false,
			beforeSend: function(){
				$('#resetPassword button[type="submit"]').attr('disabled', 'disabled');
				$('#resetPassword button[type="submit"]').append('<i class="fa fa-spinner fa-spin"></i>');
			},
			success: function(data){
				$('#resetPassword button[type="submit"]').attr('disabled', false);
				$('#resetPassword button[type="submit"] .fa-spinner').remove();

				$('#resetPassword .notification').html('<div id="alert" class="alert '+ data.class +' alert-dismissible">'+ data.message +'</div>');
				if(data.class == 'alert-success'){
					$('#resetPassword')[0].reset();
				}
			}
		});
	});
</script>
