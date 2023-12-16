<?php 
$post_shared_from = array();
$current_post = $wo['current_post'] = $wo['story'];
 ?>
<?php if ($wo['story']['postType'] == 'ad'): ?>
<div class="post-container user-ad-container" id="<?php echo $wo['story']['id']; ?>">
	<div class="post-advertisement">
		<div class="sop-icon hidden-xs">
			<a href="<?php echo lui_SeoLink('index.php?link1=advertise'); ?>" target="_blank"><?php echo $wo['lang']['sponsored'];?></a>
		</div>
		<div class="panel panel-shadow">
			<div class="ads-heading">
				<div class="<?php echo lui_RightToLeft('pull-left');?> ads-image">
					<a onclick="InjectAPI('<?php echo htmlentities(json_encode(array('type' => 'user', 'profile_id' => $wo['story']['user_data']['id']))); ?>', event);">
						<img src="<?php echo $wo['story']['user_data']['avatar']; ?>" class="responsive-img">
					</a>
				</div>
				
				<div class="ads-meta">
					<div class="title h5">
						<a onclick="InjectAPI('<?php echo htmlentities(json_encode(array('type' => 'user', 'profile_id' => $wo['story']['user_data']['id']))); ?>', event);">
							<b><?php echo $wo['story']['name']; ?></b>
						</a>
						<h6>
							<span class="time ajax-time" title="<?php echo date('c', $wo['story']['posted']); ?>">
								<?php echo lui_Time_Elapsed_String($wo['story']['posted']); ?>
							</span>
							<?php if (strlen($wo['story']['location']) > 3): ?>
							<span class="time">
								<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin" style="width: 14px;height: 14px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> <?php echo $wo['story']['location']; ?>
							</span>
							<?php endif;?>
						</h6>
					</div>
				</div>
				
				<div class="ads-headline">
					<p><?php echo htmlspecialchars_decode($wo['story']['description']); ?></p>
				</div>
				
				<div class="ads-cover rads-<?php echo $wo['story']['bidding']; ?> wo_post_ad" id="<?php echo $wo['story']['id']; ?>">
					<a href="<?php echo $wo['story']['url']; ?>" class="text-dnone">
						<h3><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg> <?php echo $wo['story']['headline']; ?></h3>
						<img src="<?php echo $wo['story']['ad_media']; ?>" alt="picture" class="responsive-img">
						<div class="ads-description">        
							<?php echo lui_UrlDomain($wo['story']['url']); ?>        
						</div>
					</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>

<?php else: ?>

<div class="post-container" id="post-container-">
	<div class="post<?php echo (!empty($wo['story']['post_is_promoted'])) ? ' boosted': '';?>" id="post-<?php echo $wo['story']['id']; ?>" data-post-id="<?php echo $wo['story']['id'];?>">
		<?php
			if (empty($wo['page'])) {
				$wo['page'] = 'home';
			}
			if ($wo['story']['is_post_pinned'] === true && ($wo['page'] == 'timeline' || $wo['page'] == 'page' || $wo['page'] == 'group' )) { ?>
			<div class="pin-icon" data-toggle="tooltip" title="<?php echo $wo['lang']['pinned_post'];?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
			</div>
		<?php } ?>
		<div class="panel panel-shadow">
			<?php if (!empty($wo['story']['parent_id'])) {
	        $post_shared_from = $wo['post_shared_from'] = lui_PostData($wo['story']['parent_id']);

	       ?>
	       <div class="post-heading">
				<div class="<?php echo lui_RightToLeft('pull-left');?> image" onclick="InjectAPI('<?php echo htmlentities(json_encode(array('type' => $wo['story']['publisher']['type'], 'profile_id' => $wo['story']['publisher']['id']))); ?>', event);">
					<!--<a href="<?php echo $wo['story']['publisher']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['publisher']['username']?>">-->
						<img src="<?php echo $wo['story']['publisher']['avatar']; ?>" id="updateImage-<?php echo $wo['story']['publisher']['user_id']?>" class="avatar" alt="<?php echo $wo['story']['publisher']['name']; ?> profile picture">
					<!--</a>-->
				</div>
				<div class="<?php echo lui_RightToLeft('pull-right');?>">
					<?php  if ($wo['story']['admin'] === true || $wo['story']['group_admin'] === true) { ?>
					<span class="dropdown" id="bottom_sheet_menu_<?php echo $wo['story']['id']; ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
						</a>
						<ul class="dropdown-menu post-privacy-menu post-options" role="menu">
								<?php if ($wo['story']['admin'] === true && empty($wo['story']['product_id'])) { ?>
								<li>
									<?php $edit_json = array('type' => 'edit_post', 'post_id' => $wo['story']['id'], 'edit_text' => $wo['story']['Orginaltext']); ?>
									<div class="pointer" onclick="InjectAPI('<?php echo htmlentities(json_encode($edit_json)); ?>', event);" id="edit-post">
										<?php echo $wo['lang']['edit_post'];?>
									</div>
								</li>
								<?php } else if (!empty($wo['story']['product_id'])) { 
								if ($wo['story']['product']['status'] == 0) { ?>
								<!-- <li>
									<div class="pointer mark-as-sold-post" onclick="Wo_MarkAsSold(<?php echo $wo['story']['id']; ?>, <?php echo $wo['story']['product_id']; ?>);">
										<?php echo $wo['lang']['mark_as_sold']?>
									</div>
								</li> -->
								<?php } } ?>
								<li>
									<div class="pointer" onclick="InjectAPI('<?php echo htmlentities(json_encode(array('type' => 'delete_post', 'post_id' => $wo['story']['id']))); ?>', event);">
										<?php echo $wo['lang']['delete_post'];?>
									</div>
								</li>
								<li>
					                <div class="pointer disable-comments" onclick="Wo_DisableComment(<?php echo $wo['story']['id']; ?>, <?php echo $wo['story']['comments_status']; ?>);">
					                <?php echo ($wo['story']['comments_status'] == 1) ? $wo['lang']['disable_comments'] : $wo['lang']['enable_comments'];?>
					                </div>
					              </li>
								<?php if (empty($wo['story']['recipient']) && $wo['story']['admin'] === true) { ?>
								<?php if ($wo['story']['is_group_post'] == false) { ?>
								<!-- <li>
									<?php
										$pin_post_id = $wo['story']['publisher']['id'];
										$pin_post_text = 'profile';
										if (!empty($wo['story']['page_id'])) {
											$pin_post_id = $wo['story']['page_id'];
											$pin_post_text = 'page';
										} else if (!empty($wo['story']['group_id'])) {
											$pin_post_id = $wo['story']['group_id'];
											$pin_post_text = 'group';
										}
									?>
									<div class="pin-post pointer" onclick="Wo_PinPost(<?php echo $wo['story']['id']; ?>, <?php echo $pin_post_id;?>, '<?php echo $pin_post_text; ?>');">
										<?php if($wo['story']['is_post_pinned'] === true) { ?>
											<?php echo $wo['lang']['unpin_post'];?>
										<?php } else { ?>
											<?php echo $wo['lang']['pin_post'];?>
										<?php } ?>
									</div>
								</li> -->
								<?php } } ?>
								<!--<?php if (!empty($wo['story']['album_name']) && ($wo['story']['group_admin'] === false || $wo['story']['admin'] === true)) {?>
								<li>
									<a href="<?php echo lui_SeoLink('index.php?link1=create-album&album=' . $wo['story']['id']);?>" >
										<i class="fa fa-camera progress-icon fa-fw" data-icon="camera"></i> <?php echo $wo['lang']['add_photos'];?>
									</a>
								</li>
								<?php } ?>-->
						</ul>
					</span>
					<?php  } elseif ($wo['loggedin'] == true) { ?>
					<span class="dropdown" id="bottom_sheet_menu_<?php echo $wo['story']['id']; ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
						</a>
						<ul class="dropdown-menu post-privacy-menu post-options post-recipient" role="menu"  >
								<!-- <li>
									<div class="save-post pointer" class="save-post" onclick="Wo_SavePost(<?php echo $wo['story']['id']; ?>);">
									<?php if($wo['story']['is_post_saved'] === true) { ?>
										<?php echo $wo['lang']['unsave_post'];?>
									<?php } else { ?>
										<?php echo $wo['lang']['save_post'];?>
									<?php } ?>
									</div>
								</li> -->
								<li>
									<div  class="report-post pointer" onclick="Wo_ReportPost(<?php echo $wo['story']['id']; ?>);">
									<?php if($wo['story']['is_post_reported'] === true) { ?>
										<?php echo $wo['lang']['unreport_post'];?>
									<?php } else { ?>
										<?php echo $wo['lang']['report_post'];?>
									<?php } ?>
									</div>
								</li>
								<!--<li>
									<a href="<?php echo $wo['story']['url'];?>" target="_blank" >
										<i class="fa fa-link progress-icon fa-fw" data-icon="link"></i> <?php echo $wo['lang']['open_post_in_new_tab'];?>
									</a>
								</li>-->
							</ul>
					</span>
					<?php } ?>
				</div>
				
				<div class="meta">
					<div class="title h5">
						<b onclick="InjectAPI('<?php echo htmlentities(json_encode(array('type' => $wo['story']['publisher']['type'], 'profile_id' => $wo['story']['publisher']['id']))); ?>', event);" style="margin-right: 2px;"><?php echo $wo['story']['publisher']['name']; ?></b>
						<?php if($wo['story']['publisher']['verified'] == 1) { ?>
							<span class="verified-color">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" /></svg>
							</span>
						<?php } ?>
						<?php //if ($wo['story']['shared_from'] && is_array($wo['story']['shared_from'])): ?>
							<span class="user-popover" data-type="<?php echo $wo['story']['shared_from']['type']; ?>" data-id="<?php echo $wo['story']['shared_from']['id']; ?>">
								<span><?php echo $wo['lang']['shared_a_post']; ?></span> 
								<a href="<?php echo $wo['story']['shared_from']['url']; ?>" class="pointer no_decor" data-ajax="?link1=timeline&u=<?php echo $wo['story']['shared_from']['username']; ?>"><b><?php echo $wo['story']['shared_from']['name']; ?></b></a>
								<?php if($wo['story']['shared_from']['verified'] == 1) { ?>
								<span class="verified-color">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" /></svg>
								</span>
								<?php } ?>
							</span>
						<?php //endif; ?>
						<?php //if ($wo['story']['shared_from'] && is_array($wo['story']['shared_from'])): ?>
							<span><a href="<?php echo $wo['story']['post_url']; ?>" class="pointer"><span style="color: #666;"><?php echo strtolower($wo['lang']['post']); ?></span></a></span>
						<?php //endif; ?>
						<?php if (empty($wo['story']['parent_id'])) { ?>



						<?php if ($wo['story']['recipient_exists'] == true) {  ?>
							<i class="fa fa-arrow-right"></i>
							<a href="<?php echo $wo['story']['recipient']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['recipient']['username']; ?>" onclick="InjectAPI('{&quot;profile_id&quot; : &quot;<?php echo $wo['story']['recipient']['id']?>&quot;, &quot;type&quot;:&quot;user&quot;}', event);">
								<b><?php echo $wo['story']['recipient']['name']; ?></b>
							</a>
							<?php if($wo['story']['recipient']['verified'] == 1) { ?>
								<span class="verified-color"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" /></svg></span>
							<?php } ?>
						<?php } ?>
						<?php if ($wo['story']['group_recipient_exists'] == true && $wo['page'] != 'group') {  ?>
							<i class="fa fa-arrow-right"></i>
							<a href="<?php echo $wo['story']['group_recipient']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['group_recipient']['username']; ?>" onclick="InjectAPI('{&quot;profile_id&quot; : &quot;<?php echo $wo['story']['group_recipient']['id']?>&quot;, &quot;type&quot;:&quot;group&quot;}', event);">
								<b><?php echo $wo['story']['group_recipient']['name']; ?></b>
							</a>
						<?php } ?>
						<?php if (!empty($wo['story']['album_name'] && empty($wo['story']['shared_from']))) {  ?>
							<small class="small-text"><?php echo $wo['lang']['added_new_photos_to'];?> <b><!--<a href="<?php echo $wo['story']['url']; ?>" data-ajax="?link1=post&id=<?php echo $wo['story']['id'];?>">--><?php echo $wo['story']['album_name']; ?><!--</a>--></b></small>
						<?php } ?>
						<?php if (!empty($wo['story']['product_id']) && empty($wo['story']['shared_from'])) {  ?>
							<small class="small-text"><?php echo $wo['lang']['added_new_product_for_sell']; ?></small>
						<?php } ?>
						<?php if (!empty($wo['story']['blog_id']) && empty($wo['story']['shared_from'])) {  ?>
							<small class="small-text"><?php echo $wo['lang']['created_new_blog'] ?></small>
						<?php } ?>
						<?php if (empty($wo['story']['shared_from'])): ?>
							<small class="small-text">
								<?php 
									if($wo['story']['postType'] == 'profile_picture') { 
										$changed_profile_pic_lang = $wo['lang']['changed_profile_picture_male'];
										if ($wo['story']['publisher']['gender'] == 'female') {
											$changed_profile_pic_lang = $wo['lang']['changed_profile_picture_female'];
										} else {
											$changed_profile_pic_lang = $wo['lang']['changed_profile_picture_male'];
										}
										echo $changed_profile_pic_lang;
									} 
									if($wo['story']['postType'] == 'profile_cover_picture') { 
										$changed_profile_cover_pic_lang = $wo['lang']['changed_profile_cover_picture_male'];
										if ($wo['story']['publisher']['gender'] == 'female') {
											$changed_profile_cover_pic_lang = $wo['lang']['changed_profile_cover_picture_female'];
										} else {
											$changed_profile_cover_pic_lang = $wo['lang']['changed_profile_cover_picture_male'];
										}
										echo $changed_profile_cover_pic_lang;
									} 
								?>
							</small>
						<?php endif; ?>
						<?php if($wo['story']['via_type'] == 'share') {  ?>
							<small style="color:#a33e40;"><?php echo $wo['story']['via']['name'];?> <?php echo $wo['lang']['shared_this_post'];?></small>
						<?php }  ?>
						<?php 
							$extra_exists = 0;
							if (!empty($wo['story']['postFeeling'])) {
								if (empty($changed_profile_pic_lang) 
									&& $wo['story']['via_type'] != 'share'
									&& $wo['story']['group_recipient_exists'] != true
									&& empty($wo['story']['album_name'])) {
						?>
							<span class="feeling-text"> <?php echo $wo['lang']['is_feeling'];?> <i class="twa-lg twa twa-<?php echo $wo['story']['postFeelingIcon'];?>"></i> <?php echo $wo['lang'][$wo['story']['postFeeling']];?></span>
						<?php
							} else {
								$extra_exists = 1;
							}
							}
							if (!empty($wo['story']['postTraveling'])) {
								if (empty($changed_profile_pic_lang) 
									&& $wo['story']['via_type'] != 'share'
									&& $wo['story']['group_recipient_exists'] != true
									&& empty($wo['story']['album_name'])) {
						?>
							<span class="feeling-text"><i class="fa fa-plane"></i> <?php echo $wo['lang']['is_traveling'];?> <?php echo $wo['story']['postTraveling'];?></span>
						<?php
							} else {
								$extra_exists = 1;
							}
							}
							if (!empty($wo['story']['postListening'])) {
								if (empty($changed_profile_pic_lang) 
									&& $wo['story']['via_type'] != 'share'
									&& $wo['story']['group_recipient_exists'] != true
									&& empty($wo['story']['album_name'])) {
						?>
							<span class="feeling-text"><i class="fa fa-headphones"></i> <?php echo $wo['lang']['is_listening'];?> <?php echo $wo['story']['postListening'];?></span>
						<?php
							} else {
								$extra_exists = 1;
							}
							}
							if (!empty($wo['story']['postPlaying'])) {
								if (empty($changed_profile_pic_lang) 
									&& $wo['story']['via_type'] != 'share'
									&& $wo['story']['group_recipient_exists'] != true
									&& empty($wo['story']['album_name'])) {
						?>
							<span class="feeling-text"><i class="fa fa-gamepad"></i> <?php echo $wo['lang']['is_playing'];?> <?php echo $wo['story']['postPlaying'];?></span>
						<?php
							} else {
								$extra_exists = 1;
							}
							}
							if (!empty($wo['story']['postWatching'])) {
								if (empty($changed_profile_pic_lang) 
								&& $wo['story']['via_type'] != 'share'
								&& $wo['story']['group_recipient_exists'] != true
								&& empty($wo['story']['album_name'])) {
						?>
							<span class="feeling-text"><i class="fa fa-eye"></i> <?php echo $wo['lang']['is_watching'];?> <?php echo $wo['story']['postWatching'];?></span>
						<?php
							} else {
								$extra_exists = 1;
							}
							}
						?>
						<?php }else{$extra_exists = 1;} ?>





					</div>
					
					<h6>
						<?php  if ($wo['story']['admin'] === true && $wo['story']['group_recipient_exists'] == false && empty($wo['story']['product_id'])) { ?>
							<?php  if (empty($wo['story']['page_id'])) { ?>
							<span class="dropdown wo_post_privacy_menu" style="color:#9197a3">
									<span class="dropdown-toggle pointer" data-toggle="dropdown" role="button" aria-expanded="false">
										<span class="pointer post-privacy" style="color:#9197a3">
											<?php  if($wo['story']['postPrivacy'] == 0) { ?>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" title="<?php echo $wo['lang']['everyone'];?>"><path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg>
											<?php  } ?>
											<?php  if($wo['story']['postPrivacy'] == 1) { ?>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" title="<?php echo ($wo['config']['connectivitySystem'] == 1) ? $wo['lang']['my_friends'] : $wo['lang']['people_i_follow'];?>"><path fill="currentColor" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z"></path></svg>
											<?php  }  ?>
											<?php  if($wo['story']['postPrivacy'] == 2) { ?>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" title="<?php echo ($wo['config']['connectivitySystem'] == 1) ? $wo['lang']['my_friends'] : $wo['lang']['people_follow_me'];?>"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path></svg>
											<?php  }  ?>
											<?php  if($wo['story']['postPrivacy'] == 3) { ?>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" title="<?php echo $wo['lang']['only_me'];?>"><path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z"></path></svg>
											<?php  }  ?>
										</span>
										<span class="caret" style="color:#9197a3"></span>
									</span>
									<ul class="dropdown-menu post-privacy-menu post-privacy-options" role="menu">
										<li>
											<div class="pointer" onclick="Wo_UpdatePostPrivacy(<?php echo $wo['story']['id']; ?>,3,event);">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,17A2,2 0 0,0 14,15C14,13.89 13.1,13 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6A2,2 0 0,1 4,20V10C4,8.89 4.9,8 6,8H7V6A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,3A3,3 0 0,0 9,6V8H15V6A3,3 0 0,0 12,3Z"></path></svg> <?php echo $wo['lang']['only_me'];?>
											</div>
										</li>
										<li>
											<div class="pointer" onclick="Wo_UpdatePostPrivacy(<?php echo $wo['story']['id']; ?>,0,event);">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg> <?php echo $wo['lang']['everyone'];?>
											</div>
										</li>
										<?php if ($wo['config']['connectivitySystem'] == 1) { ?>
										<li>
											<div class="pointer" onclick="Wo_UpdatePostPrivacy(<?php echo $wo['story']['id']; ?>,1,event);">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z"></path></svg> <?php echo $wo['lang']['my_friends'];?>
											</div>
										</li>
										<?php } else { ?>
										<li>
											<div class="pointer" onclick="Wo_UpdatePostPrivacy(<?php echo $wo['story']['id']; ?>,1,event);">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path></svg> <?php echo $wo['lang']['people_i_follow'];?>
											</div>
										</li>
										<li>
											<div class="pointer" onclick="Wo_UpdatePostPrivacy(<?php echo $wo['story']['id']; ?>,2,event);">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z"></path></svg> <?php echo $wo['lang']['people_follow_me'];?>
											</div>
										</li>
										<?php } ?>
									</ul>
								</span>
							<?php } else { ?>
								<span class="dropdown wo_post_privacy_menu">
									<span class="dropdown-toggle pointer" data-toggle="dropdown" role="button" aria-expanded="false">
										<span class="pointer post-privacy" style="color:#9197a3">
											<?php  if($wo['story']['postPrivacy'] == 0) { ?>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" title="<?php echo $wo['lang']['everyone'];?>"><path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg>
											<?php  } ?>
											<?php  if($wo['story']['postPrivacy'] == 2) { ?>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" title="Liked My Page"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path></svg>
											<?php  }  ?>
										</span>
										<span class="caret"></span>
									</span>
									<ul class="dropdown-menu post-privacy-menu post-privacy-options" role="menu">
										<li>
											<div class="pointer" onclick="Wo_UpdatePostPrivacy(<?php echo $wo['story']['id']; ?>,0,event);">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg> <?php echo $wo['lang']['everyone'];?>
											</div>
										</li>
										<li>
											<div class="pointer" onclick="Wo_UpdatePostPrivacy(<?php echo $wo['story']['id']; ?>,2,event);">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path></svg> Liked My Page
											</div>
										</li>
									</ul>
								</span>
							<?php } ?>
						<?php }  ?>
						<?php if(!empty($wo['story']['postMap'])) { ?>
							<?php if(!empty($wo['story']['postSoundCloud']) || 
								!empty($wo['story']['postVine']) || 
								!empty($wo['story']['postYoutube']) || 
								!empty($wo['story']['postPlaytube']) || 
								!empty($wo['story']['postVimeo']) || 
								!empty($wo['story']['postText']) || 
								!empty($wo['story']['postFile']) || 
								!empty($wo['story']['postLink']) || 
								!empty($wo['story']['postFacebook']) || 
								!empty($wo['story']['postDailymotion']) ||
								!empty($wo['story']['album_name']) || $wo['config']['google_map'] == 0) { ?>
							<span style="color:#9197a3"> - <i class="fa fa-map-marker"></i> <?php echo $wo['story']['postMap'];?>.</span>
							<?php } ?>
						<?php } else { ?>
						<?php
							$small_icon = '';
							$icon_type = '';
							if(!empty($wo['story']['postVine'])) { 
								$small_icon = 'vine';
								$icon_type = 'Vine';
							} else if (!empty($wo['story']['postVimeo'])) {
								$small_icon = 'vimeo';
								$icon_type = 'Vimeo';
							} else if (!empty($wo['story']['postFacebook'])) {
								$small_icon = 'facebook-official';
								$icon_type = 'Facebook';
							} else if (!empty($wo['story']['postDailymotion'])) {
								$small_icon = 'film';
								$icon_type = 'Dailymotion';
							} else if (!empty($wo['story']['postYoutube'])) {
								$small_icon = 'youtube-square';
								$icon_type = 'Youtube';
							} else if (!empty($wo['story']['postSoundCloud'])) {
								$small_icon = 'soundcloud';
								$icon_type = 'SoundCloud';
							}
							if (!empty($icon_type)) {
						?>
						<span style="color:#9197a3"> - <i class="fa fa-<?php echo $small_icon; ?>"></i> <?php echo $icon_type; ?></span>
						<?php  } } ?>
						<span class="time">
							&nbsp;&nbsp;<a  style="color:#9197a3" class="ajax-time" href="<?php echo $wo['story']['url'];?>" title="<?php echo date('c',$wo['story']['time']); ?>" target="_blank"><?php echo lui_Time_Elapsed_String($wo['story']['time']); ?></a>
						</span>
					</h6>
				</div>
			</div>

	       <?php }elseif (empty($wo['story']['parent_id'])) {
       ?>
			<div class="post-heading">
				<div class="<?php echo lui_RightToLeft('pull-left');?> image" onclick="InjectAPI('<?php echo htmlentities(json_encode(array('type' => $wo['story']['publisher']['type'], 'profile_id' => $wo['story']['publisher']['id']))); ?>', event);">
					<!--<a href="<?php echo $wo['story']['publisher']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['publisher']['username']?>">-->
						<img src="<?php echo $wo['story']['publisher']['avatar']; ?>" id="updateImage-<?php echo $wo['story']['publisher']['user_id']?>" class="avatar" alt="<?php echo $wo['story']['publisher']['name']; ?> profile picture">
					<!--</a>-->
				</div>
				<div class="<?php echo lui_RightToLeft('pull-right');?>">
					<?php  if ($wo['story']['admin'] === true || $wo['story']['group_admin'] === true) { ?>
					<span class="dropdown" id="bottom_sheet_menu_<?php echo $wo['story']['id']; ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather" style="margin: 0;width: 22px;height: 22px;"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
						</a>
						<ul class="dropdown-menu post-privacy-menu post-options" role="menu">
								<?php if ($wo['story']['admin'] === true && empty($wo['story']['product_id'])) { ?>
								<li>
									<?php $edit_json = array('type' => 'edit_post', 'post_id' => $wo['story']['id'], 'edit_text' => $wo['story']['Orginaltext']); ?>
									<div class="pointer" onclick="InjectAPI('<?php echo htmlentities(json_encode($edit_json)); ?>', event);" id="edit-post">
										<?php echo $wo['lang']['edit_post'];?>
									</div>
								</li>
								<?php } else if (!empty($wo['story']['product_id'])) { 
								if ($wo['story']['product']['status'] == 0) { ?>
								<li>
									<div class="pointer mark-as-sold-post" onclick="Wo_MarkAsSold(<?php echo $wo['story']['id']; ?>, <?php echo $wo['story']['product_id']; ?>);">
										<?php echo $wo['lang']['mark_as_sold']?>
									</div>
								</li>
								<?php } } ?>
								<li>
									<div class="pointer" onclick="InjectAPI('<?php echo htmlentities(json_encode(array('type' => 'delete_post', 'post_id' => $wo['story']['id']))); ?>', event);">
										<?php echo $wo['lang']['delete_post'];?>
									</div>
								</li>
								<li>
					                <div class="pointer disable-comments" onclick="Wo_DisableComment(<?php echo $wo['story']['id']; ?>, <?php echo $wo['story']['comments_status']; ?>);">
					                <?php echo ($wo['story']['comments_status'] == 1) ? $wo['lang']['disable_comments'] : $wo['lang']['enable_comments'];?>
					                </div>
					              </li>
								<?php if (empty($wo['story']['recipient']) && $wo['story']['admin'] === true) { ?>
								<?php if ($wo['story']['is_group_post'] == false) { ?>
								<li>
									<?php
										$pin_post_id = $wo['story']['publisher']['id'];
										$pin_post_text = 'profile';
										if (!empty($wo['story']['page_id'])) {
											$pin_post_id = $wo['story']['page_id'];
											$pin_post_text = 'page';
										} else if (!empty($wo['story']['group_id'])) {
											$pin_post_id = $wo['story']['group_id'];
											$pin_post_text = 'group';
										}
									?>
									<div class="pin-post pointer" onclick="Wo_PinPost(<?php echo $wo['story']['id']; ?>, <?php echo $pin_post_id;?>, '<?php echo $pin_post_text; ?>');">
										<?php if($wo['story']['is_post_pinned'] === true) { ?>
											<?php echo $wo['lang']['unpin_post'];?>
										<?php } else { ?>
											<?php echo $wo['lang']['pin_post'];?>
										<?php } ?>
									</div>
								</li>
								<?php } } ?>
								<!--<?php if (!empty($wo['story']['album_name']) && ($wo['story']['group_admin'] === false || $wo['story']['admin'] === true)) {?>
								<li>
									<a href="<?php echo lui_SeoLink('index.php?link1=create-album&album=' . $wo['story']['id']);?>" >
										<i class="fa fa-camera progress-icon fa-fw" data-icon="camera"></i> <?php echo $wo['lang']['add_photos'];?>
									</a>
								</li>
								<?php } ?>-->
						</ul>
					</span>
					<?php  } elseif ($wo['loggedin'] == true) { ?>
					<span class="dropdown" id="bottom_sheet_menu_<?php echo $wo['story']['id']; ?>">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather" style="margin: 0;width: 22px;height: 22px;"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
						</a>
						<ul class="dropdown-menu post-privacy-menu post-options post-recipient" role="menu"  >
								<li>
									<div class="save-post pointer" class="save-post" onclick="Wo_SavePost(<?php echo $wo['story']['id']; ?>);">
									<?php if($wo['story']['is_post_saved'] === true) { ?>
										<?php echo $wo['lang']['unsave_post'];?>
									<?php } else { ?>
										<?php echo $wo['lang']['save_post'];?>
									<?php } ?>
									</div>
								</li>
								<li>
									<div  class="report-post pointer" onclick="Wo_ReportPost(<?php echo $wo['story']['id']; ?>);">
									<?php if($wo['story']['is_post_reported'] === true) { ?>
										<?php echo $wo['lang']['unreport_post'];?>
									<?php } else { ?>
										<?php echo $wo['lang']['report_post'];?>
									<?php } ?>
									</div>
								</li>
								<!--<li>
									<a href="<?php echo $wo['story']['url'];?>" target="_blank" >
										<i class="fa fa-link progress-icon fa-fw" data-icon="link"></i> <?php echo $wo['lang']['open_post_in_new_tab'];?>
									</a>
								</li>-->
							</ul>
					</span>
					<?php } ?>
				</div>
				
				<div class="meta">
					<div class="title h5">
						<b onclick="InjectAPI('<?php echo htmlentities(json_encode(array('type' => $wo['story']['publisher']['type'], 'profile_id' => $wo['story']['publisher']['id']))); ?>', event);" style="margin-right: 2px;"><?php echo $wo['story']['publisher']['name']; ?></b>
						<?php if($wo['story']['publisher']['verified'] == 1) { ?>
							<span class="verified-color">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" /></svg>
							</span>
						<?php } ?>
						<?php if (isset($wo['story']['publisher']['is_pro'])) { 
							if(lui_IsUserPro($wo['story']['publisher']['is_pro']) === true) { ?>
						<?php 
							$user_pro_type = lui_GetUserProType($wo['story']['publisher']['pro_type']);
						?>
							<span style="color:<?php echo $user_pro_type['color_name'];?>"><i class="fa fa-<?php echo $user_pro_type['icon'];?> fa-fw" title="<?php echo $user_pro_type['type_name'];?>" data-toggle="tooltip"></i></span>
						<?php } } ?>
						<?php if ($wo['story']['shared_from'] && is_array($wo['story']['shared_from'])): ?>
							<span class="user-popover" data-type="<?php echo $wo['story']['shared_from']['type']; ?>" data-id="<?php echo $wo['story']['shared_from']['id']; ?>">
								<span><?php echo $wo['lang']['shared']; ?></span> 
								<a href="<?php echo $wo['story']['shared_from']['url']; ?>" class="pointer no_decor" data-ajax="?link1=timeline&u=<?php echo $wo['story']['shared_from']['username']; ?>"><b><?php echo $wo['story']['shared_from']['name']; ?></b></a>
								<?php if($wo['story']['shared_from']['verified'] == 1) { ?>
								<span class="verified-color">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" /></svg>
								</span>
								<?php } ?>
							</span>
						<?php endif; ?>
						<?php if ($wo['story']['shared_from'] && is_array($wo['story']['shared_from'])): ?>
							<span><a href="<?php echo $wo['story']['post_url']; ?>" class="pointer"><span style="color: #666;"><?php echo strtolower($wo['lang']['post']); ?></span></a></span>
						<?php endif; ?>
						<?php if ($wo['story']['recipient_exists'] == true) {  ?>
							<i class="fa fa-arrow-right"></i>
							<a href="<?php echo $wo['story']['recipient']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['recipient']['username']; ?>" onclick="InjectAPI('{&quot;profile_id&quot; : &quot;<?php echo $wo['story']['recipient']['id']?>&quot;, &quot;type&quot;:&quot;user&quot;}', event);">
								<b><?php echo $wo['story']['recipient']['name']; ?></b>
							</a>
							<?php if($wo['story']['recipient']['verified'] == 1) { ?>
								<span class="verified-color"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" /></svg></span>
							<?php } ?>
						<?php } ?>
						<?php if ($wo['story']['group_recipient_exists'] == true && $wo['page'] != 'group') {  ?>
							<i class="fa fa-arrow-right"></i>
							<a href="<?php echo $wo['story']['group_recipient']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['group_recipient']['username']; ?>" onclick="InjectAPI('{&quot;profile_id&quot; : &quot;<?php echo $wo['story']['group_recipient']['id']?>&quot;, &quot;type&quot;:&quot;group&quot;}', event);">
								<b><?php echo $wo['story']['group_recipient']['name']; ?></b>
							</a>
						<?php } ?>
						<?php if (!empty($wo['story']['album_name'] && empty($wo['story']['shared_from']))) {  ?>
							<small class="small-text"><?php echo $wo['lang']['added_new_photos_to'];?> <b><!--<a href="<?php echo $wo['story']['url']; ?>" data-ajax="?link1=post&id=<?php echo $wo['story']['id'];?>">--><?php echo $wo['story']['album_name']; ?><!--</a>--></b></small>
						<?php } ?>
						<?php if (!empty($wo['story']['product_id']) && empty($wo['story']['shared_from'])) {  ?>
							<small class="small-text"><?php echo $wo['lang']['added_new_product_for_sell']; ?></small>
						<?php } ?>
						<?php if (!empty($wo['story']['blog_id']) && empty($wo['story']['shared_from'])) {  ?>
							<small class="small-text"><?php echo $wo['lang']['created_new_blog'] ?></small>
						<?php } ?>
						<?php if (empty($wo['story']['shared_from'])): ?>
							<small class="small-text">
								<?php 
									if($wo['story']['postType'] == 'profile_picture') { 
										$changed_profile_pic_lang = $wo['lang']['changed_profile_picture_male'];
										if ($wo['story']['publisher']['gender'] == 'female') {
											$changed_profile_pic_lang = $wo['lang']['changed_profile_picture_female'];
										} else {
											$changed_profile_pic_lang = $wo['lang']['changed_profile_picture_male'];
										}
										echo $changed_profile_pic_lang;
									} 
									if($wo['story']['postType'] == 'profile_cover_picture') { 
										$changed_profile_cover_pic_lang = $wo['lang']['changed_profile_cover_picture_male'];
										if ($wo['story']['publisher']['gender'] == 'female') {
											$changed_profile_cover_pic_lang = $wo['lang']['changed_profile_cover_picture_female'];
										} else {
											$changed_profile_cover_pic_lang = $wo['lang']['changed_profile_cover_picture_male'];
										}
										echo $changed_profile_cover_pic_lang;
									} 
								?>
							</small>
						<?php endif; ?>
						<?php if($wo['story']['via_type'] == 'share') {  ?>
							<small style="color:#a33e40;"><?php echo $wo['story']['via']['name'];?> <?php echo $wo['lang']['shared_this_post'];?></small>
						<?php }  ?>
						<?php 
							$extra_exists = 0;
							if (!empty($wo['story']['postFeeling'])) {
								if (empty($changed_profile_pic_lang) 
									&& $wo['story']['via_type'] != 'share'
									&& $wo['story']['group_recipient_exists'] != true
									&& empty($wo['story']['album_name'])) {
						?>
							<span class="feeling-text"> <?php echo $wo['lang']['is_feeling'];?> <i class="twa-lg twa twa-<?php echo $wo['story']['postFeelingIcon'];?>"></i> <?php echo $wo['lang'][$wo['story']['postFeeling']];?></span>
						<?php
							} else {
								$extra_exists = 1;
							}
							}
							if (!empty($wo['story']['postTraveling'])) {
								if (empty($changed_profile_pic_lang) 
									&& $wo['story']['via_type'] != 'share'
									&& $wo['story']['group_recipient_exists'] != true
									&& empty($wo['story']['album_name'])) {
						?>
							<span class="feeling-text"><i class="fa fa-plane"></i> <?php echo $wo['lang']['is_traveling'];?> <?php echo $wo['story']['postTraveling'];?></span>
						<?php
							} else {
								$extra_exists = 1;
							}
							}
							if (!empty($wo['story']['postListening'])) {
								if (empty($changed_profile_pic_lang) 
									&& $wo['story']['via_type'] != 'share'
									&& $wo['story']['group_recipient_exists'] != true
									&& empty($wo['story']['album_name'])) {
						?>
							<span class="feeling-text"><i class="fa fa-headphones"></i> <?php echo $wo['lang']['is_listening'];?> <?php echo $wo['story']['postListening'];?></span>
						<?php
							} else {
								$extra_exists = 1;
							}
							}
							if (!empty($wo['story']['postPlaying'])) {
								if (empty($changed_profile_pic_lang) 
									&& $wo['story']['via_type'] != 'share'
									&& $wo['story']['group_recipient_exists'] != true
									&& empty($wo['story']['album_name'])) {
						?>
							<span class="feeling-text"><i class="fa fa-gamepad"></i> <?php echo $wo['lang']['is_playing'];?> <?php echo $wo['story']['postPlaying'];?></span>
						<?php
							} else {
								$extra_exists = 1;
							}
							}
							if (!empty($wo['story']['postWatching'])) {
								if (empty($changed_profile_pic_lang) 
								&& $wo['story']['via_type'] != 'share'
								&& $wo['story']['group_recipient_exists'] != true
								&& empty($wo['story']['album_name'])) {
						?>
							<span class="feeling-text"><i class="fa fa-eye"></i> <?php echo $wo['lang']['is_watching'];?> <?php echo $wo['story']['postWatching'];?></span>
						<?php
							} else {
								$extra_exists = 1;
							}
							}
						?>
					</div>
					
					<h6>
						<span class="time">
							<span  style="color:#9197a3" class="ajax-time" href="<?php echo $wo['story']['url'];?>" title="<?php echo date('c',$wo['story']['time']); ?>" target="_blank"><?php echo lui_Time_Elapsed_String($wo['story']['time']); ?></span>
						</span>
						<?php  if ($wo['story']['admin'] === true && $wo['story']['group_recipient_exists'] == false && empty($wo['story']['product_id'])) { ?>
							<?php  if (empty($wo['story']['page_id'])) { ?>
							<span class="dropdown wo_post_privacy_menu" style="color:#9197a3">
								<span class="dropdown-toggle pointer" data-toggle="dropdown" role="button" aria-expanded="false">
									<span class="pointer post-privacy" style="color:#9197a3">
										<?php  if($wo['story']['postPrivacy'] == 0) { ?>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe" data-toggle="tooltip" title="<?php echo $wo['lang']['everyone'];?>"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
										<?php  } ?>
										<?php  if($wo['story']['postPrivacy'] == 1) { ?>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users" data-toggle="tooltip" title="<?php echo ($wo['config']['connectivitySystem'] == 1) ? $wo['lang']['my_friends'] : $wo['lang']['people_i_follow'];?>"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
										<?php  }  ?>
										<?php  if($wo['story']['postPrivacy'] == 2) { ?>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user" data-toggle="tooltip" title="<?php echo ($wo['config']['connectivitySystem'] == 1) ? $wo['lang']['my_friends'] : $wo['lang']['people_follow_me'];?>"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
										<?php  }  ?>
										<?php  if($wo['story']['postPrivacy'] == 3) { ?>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock" data-toggle="tooltip" title="<?php echo $wo['lang']['only_me'];?>"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
										<?php  }  ?>
									</span>
									<span class="caret" style="color:#9197a3"></span>
								</span>
								<ul class="dropdown-menu post-privacy-menu" role="menu">
									<li>
										<div onclick="Wo_UpdatePostPrivacy(<?php echo $wo['story']['id']; ?>,3,event);">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> <?php echo $wo['lang']['only_me'];?>
										</div>
									</li>
									<li>
										<div onclick="Wo_UpdatePostPrivacy(<?php echo $wo['story']['id']; ?>,0,event);">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg> <?php echo $wo['lang']['everyone'];?>
										</div>
									</li>
									<?php if ($wo['config']['connectivitySystem'] == 1) { ?>
									<li>
										<div onclick="Wo_UpdatePostPrivacy(<?php echo $wo['story']['id']; ?>,1,event);">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> <?php echo $wo['lang']['my_friends'];?>
										</div>
									</li>
									<?php } else { ?>
									<li>
										<div onclick="Wo_UpdatePostPrivacy(<?php echo $wo['story']['id']; ?>,1,event);">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <?php echo $wo['lang']['people_i_follow'];?>
										</div>
									</li>
									<li>
										<div onclick="Wo_UpdatePostPrivacy(<?php echo $wo['story']['id']; ?>,2,event);">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> <?php echo $wo['lang']['people_follow_me'];?>
										</div>
									</li>
									<?php } ?>
								</ul>
							</span>
							<?php } else { ?>
							<span class="dropdown wo_post_privacy_menu">
								<span class="dropdown-toggle pointer" data-toggle="dropdown" role="button" aria-expanded="false">
									<span class="pointer post-privacy" style="color:#9197a3">
									<?php  if($wo['story']['postPrivacy'] == 0) { ?>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe" data-toggle="tooltip" title="<?php echo $wo['lang']['everyone'];?>"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
									<?php  } ?>
									<?php  if($wo['story']['postPrivacy'] == 2) { ?>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user" data-toggle="tooltip" title="Liked My Page"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
									<?php  }  ?>
									</span>
									<span class="caret"></span>
								</span>
								<ul class="dropdown-menu post-privacy-menu" role="menu">
									<li>
										<div onclick="Wo_UpdatePostPrivacy(<?php echo $wo['story']['id']; ?>,0,event);">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg> <?php echo $wo['lang']['everyone'];?>
										</div>
									</li>
									<hr>
									<li>
										<div onclick="Wo_UpdatePostPrivacy(<?php echo $wo['story']['id']; ?>,2,event);">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Liked My Page
										</div>
									</li>
								</ul>
							</span>
							<?php } ?>
						<?php }  ?>
						<?php if(!empty($wo['story']['postMap'])) { ?>
							<?php if(!empty($wo['story']['postSoundCloud']) || 
								!empty($wo['story']['postVine']) || 
								!empty($wo['story']['postYoutube']) || 
								!empty($wo['story']['postPlaytube']) || 
								!empty($wo['story']['postVimeo']) || 
								!empty($wo['story']['postText']) || 
								!empty($wo['story']['postFile']) || 
								!empty($wo['story']['postLink']) || 
								!empty($wo['story']['postFacebook']) || 
								!empty($wo['story']['postDailymotion']) ||
								!empty($wo['story']['album_name']) || $wo['config']['google_map'] == 0) { ?>
							<span style="color:#9197a3"> - <i class="fa fa-map-marker"></i> <?php echo $wo['story']['postMap'];?>.</span>
							<?php } ?>
						<?php } else { ?>
						<?php
							$small_icon = '';
							$icon_type = '';
							if(!empty($wo['story']['postVine'])) { 
								$small_icon = 'vine';
								$icon_type = 'Vine';
							} else if (!empty($wo['story']['postVimeo'])) {
								$small_icon = 'vimeo';
								$icon_type = 'Vimeo';
							} else if (!empty($wo['story']['postFacebook'])) {
								$small_icon = 'facebook-official';
								$icon_type = 'Facebook';
							} else if (!empty($wo['story']['postDailymotion'])) {
								$small_icon = 'film';
								$icon_type = 'Dailymotion';
							} else if (!empty($wo['story']['postYoutube'])) {
								$small_icon = 'youtube-square';
								$icon_type = 'Youtube';
							} else if (!empty($wo['story']['postSoundCloud'])) {
								$small_icon = 'soundcloud';
								$icon_type = 'SoundCloud';
							}
							if (!empty($icon_type)) {
						?>
						<span style="color:#9197a3"> - <i class="fa fa-<?php echo $small_icon; ?>"></i> <?php echo $icon_type; ?></span>
						<?php  } } ?>
					</h6>
				</div>
			</div>
			<?php } ?>
			
			<div class="post-description">
				
				
				<!-- Hide Post Owner -->
<?php if (!empty($wo['story']['parent_id'])) {
        $post_shared_from = lui_PostData($wo['story']['parent_id']);
        $wo['story'] = $post_shared_from;

       ?>
<div>
  <div class="clear"></div>
  <div class="bs-callout bs-callout-default">
    <div class="post-heading" style="padding: 5px 5px;height: 50px">
      <div class="<?php echo lui_RightToLeft('pull-left');?> image">
                <a href="<?php echo $wo['story']['publisher']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['publisher']['username']?>">
                <img src="<?php echo $wo['story']['publisher']['avatar']; ?>" id="updateImage-<?php echo $wo['story']['publisher']['user_id']?>" class="avatar" alt="<?php echo $wo['story']['publisher']['name']; ?> profile picture" style="width: 40px;height: 40px;">
                </a>
            </div>
      <div class="title h5" style="margin-bottom: 0;margin-top: 4px;">
              
        <span class="user-popover" data-type="<?php echo $wo['story']['publisher']['type']; ?>" data-id="<?php echo $wo['story']['publisher']['id']; ?>">

        <a class="main-color" href="<?php echo $wo['story']['publisher']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['story']['publisher']['username']; ?>">
          <b><?php echo $wo['story']['publisher']['name']; ?></b>
        </a>
        <?php if($wo['story']['publisher']['verified'] == 1) { ?>
          <span class="verified-color">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather feather-check-circle" title="<?php echo $wo['lang']['verified_user'];?>" data-toggle="tooltip"><path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z" /></svg>
          </span>
        <?php } ?>
        </span>
      </div>
      <h6>
            <span class="time">
               <a  style="color:#9197a3" class="ajax-time" href="<?php echo $wo['story']['url'];?>" title="<?php echo date('c',$wo['story']['time']); ?>" target="_blank"><?php echo lui_Time_Elapsed_String($wo['story']['time']); ?></a>
            </span>
          </h6>
    </div>
    <div>
      <?php if (empty($wo['story']['color_id']) || (!empty($wo['story']['color_id']) && empty($wo['post_colors'][$wo['story']['color_id']]))) { ?>
         <p style="margin-top: 15px;"><?php echo $wo['story']['postText']; ?></p>
         <?php } ?>
         <?php if (!empty($wo['story']['color_id']) && !empty($wo['post_colors'][$wo['story']['color_id']])) { ?>
        <div dir="auto" 
		<?php if($wo['config']['colored_posts_system'] == 1){ ?>
			class="wo_actual_colrd_post" style="
			<?php if (!empty($wo['post_colors'][$wo['story']['color_id']]) && !empty($wo['post_colors'][$wo['story']['color_id']]->color_1) && !empty($wo['post_colors'][$wo['story']['color_id']]->color_2) && !empty($wo['post_colors'][$wo['story']['color_id']]->text_color)) { ?>
				background-image: linear-gradient(45deg, <?php echo $wo['post_colors'][$wo['story']['color_id']]->color_1; ?> 0%, <?php echo $wo['post_colors'][$wo['story']['color_id']]->color_2; ?> 100%);margin: 10px -10px -5px;
			<?php }else{ ?>
				background-image:url('<?php echo lui_GetMedia($wo['post_colors'][$wo['story']['color_id']]->image); ?>');margin: 10px -10px -5px; <?php } ?>
			<?php if(strlen($wo['story']['postText']) > 330){ ?>font-size: 16px;font-weight: normal;<?php } ?>"
		<?php } ?>
	>
	<span <?php if($wo['config']['colored_posts_system'] == 1){ ?> style="<?php if (!empty($wo['post_colors'][$wo['story']['color_id']]) && !empty($wo['post_colors'][$wo['story']['color_id']]->text_color)) { ?>color:<?php echo $wo['post_colors'][$wo['story']['color_id']]->text_color; ?><?php } ?>"<?php } ?>> <?php echo $wo['story']['postText']; ?></span>
	</div>
        <?php } ?>
    </div>

      <div class="clear"></div>
      <?php  $wo['story'] = $current_post;

       ?>
        <!-- Hide Post Owner -->
				
				
				<?php
					if (!empty($wo['story']['product_id'])) {
						$class = '';
						$small = '';
						if (count($wo['story']['product']['images']) == 2) {
							$class = 'width-2';
						}
						if (count($wo['story']['product']['images']) > 1) {
							$small = '_small';
						}
						if (count($wo['story']['product']['images']) > 2) {
							$class = 'width-3';
						}
						if (count($wo['story']['product']['images']) == 1) {
							echo  "<img src='" . $wo['story']['product']['images'][0]['image'] ."' alt='image' class='image-file pointer' onclick=\"InjectAPI('{&quot;type&quot; : &quot;lightbox&quot;, &quot;image_url&quot;:&quot;" . $wo['story']['product']['images'][0]['image'] . "&quot;}', event);\">";
						} else {
							foreach ($wo['story']['product']['images'] as $photo) {
								echo  "<img src='" . $photo['image_org'] ."' alt='image' class='" . $class . " image-file pointer' onclick=\"InjectAPI('{&quot;type&quot; : &quot;lightbox&quot;, &quot;image_url&quot;:&quot;" . $photo['image'] . "&quot;}', event);\">";
							}
						}
						echo '<br><br>';
						$symbol =  (!empty($wo['currencies'][$wo['story']['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['story']['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];
						$text =  (!empty($wo['currencies'][$wo['story']['product']['currency']]['text'])) ? $wo['currencies'][$wo['story']['product']['currency']]['text'] : $wo['config']['classified_currency'];
						$status = '<span class="product-description">' . $wo['lang']['currently_unavailable'] . '</span>';
			            if ($wo['story']['product']['units'] > 0) {
			              $status = ($wo['story']['product']['status'] == 0) ? '<span class="product-description">' . $wo['lang']['in_stock'] . '</span>' : '<span class="product-status-sold">' . $wo['lang']['sold'] . '</span><br><br>';
			            }
						$type = ($wo['story']['product']['type'] == 0) ? '<span class="product-description">' . $wo['lang']['new'] . '</span>' : '<span class="product-description">' . $wo['lang']['used'] . '</span><br>';
						echo '<div class="product-name"><h4 class="product-description">' . $wo['story']['product']['name'] . '</h4></div>';
						if (!empty($wo['story']['product']['location'])) {
							echo '<div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg></span> <span class="product-description"> ' . $wo['story']['product']['location'] . '</span></div><br>';
						}
						echo '<div class="product-name"><p class="product-description product-description-'.$wo['story']['product']['id'].'">' . $wo['story']['product']['description'] . '</p></div><br>';
						echo '<div class="wo_product_row"><div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag" color="#2196F3"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>' . $wo['lang']['type'] . '</span> ' . $type . '</div>';
						echo '<div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card" color="#349238"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>' . $wo['lang']['price'] . '</span> <span class="product-description" style="max-height: none;">' . $symbol . $wo['story']['product']['price'] . ' (' . $text . ')</span></div>';
						echo '<div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package" color="#9C27B0"><path d="M12.89 1.45l8 4A2 2 0 0 1 22 7.24v9.53a2 2 0 0 1-1.11 1.79l-8 4a2 2 0 0 1-1.79 0l-8-4a2 2 0 0 1-1.1-1.8V7.24a2 2 0 0 1 1.11-1.79l8-4a2 2 0 0 1 1.78 0z"></path><polyline points="2.32 6.16 12 11 21.68 6.16"></polyline><line x1="12" y1="22.76" x2="12" y2="11"></line><line x1="7" y1="3.5" x2="17" y2="8.5"></line></svg>' . $wo['lang']['status'] . '</span> ' . $status . '</div></div>';
					} 
				?>
				<p dir="auto"><?php if (!empty($wo['story']['postFeeling']) && $extra_exists == 1) { ?>
						<span class="feeling-text"> — <i class="twa-lg twa twa-<?php echo $wo['story']['postFeelingIcon'];?>"></i> <?php echo $wo['lang']['feeling'];?> <?php echo $wo['lang'][$wo['story']['postFeeling']];?></span>
					<?php } ?><?php if (!empty($wo['story']['postTraveling']) && $extra_exists == 1) { ?>
						<span class="feeling-text"> — <i class="fa fa-plane"></i> <?php echo $wo['lang']['traveling'];?><?php echo $wo['story']['postTraveling'];?></span>
					<?php } ?><?php if (!empty($wo['story']['postWatching']) && $extra_exists == 1) { ?>
						<span class="feeling-text"> — <i class="fa fa-eye"></i> <?php echo $wo['lang']['watching'];?> <?php echo $wo['story']['postWatching'];?></span>
					<?php } ?><?php if (!empty($wo['story']['postPlaying']) && $extra_exists == 1) { ?>
						<span class="feeling-text"> — <i class="fa fa-gamepad"></i> <?php echo $wo['lang']['playing'];?> <?php echo $wo['story']['postPlaying'];?></span>
					<?php } ?><?php if (!empty($wo['story']['postListening']) && $extra_exists == 1) { ?>
						<span class="feeling-text"> — <i class="fa fa-headphones"></i> <?php echo $wo['lang']['listening'];?> <?php echo $wo['story']['postListening'];?></span>
					<?php } ?></p>
				
				<?php if(!empty($wo['story']['postYoutube'])) {  ?>
					<div class="post-youtube youtube-player" data-postapi-id="<?php echo $wo['story']['id'];?>">
						<iframe id="ytplayer" type="text/html" width="100%" height="340" src="https://www.youtube.com/embed/<?php echo $wo['story']['postYoutube']; ?>?autoplay=0" frameborder="0"/></iframe>
					</div>
				<?php } ?>
				<?php if(!empty($wo['story']['postPlaytube'])) {  ?>
					<div class="post-youtube">
						<iframe id="ptplayer" type="text/html" width="100%" height="340" src="<?php echo $wo['config']['playtube_url']; ?>/embed/<?php echo $wo['story']['postPlaytube']; ?>?autoplay=0" frameborder="0"/></iframe>
					</div>
				<?php } ?>
				<?php if(!empty($wo['story']['postDeepsound'])) {  ?>
		          <div class="post-youtube">
		            <iframe id="ptplayer" type="text/html" width="100%" height="340" src="<?php echo $wo['config']['deepsound_url']; ?>/embed/<?php echo $wo['story']['postDeepsound']; ?>?autoplay=0&fullscreen=1" frameborder="0" style="height: 140px !important;"/></iframe>
		          </div>
		        <?php } ?>
				<?php if(!empty($wo['story']['postVimeo'])) {  ?>
					<div class="post-youtube">
						<iframe src="https://player.vimeo.com/video/<?php echo $wo['story']['postVimeo'];?>?byline=0&portrait=0" width="100%" height="340" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				<?php } ?>
				<?php if(!empty($wo['story']['postFacebook'])) {  ?>
					<div class="post-youtube">
						<iframe src="https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/<?php echo $wo['story']['postFacebook'];?>&show_text=0" width="100%" height="340" frameborder="0" allowfullscreen></iframe>
					</div>
				<?php } ?>
				<?php if(!empty($wo['story']['postDailymotion'])) {  ?>
					<div class="post-youtube">
						<iframe frameborder="0" width="100%" height="340" src="https://www.dailymotion.com/embed/video/<?php echo $wo['story']['postDailymotion']?>" allowfullscreen></iframe>
					</div>
				<?php } ?>
				<?php if(!empty($wo['story']['postVine'])) {  ?>
					<iframe src="https://vine.co/v/<?php echo $wo['story']['postVine']; ?>/embed/simple" width="100%" height="400" frameborder="0"></iframe>
				<?php } ?>
				<?php if(!empty($wo['story']['postSoundCloud'])) { ?>
					<iframe width="100%" src="https://w.soundcloud.com/player/?url=https://api.soundcloud.com/tracks/<?php echo $wo['story']['postSoundCloud'];?>&auto_play=false"></iframe>
				<?php } ?>
				<?php if(!empty($wo['story']['postMap']) && empty($wo['story']['postText']) && empty($wo['story']['postVine']) && empty($wo['story']['postSoundCloud']) && empty($wo['story']['postVimeo']) && empty($wo['story']['postDailymotion']) && empty($wo['story']['postDeepsound']) && empty($wo['story']['postYoutube']) && empty($wo['story']['postFile']) && $wo['config']['google_map'] == 1) { ?>
					<div class="post-map" onclick="InjectAPI('{&quot;type&quot; : &quot;map&quot;, &quot;location&quot;:&quot;<?php echo $wo['story']['postMap'];?>&quot;}', event);">
						<img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $wo['story']['postMap'];?>&zoom=13&size=600x250&maptype=roadmap&markers=color:red%7C<?php echo $wo['story']['postMap'];?>&key=<?php echo $wo['config']['google_map_api'];?>" width="100%">
					</div>
				<?php } ?>
		
				<?php if(!empty($wo['story']['postLink']) && empty($wo['story']['postVine']) && empty($wo['story']['postSoundCloud']) && empty($wo['story']['postYoutube']) && empty($wo['story']['postFile']) && empty($wo['story']['postDeepsound'])) { ?>
					<div class="post-fetched-url wo_post_fetch_link">
						<div onclick="InjectAPI('{&quot;type&quot; : &quot;url&quot;, &quot;link&quot;:&quot;<?php echo $wo['story']['postLink'];?>&quot;}', event);">
							<?php if (!empty($wo['story']['postLinkImage'])) {?>
								<div class="post-fetched-url-con">
									<img src="<?php echo $wo['story']['postLinkImage'];?>" class="<?php echo lui_RightToLeft('pull-left');?>" alt="<?php echo $wo['story']['postLinkTitle'];?>"/>
									<div class="url">
										<?php 
											$parse = parse_url($wo['story']['postLink']);
											echo $parse['host'];
										?>
									</div>
								</div>
							<?php } ?>
							<div class="fetched-url-text">
								<h4><?php echo $wo['story']['postLinkTitle'];?></h4>
								<div class="description"><?php echo $wo['story']['postLinkContent'];?></div>
								<?php if (empty($wo['story']['postLinkImage'])) {?>
									<div class="url">
										<?php 
											$parse = parse_url($wo['story']['postLink']);
											echo $parse['host'];
										?>
									</div>
								<?php } ?>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				<?php } ?>
				<?php if(!empty($wo['story']['blog_id'])) { ?>
					<div class="post-fetched-url wo_post_fetch_blog">
						<a onclick="InjectAPI('{&quot;type&quot; : &quot;url&quot;, &quot;link&quot;:&quot;<?php echo $wo['story']['blog']['url'];?>&quot;}', event);">
							<div class="fetched-url-text">
								<h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> <?php echo $wo['story']['blog']['title'];?></h4>
								<div class="description"><?php echo $wo['story']['blog']['description'];?></div>
							</div>
							<?php if (!empty($wo['story']['blog']['thumbnail'])) {?>
								<div class="post-fetched-url-con">
									<img src="<?php echo $wo['story']['blog']['thumbnail'];?>" class="<?php echo lui_RightToLeft('pull-left');?>" alt="<?php echo $wo['story']['blog']['title'];?>"/>
								</div>
							<?php } ?>
							<div class="clear"></div>
						</a>
					</div>
				<?php } ?>
				<?php if(!empty($wo['story']['postFile'])) { ?>
					<div class="post-file wo_shared_doc_file">
						<?php
							$media = array(
								'type' => 'post',
								'storyId' => $wo['story']['id'],
								'filename' => $wo['story']['postFile'],
								'name' => $wo['story']['postFileName'],
								'postFileThumb' => $wo['story']['postFileThumb'],
							);
							echo lui_DisplaySharedFile($media, 'api', $wo['story']['cache']);
						?>
					</div>
				<?php } ?>
				<?php if (lui_IsUrl($wo['story']['postSticker'])): ?>
					<div class="post-file">
						<?php if (strpos('.mp4', $wo['story']['postSticker'])) { ?>
							<video autoplay loop><source src="<?php echo $wo['story']['postSticker']; ?>" type="video/mp4"></video>
						<?php } else { ?>
							<img src="<?php echo $wo['story']['postSticker']; ?>" alt="GIF">
						<?php } ?>
					</div>
				<?php endif; ?>
				<div id="fullsizeimg">
					<?php if (!empty($wo['story']['photo_album'])) {
						$class = '';
						$small = '';
						if (count($wo['story']['photo_album']) == 2) {
							$class = 'width-2';
						}
						if (count($wo['story']['photo_album']) > 1) {
							$small = '_small';
						}
						if (count($wo['story']['photo_album']) > 2) {
							$class = 'width-3';
						}
						$delete = '';
						$onhover = '';
						foreach ($wo['story']['photo_album'] as $photo) {
							if ($wo['story']['admin'] === true) {
								$delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
								$onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
							}
							echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick=\"InjectAPI('{&quot;type&quot; : &quot;lightbox&quot;, &quot;image_url&quot;:&quot;" . $photo['image'] . "&quot;}', event);\"></div>";
						}
					} 
					?>
					<?php if ($wo['story']['multi_image'] == 1) {
						$class = '';
						$small = '';
						if (count($wo['story']['photo_multi']) == 2) {
							$class = 'width-2';
						}
						if (count($wo['story']['photo_multi']) > 1) {
							$small = '_small';
						}
						if (count($wo['story']['photo_multi']) > 2) {
							$class = 'width-3';
						}
						foreach ($wo['story']['photo_multi'] as $photo) {
							echo  "<img src='" . lui_GetMedia($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer' onclick=\"InjectAPI('{&quot;type&quot; : &quot;lightbox&quot;, &quot;image_url&quot;:&quot;" . $photo['image'] . "&quot;}', event);\">";
						}
					} 
					?>
				</div>
				<?php
					if ($wo['story']['poll_id'] == 1) {
						echo lui_LoadPage('story/entries/options');
					}
				?>
				<div class="clear"></div>









  </div>
  <div class="clear"></div>
</div>
        <div class="clear"></div>
      <?php  $wo['story'] = $current_post;}

       ?>
        <!-- Hide Post Owner -->
        <?php  if (empty($current_post['parent_id'])) { ?>
				
				
				<?php
					if (!empty($wo['story']['product_id'])) {
						$class = '';
						$small = '';
						if (count($wo['story']['product']['images']) == 2) {
							$class = 'width-2';
						}
						if (count($wo['story']['product']['images']) > 1) {
							$small = '_small';
						}
						if (count($wo['story']['product']['images']) > 2) {
							$class = 'width-3';
						}
						if (count($wo['story']['product']['images']) == 1) {
							echo  "<img src='" . $wo['story']['product']['images'][0]['image'] ."' alt='image' class='image-file pointer' onclick=\"InjectAPI('{&quot;type&quot; : &quot;lightbox&quot;, &quot;image_url&quot;:&quot;" . $wo['story']['product']['images'][0]['image'] . "&quot;}', event);\">";
						} else {
							foreach ($wo['story']['product']['images'] as $photo) {
								echo  "<img src='" . $photo['image_org'] ."' alt='image' class='" . $class . " image-file pointer' onclick=\"InjectAPI('{&quot;type&quot; : &quot;lightbox&quot;, &quot;image_url&quot;:&quot;" . $photo['image'] . "&quot;}', event);\">";
							}
						}
						echo '<br><br>';
						$symbol =  (!empty($wo['currencies'][$wo['story']['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['story']['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];
						$text =  (!empty($wo['currencies'][$wo['story']['product']['currency']]['text'])) ? $wo['currencies'][$wo['story']['product']['currency']]['text'] : $wo['config']['classified_currency'];
						$status = '<span class="product-description">' . $wo['lang']['currently_unavailable'] . '</span>';
			            if ($wo['story']['product']['units'] > 0) {
			              $status = ($wo['story']['product']['status'] == 0) ? '<span class="product-description">' . $wo['lang']['in_stock'] . '</span>' : '<span class="product-status-sold">' . $wo['lang']['sold'] . '</span><br><br>';
			            }
						$type = ($wo['story']['product']['type'] == 0) ? '<span class="product-description">' . $wo['lang']['new'] . '</span>' : '<span class="product-description">' . $wo['lang']['used'] . '</span><br>';
						echo '<div class="product-name"><h4 class="product-description">' . $wo['story']['product']['name'] . '</h4></div>';
						if (!empty($wo['story']['product']['location'])) {
							echo '<div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg></span> <span class="product-description"> ' . $wo['story']['product']['location'] . '</span></div><br>';
						}
						echo '<div class="product-name"><p class="product-description product-description-'.$wo['story']['product']['id'].'">' . $wo['story']['product']['description'] . '</p></div><br>';
						echo '<div class="wo_product_row"><div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag" color="#2196F3"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>' . $wo['lang']['type'] . '</span> ' . $type . '</div>';
						echo '<div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card" color="#349238"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>' . $wo['lang']['price'] . '</span> <span class="product-description" style="max-height: none;">' . $symbol . $wo['story']['product']['price'] . ' (' . $text . ')</span></div>';
						echo '<div class="product-name"><span class="product_row_title"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package" color="#9C27B0"><path d="M12.89 1.45l8 4A2 2 0 0 1 22 7.24v9.53a2 2 0 0 1-1.11 1.79l-8 4a2 2 0 0 1-1.79 0l-8-4a2 2 0 0 1-1.1-1.8V7.24a2 2 0 0 1 1.11-1.79l8-4a2 2 0 0 1 1.78 0z"></path><polyline points="2.32 6.16 12 11 21.68 6.16"></polyline><line x1="12" y1="22.76" x2="12" y2="11"></line><line x1="7" y1="3.5" x2="17" y2="8.5"></line></svg>' . $wo['lang']['status'] . '</span> ' . $status . '</div></div>';
					} 
				?>
				<?php 
if (empty($wo['story']['color_id']) || (!empty($wo['story']['color_id']) && empty($wo['post_colors'][$wo['story']['color_id']]))) { ?>
				<p dir="auto"><?php echo $wo['story']['postText_API']; ?><?php if (!empty($wo['story']['postFeeling']) && $extra_exists == 1) { ?>
						<span class="feeling-text"> — <i class="twa-lg twa twa-<?php echo $wo['story']['postFeelingIcon'];?>"></i> <?php echo $wo['lang']['feeling'];?> <?php echo $wo['lang'][$wo['story']['postFeeling']];?></span>
					<?php } ?><?php if (!empty($wo['story']['postTraveling']) && $extra_exists == 1) { ?>
						<span class="feeling-text"> — <i class="fa fa-plane"></i> <?php echo $wo['lang']['traveling'];?><?php echo $wo['story']['postTraveling'];?></span>
					<?php } ?><?php if (!empty($wo['story']['postWatching']) && $extra_exists == 1) { ?>
						<span class="feeling-text"> — <i class="fa fa-eye"></i> <?php echo $wo['lang']['watching'];?> <?php echo $wo['story']['postWatching'];?></span>
					<?php } ?><?php if (!empty($wo['story']['postPlaying']) && $extra_exists == 1) { ?>
						<span class="feeling-text"> — <i class="fa fa-gamepad"></i> <?php echo $wo['lang']['playing'];?> <?php echo $wo['story']['postPlaying'];?></span>
					<?php } ?><?php if (!empty($wo['story']['postListening']) && $extra_exists == 1) { ?>
						<span class="feeling-text"> — <i class="fa fa-headphones"></i> <?php echo $wo['lang']['listening'];?> <?php echo $wo['story']['postListening'];?></span>
					<?php } ?></p>
					<?php } ?>
					<?php if (!empty($wo['story']['color_id']) && !empty($wo['post_colors'][$wo['story']['color_id']])) { ?>
						<div dir="auto" 
							<?php if($wo['config']['colored_posts_system'] == 1){ ?>
								class="wo_actual_colrd_post" style="
								<?php if (!empty($wo['post_colors'][$wo['story']['color_id']]) && !empty($wo['post_colors'][$wo['story']['color_id']]->color_1) && !empty($wo['post_colors'][$wo['story']['color_id']]->color_2) && !empty($wo['post_colors'][$wo['story']['color_id']]->text_color)) { ?>
									background-image: linear-gradient(45deg, <?php echo $wo['post_colors'][$wo['story']['color_id']]->color_1; ?> 0%, <?php echo $wo['post_colors'][$wo['story']['color_id']]->color_2; ?> 100%);
								<?php }else{ ?>
									background-image:url('<?php echo Wo_GetMedia($wo['post_colors'][$wo['story']['color_id']]->image); ?>'); <?php } ?>
								<?php if(strlen($wo['story']['postText']) > 330){ ?>font-size: 16px;font-weight: normal;<?php } ?>"
							<?php } ?>
						>
							<span data-translate-text="<?php echo $wo['story']['id']; ?>" <?php if($wo['config']['colored_posts_system'] == 1){ ?> style="<?php if (!empty($wo['post_colors'][$wo['story']['color_id']]) && !empty($wo['post_colors'][$wo['story']['color_id']]->text_color)) { ?>color:<?php echo $wo['post_colors'][$wo['story']['color_id']]->text_color; ?><?php } ?>"<?php } ?>> <?php echo $wo['story']['postText']; ?></span>
							<?php if (!empty($wo['story']['postFeeling']) && $extra_exists == 1) { ?>
								<span class="feeling-text"> — <i class="twa-lg twa twa-<?php echo $wo['story']['postFeelingIcon'];?>"></i> <?php echo $wo['lang']['feeling'];?> <?php echo $wo['lang'][$wo['story']['postFeeling']];?></span>
							<?php } ?>
							<?php if (!empty($wo['story']['postTraveling']) && $extra_exists == 1) { ?>
								<span class="feeling-text"> — <i class="fa fa-plane"></i> <?php echo $wo['lang']['traveling'];?><?php echo $wo['story']['postTraveling'];?></span>
							<?php } ?>
							<?php if (!empty($wo['story']['postWatching']) && $extra_exists == 1) { ?>
								<span class="feeling-text"> — <i class="fa fa-eye"></i> <?php echo $wo['lang']['watching'];?> <?php echo $wo['story']['postWatching'];?></span>
							<?php } ?>
							<?php if (!empty($wo['story']['postPlaying']) && $extra_exists == 1) { ?>
								<span class="feeling-text"> — <i class="fa fa-gamepad"></i> <?php echo $wo['lang']['playing'];?> <?php echo $wo['story']['postPlaying'];?></span>
							<?php } ?>
							<?php if (!empty($wo['story']['postListening']) && $extra_exists == 1) { ?>
								<span class="feeling-text"> — <i class="fa fa-headphones"></i> <?php echo $wo['lang']['listening'];?> <?php echo $wo['story']['postListening'];?></span>
							<?php } ?>
						</div>
					<?php } ?>
				
				<?php if(!empty($wo['story']['postYoutube'])) {  ?>
					<div class="post-youtube youtube-player" data-postapi-id="<?php echo $wo['story']['id'];?>">
						<iframe id="ytplayer" type="text/html" width="100%" height="340" src="https://www.youtube.com/embed/<?php echo $wo['story']['postYoutube']; ?>?autoplay=0" frameborder="0"/></iframe>
					</div>
				<?php } ?>
				<?php if(!empty($wo['story']['postPlaytube'])) {  ?>
					<div class="post-youtube">
						<iframe id="ptplayer" type="text/html" width="100%" height="340" src="<?php echo $wo['config']['playtube_url']; ?>/embed/<?php echo $wo['story']['postPlaytube']; ?>?autoplay=0" frameborder="0"/></iframe>
					</div>
				<?php } ?>
				<?php if(!empty($wo['story']['postDeepsound'])) {  ?>
		          <div class="post-youtube">
		            <iframe id="ptplayer" type="text/html" width="100%" height="340" src="<?php echo $wo['config']['deepsound_url']; ?>/embed/<?php echo $wo['story']['postDeepsound']; ?>?autoplay=0&fullscreen=1" frameborder="0" style="height: 140px !important;"/></iframe>
		          </div>
		        <?php } ?>
				<?php if(!empty($wo['story']['postVimeo'])) {  ?>
					<div class="post-youtube">
						<iframe src="https://player.vimeo.com/video/<?php echo $wo['story']['postVimeo'];?>?byline=0&portrait=0" width="100%" height="340" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				<?php } ?>
				<?php if(!empty($wo['story']['postFacebook'])) {  ?>
					<div class="post-youtube">
						<iframe src="https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/<?php echo $wo['story']['postFacebook'];?>&show_text=0" width="100%" height="340" frameborder="0" allowfullscreen></iframe>
					</div>
				<?php } ?>
				<?php if(!empty($wo['story']['postDailymotion'])) {  ?>
					<div class="post-youtube">
						<iframe frameborder="0" width="100%" height="340" src="https://www.dailymotion.com/embed/video/<?php echo $wo['story']['postDailymotion']?>" allowfullscreen></iframe>
					</div>
				<?php } ?>
				<?php if(!empty($wo['story']['postVine'])) {  ?>
					<iframe src="https://vine.co/v/<?php echo $wo['story']['postVine']; ?>/embed/simple" width="100%" height="400" frameborder="0"></iframe>
				<?php } ?>
				<?php if(!empty($wo['story']['postSoundCloud'])) { ?>
					<iframe width="100%" src="https://w.soundcloud.com/player/?url=https://api.soundcloud.com/tracks/<?php echo $wo['story']['postSoundCloud'];?>&auto_play=false"></iframe>
				<?php } ?>
				<?php if(!empty($wo['story']['postMap']) && empty($wo['story']['postText']) && empty($wo['story']['postVine']) && empty($wo['story']['postSoundCloud']) && empty($wo['story']['postVimeo']) && empty($wo['story']['postDailymotion']) && empty($wo['story']['postDeepsound']) && empty($wo['story']['postYoutube']) && empty($wo['story']['postFile']) && $wo['config']['google_map'] == 1) { ?>
					<div class="post-map" onclick="InjectAPI('{&quot;type&quot; : &quot;map&quot;, &quot;location&quot;:&quot;<?php echo $wo['story']['postMap'];?>&quot;}', event);">
						<img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $wo['story']['postMap'];?>&zoom=13&size=600x250&maptype=roadmap&markers=color:red%7C<?php echo $wo['story']['postMap'];?>&key=<?php echo $wo['config']['google_map_api'];?>" width="100%">
					</div>
				<?php } ?>
		
				<?php if(!empty($wo['story']['postLink']) && empty($wo['story']['postVine']) && empty($wo['story']['postSoundCloud']) && empty($wo['story']['postYoutube']) && empty($wo['story']['postFile']) && empty($wo['story']['postDeepsound'])) { ?>
					<div class="post-fetched-url wo_post_fetch_link">
						<div onclick="InjectAPI('{&quot;type&quot; : &quot;url&quot;, &quot;link&quot;:&quot;<?php echo $wo['story']['postLink'];?>&quot;}', event);">
							<?php if (!empty($wo['story']['postLinkImage'])) {?>
								<div class="post-fetched-url-con">
									<img src="<?php echo $wo['story']['postLinkImage'];?>" class="<?php echo lui_RightToLeft('pull-left');?>" alt="<?php echo $wo['story']['postLinkTitle'];?>"/>
									<div class="url">
										<?php 
											$parse = parse_url($wo['story']['postLink']);
											echo $parse['host'];
										?>
									</div>
								</div>
							<?php } ?>
							<div class="fetched-url-text">
								<h4><?php echo $wo['story']['postLinkTitle'];?></h4>
								<div class="description"><?php echo $wo['story']['postLinkContent'];?></div>
								<?php if (empty($wo['story']['postLinkImage'])) {?>
									<div class="url">
										<?php 
											$parse = parse_url($wo['story']['postLink']);
											echo $parse['host'];
										?>
									</div>
								<?php } ?>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				<?php } ?>
				<?php if(!empty($wo['story']['blog_id'])) { ?>
					<div class="post-fetched-url wo_post_fetch_blog">
						<a onclick="InjectAPI('{&quot;type&quot; : &quot;url&quot;, &quot;link&quot;:&quot;<?php echo $wo['story']['blog']['url'];?>&quot;}', event);">
							<div class="fetched-url-text">
								<h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> <?php echo $wo['story']['blog']['title'];?></h4>
								<div class="description"><?php echo $wo['story']['blog']['description'];?></div>
							</div>
							<?php if (!empty($wo['story']['blog']['thumbnail'])) {?>
								<div class="post-fetched-url-con">
									<img src="<?php echo $wo['story']['blog']['thumbnail'];?>" class="<?php echo lui_RightToLeft('pull-left');?>" alt="<?php echo $wo['story']['blog']['title'];?>"/>
								</div>
							<?php } ?>
							<div class="clear"></div>
						</a>
					</div>
				<?php } ?>
				<?php if(!empty($wo['story']['postFile'])) { ?>
					<div class="post-file wo_shared_doc_file">
						<?php
							$media = array(
								'type' => 'post',
								'storyId' => $wo['story']['id'],
								'filename' => $wo['story']['postFile'],
								'name' => $wo['story']['postFileName'],
								'postFileThumb' => $wo['story']['postFileThumb'],
							);
							echo lui_DisplaySharedFile($media, 'api', $wo['story']['cache']);
						?>
					</div>
				<?php } ?>
				<?php if (lui_IsUrl($wo['story']['postSticker'])): ?>
					<div class="post-file">
						<?php if (strpos('.mp4', $wo['story']['postSticker'])) { ?>
							<video autoplay loop><source src="<?php echo $wo['story']['postSticker']; ?>" type="video/mp4"></video>
						<?php } else { ?>
							<img src="<?php echo $wo['story']['postSticker']; ?>" alt="GIF">
						<?php } ?>
					</div>
				<?php endif; ?>
				<div id="fullsizeimg">
					<?php if (!empty($wo['story']['photo_album'])) {
						$class = '';
						$small = '';
						if (count($wo['story']['photo_album']) == 2) {
							$class = 'width-2';
						}
						if (count($wo['story']['photo_album']) > 1) {
							$small = '_small';
						}
						if (count($wo['story']['photo_album']) > 2) {
							$class = 'width-3';
						}
						$delete = '';
						$onhover = '';
						foreach ($wo['story']['photo_album'] as $photo) {
							if ($wo['story']['admin'] === true) {
								$delete = "<span onclick='Wo_RemoveAlbumImage(" . $photo['post_id'] . "," . $photo['id'] . ");' class='pointer'><i class='fa fa-remove'></i></span>";
								$onhover = "onmouseover='Wo_ShowDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ")' onmouseleave='Wo_HideDeleteButton(" . $photo['post_id'] . "," . $photo['id'] . ");'";
							}
							echo  "<div class='album-image " . $class . "' id='image-" . $photo['id'] . "' {$onhover}>{$delete}<img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick=\"InjectAPI('{&quot;type&quot; : &quot;lightbox&quot;, &quot;image_url&quot;:&quot;" . $photo['image'] . "&quot;}', event);\"></div>";
						}
					} 
					?>
					<?php if ($wo['story']['multi_image'] == 1) {
						$class = '';
						$small = '';
						if (count($wo['story']['photo_multi']) == 2) {
							$class = 'width-2';
						}
						if (count($wo['story']['photo_multi']) > 1) {
							$small = '_small';
						}
						if (count($wo['story']['photo_multi']) > 2) {
							$class = 'width-3';
						}
						foreach ($wo['story']['photo_multi'] as $photo) {
							echo  "<img src='" . lui_GetMedia($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer' onclick=\"InjectAPI('{&quot;type&quot; : &quot;lightbox&quot;, &quot;image_url&quot;:&quot;" . $photo['image'] . "&quot;}', event);\">";
						}
					} 
					?>
				</div>
				<?php
					if ($wo['story']['poll_id'] == 1) {
						echo lui_LoadPage('story/entries/options');
					}
				?>
	<?php } ?>
				<div class="clear"></div>
        
								        
				<?php if ($wo['loggedin'] == true) { ?>
					<div class="stats post-actions <?php echo lui_RightToLeft('pull-left');?>" id="active_react">
						<?php if ($wo['config']['second_post_button'] == 'reaction') { ?>
							<div class="like-stat  stat-item post-like-status">
								<span class="like-emo post-reactions-icons-<?php echo $wo['story']['id']; ?>"><?php echo lui_GetPostReactions($wo['story']['id']);?></span>
							</div>
						<?php } else { ?>

						<div class="btn btn-default stat-item post-like-status" onclick="InjectAPI('{&quot;post_id&quot; : &quot;<?php echo $wo['story']['id']?>&quot;, &quot;type&quot;:&quot;post_likes&quot;}', event);">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
							<span id="likes"><?php echo $wo['story']['post_likes'];?></span>
						</div>
						<?php if ($wo['config']['second_post_button'] != 'disabled') { ?>
							<div class="btn btn-default stat-item post-wonders-status" onclick="InjectAPI('{&quot;post_id&quot; : &quot;<?php echo $wo['story']['id']?>&quot;, &quot;type&quot;:&quot;post_wonders&quot;}', event);">
								<?php echo $wo['second_post_button_icon'];?>
								<span id="wonders"><?php echo $wo['story']['post_wonders'];?></span>
							</div>
						<?php } ?>
						<?php } ?>
					</div>
					<?php if ($wo['story']['comments_status'] == 1) { ?> 	
					<div class="stats post-actions <?php echo lui_RightToLeft('pull-right');?>">
						<div class="btn btn-default stat-item post-comments-status" onclick="InjectAPI('{&quot;post_id&quot; : &quot;<?php echo $wo['story']['id']?>&quot;, &quot;type&quot;:&quot;post_comments&quot;}', event);">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
							<span id="comments"><?php echo $wo['story']['post_comments'];?></span>
						</div>
					</div>
					<?php } ?>
					<div class="clear"></div>
					<hr>
				<?php } ?>
		
				<?php if($wo['loggedin'] == true) { ?>
					<div class="stats <?php echo lui_RightToLeft('pull-left');?>" id="wo_post_stat_button">
						<?php echo lui_LoadPage('buttons/like-wonder');?>
						<div class="btn btn-default stat-item" onclick="Wo_ShowComments(<?php echo $wo['story']['id']; ?>);" id="comments-button">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg> <?php echo $wo['lang']['comment'];?>
						</div>
						<?php if (empty($wo['story']['parent_id']) && $wo['story']['post_is_promoted'] != 1) { ?>
						<div class="btn btn-default stat-item" title="<?php echo $wo['lang']['share'];?>" onclick="Wo_SharePostOn(<?php echo $wo['story']['id']; ?>,<?php echo $wo['story']['user_id']; ?>,'timeline')">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg> <?php echo $wo['lang']['share'];?>
							<!--<span id="shares">
								<?php echo $wo['story']['post_shares'];?>
							</span>-->
						</div>
					<?php } ?>
					</div>
				<?php } else {  ?>
					<span class="<?php echo lui_RightToLeft('pull-left');?>"><a href="<?php echo lui_SeoLink('index.php?link1=welcome&last_url=' . urlencode($wo['story']['url']));?>"><?php echo $wo['lang']['post_login_requriement'];?></a></span>
					<div class="clear"></div>
				<?php } ?>
				<div class="clear"></div>
			</div>
			
			<?php if ($wo['loggedin'] == true) { ?>
				<div class="post-footer post-likes"></div>
				<div class="clear"></div>
				<div class="post-footer post-wonders"></div>
				<div class="clear"></div>
				<div class="post-footer post-reacted"></div>
				<div class="clear"></div>
				<div class="post-footer post-comments <?php echo ($wo['page'] != 'story') ? 'hidden' : ''; ?>" id="post-comments-<?php echo $wo['story']['id']; ?>">
					<div id="hidden_inputbox_comment"></div>
					<?php if($wo['story']['post_comments'] > 3 && $wo['story']['limited_comments'] === true && $wo['story']['comments_status'] == 1) { ?>
						<div class="view-more-wrapper load-more-comments page-margin" onclick="Wo_loadAllComments(<?php echo $wo['story']['id']; ?>,this);">
							<span><?php echo $wo['lang']['view_more_comments'];?></span>
							<div class="ball-pulse <?php echo lui_RightToLeft('pull-right');?>" style="line-height: 20px;"><div></div><div></div><div></div></div>
						</div>
					<?php } ?>
					<div class="comments-list">
						<span class="comment-container"></span>
						<?php 
							foreach($wo['story']['get_post_comments'] as $wo['comment']) {
								echo lui_LoadPage('comment/content');
							}
						?>
					</div>
						<?php if ($wo['story']['comments_status'] == 1) { ?> 
					<div class="post-commet-textarea dropdown">
						<div id="wo_comment_combo" class="wo_comment_combo_<?php echo $wo['story']['id']; ?>">
							<div style="display: flex;">
								<img class="avatar" src="<?php echo $wo['user']['avatar'];?>"/>
								<textarea class="form-control comment-textarea textarea" placeholder="<?php echo $wo['lang']['write_comment'];?>" type="text" onclick="Wo_ShowCommentCombo(<?php echo $wo['story']['id']; ?>);" onkeydown="Wo_RegisterComment(this.value,<?php echo $wo['story']['id']; ?>,<?php echo $wo['story']['publisher']['user_id']; ?>, event, <?php echo (!empty($wo['story']['publisher']['page_id'])) ? $wo['story']['publisher']['page_id'] : '0'; ?>)" onkeyup="textAreaAdjust(this, 31,'comm'); " dir="auto"></textarea>
							</div>
							<div class="comment_combo_footer">
								<div class="ball-pulse"><div></div><div></div><div></div></div>
								<div class="wo_comment_fopt">
									<a href="#" class="emo-comment dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >
										<span class="btn btn-file">	
											<svg fill="#009da0" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" class="feather feather-user-plus"><path d="M0 0h24v24H0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/></svg>
										</span>
									</a>
									<ul class="dropdown-menu">
										<?php  
											foreach ($wo['emo'] as $code => $name) {
												$code   = $code;
												echo  '<span onclick="Wo_AddEmoToCommentInput(' . $wo["story"]["id"] . ', \'' . $code . '\');"><i class="pointer twa-lg twa twa-' . $name . '"></i></span>'; 
											} 
										?>
									</ul>
									<div class="image-comment">
										<div class="comment-btn-wrapper">
											<span class="btn btn-file btn-upload-comment" onclick="Wo_RegisterCommentClick($('#post-comments-<?php echo $wo["story"]["id"];?> .textarea').val(),<?php echo $wo['story']['id']; ?>,'<?php print ($wo['story']['publisher']['user_id']); ?>', <?php echo (!empty($wo['story']['publisher']['page_id'])) ? $wo['story']['publisher']['page_id'] : '0'; ?>)">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right" color="#009da0"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } else { ?>
         <small style="color: #777; font-size: 12px;"><?php echo str_replace('%d', $wo['story']['publisher']['name'],$wo['lang']['comments_disabled']);?></small>
          <?php } ?>
				</div>
			<?php } ?>
			
			<?php 
				if ($wo['loggedin'] == true) {
					echo lui_LoadPage('modals/edit-post');
					echo lui_LoadPage('modals/delete-post');
				}
			?>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function () {
	$("#post-<?php echo $wo['story']['id']; ?> .textarea").triggeredAutocomplete({
		hidden: '#hidden_inputbox_comment',
		source: Wo_Ajax_Requests_File() + "?f=mention",
		trigger: "@" 
	});
	$('[data-toggle="tooltip"]').tooltip();
	$('.dropdown-menu.post-recipient, .dropdown-menu.post-options, .wo_emoji_post').click(function (e) {
		e.stopPropagation();
	});
});

jQuery(document).click(function(event){
	if (!(jQuery(event.target).closest(".remove_combo_on_click").length)) {
        jQuery('.remove_combo_on_click').removeClass('comment-toggle');
    }
});
</script>
<?php endif; ?>