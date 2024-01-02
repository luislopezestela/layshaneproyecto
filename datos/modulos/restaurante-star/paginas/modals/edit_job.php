<div class="modal fade sun_modal" id="edit-job-modal-<?php echo $wo['story']['job']['id']; ?>" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg> <?php echo $wo['lang']['edit_job'] ?></h4>
			</div>
			<form class="edit-job-form form-horizontal" method="post">
				<div class="modal-body">
					<div class="wo_settings_page wo_create_job_box">
						<div class="app-general-alert setting-update-alert"></div>
						<div class="clear"></div>
						<div class="setting-panel job-setting-panel">
							<!-- Text input-->
							<div class="row">
								<div class="col-lg-6">
									<div class="sun_input">
										<label for="job_title"><?php echo $wo['lang']['job_title'] ?></label>  
										<input id="job_title" name="job_title" type="text" class="form-control input-md" placeholder="<?php echo $wo['lang']['job_title'] ?>" value="<?php echo $wo['story']['job']['title']; ?>" autocomplete="off">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="sun_input">
										<label for="location"><?php echo $wo['lang']['location'] ?></label>  
										<input id="location" name="location" type="text" class="form-control input-md" placeholder="<?php echo $wo['lang']['location'] ?>" value="<?php echo $wo['story']['job']['location']; ?>" autocomplete="off">
									</div>
								</div>
							</div>

							<label><?php echo $wo['lang']['salary_range'] ?></label>
							<div class="wo_create_job_box_flex wo_create_job_box_flex_edit">
								<div class="sun_input">
									<input id="minimum" name="minimum" type="text" class="form-control input-md" placeholder="<?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']] .' '. $wo['lang']['minimum'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $wo['story']['job']['minimum']; ?>" autocomplete="off">
								</div>
								<?php echo $wo['lang']['to'] ?>
								<div class="sun_input">
									<input id="maximum" name="maximum" type="text" class="form-control input-md" placeholder="<?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']] .' '. $wo['lang']['maximum'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?php echo $wo['story']['job']['maximum']; ?>" autocomplete="off">
								</div>
								<div class="sun_input">
									<select id="salary_date" name="salary_date" class="form-control input-md">
										<option value="per_hour" <?php echo $wo['story']['job']['salary_date'] == 'per_hour' ? 'selected' : ''; ?>><?php echo $wo['lang']['per_hour'] ?></option>
										<option value="per_day" <?php echo $wo['story']['job']['salary_date'] == 'per_day' ? 'selected' : ''; ?>><?php echo $wo['lang']['per_day'] ?></option>
										<option value="per_week" <?php echo $wo['story']['job']['salary_date'] == 'per_week' ? 'selected' : ''; ?>><?php echo $wo['lang']['per_week'] ?></option>
										<option value="per_month" <?php echo $wo['story']['job']['salary_date'] == 'per_month' ? 'selected' : ''; ?>><?php echo $wo['lang']['per_month'] ?></option>
										<option value="per_year" <?php echo $wo['story']['job']['salary_date'] == 'per_year' ? 'selected' : ''; ?>><?php echo $wo['lang']['per_year'] ?></option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="sun_input">
										<label for="job_type"><?php echo $wo['lang']['job_type'] ?></label> 
										<select id="job_type" name="job_type" class="form-control input-md">
											<option value="full_time" <?php echo $wo['story']['job']['job_type'] == 'full_time' ? 'selected' : ''; ?>><?php echo $wo['lang']['full_time'] ?></option>
											<option value="part_time" <?php echo $wo['story']['job']['job_type'] == 'part_time' ? 'selected' : ''; ?>><?php echo $wo['lang']['part_time'] ?></option>
											<option value="internship" <?php echo $wo['story']['job']['job_type'] == 'internship' ? 'selected' : ''; ?>><?php echo $wo['lang']['internship'] ?></option>
											<option value="volunteer" <?php echo $wo['story']['job']['job_type'] == 'volunteer' ? 'selected' : ''; ?>><?php echo $wo['lang']['volunteer'] ?></option>
											<option value="contract" <?php echo $wo['story']['job']['job_type'] == 'contract' ? 'selected' : ''; ?>><?php echo $wo['lang']['contract'] ?></option>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="sun_input">
										<label for="category"><?php echo $wo['lang']['category'] ?></label>  
										<select class="form-control" name="category" id="category">
											<?php foreach ($wo['job_categories'] as $category_id => $category_name) {?>
												<option value="<?php echo $category_id?>" <?php echo $wo['story']['job']['category'] == $category_id ? 'selected' : ''; ?>><?php echo $category_name; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="sun_input">
								<label for="description"><?php echo $wo['lang']['description'] ?></label>  
								<textarea class="form-control" name="description" rows="3" id="description" placeholder="<?php echo $wo['lang']['description'] ?>"><?php echo br2nl($wo['story']['job']['description']); ?></textarea>
								<span class="help-block"><?php echo $wo['lang']['job_des_text'] ?></span>	
							</div>
						</div>

						<div class="publisher-hidden-option">
							<div id="progress" class="create-product-progress">
								<span id="percent" class="create-product-percent <?php echo lui_RightToLeft('pull-right');?>">0%</span>
								<div class="progress">
									<div id="bar" class="progress-bar active create-product-bar"></div> 
								</div>
								<div class="clear"></div>
							</div>
						</div>

						<input type="hidden" name="job_id" id="job_id" class="form-control input-md" value="<?php echo $wo['story']['job']['id'];?>" autocomplete="off">
						<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>" autocomplete="off">
					</div>
				</div>
				<div class="form-group last-sett-btn modal-footer">
					<div class="ball-pulse"><div></div><div></div><div></div></div>
					<button type="submit" class="btn btn-main setting-panel-mdbtn"><?php echo $wo['lang']['publish'] ?></button>
				</div>
			</form>
		</div>
	</div>
</div>