<html>
	<!--<button data-target="modal1" class="btn">Modal</button>-->

	<div id="modal1" class="modal modal-fixed-footer">
	    <div class="modal-content">

			<table class="bordered responsive-table" style="width: 700px">
		        <thead>
		          	<tr>
			          	<th data-field="delete_id"></th>
			            <th data-field="token_id">Token ID</th>
			            <th data-field="user_id">User ID</th>
			            <th data-field="token">Token</th>
			            <th data-field="created">Created</th>
			        </tr>
		       	</thead>

				<tbody>
					<?php foreach ($query->result() as $row){?>
						<tr>
							<td><a href="<?php echo base_url('setupdb/editToken/'.$row->token_id)?>"
								class="btn"><i class="material-icons">delete</i></a></td>
							<td><?echo $row->token_id;?></td>
							<td><?echo $row->user_id;?></td>
							<td><?echo $row->token;?></td>
							<td><?echo $row->created;?></td>
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