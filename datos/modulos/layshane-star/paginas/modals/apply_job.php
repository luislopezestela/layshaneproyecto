<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
			<h4 class="modal-title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg> <?php echo $wo['job']['title'] ?></h4>
		</div>
		<form class="apply-job-form form-horizontal" method="post">
			<div class="modal-body">
				<div class="wo_settings_page wo_create_job_box">
					<div class="apply-job-general-alert setting-update-alert"></div>
					<div class="clear"></div>
					<div class="setting-panel job-setting-panel">
						<!-- Text input-->
						<div class="row">
							<div class="col-lg-6">
								<div class="sun_input">
									<label for="user_name"><?php echo $wo['lang']['name'] ?></label> 
									<input id="user_name" name="user_name" type="text" class="form-control input-md" value="<?php echo($wo['user']['name']) ?>">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="sun_input">
									<label for="phone_number"><?php echo $wo['lang']['phone_number'] ?></label>  
									<input id="phone_number" name="phone_number" type="text" class="form-control input-md" value="<?php echo $wo['user']['phone_number'];?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="sun_input">
									<label for="location"><?php echo $wo['lang']['location'] ?></label> 
									<input id="location" name="location" type="text" class="form-control input-md" value="<?php echo($wo['user']['address']) ?>">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="sun_input">
									<label for="email"><?php echo $wo['lang']['email'] ?></label>  
									<input id="email" name="email" type="text" class="form-control input-md" value="<?php echo $wo['user']['email'];?>">
								</div>
							</div>
						</div>
						<hr>
						<h4><?php echo $wo['lang']['experience'] ?></h4>
						<div class="row">
							<div class="col-lg-6">
								<div class="sun_input">
									<label for="position"><?php echo $wo['lang']['position'] ?></label> 
									<input id="position" name="position" type="text" class="form-control input-md">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="sun_input">
									<label for="where_did_you_work"><?php echo $wo['lang']['where_did_you_work'] ?></label> 
									<input id="where_did_you_work" name="where_did_you_work" type="text" class="form-control input-md" value="">
								</div>
							</div>
						</div>
						<div class="sun_input">
							<label for="experience_description"><?php echo $wo['lang']['description'] ?></label>
							<textarea class="form-control" name="experience_description" rows="3" id="experience_description"></textarea>
						</div>

						<div class="wo_create_job_box_flex">
							<div class="sun_input" style="margin: 0;">
								<select id="experience_start_date" name="experience_start_date" class="form-control input-md">
									<?php for ($i=date('Y'); $i > (date('Y')-50); $i--) {  ?>
										<option value="<?php echo $i ?>"><?php echo $i ?></option>
									<?php } ?>
								</select>
							</div>
							<?php echo $wo['lang']['to'] ?>
							<div class="sun_input" style="margin: 0;">
								<select id="experience_end_date" name="experience_end_date" class="form-control input-md">
									<?php for ($i=date('Y'); $i > (date('Y')-50); $i--) {  ?>
										<option value="<?php echo $i ?>"><?php echo $i ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="wo_cbox">
								<input type="checkbox" name="i_currently_work" id="i_currently_work">
								<label for="i_currently_work"><?php echo $wo['lang']['i_currently_work']; ?></label>
								<div class="clear"></div>
							</div>
						</div>

						<?php if (!empty($wo['job']['question_one'])) { ?>
							<div class="wo_create_job_qstn_block">
								<label><?php echo $wo['job']['question_one'] ?></label>
								<?php if ($wo['job']['question_one_type'] == 'free_text_question') { ?>
									<div class="sun_input">
										<textarea class="form-control" name="question_one_answer" rows="3" id="question_one_answer"></textarea>
									</div>
								<?php }elseif ($wo['job']['question_one_type'] == 'yes_no_question') { ?>
									<div class="">
										<input type="radio" value="yes" name="question_one_answer">  <?php echo $wo['lang']['yes']; ?>
										&nbsp;&nbsp;&nbsp;
										<input type="radio" value="no" name="question_one_answer">  <?php echo $wo['lang']['no']; ?>
									</div>
								<?php }elseif ($wo['job']['question_one_type'] == 'multiple_choice_question' && !empty($wo['job']['question_one_answers'])) { ?>
									<div class="sun_input">
										<select id="question_one_answer" name="question_one_answer" class="form-control input-md">
											<?php foreach ($wo['job']['question_one_answers'] as $key => $value) {  ?>
												<option value="<?php echo $key ?>"><?php echo $value ?></option>
											<?php } ?>
										</select>
									</div>
								<?php } ?>
								<div class="clear"></div>
							</div>
						<?php } ?>
						<?php if (!empty($wo['job']['question_two'])) { ?>
							<div class="wo_create_job_qstn_block">
								<label><?php echo $wo['job']['question_two'] ?></label>
								<?php if ($wo['job']['question_two_type'] == 'free_text_question') { ?>
									<div class="sun_input">
										<textarea class="form-control" name="question_two_answer" rows="3" id="question_two_answer"></textarea>
									</div>
								<?php }elseif ($wo['job']['question_two_type'] == 'yes_no_question') { ?>
									<div class="">
										<input type="radio" value="yes" name="question_two_answer">  <?php echo $wo['lang']['yes']; ?>
										&nbsp;&nbsp;&nbsp;
										<input type="radio" value="no" name="question_two_answer">  <?php echo $wo['lang']['no']; ?>
									</div>
								<?php }elseif ($wo['job']['question_two_type'] == 'multiple_choice_question' && !empty($wo['job']['question_two_answers'])) { ?>
									<div class="sun_input">
										<select id="question_two_answer" name="question_two_answer" class="form-control input-md">
											<?php foreach ($wo['job']['question_two_answers'] as $key => $value) {  ?>
												<option value="<?php echo $key ?>"><?php echo $value ?></option>
											<?php } ?>
										</select>
									</div>
								<?php } ?>
							</div>
							<div class="clear"></div>
						<?php } ?>
						<?php if (!empty($wo['job']['question_three'])) { ?>
							<div class="wo_create_job_qstn_block">
								<label><?php echo $wo['job']['question_three'] ?></label>
								<?php if ($wo['job']['question_three_type'] == 'free_text_question') { ?>
									<div class="sun_input">
										<textarea class="form-control" name="question_three_answer" rows="3" id="question_three_answer"></textarea>
									</div>
								<?php }elseif ($wo['job']['question_three_type'] == 'yes_no_question') { ?>
									<div class="">
										<input type="radio" value="yes" name="question_three_answer">  <?php echo $wo['lang']['yes']; ?>
										&nbsp;&nbsp;&nbsp;
										<input type="radio" value="no" name="question_three_answer">  <?php echo $wo['lang']['no']; ?>
									</div>
								<?php }elseif ($wo['job']['question_three_type'] == 'multiple_choice_question' && !empty($wo['job']['question_three_answers'])) { ?>
									<div class="sun_input">
										<select id="question_three_answer" name="question_three_answer" class="form-control input-md">
											<?php foreach ($wo['job']['question_three_answers'] as $key => $value) {  ?>
												<option value="<?php echo $key ?>"><?php echo $value ?></option>
											<?php } ?>
										</select>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>

					<div class="publisher-hidden-option">
						<div id="progress" class="apply-job-progress">
							<span id="percent" class="apply-job-percent <?php echo lui_RightToLeft('pull-right');?>">0%</span>
							<div class="progress">
								<div id="bar" class="progress-bar active apply-job-bar"></div> 
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<input type="hidden" name="job_id" value="<?php echo $wo['job']['id'] ?>">
					<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
				</div>
			</div>
			<div class="form-group last-sett-btn modal-footer">
				<div class="ball-pulse"><div></div><div></div><div></div></div>
				<button type="submit" class="btn btn-main setting-panel-mdbtn"><?php echo $wo['lang']['send'] ?></button>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
	var create_bar = $('.apply-job-bar');
	var create_percent = $('.apply-job-percent');
	jQuery(document).ready(function($) {
		$('form.apply-job-form').ajaxForm({
		    url: Wo_Ajax_Requests_File() + '?f=job&s=apply_job',
		    beforeSend: function() {
		     var percentVal = '0%';
		     create_bar.width(percentVal);
		     create_percent.html(percentVal);
		      $('form.apply-job-form').find('.last-sett-btn .ball-pulse').fadeIn(100);
		    },
		    uploadProgress: function (event, position, total, percentComplete) {
		       var percentVal = percentComplete + '%';
		       create_bar.width(percentVal);
		       $('.apply-job-progress').slideDown(200);
		       create_percent.html(percentVal);
		    },
		    success: function(data) {
		     if (data.status == 200) {
		     	$('.apply-job-general-alert').html("<div class='alert alert-success'><?php echo($wo['lang']['apply_job_successfully']) ?></div>");
		       $('.apply-job-general-alert').find('.alert-success').fadeIn(300);
		        if (node_socket_flow == "1") {
			        socket.emit("user_notification", { to_id: data.user_id, user_id: _getCookie("user_id"), type: "added" });
			    }
		       setTimeout(function (argument) {
		        $('.apply-job-general-alert').find('.alert-success').fadeOut(300);
		        window.location.reload(true);

		       },3000);
		     } else {
		      $('#apply-job-modal').animate({
		        scrollTop: $('html, body').offset().top //#DIV_ID is an example. Use the id of your destination on the page
		    });
		         $('.apply-job-general-alert').html('<div class="alert alert-danger">' + data.error + '</div>');
		         $('.alert-danger').fadeIn(300);
		         setTimeout(function (argument) {
		          $('.alert-danger').fadeOut(300);
		         },3000);
		     }
		     $('form.apply-job-form').find('.last-sett-btn .ball-pulse').fadeOut(100);
		    }
		  });
		});
</script>