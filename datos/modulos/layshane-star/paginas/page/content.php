<div class="row page-margin wo_page_profile" data-page="page" data-id="<?php echo $wo['page_profile']['page_id'];?>">
	<div class="profile-container">
		<div class="card hovercard">
			<div class="cardheader user-cover">
				<?php if($wo['page_profile']['is_page_onwer'] == true) { ?>
					<form action="#" method="post" class="profile-cover-changer">
						<div class="input-group">
							<span class="input-group-btn profile_cover">
								<span class="btn btn-upload-image btn-file">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
									<input type="file" name="cover" accept="image/x-png, image/jpeg" onchange="Wo_UpdateProfileCover();">
								</span>
							</span>
						</div>
						<input type="hidden" name="page_id" value="<?php echo $wo['page_profile']['page_id'];?>">
					</form>
				<?php } ?>
				<div class="user-cover-uploading-container"></div>
				<div class="user-cover-uploading-progress">
					<div class="pace-activity-parent"><div class="pace-activity"></div></div>
				</div>
				<img id="cover-image" src="<?php echo $wo['page_profile']['cover']?>" alt="<?php echo $wo['page_profile']['name']?> Cover Image"/>
			</div>
		</div>

		<div class="page-info-cont row">
			<div class="col-xs-12 col-sm-9 col-md-7 first_row">
				<div class="user-avatar flip">
					<div class="user-avatar-uploading-container">
						<div class="user-avatar-uploading-progress">
							<div class="ball-pulse"><div></div><div></div><div></div></div>
						</div>
					</div>
					<img id="page-avatar-image" alt="<?php echo $wo['page_profile']['name']?> Profile Picture" src="<?php echo $wo['page_profile']['avatar']?>"/>
					<?php if($wo['page_profile']['is_page_onwer'] == true) { ?>
						<form action="#" method="post" class="profile-avatar-changer">
							<div class="input-group profile_avatar">
								<span class="input-group-btn">
									<span class="btn btn-upload-image btn-file">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
										<input type="file" name="avatar" accept="image/x-png, image/jpeg" onchange="Wo_UpdateProfileAvatar();">
									</span>
								</span>
							</div>
							<input type="hidden" name="page_id" id="page-id" value="<?php echo $wo['page_profile']['page_id'];?>">
						</form>
					<?php } ?>
				</div>
				<div class="info">
					<div class="title">
						<a href="<?php echo $wo['page_profile']['url'];?>" data-ajax="?link1=timeline&u=<?php echo $wo['page_profile']['page_name'];?>"><?php echo $wo['page_profile']['name']; ?></a>
						<?php if($wo['page_profile']['verified'] == 1) {   ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="verified-color feather feather-check-circle" title="Verified Page" data-toggle="tooltip"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"></path></svg>
						<?php } ?>
						<div class="page_username">
							@<?php echo $wo['page_profile']['username']; ?>
						</div>
						
						<div class="options-buttons">
							<span class="user-follow-button page-like-btn">
								<?php echo lui_GetLikeButton($wo['page_profile']['page_id']);?>
							</span>
							<span class="user-follow-button page-message-btn"><?php echo lui_GetPageMessageButton($wo['page_profile']['page_id']);?></span>
							<?php if ($wo['page_profile']['is_page_onwer'] == true) { ?>
								<?php if ($wo['config']['job_system'] == 1 && lui_IsPageOnwer($wo['page_profile']['page_id'],false) && $wo['config']['can_use_jobs']) { ?>
									<a data-ajax="?link1=timeline&u=<?php echo $wo['page_profile']['page_name'];?>&type=jobs" href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['page_profile']['page_name'] . '&type=jobs');?>" class="btn btn-success btn-sm btn-mat"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg> <?php echo $wo['lang']['create_job']; ?></a>
								<?php } ?>
								<?php if ($wo['config']['offer_system'] == 1 && lui_IsPageOnwer($wo['page_profile']['page_id'],false) && $wo['config']['can_use_offer']) { ?>
									<a data-ajax="?link1=timeline&u=<?php echo $wo['page_profile']['page_name'];?>&type=offer" href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['page_profile']['page_name'] . '&type=offer');?>" class="btn btn-info btn-sm btn-mat"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg> <?php echo $wo['lang']['offer']; ?></a>
								<?php } ?>
								<a href="<?php echo lui_SeoLink('index.php?link1=page-setting&page=' .  $wo['page_profile']['page_name']); ?>" data-ajax="?link1=page-setting&page=<?php echo $wo['page_profile']['page_name'];?>" class="btn btn-default btn-sm btn-mat"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg> <?php echo $wo['lang']['edit']; ?></a>
							<?php } ?>
							<span class="user-follow-button page_info_cta">
								<?php echo lui_GetCallInAction($wo['page_profile']['call_action_type'], $wo['page_profile']['call_action_type_url']);?>
							</span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-3 col-md-5 last_row">
				<div class="page_info">
					<svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M23,10C23,8.89 22.1,8 21,8H14.68L15.64,3.43C15.66,3.33 15.67,3.22 15.67,3.11C15.67,2.7 15.5,2.32 15.23,2.05L14.17,1L7.59,7.58C7.22,7.95 7,8.45 7,9V19A2,2 0 0,0 9,21H18C18.83,21 19.54,20.5 19.84,19.78L22.86,12.73C22.95,12.5 23,12.26 23,12V10M1,21H5V9H1V21Z" /></svg>
					<?php echo lui_CountPageLikes($wo['page_profile']['page_id']);?> <?php echo $wo['lang']['people_likes_this']; ?>
				</div>
				<?php  if(!empty($wo['page_profile']['phone'])) {  ?>
					<div class="page_info">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone" data-toggle="tooltip" title="<?php echo $wo['lang']['phone_number']; ?>"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
						<span><?php echo $wo['page_profile']['phone']?></span>
					</div>
				<?php  }  ?>
			</div>
			<div class="col-md-12" style="position: static">
				
				<div class="page_navbar">
					<ul>
						<li>
							<?php  if($wo['config']['pro'] == 1 && $wo['page_profile']['is_page_onwer'] == true) {  ?>
								<?php if ($wo['user']['is_pro'] == 1) { ?>
								<?php if (in_array($wo['user']['pro_type'], array_keys($wo['pro_packages'])) && $wo['pro_packages'][$wo['user']['pro_type']]['pages_promotion'] > 0) {?>
								<?php if ($wo['page_profile']['boosted'] == 0) {?>
									<a href="<?php echo $wo['marker'];?>boosted">
										<svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24"><path fill="#ff5722" d="M7,2V13H10V22L17,10H13L17,2H7Z" /></svg> <?php echo $wo['lang']['boost_page'];?>
									</a>
								<?php } else { ?>
									<a href="<?php echo $wo['marker'];?>un-boost">
										<svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24"><path fill="#ff5722" d="M17,10H13L17,2H7V4.18L15.46,12.64M3.27,3L2,4.27L7,9.27V13H10V22L13.58,15.86L17.73,20L19,18.73L3.27,3Z" /></svg> <?php echo $wo['lang']['un_boost_page'];?>
									</a>
								<?php } ?>
								<?php  }  ?>
								<?php  } else {  ?>
									<a href="<?php echo lui_SeoLink('index.php?link1=go-pro');?>">
										<svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24"><path fill="#ff5722" d="M7,2V13H10V22L17,10H13L17,2H7Z" /></svg> <?php echo $wo['lang']['boost_page'];?>
									</a>
								<?php  }  ?>
							<?php  }  ?>
						</li>
						
						<?php if ($wo['loggedin'] && $wo['page_profile']['user_id'] != $wo['user']['id']) { ?>
							<li>
								<a data-ajax="?link1=timeline&u=<?php echo $wo['page_profile']['page_name'];?>&type=rating" href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['page_profile']['page_name'] . '&type=rating');?>">
									<svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24"><path fill="#FF9800" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z" /></svg> <?php echo $wo['lang']['rating'] ?>
								</a>
							</li>
						<?php  }  ?>
						
						<li>
							<a data-ajax="?link1=timeline&u=<?php echo $wo['page_profile']['page_name'];?>&type=invite" href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['page_profile']['page_name'] . '&type=invite');?>">
								<svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24"><path fill="#e91e63" d="M19 17V19H7V17S7 13 13 13 19 17 19 17M16 8A3 3 0 1 0 13 11A3 3 0 0 0 16 8M19.2 13.06A5.6 5.6 0 0 1 21 17V19H24V17S24 13.55 19.2 13.06M18 5A2.91 2.91 0 0 0 17.11 5.14A5 5 0 0 1 17.11 10.86A2.91 2.91 0 0 0 18 11A3 3 0 0 0 18 5M8 10H5V7H3V10H0V12H3V15H5V12H8Z" /></svg> <?php echo $wo['lang']['page_inviate_label']; ?>
							</a>
						</li>
						<?php if ($wo['loggedin'] && !lui_IsAdmin() && $wo['user']['id'] != $wo['page_profile']['user_id'] && !lui_IsAdmin($wo['page_profile']['user_id'])): ?>
						<li>
							<div class="dropdown">
								<a href="#" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									<svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24"><path fill="#673ab7" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" /></svg> <?php echo $wo['lang']['more']; ?>
								</a>
								<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
									<?php if (!lui_IsReportExists($wo['page_profile']['page_id'],'page')): ?>
										<li id="report_status" class="pointer" onclick="$('#report_page').modal('show');">
											<span class="menu-item">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
												<?php echo $wo['lang']['report_page']; ?>
											</span>
										</li>
									<?php else: ?>
										<li id="report_status" class="pointer" onclick="Wo_ReportPage(<?php echo $wo['page_profile']['page_id']; ?>,false);">
											<span class="menu-item">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
												<?php echo $wo['lang']['unreport']; ?>
											</span>
										</li>
									<?php endif; ?>
								</ul>
							</div>
						</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>  
	</div>
	
	<div class="col-md-8">
		<?php if ( $wo['loggedin'] == true && isset($_GET['type']) && $_GET['type'] == 'rating'): ?>
			<div class="page-margin wow_content mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg></span> <?php echo $wo['lang']['reviews']; ?>: <?php echo  number_format($wo['page_profile']['rating'], 1); ?>
					</div>
				</div>
			</div>
			<div class="list-group profile-lists">
				<div class="setting-well" id="page_reviews_cont">
					<?php
						$page_reviews = lui_GetPageReviews($wo['page_profile']['page_id']);
						if (count($page_reviews) > 0) {
							foreach ($page_reviews as $wo['review']) {
								echo lui_LoadPage('page/review-list');
							}
						} 
						else{
							echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>' . 'No reviews found' . '</div>';
						}
					?>
					<div class="clear"></div>
				</div>
			</div>
			<?php if (count($page_reviews) > 0): ?>
				<div class="posts_load">
					<div class="load-more">
						<button class="btn btn-default text-center pointer" onclick="Wo_LoadPageReviews(this);">
						<i class="fa fa-arrow-down progress-icon" data-icon="arrow-down"></i> <?php echo $wo['lang']['load_more'] ?></button>
					</div>
				</div>           
			<?php endif; ?>      
		<?php endif; ?>
		
		<?php
            if (isset($_GET['type'])) {
			if ($_GET['type'] == 'invite') {
		?>
			<div class="page-margin wow_content mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M19 17V19H7V17S7 13 13 13 19 17 19 17M16 8A3 3 0 1 0 13 11A3 3 0 0 0 16 8M19.2 13.06A5.6 5.6 0 0 1 21 17V19H24V17S24 13.55 19.2 13.06M18 5A2.91 2.91 0 0 0 17.11 5.14A5 5 0 0 1 17.11 10.86A2.91 2.91 0 0 0 18 11A3 3 0 0 0 18 5M8 10H5V7H3V10H0V12H3V15H5V12H8Z"></path></svg></span> <?php echo $wo['lang']['invite_your_frineds']; ?>
					</div>
				</div>
			</div>
			<div class="list-group profile-lists">
				<div class="row" style="margin: 0;">
					<?php
						if (lui_CountPageInvites($wo['page_profile']['page_id']) == 0) {
							echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z" /></svg>' . $wo['lang']['not_invite'] . '</div>';
						} else {
							foreach (lui_GetPageInvites($wo['page_profile']['page_id']) as $wo['UsersList']) {
							echo lui_LoadPage('page/invite-list');
						}
						}
					?>
				</div>
				<div class="clear"></div>
			</div>
		<?php }elseif ($_GET['type'] == 'jobs' && $wo['config']['job_system'] == 1 && lui_IsPageOnwer($wo['page_profile']['page_id'],false)) {
			$page_jobs = lui_GetPosts(array('filter_by' => 'job', 'page_id' => $wo['page_profile']['page_id'])); 
			if (!empty($page_jobs)) { 
				if ($wo['page_profile']['is_page_onwer'] == true && $wo['config']['can_use_jobs']) {
					echo '<div class="list-group profile-lists"><h5 class="search-filter-center-text empty_state" style="margin: 30px 0;"><svg version="1.1" class="feather" style="width: 80px;height: 80px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve"> <path style="fill:#C9C6CA;" d="M314.718,269.29l-47.055-18.512H100.638L53.583,269.29c-18.043,7.098-29.615,24.839-28.839,44.212 l5.713,142.631c0.326,8.143,7.022,14.577,15.172,14.577h277.044c8.15,0,14.846-6.433,15.172-14.577l5.713-142.631 C344.333,294.129,332.761,276.388,314.718,269.29z"/> <polygon style="fill:#6E4B53;" points="173.064,303.684 163.351,470.71 204.95,470.71 195.237,303.684 "/> <path style="fill:#5C414B;" d="M191.077,311.276h-13.852c-4.561,0-8.258-3.697-8.258-8.258v-22.11h30.368v22.11 C199.335,307.579,195.637,311.276,191.077,311.276z"/> <rect x="131.01" y="189.8" style="fill:#E6AF78;" width="106.29" height="91.11"/> <path style="fill:#D29B6E;" d="M131.006,218.153c15.056,10.843,33.443,17.202,53.145,17.202s38.088-6.359,53.145-17.202v-28.35 h-106.29V218.153z"/> <path style="fill:#6E4B53;" d="M184.151,0.239c-37.905,2.049-59.471,22.776-59.471,22.776s-31.634,0-31.634,37.96 c0,30.368,7.592,60.498,7.592,60.498h174.618C290.44,37.961,254.377-3.557,184.151,0.239z"/> <path style="fill:#5C414B;" d="M138.598,90.144c-27.89-34.87-13.919-67.129-13.919-67.129s-31.634,0-31.634,37.96 c0,30.368,7.592,60.498,7.592,60.498h37.96L138.598,90.144L138.598,90.144z"/> <path style="fill:#F0C087;" d="M267.663,113.882h-7.592l-10.004-18.258c-1.58-2.883-4.869-4.36-8.103-3.768 c-50.001,9.146-82.861-2.476-95.312-8.294c-3.262-1.524-7.145-0.522-9.241,2.405c-7.683,10.731-16.161,19.189-21.245,23.869 c-2.822,2.599-6.486,4.044-10.323,4.044h-5.463c-0.004,0-0.007,0.002-0.012,0.002c-0.832,0.015-1.682,0.103-2.547,0.27 c-7.389,1.428-12.368,8.492-12.368,16.017v5.502c0,7.262,4.65,14.112,11.721,15.763c1.593,0.372,3.143,0.477,4.627,0.359 c3.775-0.301,7.07,2.446,7.75,6.171c6.454,35.374,37.36,62.204,74.599,62.204s68.144-26.83,74.599-62.204 c0.655-3.588,3.752-6.201,7.35-6.125h1.564c8.386,0,15.184-6.798,15.184-15.184v-7.592 C282.848,120.68,276.049,113.882,267.663,113.882z"/> <path style="fill:#E6AF78;" d="M138.598,144.25V84.809c-0.413,0.365-0.854,0.694-1.187,1.159 c-7.683,10.731-16.161,19.189-21.245,23.869c-2.822,2.599-6.486,4.044-10.323,4.044h-5.463c-0.004,0-0.007,0.002-0.012,0.002 c-0.832,0.015-1.682,0.103-2.547,0.27c-7.389,1.428-12.368,8.492-12.368,16.017v5.502c0,7.262,4.65,14.112,11.721,15.763 c1.593,0.372,3.143,0.477,4.627,0.359c3.775-0.301,7.07,2.446,7.75,6.171c6.454,35.374,37.36,62.204,74.599,62.204 c5.162,0,10.184-0.563,15.054-1.546C164.616,211.54,138.598,180.934,138.598,144.25z"/> <g> <path style="fill:#DBD9DC;" d="M184.151,281.146l-55.391-48.467c-3.008-2.632-7.542-2.481-10.368,0.345l-17.754,17.754 l35.279,52.918c5.315,7.973,16.595,9.09,23.371,2.314L184.151,281.146z"/> <path style="fill:#DBD9DC;" d="M184.151,281.146l55.391-48.467c3.008-2.632,7.542-2.481,10.368,0.345l17.754,17.754l-35.279,52.918 c-5.315,7.973-16.595,9.09-23.371,2.314L184.151,281.146z"/> <path style="fill:#DBD9DC;" d="M64.518,320.948l-33.03-33.03c-4.608,7.519-7.115,16.346-6.745,25.584l5.713,142.631 c0.326,8.143,7.023,14.577,15.172,14.577h32.233V353.158C77.861,341.078,73.061,329.491,64.518,320.948z"/> </g> <g> <path style="fill:#6E4B53;" d="M330.389,305.548c0-4.552,3.702-8.258,8.258-8.258h49.548c4.556,0,8.258,3.706,8.258,8.258v33.032 h16.516v-33.032c0-13.661-11.113-24.774-24.774-24.774h-49.548c-13.661,0-24.774,11.113-24.774,24.774v33.032h16.516V305.548z"/> <path style="fill:#6E4B53;" d="M247.809,371.613v116.453c0,13.219,10.716,23.934,23.934,23.934h183.358 c13.218,0,23.934-10.716,23.934-23.934V371.613H247.809z"/> </g> <path style="fill:#825A5A;" d="M363.422,437.677c14.479,0,28.377-1.196,41.293-3.394l33.023-8.527 c30.091-10.881,49.555-28.206,49.555-47.72v-22.939c0-13.682-11.092-24.774-24.774-24.774H264.325 c-13.682,0-24.774,11.092-24.774,24.774v22.939c0,19.514,19.464,36.839,49.555,47.72l33.023,8.527 C335.044,436.481,348.943,437.677,363.422,437.677z"/> <g> <path style="fill:#C9C6CA;" d="M305.615,454.194L305.615,454.194c-9.122,0-16.516-7.395-16.516-16.516v-16.516 c0-4.561,3.697-8.258,8.258-8.258h16.516c4.561,0,8.258,3.697,8.258,8.258v16.516C322.131,446.799,314.737,454.194,305.615,454.194 z"/> <path style="fill:#C9C6CA;" d="M421.228,454.194L421.228,454.194c-9.122,0-16.516-7.395-16.516-16.516v-16.516 c0-4.561,3.697-8.258,8.258-8.258h16.516c4.561,0,8.258,3.697,8.258,8.258v16.516C437.744,446.799,430.35,454.194,421.228,454.194z "/> </g> <g> <circle style="fill:#DBD9DC;" cx="305.62" cy="437.68" r="8.258"/> <circle style="fill:#DBD9DC;" cx="421.23" cy="437.68" r="8.258"/> </g></svg>' . str_replace('{{page_name}}', $wo['page_profile']['page_name'], $wo['lang']['post_job_text']).' '.$wo['config']['siteName'] . '.<br><br><br><br>'.($wo['config']['can_use_jobs'] ? '<span class="btn btn-main btn-mat" onclick="OpenCreateJobModal()">'.$wo['lang']['create_job'].' </span>' : '').'</h5></div>';
				}
				
				?>
				<div id="posts" data-story-page="<?php echo $wo['page_profile']['page_id'];?>">
					<div class="post-container sun_post">
						<input id="page_post_jobs_filter" type="hidden">
						
				<?php foreach ($page_jobs as $key => $wo['story']) {
					$wo['story']['job']['page_type'] = 'page';
					echo lui_LoadPage('story/includes/job');
				} ?>
					</div>
				</div>
				<?php }
			else{
				if ($wo['page_profile']['is_page_onwer'] == true && $wo['config']['can_use_jobs']) {
					echo '<div class="list-group profile-lists"><h5 class="search-filter-center-text empty_state"><svg version="1.1" class="feather" style="width: 80px;height: 80px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve"> <path style="fill:#C9C6CA;" d="M314.718,269.29l-47.055-18.512H100.638L53.583,269.29c-18.043,7.098-29.615,24.839-28.839,44.212 l5.713,142.631c0.326,8.143,7.022,14.577,15.172,14.577h277.044c8.15,0,14.846-6.433,15.172-14.577l5.713-142.631 C344.333,294.129,332.761,276.388,314.718,269.29z"/> <polygon style="fill:#6E4B53;" points="173.064,303.684 163.351,470.71 204.95,470.71 195.237,303.684 "/> <path style="fill:#5C414B;" d="M191.077,311.276h-13.852c-4.561,0-8.258-3.697-8.258-8.258v-22.11h30.368v22.11 C199.335,307.579,195.637,311.276,191.077,311.276z"/> <rect x="131.01" y="189.8" style="fill:#E6AF78;" width="106.29" height="91.11"/> <path style="fill:#D29B6E;" d="M131.006,218.153c15.056,10.843,33.443,17.202,53.145,17.202s38.088-6.359,53.145-17.202v-28.35 h-106.29V218.153z"/> <path style="fill:#6E4B53;" d="M184.151,0.239c-37.905,2.049-59.471,22.776-59.471,22.776s-31.634,0-31.634,37.96 c0,30.368,7.592,60.498,7.592,60.498h174.618C290.44,37.961,254.377-3.557,184.151,0.239z"/> <path style="fill:#5C414B;" d="M138.598,90.144c-27.89-34.87-13.919-67.129-13.919-67.129s-31.634,0-31.634,37.96 c0,30.368,7.592,60.498,7.592,60.498h37.96L138.598,90.144L138.598,90.144z"/> <path style="fill:#F0C087;" d="M267.663,113.882h-7.592l-10.004-18.258c-1.58-2.883-4.869-4.36-8.103-3.768 c-50.001,9.146-82.861-2.476-95.312-8.294c-3.262-1.524-7.145-0.522-9.241,2.405c-7.683,10.731-16.161,19.189-21.245,23.869 c-2.822,2.599-6.486,4.044-10.323,4.044h-5.463c-0.004,0-0.007,0.002-0.012,0.002c-0.832,0.015-1.682,0.103-2.547,0.27 c-7.389,1.428-12.368,8.492-12.368,16.017v5.502c0,7.262,4.65,14.112,11.721,15.763c1.593,0.372,3.143,0.477,4.627,0.359 c3.775-0.301,7.07,2.446,7.75,6.171c6.454,35.374,37.36,62.204,74.599,62.204s68.144-26.83,74.599-62.204 c0.655-3.588,3.752-6.201,7.35-6.125h1.564c8.386,0,15.184-6.798,15.184-15.184v-7.592 C282.848,120.68,276.049,113.882,267.663,113.882z"/> <path style="fill:#E6AF78;" d="M138.598,144.25V84.809c-0.413,0.365-0.854,0.694-1.187,1.159 c-7.683,10.731-16.161,19.189-21.245,23.869c-2.822,2.599-6.486,4.044-10.323,4.044h-5.463c-0.004,0-0.007,0.002-0.012,0.002 c-0.832,0.015-1.682,0.103-2.547,0.27c-7.389,1.428-12.368,8.492-12.368,16.017v5.502c0,7.262,4.65,14.112,11.721,15.763 c1.593,0.372,3.143,0.477,4.627,0.359c3.775-0.301,7.07,2.446,7.75,6.171c6.454,35.374,37.36,62.204,74.599,62.204 c5.162,0,10.184-0.563,15.054-1.546C164.616,211.54,138.598,180.934,138.598,144.25z"/> <g> <path style="fill:#DBD9DC;" d="M184.151,281.146l-55.391-48.467c-3.008-2.632-7.542-2.481-10.368,0.345l-17.754,17.754 l35.279,52.918c5.315,7.973,16.595,9.09,23.371,2.314L184.151,281.146z"/> <path style="fill:#DBD9DC;" d="M184.151,281.146l55.391-48.467c3.008-2.632,7.542-2.481,10.368,0.345l17.754,17.754l-35.279,52.918 c-5.315,7.973-16.595,9.09-23.371,2.314L184.151,281.146z"/> <path style="fill:#DBD9DC;" d="M64.518,320.948l-33.03-33.03c-4.608,7.519-7.115,16.346-6.745,25.584l5.713,142.631 c0.326,8.143,7.023,14.577,15.172,14.577h32.233V353.158C77.861,341.078,73.061,329.491,64.518,320.948z"/> </g> <g> <path style="fill:#6E4B53;" d="M330.389,305.548c0-4.552,3.702-8.258,8.258-8.258h49.548c4.556,0,8.258,3.706,8.258,8.258v33.032 h16.516v-33.032c0-13.661-11.113-24.774-24.774-24.774h-49.548c-13.661,0-24.774,11.113-24.774,24.774v33.032h16.516V305.548z"/> <path style="fill:#6E4B53;" d="M247.809,371.613v116.453c0,13.219,10.716,23.934,23.934,23.934h183.358 c13.218,0,23.934-10.716,23.934-23.934V371.613H247.809z"/> </g> <path style="fill:#825A5A;" d="M363.422,437.677c14.479,0,28.377-1.196,41.293-3.394l33.023-8.527 c30.091-10.881,49.555-28.206,49.555-47.72v-22.939c0-13.682-11.092-24.774-24.774-24.774H264.325 c-13.682,0-24.774,11.092-24.774,24.774v22.939c0,19.514,19.464,36.839,49.555,47.72l33.023,8.527 C335.044,436.481,348.943,437.677,363.422,437.677z"/> <g> <path style="fill:#C9C6CA;" d="M305.615,454.194L305.615,454.194c-9.122,0-16.516-7.395-16.516-16.516v-16.516 c0-4.561,3.697-8.258,8.258-8.258h16.516c4.561,0,8.258,3.697,8.258,8.258v16.516C322.131,446.799,314.737,454.194,305.615,454.194 z"/> <path style="fill:#C9C6CA;" d="M421.228,454.194L421.228,454.194c-9.122,0-16.516-7.395-16.516-16.516v-16.516 c0-4.561,3.697-8.258,8.258-8.258h16.516c4.561,0,8.258,3.697,8.258,8.258v16.516C437.744,446.799,430.35,454.194,421.228,454.194z "/> </g> <g> <circle style="fill:#DBD9DC;" cx="305.62" cy="437.68" r="8.258"/> <circle style="fill:#DBD9DC;" cx="421.23" cy="437.68" r="8.258"/> </g></svg>' . str_replace('{{page_name}}', $wo['page_profile']['page_name'], $wo['lang']['post_job_text']) .$wo['config']['siteName'] . '.<br><br><br><br>'
					.($wo['config']['can_use_jobs'] ? '<span class="btn btn-main btn-mat" onclick="OpenCreateJobModal()">'.$wo['lang']['create_job'].' </span>' : '').'</h5></div>';
				} else {
					echo '<div class="list-group profile-lists"><h5 class="search-filter-center-text empty_state"><svg version="1.1" class="feather" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 80px;height: 80px;" xml:space="preserve"> <path style="fill:#5A5A5A;" d="M361,76v30c0,8.399-6.599,15-15,15h-15V76c0-8.401-6.599-15-15-15H196c-8.401,0-15,6.599-15,15v45 h-15c-8.401,0-15-6.601-15-15V76c0-24.901,20.099-45,45-45h120C340.901,31,361,51.099,361,76z"/> <path style="fill:#444444;" d="M316,61h-60V31h60c24.901,0,45,20.099,45,45v30c0,8.399-6.599,15-15,15h-15V76 C331,67.599,324.401,61,316,61z"/> <path style="fill:#5A5A5A;" d="M512,106v330c0,24.899-20.099,45-45,45H45c-24.901,0-45-20.101-45-45V106c0-4.2,1.8-7.8,4.501-10.501 L81,267.7h350l76.5-172.202C510.2,98.2,512,101.8,512,106z"/> <path style="fill:#444444;" d="M512,106v330c0,24.899-20.099,45-45,45H256V267.7h175l76.5-172.202C510.2,98.2,512,101.8,512,106z"/> <path style="fill:#6E6E6E;" d="M507.499,95.499L461,267.7c-5.4,19.799-23.099,33.3-43.5,33.3H94.501C74.099,301,56.4,287.5,51,267.7 L4.501,95.499C7.2,92.8,10.8,91,15,91h482C501.2,91,504.8,92.8,507.499,95.499z"/> <path style="fill:#5A5A5A;" d="M507.499,95.499L461,267.7c-5.4,19.799-23.099,33.3-43.5,33.3H256V91h241 C501.2,91,504.8,92.8,507.499,95.499z"/> <path style="fill:#FFD400;" d="M316,256H196c-8.401,0-15,6.599-15,15v60c0,8.399,6.599,15,15,15h120c8.401,0,15-6.601,15-15v-60 C331,262.599,324.401,256,316,256z"/> <path style="fill:#FDBF00;" d="M331,271v60c0,8.399-6.599,15-15,15h-60v-90h60C324.401,256,331,262.599,331,271z"/></svg>'.$wo['lang']['no_available_jobs'].'</h5></div>';
				}
			}
			?>
			<?php 
		    }elseif ($_GET['type'] == 'job_apply' && $wo['config']['job_system'] == 1 && !empty($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0 && $wo['page_profile']['user_id'] == $wo['user']['id']) {
		    	$job_apply = lui_GetApplyJob(array('job_id' => $_GET['id']));
			if (!empty($job_apply)) { ?>
				<div id="posts" data-story-page="<?php echo $wo['page_profile']['page_id'];?>" class="apply_job_info" data_apply_job="<?php echo($_GET['id']) ?>">
					<div class="post-container sun_post apply_job_container">
		<?php 	foreach ($job_apply as $key => $wo['job_apply']) {
					echo lui_LoadPage('page/job_apply');
				} ?>
					</div>
					<div class="posts_load">
						<?php if (count($job_apply) >= 1): ?>
							<div class="load-more">
								<div class="btn btn-default text-center pointer" id="load_more_nearby_users" onclick="Wo_LoadMoreApplyJobs();">
									<i class="fa fa-arrow-down progress-icon" data-icon="arrow-down"></i> 
									<?php echo $wo['lang']['load_more'] ?>
								</div>
							</div>
						<?php endif ?>
					</div>
				</div>
		  <?php  }
		    }
		    elseif ($_GET['type'] == 'offer' && $wo['config']['offer_system'] == 1 && lui_IsPageOnwer($wo['page_profile']['page_id'],false)) {
				if ($wo['page_profile']['is_page_onwer'] == true && $wo['config']['can_use_offer']) {
					echo '<div class="list-group profile-lists"><h5 class="search-filter-center-text empty_state" style="margin: 30px 0;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>' . str_replace('{{page_name}}', $wo['page_profile']['page_name'], $wo['lang']['post_offer_text']).' '.$wo['config']['siteName'] . '.<br><br><br><br><span class="btn btn-main btn-mat" onclick="OpenCreateOfferModal()">'.$wo['lang']['create_offer'].' </span></h5></div>';
				}
				$page_offer = lui_GetPosts(array('filter_by' => 'offer', 'page_id' => $wo['page_profile']['page_id'])); 
			if (!empty($page_offer)) { ?>

				<div id="posts" data-story-page="<?php echo $wo['page_profile']['page_id'];?>">
					<div class="post-container sun_post">
						<input id="page_post_offer_filter" type="hidden">
						
				<?php foreach ($page_offer as $key => $wo['story']) {
					echo lui_LoadPage('story/content');
				} ?>

					</div>
				</div>
				<?php 
			}
			}

		 } else { ?>
		
		<?php echo lui_GetPagePostPublisherBox($wo['page_profile']['page_id']); ?>
		
		<?php if ($wo['loggedin'] == true) { echo lui_LoadPage('story/filter-by'); } ?>
		
		<div id="posts" data-story-page="<?php echo $wo['page_profile']['page_id'];?>">
			<div class="pinned-post-container">
				<?php
					$pinedstory = lui_GetPinnedPost($wo['page_profile']['page_id'], 'page');
					if (count($pinedstory) == 1) {
						foreach ($pinedstory  as $wo['story']) {
							echo lui_LoadPage('story/content');
						}
					}
				?>
			</div>
			<?php
				$stories = lui_GetPosts(array('filter_by' => 'all', 'page_id' => $wo['page_profile']['page_id'],'placement' => 'multi_image_post')); 
				if (count($stories) == 0 && count($pinedstory) == 0) {
					echo lui_LoadPage('story/page-no-stories');
				} else {
					foreach ($stories as $wo['story']) {
						echo lui_LoadPage('story/content');
					}
				}
			?>
		</div>
		<?php if ($wo['loggedin'] == true && count($stories) > 0) {  ?>
			<div class="load-more pointer" id="load-more-posts" onclick="Wo_GetMorePosts();">
				<span class="btn btn-default"><i class="fa fa-chevron-circle-down progress-icon" data-icon="chevron-circle-down"></i> &nbsp;<?php echo $wo['lang']['load_more_posts']; ?><span>
			</div>
		<?php } } ?>
		<div id="load-more-filter">
			<span class="filter-by-more hidden" data-filter-by="all"></span>
		</div>
	</div>
	
	<div class="col-md-4">
		<?php if($wo['loggedin'] == true) {  ?>
			<div class="wow_content">
				<div class="wow_form_fields mt-0">
					<label class="mt-0" for="invite_your_frineds"><?php echo $wo['lang']['search_for_posts']; ?></label>
					<input type="text" class="search-for-posts" onkeyup="Wo_SearchForPosts(this.value);" />
				</div>
			</div>
		<?php } ?>
		
		<?php if ($wo['loggedin'] && $wo['page_profile']['user_id'] != $wo['user']['id']): ?>
			<ul class="page-margin wow_content negg_padd list-unstyled" style="padding: 6px 0px;">
				<li class="list-group-item hidden"><?php echo $wo['lang']['rating']; ?></li>
				<li class="list-group-item">
					<span class="pull-left"> 
						<a data-ajax="?link1=timeline&u=<?php echo $wo['page_profile']['page_name'];?>&type=rating" href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['page_profile']['page_name'] . '&type=rating');?>"><?php echo $wo['lang']['rating'] ?></a>:
					</span>
					<span class="page-rating">
						<fieldset>
							<?php
							$rating = lui_PageRating($wo['page_profile']['id'], $wo['user']['user_id']);
							?>
							<input type="radio" id="star5" name="rating" value="5" />
							<label for="star5" class="rate-page" data-val="5">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star <?php echo ($rating <= 5 && $rating > 4) ? 'active' : ''; ?>"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
							</label>
							<input type="radio" id="star4" name="rating" value="4" />
							<label for="star4" class="rate-page" data-val="4">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star <?php echo ($rating >= 4 && $rating > 3) ? 'active' : ''; ?>"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
							</label>
							<input type="radio" id="star3" name="rating" value="3" />
							<label for="star3" class="rate-page" data-val="3">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star <?php echo ($rating >= 3 && $rating > 2) ? 'active' : ''; ?>"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
							</label>
							<input type="radio" id="star2" name="rating" value="2" />
							<label for="star2" class="rate-page" data-val="2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star <?php echo ($rating >= 2 && $rating > 1) ? 'active' : ''; ?>"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
							</label>
							<input type="radio" id="star1" name="rating" value="1" />
							<label for="star1" class="rate-page" data-val="1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star <?php echo ($rating >= 1 && $rating > 0) ? 'active' : ''; ?>"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
							</label>
						</fieldset>
						<span class="clear"></span>
					</span>
					<span><?php echo  number_format($wo['page_profile']['rating'], 1); ?></span>
				</li>
			</ul>
		<?php endif; ?>

		<ul class="page-margin wow_content negg_padd list-unstyled event-options-list right_user_info">
			<div class="Wo_page_hdng">
				<div class="wo_page_hdng_innr">
					<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M13,9H11V7H13M13,17H11V11H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg></span> <?php echo $wo['lang']['info']; ?>
				</div>
			</div>
			<li class="list-group-item">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M23,10C23,8.89 22.1,8 21,8H14.68L15.64,3.43C15.66,3.33 15.67,3.22 15.67,3.11C15.67,2.7 15.5,2.32 15.23,2.05L14.17,1L7.59,7.58C7.22,7.95 7,8.45 7,9V19A2,2 0 0,0 9,21H18C18.83,21 19.54,20.5 19.84,19.78L22.86,12.73C22.95,12.5 23,12.26 23,12V10M1,21H5V9H1V21Z"></path></svg>
				<?php echo lui_CountPageLikes($wo['page_profile']['page_id']);?> <?php echo $wo['lang']['people_likes_this']; ?> 
				<?php if ($wo['page_profile']['is_page_onwer'] == true) { ?>
					<span class="green">+<?php echo lui_CountLikesThisWeek($wo['page_profile']['page_id']); ?> <?php echo $wo['lang']['this_week']; ?></span>
				<?php } ?>
			</li>
			<li class="list-group-item">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M11 4h10v2H11V4zm0 4h6v2h-6V8zm0 6h10v2H11v-2zm0 4h6v2h-6v-2zM3 4h6v6H3V4zm2 2v2h2V6H5zm-2 8h6v6H3v-6zm2 2v2h2v-2H5z"></path></svg>
				<?php echo lui_CountPagePosts($wo['page_profile']['page_id']);?> <?php echo $wo['lang']['posts']; ?>
			</li>
			<?php if ($wo['config']['job_system'] == 1){ ?>
				<?php if (lui_IsPageOnwer($wo['page_profile']['page_id'],false)) { ?>
					<?php if ($wo['config']['can_use_jobs']) { ?>
						<li class="list-group-item">
							<a data-ajax="?link1=timeline&u=<?php echo $wo['page_profile']['page_name'];?>&type=jobs" href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['page_profile']['page_name'] . '&type=jobs');?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z"></path></svg> <?php echo $wo['lang']['jobs']; ?>
							</a>
						</li>
					<?php } ?>
				<?php }else{ ?>
					<li class="list-group-item">
						<a data-ajax="?link1=timeline&u=<?php echo $wo['page_profile']['page_name'];?>&type=jobs" href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['page_profile']['page_name'] . '&type=jobs');?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z"></path></svg> <?php echo $wo['lang']['jobs']; ?>
						</a>
					</li>
				<?php } ?>
			<?php } ?>
			<?php if ($wo['config']['offer_system'] == 1){ ?>
				<?php if (lui_IsPageOnwer($wo['page_profile']['page_id'],false)) { ?>
					<?php if ($wo['config']['can_use_offer']) { ?>
						<li class="list-group-item">
							<a data-ajax="?link1=timeline&u=<?php echo $wo['page_profile']['page_name'];?>&type=offer" href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['page_profile']['page_name'] . '&type=offer');?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg> <?php echo $wo['lang']['offer']; ?>
							</a>
						</li>
					<?php } ?>
				<?php }else{ ?>
					    <li class="list-group-item">
							<a data-ajax="?link1=timeline&u=<?php echo $wo['page_profile']['page_name'];?>&type=offer" href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['page_profile']['page_name'] . '&type=offer');?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg> <?php echo $wo['lang']['offer']; ?>
							</a>
						</li>
				<?php } ?>
			<?php } ?>
			<?php if(!empty($wo['page_profile']['website'])) {  ?>
				<li class="list-group-item">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M3.9,12C3.9,10.29 5.29,8.9 7,8.9H11V7H7A5,5 0 0,0 2,12A5,5 0 0,0 7,17H11V15.1H7C5.29,15.1 3.9,13.71 3.9,12M8,13H16V11H8V13M17,7H13V8.9H17C18.71,8.9 20.1,10.29 20.1,12C20.1,13.71 18.71,15.1 17,15.1H13V17H17A5,5 0 0,0 22,12A5,5 0 0,0 17,7Z"></path></svg>
					<a href="<?php echo $wo['page_profile']['website']?>" target="_blank">
						<?php echo $wo['page_profile']['website']?>
					</a>
				</li>
			<?php } ?>
			<li class="list-group-item" style="padding-top:0; padding-bottom:0;">
                <hr>
            </li>
			<li class="list-group-item">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" title="<?php echo $wo['lang']['category']; ?>"><path fill="currentColor" d="M5.5,7A1.5,1.5 0 0,1 4,5.5A1.5,1.5 0 0,1 5.5,4A1.5,1.5 0 0,1 7,5.5A1.5,1.5 0 0,1 5.5,7M21.41,11.58L12.41,2.58C12.05,2.22 11.55,2 11,2H4C2.89,2 2,2.89 2,4V11C2,11.55 2.22,12.05 2.59,12.41L11.58,21.41C11.95,21.77 12.45,22 13,22C13.55,22 14.05,21.77 14.41,21.41L21.41,14.41C21.78,14.05 22,13.55 22,13C22,12.44 21.77,11.94 21.41,11.58Z"></path></svg>
				<?php echo $wo['page_profile']['category']; ?>
			</li>
			<?php if (!empty($wo['page_profile']['page_sub_category'])) { ?>
			<li class="list-group-item">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" title="<?php echo $wo['lang']['sub_category']; ?>"><path fill="currentColor" d="M5.5,7A1.5,1.5 0 0,1 4,5.5A1.5,1.5 0 0,1 5.5,4A1.5,1.5 0 0,1 7,5.5A1.5,1.5 0 0,1 5.5,7M21.41,11.58L12.41,2.58C12.05,2.22 11.55,2 11,2H4C2.89,2 2,2.89 2,4V11C2,11.55 2.22,12.05 2.59,12.41L11.58,21.41C11.95,21.77 12.45,22 13,22C13.55,22 14.05,21.77 14.41,21.41L21.41,14.41C21.78,14.05 22,13.55 22,13C22,12.44 21.77,11.94 21.41,11.58Z"></path></svg>
				<?php echo $wo['page_profile']['page_sub_category']; ?>
			</li>
			<?php } ?>
			<?php 
			    $fields = lui_GetCustomFields('page'); 
				if (!empty($fields)) {
					foreach ($fields as $key => $wo['field']) { 
						if (!empty($wo['page_profile']['fid_'.$wo['field']['id']])) {
							$text = $wo['page_profile']['fid_'.$wo['field']['id']];
							if ($wo['field']['type'] == 'selectbox') {
							     $options = @explode(',', $wo['field']['options']);
								foreach ($options as $key => $value) {
									if ($key + 1 == $wo['page_profile']['fid_'.$wo['field']['id']]) {
										$text = $options[$key];
									}
								}						
							}

						?>
						<li class="list-group-item">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" title="<?php echo $wo['lang']['sub_category']; ?>"><path fill="currentColor" d="M13.5,4A1.5,1.5 0 0,0 12,5.5A1.5,1.5 0 0,0 13.5,7A1.5,1.5 0 0,0 15,5.5A1.5,1.5 0 0,0 13.5,4M13.14,8.77C11.95,8.87 8.7,11.46 8.7,11.46C8.5,11.61 8.56,11.6 8.72,11.88C8.88,12.15 8.86,12.17 9.05,12.04C9.25,11.91 9.58,11.7 10.13,11.36C12.25,10 10.47,13.14 9.56,18.43C9.2,21.05 11.56,19.7 12.17,19.3C12.77,18.91 14.38,17.8 14.54,17.69C14.76,17.54 14.6,17.42 14.43,17.17C14.31,17 14.19,17.12 14.19,17.12C13.54,17.55 12.35,18.45 12.19,17.88C12,17.31 13.22,13.4 13.89,10.71C14,10.07 14.3,8.67 13.14,8.77Z"></path></svg>
							<?php echo $text; ?>
						</li>
			<?php } } } ?>
			<?php  if(!empty($wo['page_profile']['company'])) {  ?>
				<li class="list-group-item">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" title="<?php echo $wo['lang']['company']; ?>"><path fill="currentColor" d="M18,15H16V17H18M18,11H16V13H18M20,19H12V17H14V15H12V13H14V11H12V9H20M10,7H8V5H10M10,11H8V9H10M10,15H8V13H10M10,19H8V17H10M6,7H4V5H6M6,11H4V9H6M6,15H4V13H6M6,19H4V17H6M12,7V3H2V21H22V7H12Z"></path></svg>
					<?php echo $wo['page_profile']['company']?>
				</li>
			<?php  }  ?>
			<?php if(!empty($wo['page_profile']['address'])) {  ?>
				<li class="list-group-item">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"></path></svg>
					<span class="pointer" onclick="$('.user-location-frame').fadeToggle();"><?php echo $wo['lang']['located_in']; ?> <?php echo $wo['page_profile']['address'];?></span>
					<?php if (!empty($wo['config']['google_map_api']) && $wo['config']['google_map'] == 1) { ?>
						<iframe class="user-location-frame" width="100%" frameborder="0" style="border:0;margin-top: 10px;display: none;" src="https://www.google.com/maps/embed/v1/place?key=<?php echo $wo['config']['google_map_api']; ?>&q=<?php echo $wo['page_profile']['address'];?>&language=en"></iframe>
					<?php } ?>
					<?php if ($wo['config']['yandex_map'] == 1) { ?>
						<div id="place" <?php echo($wo['config']['yandex_map'] == 1 ? 'style="width: 100%; height: 300px; padding: 0; margin: 0;"' : '') ?>></div>
						<script type="text/javascript">
		        			<?php if (!empty($wo['page_profile']['address'])) { ?>
		        				setTimeout(function () {
		        					var myMap;
							        ymaps.geocode("<?php echo($wo['page_profile']['address']); ?>").then(function (res) {
							            myMap = new ymaps.Map('place', {
							                center: res.geoObjects.get(0).geometry.getCoordinates(),
							                zoom : 10
							            });
							            myMap.geoObjects.add(new ymaps.Placemark(res.geoObjects.get(0).geometry.getCoordinates(), {
									            balloonContent: ''
									        }));
							        });
		        				},1000);
					        <?php } ?>
		        		</script>
					<?php } ?>
				</li>
			<?php } ?>
			<?php if(!empty($wo['page_profile']['facebook']) || !empty($wo['page_profile']['twitter']) || !empty($wo['page_profile']['instgram']) || !empty($wo['page_profile']['linkedin']) || !empty($wo['page_profile']['vk'])) { ?>
				<li class="list-group-item text-muted" contenteditable="false">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M18,16.08C17.24,16.08 16.56,16.38 16.04,16.85L8.91,12.7C8.96,12.47 9,12.24 9,12C9,11.76 8.96,11.53 8.91,11.3L15.96,7.19C16.5,7.69 17.21,8 18,8A3,3 0 0,0 21,5A3,3 0 0,0 18,2A3,3 0 0,0 15,5C15,5.24 15.04,5.47 15.09,5.7L8.04,9.81C7.5,9.31 6.79,9 6,9A3,3 0 0,0 3,12A3,3 0 0,0 6,15C6.79,15 7.5,14.69 8.04,14.19L15.16,18.34C15.11,18.55 15.08,18.77 15.08,19C15.08,20.61 16.39,21.91 18,21.91C19.61,21.91 20.92,20.61 20.92,19A2.92,2.92 0 0,0 18,16.08Z"></path></svg>
					<?php echo $wo['lang']['social_links']; ?>
				</li>
				<li class="list-group-item user-social-links">
					<?php  if(!empty($wo['page_profile']['twitter'])) {  ?>
					<a class="social-btn" href="https://twitter.com/<?php echo $wo['page_profile']['twitter']?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-twitter" fill="#1da1f2"><path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33Z"></path></svg>
					</a>
					<?php }  if(!empty($wo['page_profile']['instgram'])) {  ?>
					<a class="social-btn" rel="publisher" href="https://instagram.com/<?php echo $wo['page_profile']['instgram']?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"></line></svg
					</a>
					<?php }  if(!empty($wo['page_profile']['facebook'])) {  ?>
					<a class="social-btn" rel="publisher" href="https://www.facebook.com/<?php echo $wo['page_profile']['facebook']?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-facebook" fill="#4267b2"><path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M18,5H15.5A3.5,3.5 0 0,0 12,8.5V11H10V14H12V21H15V14H18V11H15V9A1,1 0 0,1 16,8H18V5Z"></path></svg>
					</a>
					<?php }  if(!empty($wo['page_profile']['linkedin'])) {  ?>
					<a class="social-btn" rel="publisher" href="https://www.linkedin.com/profile/view?id=<?php echo $wo['page_profile']['linkedin']?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-linkedin" fill="#0076b6"><path d="M19,3A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19M18.5,18.5V13.2A3.26,3.26 0 0,0 15.24,9.94C14.39,9.94 13.4,10.46 12.92,11.24V10.13H10.13V18.5H12.92V13.57C12.92,12.8 13.54,12.17 14.31,12.17A1.4,1.4 0 0,1 15.71,13.57V18.5H18.5M6.88,8.56A1.68,1.68 0 0,0 8.56,6.88C8.56,5.95 7.81,5.19 6.88,5.19A1.69,1.69 0 0,0 5.19,6.88C5.19,7.81 5.95,8.56 6.88,8.56M8.27,18.5V10.13H5.5V18.5H8.27Z"></path></svg>
					</a>
					<?php } ?>
					<?php  if(!empty($wo['page_profile']['vk'])) {  ?>
					<a class="social-btn" rel="publisher" href="https://vk.com/<?php echo $wo['page_profile']['vk'];?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-vk" fill="#4a76a8"><path d="M5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3M17.24,14.03C16.06,12.94 16.22,13.11 17.64,11.22C18.5,10.07 18.85,9.37 18.74,9.07C18.63,8.79 18,8.86 18,8.86L15.89,8.88C15.89,8.88 15.73,8.85 15.62,8.92C15.5,9 15.43,9.15 15.43,9.15C15.43,9.15 15.09,10.04 14.65,10.8C13.71,12.39 13.33,12.47 13.18,12.38C12.83,12.15 12.91,11.45 12.91,10.95C12.91,9.41 13.15,8.76 12.46,8.6C12.23,8.54 12.06,8.5 11.47,8.5C10.72,8.5 10.08,8.5 9.72,8.68C9.5,8.8 9.29,9.06 9.41,9.07C9.55,9.09 9.86,9.16 10.03,9.39C10.25,9.68 10.24,10.34 10.24,10.34C10.24,10.34 10.36,12.16 9.95,12.39C9.66,12.54 9.27,12.22 8.44,10.78C8,10.04 7.68,9.22 7.68,9.22L7.5,9L7.19,8.85H5.18C5.18,8.85 4.88,8.85 4.77,9C4.67,9.1 4.76,9.32 4.76,9.32C4.76,9.32 6.33,12.96 8.11,14.8C9.74,16.5 11.59,16.31 11.59,16.31H12.43C12.43,16.31 12.68,16.36 12.81,16.23C12.93,16.1 12.93,15.94 12.93,15.94C12.93,15.94 12.91,14.81 13.43,14.65C13.95,14.5 14.61,15.73 15.31,16.22C15.84,16.58 16.24,16.5 16.24,16.5L18.12,16.47C18.12,16.47 19.1,16.41 18.63,15.64C18.6,15.58 18.36,15.07 17.24,14.03Z" /></svg>
					</a>
					<?php } if (!empty($wo['page_profile']['youtube'])) { ?>
					<a class="social-btn" href="https://www.youtube.com/<?php echo $wo['page_profile']['youtube']?>" target="_blank">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-youtube" fill="#ff0000"><path d="M10,16.5V7.5L16,12M20,4.4C19.4,4.2 15.7,4 12,4C8.3,4 4.6,4.19 4,4.38C2.44,4.9 2,8.4 2,12C2,15.59 2.44,19.1 4,19.61C4.6,19.81 8.3,20 12,20C15.7,20 19.4,19.81 20,19.61C21.56,19.1 22,15.59 22,12C22,8.4 21.56,4.91 20,4.4Z" /></svg>
                    </a>
					<?php } ?>
				</li>
			<?php } ?>
		</ul>
		
		<?php if(!empty($wo['page_profile']['page_description'])) {  ?>
			<div class="page-margin wow_content">
				<div class="wo_page_hdng pag_neg_padd">
					<div class="wo_page_hdng_innr">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M21,6V8H3V6H21M3,18H12V16H3V18M3,13H21V11H3V13Z"></path></svg></span> <?php echo $wo['lang']['about']; ?>
					</div>
				</div>
				<p class="page-margin"><?php echo $wo['page_profile']['page_description']?></p>
			</div>
		<?php } ?>
    
		<?php if($wo['loggedin'] == true) {  ?>
		<?php
			$pages = lui_PageSug(1);
			if (count($pages) != 0) {
		?>
			<ul class="wow_content negg_padd sidebar-conatnier" id="sidebar-page-list-container">
				<li class="list-group-item text-muted hidden" contenteditable="false"><?php echo $wo['lang']['pages_you_may_like']; ?></li>
				<div class="wo_page_hdng">
					<div class="wo_page_hdng_innr">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M14.4,6L14,4H5V21H7V14H12.6L13,16H20V6H14.4Z"></path></svg></span> <?php echo $wo['lang']['pages_you_may_like']; ?>
					</div>
				</div>
				<div class="sidebar">
					<div class="sidebar-pages-may-know-container">
						<?php 
							foreach ($pages as $wo['PageList']) {
							$wo['PageList']['user_name'] = $wo['PageList']['name'];
								echo lui_LoadPage('sidebar/sidebar-home-page-list');
							} 
						?>
					</div>
					<div class="clear"></div>
				</div>
			</ul>
		<?php } ?>
		<?php } ?>
    
		<?php 
		$sidebar_ad = lui_GetAd('sidebar', false);
		if (!empty($sidebar_ad)) {?>
			<ul class="list-group sidebar-ad">
				<?php echo $sidebar_ad; ?>
			</ul>
		<?php } ?>
		<?php echo lui_LoadPage('footer/sidebar-footer')?>
	</div>
</div>

<?php if ($wo['config']['offer_system'] == 1) { ?>
<script src="https://cdn.jsdelivr.net/npm/jquery-ui-timepicker-addon@1.6.3/dist/jquery-ui-timepicker-addon.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    var thumb_drop_block = $("[data-block='thumdrop-zone']");
    if (typeof(window.FileReader) == 'undefined') {
      thumb_drop_block.find('.thumbnail-rendderer div').text('Drag drop is not supported in your browser!');
    }
    else{
      thumb_drop_block[0].ondragover = function() {
          thumb_drop_block.addClass('hover');
          return false;
      };
          
      thumb_drop_block[0].ondragleave = function() {
          thumb_drop_block.removeClass('hover');
          return false;
      };

      thumb_drop_block[0].ondrop = function(event) {
          event.preventDefault();
          thumb_drop_block.removeClass('hover');
          var file = event.dataTransfer.files;
          $("#thumbnail_two").prop('files', file);
          $("#wow_fcov_img_holder").html("<img src='" + window.URL.createObjectURL(event.dataTransfer.files[0]) + "' alt='Picture'>")
      };
    }
    $("#thumbnail_two").change(function(event) {
      $("#wow_fcov_img_holder").html("<img src='" + window.URL.createObjectURL(this.files[0]) + "' alt='Picture'>")
    });
 });
	function OpenCreateOfferModal() {
		$('#create-offer-modal').modal('show');
	}
</script>
<div class="modal fade sun_modal" id="create-offer-modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="wow_pops_head">
				<svg height="100px" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" xmlns="http://www.w3.org/2000/svg"><path d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729 c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="currentColor" opacity="0.6"></path> <path d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729 c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="currentColor" opacity="0.6"></path> <path d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428 c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="currentColor"></path></svg>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></button>
				<h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5.5,7A1.5,1.5 0 0,1 4,5.5A1.5,1.5 0 0,1 5.5,4A1.5,1.5 0 0,1 7,5.5A1.5,1.5 0 0,1 5.5,7M21.41,11.58L12.41,2.58C12.05,2.22 11.55,2 11,2H4C2.89,2 2,2.89 2,4V11C2,11.55 2.22,12.05 2.59,12.41L11.58,21.41C11.95,21.77 12.45,22 13,22C13.55,22 14.05,21.77 14.41,21.41L21.41,14.41C21.78,14.05 22,13.55 22,13C22,12.44 21.77,11.94 21.41,11.58Z"></path></svg> <?php echo $wo['lang']['create_offer'] ?></h4>
			</div>
			<form class="create-offer-form form-horizontal" method="post">
				<div class="modal-body">
					<div class="app-offer-alert"></div>
					<div class="clear"></div>
					<div class="row">
						<div class="col-lg-6">
							<div class="wow_form_fields">
								<label for="discount_type"><?php echo $wo['lang']['type'] ?></label>
								<select id="discount_type" name="discount_type">
									<option value="discount_percent"><?php echo $wo['lang']['discount_percent'] ?></option>
									<option value="discount_amount"><?php echo $wo['lang']['discount_amount'] ?></option>
									<option value="buy_get_discount"><?php echo $wo['lang']['buy_get_discount'] ?></option>
									<option value="spend_get_off"><?php echo $wo['lang']['spend_get_off'] ?></option>
									<option value="free_shipping"><?php echo $wo['lang']['free_shipping'] ?></option>
								</select>
							</div>
						</div>
						<div class="col-lg-6 discount_percent_input">
							<div class="wow_form_fields">
								<label for="discount_percent"><?php echo $wo['lang']['discount_percent'] ?></label>
								<select id="discount_percent" name="discount_percent">
									<?php for ($i=1; $i < 100 ; $i++) {  ?>
										<option value="<?php echo $i ?>"><?php echo $i ?>%</option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 discount_amount_input" style="display: none;">
							<div class="wow_form_fields">
								<label for="discount_amount"><?php echo $wo['lang']['discount_amount'] ?></label>
								<input id="discount_amount" name="discount_amount" type="text" value="">
							</div>
						</div>
					</div>
					<div class="row buy_get_discount_input" style="display: none;">
						<div class="col-lg-6">
							<div class="wow_form_fields">
								<label for="buy"><?php echo $wo['lang']['buy'] ?></label>
								<input id="buy" name="buy" type="text" value="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="wow_form_fields">
								<label for="get"><?php echo $wo['lang']['get'] ?></label>
								<input id="get" name="get" type="text" value="">
							</div>
						</div>
					</div>
					<div class="row spend_get_off_input" style="display: none;">
						<div class="col-lg-6">
							<div class="wow_form_fields">
								<label for="spend"><?php echo $wo['lang']['spend'] ?></label>
								<input id="spend" name="spend" type="text" value="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="wow_form_fields">
								<label for="amount_off"><?php echo $wo['lang']['amount_off'] ?></label>
								<input id="amount_off" name="amount_off" type="text" value="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-9">
							<div class="wow_form_fields">
								<label for="discounted_items"><?php echo $wo['lang']['discounted_items'] ?></label>
								<input id="discounted_items" name="discounted_items" type="text" value="" maxlength="100">
								<span class="help-block"><?php echo $wo['lang']['items_services'] ?></span>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="wow_form_fields">
								<label for="currency"><?php echo $wo['lang']['currency'] ?></label>
								<select id="currency" name="currency">
									<?php foreach ($wo['currencies'] as $key => $currency) { ?>
										<option value="<?php echo $key; ?>"><?php echo $currency['text'] ?> (<?php echo $currency['symbol'] ?>)</option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="wow_form_fields">
						<label for="description"><?php echo $wo['lang']['description'] ?></label>
						<textarea name="description" rows="3" id="description"></textarea>
					</div>
					<div class="wow_form_fields">
						<label for="event-end-date"><?php echo $wo['lang']['end_date']; ?></label>
						<div class="row">
							<div class="col-md-6">
								<input type="text" class="date1" name="expire_date" id="event-end-date">
							</div>
							<div class="col-md-6">
								<input type="text" class="time1" name="expire_time">
							</div>
						</div>
					</div>
					<div class="wow_form_fields">
						<label><?php echo $wo['lang']['thumbnail']; ?></label>
						<div class="wow_fcov_image" data-block="thumdrop-zone">
							<div id="wow_fcov_img_holder">
								<img src="<?php echo $wo['config']['theme_url'];?>/img/ad_pattern.png">
							</div>
							<div class="upload_ad_image" onclick="document.getElementById('thumbnail_two').click(); return false">
								<div class="upload_ad_image_content">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z"></path></svg> <?php echo $wo['lang']['drop_img_here']; ?> <?php echo $wo['lang']['or']; ?> <?php echo $wo['lang']['browse_to_upload']; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="publisher-hidden-option">
						<div id="progress" class="create-offer-progress">
							<span id="percent" class="create-product-percent <?php echo lui_RightToLeft('pull-right');?>">0%</span>
							<div class="progress">
								<div id="bar" class="progress-bar active create-product-bar"></div> 
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<input type="file" class="hidden" id="thumbnail_two" name="thumbnail" accept="image/*">
					<input type="hidden" name="page_id" id="page_id" class="form-control input-md" value="<?php echo $wo['page_profile']['page_id'];?>">
					<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
				</div>
				<div class="form-group last-sett-btn modal-footer">
					<button type="submit" class="btn btn-main btn-mat add_wow_loader"><?php echo $wo['lang']['publish'] ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>

<div class="modal fade" id="report_page" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>
					<?php echo $wo['lang']['report_page']; ?>
				</h4>
			</div>
			<div class="modal-body">
				<textarea class="form-control" placeholder="Type text" dir="auto" rows="4" id="report-page-text-<?php echo $wo['page_profile']['page_id']; ?>"></textarea>
			</div>
			<div class="modal-footer">
				<div class="ball-pulse"><div></div><div></div><div></div></div>
				<button type="button" class="btn btn-main btn-mat" id="report-page-button" onclick="Wo_ReportPage(<?php echo $wo['page_profile']['page_id']; ?>,true)" >
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
					<?php echo $wo['lang']['send']; ?>
				</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="rate_page" role="dialog">
	<div class="modal-dialog wow_mat_mdl">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['rate']; ?> <?php echo $wo['page_profile']['page_title'];?></h4>
			</div>
			<div class="modal-body">
				<textarea class="form-control" placeholder="<?php echo $wo['lang']['your_review']; ?>" dir="auto" rows="5" id="rating_review"></textarea>
				<input type="hidden" id="rating_value" >
			</div>
			<div class="modal-footer">
				<div class="ball-pulse"><div></div><div></div><div></div></div>
				<button type="button" class="btn btn-main btn-mat" id="rate-page-button" onclick="Wo_RatePage()" ><?php echo $wo['lang']['save']; ?></button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade in" id="page_rated" role="dialog">
	<div class="modal-dialog">
      <div class="modal-content">
        <p style="text-align: center;padding: 30px 20px;font-family: Hind,Arial;font-size: 16px;">
          <i class="fa fa-check" aria-hidden="true" style="color: green;"></i>      
          <?php echo $wo['lang']['page_rated']; ?>
        </p>
      </div>
    </div>
</div>
<!-- JS Pages functions -->
<script>
	$(document).on('change', '#discount_type', function(event) {
		var type = $(this).val();
		$('.discount_percent_input').slideUp('slow');
		$('.discount_amount_input').slideUp('slow');
		$('.buy_get_discount_input').slideUp('slow');
		$('.spend_get_off_input').slideUp('slow');
		if (type == 'discount_percent') {
			$('.discount_percent_input').slideDown('slow');
		}
		else if(type == 'discount_amount'){
            $('.discount_amount_input').slideDown('slow');
		}
		else if(type == 'buy_get_discount'){
            $('.buy_get_discount_input').slideDown('slow');
            $('.discount_percent_input').slideDown('slow');
		}
		else if(type == 'spend_get_off'){
            $('.spend_get_off_input').slideDown('slow');
		}
	});


$(document).ready(function() {

	$('form.create-offer-form').ajaxForm({
	        url: Wo_Ajax_Requests_File() + '?f=offer&s=create_offer',
	        beforeSend: function() {
	         var percentVal = '0%';
	         create_bar.width(percentVal);
	         create_percent.html(percentVal);
	         
	         
	          $('.wo_settings_page').find('.last-sett-btn .ball-pulse').fadeIn(100);
	        },
	        uploadProgress: function (event, position, total, percentComplete) {
	           var percentVal = percentComplete + '%';
	           create_bar.width(percentVal);
	           $('.create-offer-progress').slideDown(200);
	           create_percent.html(percentVal);
	        },
	        success: function(data) {
	         if (data.status == 200) {
	           $('.app-offer-alert').html("<div class='alert alert-success'><?php echo($wo['lang']['offer_successfully_created']) ?></div>");
		       $('.app-offer-alert').find('.alert-success').fadeIn(300);
		       setTimeout(function (argument) {
		        $('.app-offer-alert').find('.alert-success').fadeOut(300);
		        window.location.reload(true);

		       },3000);
	         } else {
	         	$('#create-offer-modal').animate({
			        scrollTop: $('html, body').offset().top //#DIV_ID is an example. Use the id of your destination on the page
			    });
	             $('.app-offer-alert').html('<div class="alert alert-danger">' + data.error + '</div>');
	             $('.alert-danger').fadeIn(300);
	             setTimeout(function (argument) {
	             	$('.alert-danger').fadeOut(300);
	             },3000);
	         }
	         $('.wo_settings_page').find('.last-sett-btn .ball-pulse').fadeOut(100);
	        }
	    });





		$( ".date1" ).datepicker({ dateFormat: 'yy-mm-dd', minDate: '+1day',prevText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z" /></svg>',nextText: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" /></svg>'});
      $( ".time1" ).timepicker();


});



	function OpenCreateJobModal() {
		$('#create-job-modal').modal('show');
	}
$(function () {
  if($(window).width() > 600) {
    $(".user-avatar").hover(function () {
      $('.profile-avatar-changer').fadeIn(100);
    }, function () {
      $('.profile-avatar-changer').fadeOut(100);
    });
  }
  if($(window).width() > 600) {
    $(".user-cover").hover(function () {
      $('.profile-cover-changer').fadeIn(100);
    }, function () {
      $('.profile-cover-changer').fadeOut(100);
    });
  }
  $('form.profile-avatar-changer').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_page_avatar_picture',

    beforeSend: function () {
    	$('.profile_avatar').fadeOut(100);
      $('.user-avatar-uploading-container,.user-avatar-uploading-progress').fadeIn(200);
    },
    success: function (data) {
    	$('.profile_avatar').fadeIn(100);
      if(data.status == 200) {
        $('[id^=page-avatar-image]').attr("src", data.img);
      }
      $('.user-avatar-uploading-container, .user-avatar-uploading-progress').fadeOut(200);
    }
  });

  $('form.profile-cover-changer').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_page_cover_picture',

    beforeSend: function () {
    	$('.profile_cover').fadeOut(100);
      $('.user-cover-uploading-container,.user-cover-uploading-progress').fadeIn(200);
    },
    success: function (data) {
    	$('.profile_cover').fadeIn(100);
      if(data.status == 200) {
      	$('.user-cover').find('img').attr("src", data.img);
        // $('[id^=cover-image]').attr("src", data.img);
      }
      $('.user-cover-uploading-container,.user-cover-uploading-progress').fadeOut(200);
    }
  });
  <?php if ($wo['loggedin'] == true): ?>
    <?php if (!Wo_IsPageRatingExists($wo['page_profile']['page_id'],$wo['user']['id'])): ?>
      $(".rate-page").click(function(event) {
        $("#rate_page").modal().find('#rating_value').val($(this).attr('data-val'));
      });
    <?php else: ?>
      $(".rate-page").click(function(event) {
        $("#page_rated").modal();
        Wo_Delay(function(){
         $("#page_rated").modal('hide'); 
        },2000)
        return false;
      });
    <?php endif; ?>
  <?php endif;?>
});

  

function Wo_ReportPage(id = false,report = true){
    var report_text = $("#report-page-text-<?php echo $wo['page_profile']['page_id']; ?>").val();
    if (!id) {return false;}
    else if(report == true){
      if (!report_text) {return false;}  
    }
	$('#report_page').find('.modal-footer .ball-pulse').fadeIn(100);
    $.ajax({
        url: Wo_Ajax_Requests_File() + '?f=reports&s=report_page',
        type: 'POST',
        dataType: 'json',
        data: {text:report_text,page:id}
    })
    .done(function(data) {
        if(data.status == 200 && data.code == 0){
            $('#report_status').replaceWith('\
                <li id="report_status" class="list-group-item pointer" onclick="$(\'#report_page\').modal(\'show\');">\
                    <span class="menu-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>\
                    <?php echo $wo['lang']['report_page']; ?></span>\
                </li>');
        }

        else if (data.status == 200 && data.code == 1) {
            $("#report-page-text-<?php echo $wo['page_profile']['page_id']; ?>").val('');
            $("#report_page").modal('hide');
            $('#report_status').replaceWith('\
                <li id="report_status" class="list-group-item pointer" onclick="Wo_ReportPage(<?php echo $wo['page_profile']['page_id']; ?>,false);">\
                    <span class="menu-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>\
                    <?php echo $wo['lang']['unreport']; ?></span>\
                </li>');
        }
        $('#report_page').find('.modal-footer .ball-pulse').fadeOut(100);
    })
    .fail(function() {
        console.log("error");
    })
}

function Wo_UpdateProfileAvatar() {
  $("form.profile-avatar-changer").submit();
}

function Wo_UpdateProfileCover() {
  $("form.profile-cover-changer").submit();
}

function Wo_RatePage(self){

  $.ajax({
    url: Wo_Ajax_Requests_File() + '?f=pages&s=rate_page',
    type: 'POST',
    dataType: 'json',
    data: {text: $("#rating_review").val(),page_id:'<?php echo $wo['page_profile']['page_id'];?>',val:$("#rating_value").val()},
  })
  .done(function(data) {
    if (data.status == 200) {
      $("#rate_page").modal('hide');
      location.reload();
    }
    Wo_progressIconLoader($("#rate-page-button"));
  })
  .fail(function() {
    console.log("error");
  })
}

function Wo_LoadPageReviews(self = false){
  if (!self) {
    return false;
  }
  var preview_id = ($('[data-user-review]').length > 0) ? $('[data-user-review]').last().attr('data-user-review') : 0;
  $.ajax({
    url: Wo_Ajax_Requests_File(),
    type: 'GET',
    dataType: 'json',
    data: {f: 'pages',s:'load_reviews',page:'<?php echo $wo['page_profile']['page_id'];?>',after_id:preview_id},
  })
  .done(function(data) {
    if (data.status == 200) {
      $("#page_reviews_cont").append(data.html);
    }
    else{
      $(self).fadeIn('fast', function() {
        $(this).remove();
      });
    }
  })
  .fail(function() {
    console.log("error");
  })
}
</script>
<?php if (!empty($wo['page_profile']['background_image']) && $wo['page_profile']['background_image_status'] == 1) { ?>
<style>
  body {
    background: url(<?php echo lui_GetMedia($wo['page_profile']['background_image']); ?>) fixed !important;
    background-size:100% auto;
  }
</style>
<?php } ?>

<?php if ($wo['config']['job_system'] == 1) { ?>
<div class="modal fade sun_modal" id="create-job-modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="wow_pops_head">
				<svg height="100px" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" xmlns="http://www.w3.org/2000/svg"><path d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729 c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="currentColor" opacity="0.6"></path> <path d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729 c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="currentColor" opacity="0.6"></path> <path d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428 c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="currentColor"></path></svg>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></button>
				<h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z"></path></svg> <?php echo $wo['lang']['create_job'] ?></h4>
			</div>
			<form class="create-job-form form-horizontal" method="post">
				<div class="modal-body">
					<div class="wo_create_job_box">
						<div class="app-general-alert setting-update-alert"></div>
						<div class="clear"></div>
						<div class="row">
							<div class="col-lg-6">
								<div class="wow_form_fields">
									<label for="job_title"><?php echo $wo['lang']['job_title'] ?></label>
									<input id="job_title" name="job_title" type="text" value="">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="wow_form_fields">
									<label for="location"><?php echo $wo['lang']['location']; ?></label>
									<input id="location" class="job_location" name="location" type="text" value="<?php echo $wo['user']['address'];?>">
									<?php if ($wo['config']['yandex_map'] == 1) { ?>
										<div class="yandex_search_job"></div>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="wow_form_fields">
							<label><?php echo $wo['lang']['salary_range'] ?></label>
							<div class="wo_create_job_box_flex">
								<div class="sun_input">
									<input id="minimum" name="minimum" type="text" placeholder="<?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']] .' '. $wo['lang']['minimum'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
								</div>
								<div class="sun_input">
									<input id="maximum" name="maximum" type="text" placeholder="<?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']] .' '. $wo['lang']['maximum'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
								</div>
								<div class="sun_input">
									<select id="currency" name="currency">
										<?php foreach ($wo['currencies'] as $key => $currency) { ?>
											<option value="<?php echo $key; ?>"><?php echo  $currency['text'] ?> (<?php echo  $currency['symbol'] ?>)</option>
										<?php } ?>
									</select>
								</div>
								<div class="sun_input">
									<select id="salary_date" name="salary_date">
										<option value="per_hour"><?php echo $wo['lang']['per_hour'] ?></option>
										<option value="per_day"><?php echo $wo['lang']['per_day'] ?></option>
										<option value="per_week"><?php echo $wo['lang']['per_week'] ?></option>
										<option value="per_month"><?php echo $wo['lang']['per_month'] ?></option>
										<option value="per_year"><?php echo $wo['lang']['per_year'] ?></option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="wow_form_fields">
									<label for="job_type"><?php echo $wo['lang']['job_type'] ?></label>
									<select id="job_type" name="job_type">
										<option value="full_time"><?php echo $wo['lang']['full_time'] ?></option>
										<option value="part_time"><?php echo $wo['lang']['part_time'] ?></option>
										<option value="internship"><?php echo $wo['lang']['internship'] ?></option>
										<option value="volunteer"><?php echo $wo['lang']['volunteer'] ?></option>
										<option value="contract"><?php echo $wo['lang']['contract'] ?></option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="wow_form_fields">
									<label for="category"><?php echo $wo['lang']['category']; ?></label>
									<select name="category" id="category">
										<?php foreach ($wo['job_categories'] as $category_id => $category_name) {?>
											<option value="<?php echo $category_id?>"><?php echo $category_name; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="wow_form_fields">
							<label for="description"><?php echo $wo['lang']['description']; ?></label>
							<textarea name="description" rows="2" id="description"></textarea>
							<span class="help-block"><?php echo $wo['lang']['job_des_text'] ?></span>
						</div>
						
						<div class="setting-panel job-setting-panel">
							<div class="sun_input">
								<label><?php echo $wo['lang']['questions'] ?></label>
								<div class="sun_input">
									<a href="javascript:void(0)" class="wo_create_job_qstn" id="add_new_question"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> <?php echo $wo['lang']['add_question']; ?></a>
									<div class="">
										<div id="question_one_parent"></div>
										<div id="question_two_parent"></div>
										<div id="question_three_parent"></div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
							<div class="th-alert">
								<label for="job_add_iamge"><?php echo $wo['lang']['job_add_iamge'] ?></label> 
								<div class="wo_create_job_box_img">
									<div class="main prv-img pointer wo_create_job_box_img" id="select-img" data-block="thumdrop-zone">
										<div class="thumbnail-rendderer">
											<img src="<?php echo($wo['page_profile']['cover']) ?>">
										</div>
									</div>
									<div class="row wo_create_job_box_img_btns">
										<div class="col-md-6">
											<button type="button" class="btn btn-main form-control" id="use_upload_photo"><?php echo $wo['lang']['browse_to_upload'] ?></button>
										</div>
										<div class="col-md-6">
											<button type="button" class="btn btn-main form-control" id="use_cover_photo"><?php echo $wo['lang']['use_cover_photo'] ?></button>
										</div>
									</div>
								</div>
							</div>
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

					<input type="file" class="hidden" id="thumbnail" name="thumbnail" accept="image/*">
					<input type="text" class="hidden" id="image_type" name="image_type" value="cover">
					<input type="hidden" name="lat" id="lat-job" class="form-control input-md" value="">
					<input type="hidden" name="lng" id="lng-job" class="form-control input-md" value="">
					<input type="hidden" name="page_id" id="page_id" class="form-control input-md" value="<?php echo $wo['page_profile']['page_id'];?>">
					<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
				</div>
				<div class="form-group last-sett-btn modal-footer">
					<button type="submit" class="btn btn-main btn-mat add_wow_loader"><?php echo $wo['lang']['publish'] ?></button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="<?php echo $wo['config']['theme_url'];?>/javascript/bootstrap-tagsinput-latest/src/bootstrap-tagsinput.js"></script>

<script type="text/javascript">
	var question_one = '<div id="question_one_block" class="wo_create_job_qstn_block"><label><?php echo $wo['lang']['question_one'] ?></label><button type="button" class="close" onclick="HideQuestion(\'one\')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button><select class="form-control" name="question_one_type" id="question_one_type"><option value="free_text_question"><?php echo $wo['lang']['free_text_question'] ?></option><option value="yes_no_question"><?php echo $wo['lang']['yes_no_question'] ?></option><option value="multiple_choice_question"><?php echo $wo['lang']['multiple_choice_question'] ?></option></select><br><textarea class="form-control" name="question_one" rows="3" id="question_one"></textarea><div id="question_one_answers_div" style="display: none;"><br><input class="form-control" type="text" name="question_one_answers" id="question_one_answers" placeholder="<?php echo $wo['lang']['add_an_answers'] ?>"></div></div>';
	var question_two = '<div id="question_two_block" class="wo_create_job_qstn_block"><label><?php echo $wo['lang']['question_two'] ?></label><button type="button" class="close" onclick="HideQuestion(\'two\')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button><select class="form-control" name="question_two_type" id="question_two_type"><option value="free_text_question"><?php echo $wo['lang']['free_text_question'] ?></option><option value="yes_no_question"><?php echo $wo['lang']['yes_no_question'] ?></option><option value="multiple_choice_question"><?php echo $wo['lang']['multiple_choice_question'] ?></option></select><br><textarea class="form-control" name="question_two" rows="3" id="question_two"></textarea><div id="question_two_answers_div" style="display: none;"><br><input class="form-control" type="text" name="question_two_answers" id="question_two_answers" placeholder="<?php echo $wo['lang']['add_an_answers'] ?>"></div></div>';

	var question_three = '<div id="question_three_block" class="wo_create_job_qstn_block"><label><?php echo $wo['lang']['question_three'] ?></label><button type="button" class="close" onclick="HideQuestion(\'three\')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button><select class="form-control" name="question_three_type" id="question_three_type"><option value="free_text_question"><?php echo $wo['lang']['free_text_question'] ?></option><option value="yes_no_question"><?php echo $wo['lang']['yes_no_question'] ?></option><option value="multiple_choice_question"><?php echo $wo['lang']['multiple_choice_question'] ?></option></select><br><textarea class="form-control" name="question_three" rows="3" id="question_three"></textarea><div id="question_three_answers_div" style="display: none;"><br><input class="form-control" type="text" name="question_three_answers" id="question_three_answers" placeholder="<?php echo $wo['lang']['add_an_answers'] ?>"></div></div>';


	function HideQuestion(type) {
		$('#question_'+type+'_block').remove();
		$('#add_new_question').css('display', 'block');
	}


	$(document).ready(function() {
		if (navigator.geolocation) {
	        var location = navigator.geolocation.getCurrentPosition(function (position) {
	            $("#lng-job").val(position.coords.longitude);
	            $("#lat-job").val(position.coords.latitude);
	        });
	    }

		$('form.create-job-form').on('keyup keypress', function(e) {
		  var keyCode = e.keyCode || e.which;
		  if (keyCode === 13) { 
		    e.preventDefault();
		    return false;
		  }
		});

		$('#add_new_question').click(function(event) {
			if ($('#question_one_block').is(":visible")) {
				if ($('#question_two_block').is(":visible")) {
					if ($('#question_three_block').is(":visible")) {
						$(this).css('display', 'none');
					}
					else{
						$('#question_three_parent').html(question_three);
						setTimeout(function (argument) {
							$("#question_three_answers").tagsinput({
						      maxTags: 10,
						    });
						},1000);
					}
				}
				else{
					$('#question_two_parent').html(question_two);
					setTimeout(function (argument) {
						$("#question_two_answers").tagsinput({
					      maxTags: 10,
					    });
					},1000);
				}
			}
			else{
				$('#question_one_parent').html(question_one);
				setTimeout(function (argument) {
					$("#question_one_answers").tagsinput({
				      maxTags: 10,
				    });
				},1000);
			}
		});


		$(document).on('change', '#question_one_type', function(event) {
	    	if ($(this).val() == 'multiple_choice_question') {
		      	$('#question_one_answers_div').css('display', 'block');
		      }
		      else{
		      	$('#question_one_answers_div').css('display', 'none');
		      }
	    });

	    $(document).on('change', '#question_two_type', function(event) {
	    	if ($(this).val() == 'multiple_choice_question') {
		      	$('#question_two_answers_div').css('display', 'block');
		      }
		      else{
		      	$('#question_two_answers_div').css('display', 'none');
		      }
	    });

	    $(document).on('change', '#question_three_type', function(event) {
	    	if ($(this).val() == 'multiple_choice_question') {
		      	$('#question_three_answers_div').css('display', 'block');
		      }
		      else{
		      	$('#question_three_answers_div').css('display', 'none');
		      }
	    });

	    $("#select-img").click(function(event) {
	      $("#thumbnail").click()
	    });

	    $("#use_upload_photo").click(function(event) {
	      $("#thumbnail").click()
	    });

	    $("#thumbnail").change(function(event) {
	      $(".prv-img").html("<img src='" + window.URL.createObjectURL(this.files[0]) + "' alt='Picture'>");
	      $('#image_type').val('upload');
	    });

	    $("#use_cover_photo").click(function(event) {
	      $(".prv-img").html("<img src='<?php echo($wo['page_profile']['cover']) ?>' alt='Picture'>");
	      $('#image_type').val('cover');
	    });

	    var create_bar = $('.create-product-bar');
	    var create_percent = $('.create-product-percent');

	    $('form.create-job-form').ajaxForm({
	        url: Wo_Ajax_Requests_File() + '?f=job&s=create_job',
	        beforeSend: function() {
	         var percentVal = '0%';
	         create_bar.width(percentVal);
	         create_percent.html(percentVal);
	         
	         
	          $('form.create-job-form').find('.add_wow_loader').addClass('btn-loading');
	        },
	        uploadProgress: function (event, position, total, percentComplete) {
	           var percentVal = percentComplete + '%';
	           create_bar.width(percentVal);
	           $('.create-product-progress').slideDown(200);
	           create_percent.html(percentVal);
	        },
	        success: function(data) {
	         if (data.status == 200) {
	         	$('.app-general-alert').html("<div class='alert alert-success'><?php echo($wo['lang']['job_successfully_created']) ?></div>");
		       $('.app-general-alert').find('.alert-success').fadeIn(300);
		       setTimeout(function (argument) {
		        $('.app-general-alert').find('.alert-success').fadeOut(300);
		        window.location.reload(true);

		       },3000);
	         } else {
	         	$('#create-job-modal').animate({
			        scrollTop: $('html, body').offset().top //#DIV_ID is an example. Use the id of your destination on the page
			    });
	             $('.app-general-alert').html('<div class="alert alert-danger">' + data.error + '</div>');
	             $('.alert-danger').fadeIn(300);
	             setTimeout(function (argument) {
	             	$('.alert-danger').fadeOut(300);
	             },3000);
	         }
	         $('form.create-job-form').find('.add_wow_loader').removeClass('btn-loading');
	        }
	    });



	});

<?php if ($wo['config']['google_map'] == 1) { ?>
var create_pac_input = document.getElementById('location');
  (function pacSelectFirst(input) {
    // store the original event binding function
    var _addEventListenerProduct = (input.addEventListener) ? input.addEventListener : input.attachEvent;
    function addEventListenerWrapper(type, listener) {
      // Simulate a 'down arrow' keypress on hitting 'return' when no pac suggestion is selected,
      // and then trigger the original listener.
      if(type == "keydown") {
        var orig_listener_product = listener;
        listener = function (event) {
          var suggestion_selected_product = $(".pac-item-selected").length > 0;
          if(event.which == 13 && !suggestion_selected_product) {
            var simulated_downarrow_product = $.Event("keydown", {
              keyCode: 40,
              which: 40
            });
            orig_listener_product.apply(input, [simulated_downarrow_product]);
          }
          orig_listener_product.apply(input, [event]);
        };
      }
      // add the modified listener
      _addEventListenerProduct.apply(input, [type, listener]);
    }
    if(input.addEventListener)
      input.addEventListener = addEventListenerWrapper;
    else if(input.attachEvent)
      input.attachEvent = addEventListenerWrapper;
  })(create_pac_input);

  $(function () {
     var autocompleteproduct = new google.maps.places.Autocomplete(create_pac_input);
  });
<?php } ?>
<?php if ($wo['config']['yandex_map'] == 1) { ?>
	$(function() {
		$('.job_location').on( "keydown", function() {
			let self = this;
		  var myGeocoder = ymaps.geocode($(this).val());
      myGeocoder.then(
          function (res) {
          	if (res.geoObjects.getLength() == 0) {
          		$('.yandex_search_job').html('');
          	}
          	else{
          		let html = '';
          		for (var i = 0; i < res.geoObjects.getLength(); i++) {
          			html += '<p class="pointer" onclick="AddYandexResult(\'.job_location\',this,\'.yandex_search_job\')">'+res.geoObjects.get(i).properties.get('name')+'</p>';
              }
              $('.yandex_search_job').html(html);
          	}
          },
          function (err) {
              $('.yandex_search_job').html('');
          }
      );
		});
	});
<?php } ?>
</script>

<?php } ?>