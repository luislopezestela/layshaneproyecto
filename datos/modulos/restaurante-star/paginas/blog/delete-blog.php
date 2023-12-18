<div class="modal fade" id="delete-blog" >
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="wow_pops_head">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></button>
				<h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"></path></svg></h4>
			</div>
			<div class="modal-body">
				<p><?php echo $wo['lang']['confirm_delete_post']; ?></p>
			</div>
			<div class="modal-footer">
				<button type="button" onclick="Wo_Del_Article($('#delete-blog').attr('data-blog-id'))" class="btn btn-main btn-mat btn-mat-raised"><?php echo $wo['lang']['delete']; ?></button>
			</div>
		</div>
	</div>
</div>
