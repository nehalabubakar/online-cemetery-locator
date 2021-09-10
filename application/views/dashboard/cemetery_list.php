<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Cemeteries List</h3>
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
								<th width="10%">image</th>
								<th width="15%">Cemetery Title</th>
								<th width="20%">Address</th>
								<th>Phone No.</th>
								<th>longitude</th>
								<th>latitude</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>

							<?php
							$a=1;
							foreach ($cemetery_list as $row) {
								?>
							<tr>
								<td><?php echo $a; ?></td>
								<td><img src='<?php echo base_url(); ?>assets/cemetery/<?php echo $row->image; ?>' style="height:50px;width:100px;" > </td>
								<td><?php echo $row->title; ?></td>
								<td><?php echo $row->street; ?>, <?php echo $row->zip ?></td>
								<td><?php echo $row->phone; ?></td>
								<td><?php echo $row->longitude; ?></td>
								<td><?php echo $row->latitude; ?></td>
								<td><a href="<?php echo base_url(); ?>dashboard/edit_cemetery/<?php echo $row->id; ?>">Edit</a>  / <a href="#" class="delete_data" id="<?php echo $row->id; ?>">Delete</a></td>
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
				window.location="<?php echo base_url(); ?>dashboard/delete_cemetery/"+id;
			}else {
				return false;
			}
		})
	});
</script>