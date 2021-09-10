<section class="container-fluid ct-u-backgroundDark section" id="obituaries">
	<div class="row ct-u-paddingBottom90" style="padding-top: 30px">
		<div class="col-md-12">
			<div class="ct-gallery ct-gallery--col3 ct-gallery--withSpacing ct-gallery--opacityBorder">
				<?php foreach ($obituaries as $obituary) { ?>
					<div class="ct-gallery-item ct-gallery-item--masonry">
						<div class="ct-gallery-itemInner ct-gallery-itemInner--ribbon ct-frame">
							<div class="ct-gallery-itemInner-image ct-gallery--hover">
								<!-- <a href="#" data-toggle="modal" data-target="#myModal"> -->
									<img src="<?php echo base_url(); ?>assets/obituaries/<?php echo $obituary->image ?>" alt="Image"/>
								<!-- </a> -->
							</div>

							<div class="ct-gallery-itemInner-content">
								<h4 class="ct-u-fontType2 ct-fs-i"><?php echo $obituary->person_name ?></h4>
								<!--<span class="ct-fw-700 ct-fs-i ct-u-displayBlock">Husband & Father</span>-->
								<span class="ct-u-colorGrey ct-u-displayBlock ct-fw-700 ct-fs-i"><?php echo $obituary->dates ?></span>

								<ul class="list-inline list-unstyled ct-u-fontType2 ct-fs-i ct-u-paddingTop20">
									<li><a href="#">Share</a></li>
									<li><a href="#">/</a></li>
									<li><a href="#">Send Flowers</a></li>
								</ul>
								<div class="clearfix"></div>
								<!-- <p><?php echo str_word_count($obituary->prayers); ?></p> -->
								<p><?php echo implode(" ", array_slice(explode(' ', $obituary->prayers), 0, 50)) . "<br>"; if(str_word_count($obituary->prayers) > 50){ ?>
									<a href="#" data-toggle="modal" data-target="#<?php echo $obituary->id; ?>">Read More..</a>
								<?php } ?></p>
							</div>
						</div>
					</div>
				<?php } ?>

				<!-- Modal -->
				<?php foreach ($obituaries as $obituary): 
					if(str_word_count($obituary->prayers) > 50){ ?>
						<div class="modal fade" id="<?php echo $obituary->id ?>" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content ct-frame"> 
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<img src="<?php echo base_url(); ?>assets/obituaries/<?php echo $obituary->image ?>" alt="Image"/>
									</div>
									<div class="modal-body">
										<h4 class="ct-u-fontType2 ct-fs-i"><?php echo $obituary->person_name; ?></h4>
										<span class="ct-u-colorGrey ct-u-displayBlock ct-fw-700 ct-fs-i"><?php echo $obituary->dates ?></span>
										<ul class="list-inline list-unstyled ct-u-fontType2 ct-fs-i ct-u-paddingTop20">
											<li><a href="#">Share</a></li>
											<li><a href="#">/</a></li>
											<li><a href="flowers-and-gifts.html">Send Flowers</a></li>
										</ul>
										<div class="clearfix"></div>
										<?php 
										
										?>
										<p class="text-justify"><?php echo $obituary->prayers; ?></p>
									</div>
									<div class="modal-footer">
									</div>
								</div>
							</div>
						</div>
				<?php 	
					}
				endforeach ?>
				

				
				<!-- <div class="modal fade" id="myModal-2" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content ct-frame"> 
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
											aria-hidden="true">&times;</span></button>
								<img src="<?php echo base_url(); ?>assets/website/images/demo-content/person4.jpg"
									 alt="Image"/>
							</div>
							<div class="modal-body">
								<h4 class="ct-u-fontType2 ct-fs-i">Pearl Floyd</h4>
								
								<span class="ct-u-colorGrey ct-u-displayBlock ct-fw-700 ct-fs-i">15.03.1913 - 05.04.2015</span>
								<ul class="list-inline list-unstyled ct-u-fontType2 ct-fs-i ct-u-paddingTop20">
									<li><a href="#">Share</a></li>
									<li><a href="#">/</a></li>
									<li><a href="#">Send Flowers</a></li>
								</ul>
								<div class="clearfix"></div>
								<p>
									In Loving Memory of Pearl Floyd March 15, 1913 – April 5, 2015.<br> A lovely women,
									left
									us
									with grief but beautiful memories of her
								</p>
							</div>
							<div class="modal-footer">
							</div>
						</div>
					</div>
				</div>

				
				<div class="modal fade" id="myModal-3" tabindex="-1" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content ct-frame"> 
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
											aria-hidden="true">&times;</span></button>
								<img src="<?php echo base_url(); ?>assets/website/images/demo-content/person2.jpg"
									 alt="Image"/>
							</div>
							<div class="modal-body">
								<h4 class="ct-u-fontType2 ct-fs-i">Michael Vincent</h4>
								
								<span class="ct-u-colorGrey ct-u-displayBlock ct-fw-700 ct-fs-i">15.05.1965 - 02.04.2014</span>
								<ul class="list-inline list-unstyled ct-u-fontType2 ct-fs-i ct-u-paddingTop20">
									<li><a href="#">Share</a></li>
									<li><a href="#">/</a></li>
									<li><a href="flowers-and-gifts.html">Send Flowers</a></li>
								</ul>
								<div class="clearfix"></div>
								<p>
									I’d like the memory of me to be a happy one,
									I’d like to leave and afterglow when life is one,
									I’d like to leave and echo whispering softly down the ways, of happy time and
									laughing times and bright and sunny days.

									I’d like the tears of those who grieve, to dry before the sun Of happy memories that
									I leave when life is done.
									In Loving Memory of Michael Vincent Canter May 15, 1965 – April 2, 2014.

								</p>

							</div>
							<div class="modal-footer">
							</div>
						</div>
					</div>
				</div> -->
			</div>

			<!--<div class="text-center ct-u-paddingTop80">
				<a href="index-page2.html" id="next" class="btn btn-default ">Load More</a>
			</div>-->
		</div>
	</div>
</section>

<script type="text/javascript">
	function WordCount(str) { 
  		return str.split(" ").length;
	}
</script>