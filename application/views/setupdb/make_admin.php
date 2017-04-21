<html>
	<!--<button data-target="modal1" class="btn">Modal</button>-->

	<div id="modal1" class="modal modal-fixed-footer">
	    <div class="modal-content">

			<table class="bordered responsive-table">
		        <thead>
		          	<tr>
		          		<th data-field="Make admin"></th>
		          		<th style="min-width:80px;" data-field="user_id">User ID</th>
		              	<th data-field="username">Username</th>
		              	<th style="min-width:100px;" data-field="first_name">First Name</th>
		              	<th style="min-width:100px;" data-field="last_name">Last Name</th>
		              	<th data-field="email">Email</th>
		              	<th data-field="status">Status</th>
		              	<th style="min-width:100px;" data-field="role">Role</th>
		          	</tr>
		        </thead>

				<tbody>
					<?php foreach ($query->result() as $row){?>
						<tr>
							<td><a href="<?php echo base_url('setupdb/make_admin/'.$row->user_id)?>"
								class="btn"><i class="material-icons">star</i></a></td>
							<td><?echo $row->user_id;?></td>
							<td><?echo $row->username;?></td>
							<td><?echo $row->first_name;?></td>
							<td><?echo $row->last_name;?></td>
							<td><?echo $row->email;?></td>
							<td><?echo $row->status;?></td>
							<td><?echo $row->role;?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="modal-footer">
	      <btn class="modal-action modal-close waves-effect waves-green btn-flat ">Close</btn>
	    </div>
	</div>
<script>
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
    $('#modal1').modal('open');
  });
</script>

</html>