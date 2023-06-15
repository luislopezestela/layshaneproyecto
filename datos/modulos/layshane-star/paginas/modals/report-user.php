<div class="modal fade" id="report-user-modal" role="dialog">
	<div class="modal-dialog modal-md wow_mat_mdl">
		<form id="report-user-form-<?php echo $wo['user_profile']['user_id'];?>" method="post">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
					<h4 class="modal-title"><?php echo $wo['lang']['report_user_text']; ?></h4>
				</div>
				<div class="modal-body report-textarea-<?php echo $wo['user_profile']['user_id'];?>" style="padding:0;">
					<div class="report_alert"></div>
					<div class="wow_form_fields">
						<select name="reason">
							<?php foreach ($wo['config']['report_reasons'] as $key => $value) { ?>
								<option value="<?php echo $value; ?>"><?php echo $wo['lang'][$value]; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="wow_form_fields">
						<textarea placeholder="<?php echo $wo['lang']['reason']?>" dir="auto" rows="5" name="text" autocomplete="off"></textarea>
					</div>
				    <input type="hidden" name="user" value="<?php echo $wo['user_profile']['user_id'];?>">
				</div>
				<div class="modal-footer" style="border: none">
					<div class="ball-pulse"><div></div><div></div><div></div></div>
					<button type="submit" class="btn main btn-mat" id="report-user-button"><?php echo $wo['lang']['report']; ?></button>
				</div>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		  var textarea = $('.report-textarea-<?php echo $wo['user_profile']['user_id'];?> textarea');
		  var text = textarea.val();
		$('#report-user-form-<?php echo $wo['user_profile']['user_id'];?>').ajaxForm({
	      url: Wo_Ajax_Requests_File() + '?f=reports&s=report_user',
	      beforeSubmit: function(arr, $form, options) { 
	     //  	if ($('.report-textarea-<?php echo $wo['user_profile']['user_id'];?>').find('textarea').val() == '') {
		    //   $('.report-textarea-<?php echo $wo['user_profile']['user_id'];?>').find('.report_alert').html("<div class='alert alert-danger'><?php echo $wo['lang']['reason_empty']; ?></div>");
		    //   return false;
		    // }
	      },
	      beforeSend: function() {
		  Wo_progressIconLoader($('#report-user-button'));
		  $('#report-user-modal').find('.ball-pulse').fadeIn(100);
	      },
	      success: function(data) {
	        if(data.status == 200 && data.code == 1) {
	        	$('.report-textarea-<?php echo $wo['user_profile']['user_id'];?>').find('.report_alert').html("<div class='alert alert-success'>"+data.message+"</div>");
	        	$('#report-user-modal').find('.ball-pulse').fadeOut(100);
	        	setTimeout(function () {
	        		$('#report-user-modal').modal('hide');
	        		location.reload();
	        	},2000);
		    }
		    else{
		    	$('#report-user-modal').find('.ball-pulse').fadeOut(100);
			    location.reload();
			    $('#report-user-modal').modal('hide');
		    }
	    }});
	});
</script>