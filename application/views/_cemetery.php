
<div class="ct-mediaSection ct-mediaSectionHeader ct-u-colorWhite" data-color="#fff" data-height="300px"
		data-background="<?php echo base_url(); ?>assets/website/images/home-banner/home_banner.jpg"
		data-background-mobile="<?php echo base_url(); ?>assets/website/images/home-banner/home_banner.jpg">
	<div class="ct-mediaSection-inner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="ct-fw-700 text-uppercase">Locations in Ohio</h3>
					<!--<ol class="breadcrumb">
						<li><a href="index.html">Home</a></li>
						<li class="active">About Us</li>
					</ol>-->
				</div>
			</div>
		</div>
	</div>
</div>
<!--</div>-->

<!--<div class="container">-->
<div class="map-card" id="map"></div>
<!--</div>-->

		<section class="ct-historySection ct-u-paddingTop-cards ct-u-paddingBottom90">
			<div class="" style="width: 90%; margin: auto;">
				<div class="row">
					<?php foreach ($all_list as $list) { ?>
						<div class="col-sm-6 col-md-4 col-lg-3 mt-4 card-padding">
							<div class="card">
								<img class="card-img-top" src="<?php echo base_url(); ?>assets/cemetery/<?php echo $list->image; ?>">
								<div class="card-block">
									<h4 class="card-title"><?php echo $list->title; ?></h4>
									<div class="meta">
										<p><?php echo $list->address; ?></p>
									</div>
									<div class="card-text">
										<?php echo $list->phone; ?>
									</div>
								</div>
							</div>
						</div>
				
						<?php
					}
					?>

				</div>
			</div>
		</section>


<!--</body>-->

<script type="text/javascript">
	let map;

	function initMap() {
		map = new google.maps.Map(document.getElementById("map"), {
			center: {
				lat: 40.4173,
				lng: -82.9071
			},
			zoom: 7,
		});
		<?php
			$i = 0;
			foreach($all_list as $list){
				?>
		//var <?php //echo str_replace(' ', "", $list->title); ?>// = new google.maps.Marker({
		var cemetery_<?php echo $i; ?> = new google.maps.Marker({
			position: {
				lat: <?php echo $list->latitude; ?>,
				lng: <?php echo $list->longitude; ?>
			},
			map: map
		})


		<?php $i++; } ?>
	}

</script>
<!--</html>-->
