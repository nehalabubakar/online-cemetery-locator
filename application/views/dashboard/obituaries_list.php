<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Obituaries List</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<!--<div class="x_title">
						<h2>Cemeteries List</h2>

						<div class="clearfix"></div>
					</div>-->
					<div class="x_content">
						<table id="datatable" class="table table-striped table-bordered">
							<thead>
							<tr>
								<th width="5%">S.No</th>
								<th width="10%">Person Image</th>
								<th width="10%">Person Name</th>
								<th width="20%">Date Of Birth & Date Of Death</th>
								<th width="40%">Prayers</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>

							<?php
							$a = 1;
							foreach ($obituary_list as $obituary) {
								?>
								<tr>
									<td><?php echo $a; ?></td>
									<td>
										<img src='<?php echo base_url(); ?>assets/obituaries/<?php echo $obituary->image; ?>'
											 class="w-100 img-fluid" style="max-width: 150px;"></td>
									<td><?php echo $obituary->person_name; ?></td>
									<td><?php echo $obituary->dates; ?></td>
									<td><?php echo $obituary->prayers; ?></td>
									<td>
										<a href="<?php echo base_url('dashboard/edit_obituary/') . $obituary->id; ?>">Edit</a>
										/ <a href="#" class="delete_data" id="<?php echo $obituary->id; ?>">Delete</a></td>
								</tr>
								<?php
								$a++;
							}
							?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".delete_data").click(function () {
			var id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?")){
				window.location="<?php echo base_url(); ?>dashboard/delete_obituary/"+id;
			}else {
				return false;
			}
		})
	});
</script>