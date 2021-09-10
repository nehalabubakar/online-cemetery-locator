<!DOCTYPE html>
<html class="no-js" lang="en">
<head lang="en">
	<meta charset="UTF-8">
	
	<title><?php if(isset($title)){echo $title . ' | ';} ?><?php echo $this->config->item('site_title'); ?></title>
	
	<meta name="keywords" content="<?php if(isset($keywords)){echo $keywords;} ?>">
	<meta name="description" content="<?php if(isset($description)){echo $description;} ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
	<meta name="format-detection" content="telephone=no">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-J6WB4Q60RB"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-J6WB4Q60RB');
	</script>

	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC5O5p-9bEJjGldmdr1r07SdaT-OUWfxo&callback=initMap&libraries=&v=weekly" defer></script>
	<!-- jsFiddle will insert css and js -->
	<style type="text/css">
		/* Always set the map height explicitly to define the size of the div
		* element that contains the map. */
		#map {
			height: 60%;
		}

		html,
		body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
	</style>
	<style>
		.down_list{
			list-style: none;
			margin-left: -20px;
		}
		.page_obeituaries{
			margin-left: 100px;
			margin-right: 100px;
		}
		@media (max-width: 991px) {
			.page_obeituaries{
				margin-left: 40px;
				margin-right: 40px;
			}
		}
	</style>
	

	<!--<script src="cdn-cgi/apps/head/CZ3CFmKcMfCcupa_86mxMcuVsN8.js"></script>-->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/website/images/favicon.png"> 
	<!--<link rel="apple-touch-icon" href="apple-touch-icon.html">-->

	<!--<title>Heavenly Loves Cemetery</title>-->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/cards.css">

	<script src="<?php echo base_url(); ?>assets/website/js/modernizr.custom.js"></script>
</head>

