<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Users List</h3>
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
								<th>S.No</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>User Role</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$a = 1;
							foreach ($users_list as $row) {
								?>
								<tr>
									<td><?php echo $a; ?></td>
									<td><?php echo $row->first_name; ?></td>
									<td><?php echo $row->last_name; ?></td>
									<td><?php echo $row->email; ?></td>
									<td><?php echo $row->user_status; ?></td>
									<td>
										<a href="<?php echo base_url('dashboard/edit_user/') . $row->id; ?>"
										   id="<?php echo $row->id; ?>">Edit</a> 
										/ 
										<a href="#" class="delete_data" id="<?php echo $row->id; ?>">Delete</a>
									</td>
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

<script type="application/javascript">
	$(document).ready(function(){
		$(".delete_data").click(function () {
			var id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?")){
				window.location="<?php echo base_url(); ?>dashboard/delete_data/"+id;
			}else {
				return false;
			}
		})
	})
</script>
