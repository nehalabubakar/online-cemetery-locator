<!DOCTYPE html>
<html class="no-js" lang="en">
<head lang="en">
	<title><?php echo $this->config->item('site_title'); ?></title>
	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
	<script
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC5O5p-9bEJjGldmdr1r07SdaT-OUWfxo&callback=initMap&libraries=&v=weekly"
			defer
	></script>
	<!-- jsFiddle will insert css and js -->
	<style type="text/css">
		/* Always set the map height explicitly to define the size of the div
		 * element that contains the map. */
		#map {
			height: 70%;
		}

		html,
		body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
	</style>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="author" content="Nehal Abubakar">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport"
		  content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
	<meta name="format-detection" content="telephone=no">

<!--	<script src="cdn-cgi/apps/head/CZ3CFmKcMfCcupa_86mxMcuVsN8.js"></script>-->
	<!-- <link rel="shortcut icon" href="assets/images/favicon.png"> -->
	<link rel="apple-touch-icon" href="apple-touch-icon.html">

	<!--<title>Heavenly Loves Cemetery</title>-->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/website/css/cards.css">

	<script src="<?php echo base_url(); ?>assets/website/js/modernizr.custom.js"></script>
</head>


