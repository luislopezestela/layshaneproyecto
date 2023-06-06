<?php
if ($wo['loggedin'] == false) {
    header("Location: " . lui_SeoLink('index.php?link1=welcome'));
    exit();
}
if (!empty($_GET['user']) && empty($_GET['page'])) {
    $user_id = lui_Secure($_GET['user']);
    $user    = lui_UserData($user_id);
    if (empty($user['user_id'])) {
        unset($user);
    }
}
?>
<div class="wo_kb_msg_page" id="wo_nw_msg_page">
	<div class="msg_under_hood">
		<div class="mobilerightpane" id="wo_msg_left_prt">
			<form method="post" class="messages-search-users-form">
				<div class="form-group inner-addon <?php echo lui_RightToLeft('left-addon');?> messages-search-icon">
                    <div class="msg_srch_innr">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        <input type="text" name="query" id="query" onkeyup="Wo_GetMessagesUsers(this.value);" class="form-control" placeholder="<?php echo $wo['lang']['search'];?>" autocomplete="off">
                    </div>
                </div>
				<div class="tab-content messages-users-list">
					<div id="users-message" class="messages-chat-list tab-pane fade in active">
						<?php
							$chats = lui_GetMessagesUsers($wo['user']['user_id']);
							$array = array();
					        if (!empty($chats)) {
					            foreach ($chats as $key => $value) {
					                $array[] = $value;
					            }
					        }
					        array_multisort( array_column($array, "chat_time"), SORT_DESC, $array );
							if (count($chats) == 0) {
								echo '<span class="no-online-users center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>' . $wo['lang']['no_users_found'] . '</span>';
							}else{
								foreach($chats as $wo['recipient']) {
									if (!empty($wo['recipient']['message']['page_id'])) {
										$message = lui_GetPageMessages(array(
	                                                'page_id' => $wo['recipient']['message']['page_id'],
	                                                'from_id' => $wo['recipient']['message']['user_id'],
	                                                'to_id'   => $wo['recipient']['message']['conversation_user_id'],
	                                                'limit' => 1,
	                                                'limit_type' => 1
	                                            ));
				                        $wo['page_message']['message'] = $message[0];
				                        
				                        echo lui_LoadPage('messages/messages-page-list');
				                    }
				                    else{
				                    	echo lui_LoadPage('messages/messages-recipients-list');
				                    }
								}
							}
						?> 
					</div>
				</div>
			</form>
		</div>
   
		<div class="mobileleftpane" id="wo_msg_right_prt">
			<ul class="list-group text-sender-container">
				<li class="list-group-item msg_usr_info_top_list text-muted" contenteditable="false">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left mobilemsgclose"><polyline points="15 18 9 12 15 6"></polyline></svg>
					<div class="msg_usr_cht_usr_data">
						<span id="user-avatar-right">
							<img src="<?php echo $wo['user']['avatar'];?>" alt="avatar" width="45" height="45" class="hidden" />
						</span>
						<div>
							<div id="user-name" class="hidden"></div>
							<p id="user-last-seen" class="msg_usr_lst_sen_main"></p>
						</div>
					</div>
					<span class="msg_usr_cht_opts_btns">
						<span class="video-icon" id="audio-button"></span>
						<span class="video-icon" id="video-button"></span>
						<span class="delete-icon" title="Delete Conversation"></span>
					</span>
					<div class="msg_progress"><div class="indeterminate"></div></div>
				</li>
				<li class="messages-load-more-messages view-more-wrapper hidden nav-down"></li>
				<div class="messagejoint">
					<div class="messages-container">
						<div class="no-messages empty_state">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve"> <path style="fill:#FFF1CD;" d="M388.542,78.183H53.014c-5.114,0-9.262,4.147-9.262,9.262v46.393L0,155.712l43.752,21.877v46.392 c0,5.115,4.146,9.263,9.262,9.263h335.528c5.115,0,9.262-4.147,9.262-9.263V87.443C397.802,82.329,393.656,78.183,388.542,78.183z" /> <path style="fill:#B4E5EA;" d="M512,356.285l-43.752-21.876v-46.393c0-5.114-4.146-9.262-9.262-9.262H123.459 c-5.115,0-9.262,4.147-9.262,9.262v136.538c0,5.115,4.146,9.263,9.262,9.263h335.528c5.114,0,9.262-4.147,9.262-9.263v-46.392 L512,356.285z"/> <g> <path style="fill:#609399;" d="M343.092,386.869H161.037c-4.714,0-8.533-3.82-8.533-8.533c0-4.714,3.82-8.533,8.533-8.533h182.056 c4.714,0,8.533,3.819,8.533,8.533C351.626,383.049,347.805,386.869,343.092,386.869z"/> <path style="fill:#609399;" d="M422.737,342.769h-261.7c-4.714,0-8.533-3.82-8.533-8.533s3.82-8.533,8.533-8.533h261.7 c4.714,0,8.533,3.82,8.533,8.533S427.449,342.769,422.737,342.769z"/> </g> <g> <path style="fill:#FFD24D;" d="M272.648,186.297H89.019c-4.714,0-8.533-3.82-8.533-8.533s3.82-8.533,8.533-8.533h183.629 c4.714,0,8.533,3.82,8.533,8.533S277.361,186.297,272.648,186.297z"/> <path style="fill:#FFD24D;" d="M352.292,142.197H89.019c-4.714,0-8.533-3.82-8.533-8.533s3.82-8.533,8.533-8.533h263.274 c4.714,0,8.533,3.82,8.533,8.533S357.005,142.197,352.292,142.197z"/> </g></svg>
							<?php echo $wo['lang']['choose_one_of_your_friends']; ?> <br/>
							<?php echo $wo['lang']['and_say_hello']; ?>
						</div>
					</div>
					<form method="post" class="sendMessages" enctype="multipart/form-data">
						<?php 
							$story_id = 0;
							if (!empty($_GET['story_id']) && is_numeric($_GET['story_id']) && $_GET['story_id'] > 0) {
								$story_id = lui_Secure($_GET['story_id']);
								$story = $db->where('id',$story_id)->getOne(T_USER_STORY);
							} 
							if (!empty($story)) {
								$story->thumbnail = lui_GetMedia($story->thumbnail);
						?>
							<input type="hidden" id="story_id" name="story_id" value="<?php echo($story->id) ?>" />
							<div class="message_reply_story_text">
								<?php echo $wo['lang']['replying_story']; ?>:&nbsp;<div class="message-user-image"><img src="<?php echo($story->thumbnail) ?>" alt="User image"></div>
								<svg onclick="$('.message_reply_story_text').remove();$('#story_id').val('0');" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" /></svg>
							</div>
						<?php } ?>
						<div class="message_reply_text" style="display: none;">
							<?php echo $wo['lang']['replying_to']; ?>:&nbsp;<span></span>
							<svg onclick="Wo_ClearReplyMessage()" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="pointer"><path fill="currentColor" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" /></svg>
						</div>
						<div class="input-group">
							<div class="msg_write_combo">
								<span class="message-option-btns"  style="margin-right: 10px; margin-left: 10px;">
									<span class="btn btn-file MS-File">
										<?php if($wo['config']['fileSharing'] == 1) { ?>
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M386.908,128.019c0,11.048-8.955,20.003-20.003,20.003h-141.91 c-11.048,0-20.003-8.955-20.003-20.003s8.955-20.003,20.003-20.003h141.91C377.952,108.016,386.908,116.971,386.908,128.019z M386.908,208.03c0-11.048-8.955-20.003-20.003-20.003h-141.91c-11.048,0-20.003,8.955-20.003,20.003s8.955,20.003,20.003,20.003 h141.91C377.952,228.033,386.908,219.078,386.908,208.03z M224.996,268.039c-11.048,0-20.003,8.955-20.003,20.003 c0,11.048,8.955,20.003,20.003,20.003h61.009c11.048,0,20.003-8.955,20.003-20.003c0-11.048-8.955-20.003-20.003-20.003H224.996z M428.025,252.036V80.012c0-22.059-17.947-40.006-40.006-40.006H203.993c-22.059,0-40.006,17.947-40.006,40.006v272.024 c0,10.689,4.163,20.735,11.721,28.291c7.556,7.555,17.601,11.715,28.285,11.715h0.009l184.027-0.045 c22.054-0.005,39.996-17.952,39.996-40.006c0-11.048,8.955-20.003,20.003-20.003s20.003,8.955,20.003,20.003 c0,40.728-30.596,74.452-70.01,79.389v0.608c0,44.118-35.893,80.012-80.012,80.012H123.98c-44.118,0-80.012-35.893-80.012-80.012 V159.949c0-44.118,35.893-80.012,80.012-80.012l0,0C124.021,35.853,159.899,0,203.993,0H388.02 c44.118,0,80.012,35.893,80.012,80.012v172.025c0,11.048-8.955,20.003-20.003,20.003S428.025,263.084,428.025,252.036z M147.423,408.62c-15.116-15.112-23.441-35.208-23.441-56.583V119.943c-22.059,0-40.006,17.947-40.006,40.006v272.039 c0,22.059,17.947,40.006,40.006,40.006h194.028c22.052,0,39.994-17.935,40.006-39.984l-154.002,0.038h-0.02 C182.623,432.047,162.536,423.729,147.423,408.62z"/></svg>
											<input type="file" id="sendMessasgeFile" name="sendMessageFile"  onchange="Wo_ShareFile();" />
										<?php } else { ?>
											<svg viewBox="0 -18 512 512" xmlns="http://www.w3.org/2000/svg"><path d="m432 0h-352c-44.113281 0-80 35.886719-80 80v280c0 44.113281 35.886719 80 80 80h190c7.628906 0 14.59375-4.339844 17.957031-11.191406 3.359375-6.847656 2.53125-15.015625-2.140625-21.046875l-52.3125-67.609375 144.992188-184.425782 93.503906 111.546876v33.726562c0 11.046875 8.953125 20 20 20s20-8.953125 20-20v-221c0-44.113281-35.886719-80-80-80zm-38.671875 111.152344c-3.871094-4.617188-9.609375-7.253906-15.640625-7.148438-6.027344.09375-11.6875 2.898438-15.410156 7.636719l-154.015625 195.894531-52.445313-67.773437c-3.789062-4.898438-9.628906-7.761719-15.816406-7.761719-.007812 0-.019531 0-.027344 0-6.199218.007812-12.046875 2.890625-15.824218 7.804688l-44.015626 57.21875c-6.734374 8.757812-5.097656 21.3125 3.65625 28.046874 8.757813 6.738282 21.3125 5.097657 28.046876-3.65625l28.210937-36.671874 89.1875 115.257812h-149.234375c-22.054688 0-40-17.945312-40-40v-280c0-22.054688 17.945312-40 40-40h352c22.054688 0 40 17.945312 40 40v125.007812zm-253.328125-39.152344c-33.085938 0-60 26.914062-60 60s26.914062 60 60 60 60-26.914062 60-60-26.914062-60-60-60zm0 80c-11.027344 0-20-8.972656-20-20s8.972656-20 20-20 20 8.972656 20 20-8.972656 20-20 20zm372 229c0 11.046875-8.953125 20-20 20h-55v55c0 11.046875-8.953125 20-20 20s-20-8.953125-20-20v-55h-55c-11.046875 0-20-8.953125-20-20s8.953125-20 20-20h55v-55c0-11.046875 8.953125-20 20-20s20 8.953125 20 20v55h55c11.046875 0 20 8.953125 20 20zm0 0" fill="currentColor"/></svg>
											<input type="file" id="sendMessasgeFile" name="sendMessageFile"  onchange="Wo_ShareFile();" accept="image/x-png, image/gif, image/jpeg" disabled />
										<?php } ?>
									</span>
								</span>
								<input type="hidden" name="reply_id" class="message_reply_id" readonly>
								<textarea name="textSendMessage" class="form-control custom-controls" id="sendMessage" onkeydown="Wo_SubmitForm(event);" onfocus="Wo_SubmitForm(event);" placeholder="<?php echo $wo['lang']['write_something'];?>" cols="10" rows="4" class="form-control" disabled></textarea>
								<div class="text-right charsLeft-message"><span id="charsLeft"></span></div>
								<span class="message-option-btns">
									<div class="dropup">
										<a href="#" class="emo-message dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" onclick="load_ajax_message_emojii('<?php echo $wo['config']['theme_url'];?>/emoji/');">
											<span class="btn btn-file">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256,512c-68.38,0-132.667-26.629-181.02-74.98C26.629,388.667,0,324.38,0,256 S26.629,123.333,74.98,74.98C123.333,26.629,187.62,0,256,0s132.667,26.629,181.02,74.98C485.371,123.333,512,187.62,512,256 c0,50.53-14.998,99.674-43.374,142.116c-6.138,9.182-18.559,11.65-27.742,5.51c-9.182-6.139-11.649-18.56-5.51-27.742 C459.335,340.044,472,298.589,472,256c0-119.103-96.897-216-216-216S40,136.897,40,256s96.897,216,216,216 c39.505,0,78.144-10.756,111.737-31.106c9.447-5.724,21.745-2.705,27.469,6.744c5.723,9.447,2.703,21.745-6.744,27.469 C348.617,499.242,302.813,512,256,512z M351,313c0-11.046-8.954-20-20-20s-20,8.954-20,20c0,30.327-24.673,55-55,55 s-55-24.673-55-55c0-11.046-8.954-20-20-20s-20,8.954-20,20c0,52.383,42.617,95,95,95S351,365.383,351,313z M395,201 c0-27.57-22.43-50-50-50s-50,22.43-50,50c0,11.046,8.954,20,20,20s20-8.954,20-20c0-5.514,4.486-10,10-10s10,4.486,10,10 c0,11.046,8.954,20,20,20S395,212.046,395,201z M218,201c0-27.57-22.43-50-50-50s-50,22.43-50,50c0,11.046,8.954,20,20,20 s20-8.954,20-20c0-5.514,4.486-10,10-10s10,4.486,10,10c0,11.046,8.954,20,20,20S218,212.046,218,201z"/></svg>
											</span>
										</a>
										<div class="emo-message-container dropdown-menu mobileemojisnd dropdown-menu-right" role="menu" style="width: 100px">

										</div>
									</div>

									<?php if ($wo['config']['stickers_system'] == 1): ?>
									<span class="dropup chat_optns" id="chat-sticker-system" style="display: table-cell;">
										<span class="btn btn-file dropdown-toggle" data-toggle="dropdown" aria-expanded="true" role="button" style="padding: 15px 0px;">
											<svg viewBox="0 0 511.9993 511" xmlns="http://www.w3.org/2000/svg"><path d="m506.140625 279.898438-273.464844-273.351563c-3.0625-3.058594-6.992187-5-11.171875-5.625-.238281-.050781-.464844-.117187-.707031-.15625-3.617187-.597656-7.160156-.164063-10.355469 1.050781-57.625 10.675782-110.238281 41.011719-148.601562 85.800782-39.878906 46.558593-61.839844 106-61.839844 167.371093 0 68.785157 26.796875 133.453125 75.453125 182.089844s113.347656 75.421875 182.15625 75.421875c45.886719 0 91.417969-12.742188 131.664063-36.84375 9.480468-5.671875 12.5625-17.957031 6.886718-27.433594-5.675781-9.476562-17.960937-12.558594-27.433594-6.882812-34.527343 20.675781-71.914062 31.160156-111.117187 31.160156-119.992187-.003906-217.609375-97.578125-217.609375-217.511719 0-97.476562 63.578125-181.085937 154.648438-208.285156-.210938 4.285156-.332032 8.574219-.332032 12.847656 0 68.785157 26.796875 133.453125 75.453125 182.09375 32.464844 32.445313 72.070313 55.152344 115.269531 66.683594-11.453124 27.175781-31.246093 49.867187-57.132812 65.089844-31.773438 18.683593-68.925781 23.871093-104.601562 14.617187-35.683594-9.257812-65.621094-31.855468-84.304688-63.628906-18.683594-31.777344-23.875-68.925781-14.617188-104.605469 6.339844-24.433593 19.1875-46.597656 37.160157-64.105469 7.910156-7.707031 8.078125-20.367187.367187-28.28125-7.707031-7.910156-20.371094-8.078124-28.28125-.371093-23.203125 22.605469-39.789062 51.207031-47.964844 82.714843-11.9375 46.019532-5.242187 93.9375 18.855469 134.921876 24.097657 40.984374 62.714844 70.132812 108.738281 82.074218 14.902344 3.867188 30.003907 5.777344 45.003907 5.777344 31.320312 0 62.207031-8.335938 89.917969-24.632812 35.980468-21.15625 62.832031-53.496094 76.933593-92.214844 8.847657.90625 17.792969 1.378906 26.808594 1.378906 4.746094 0 9.507813-.144531 14.265625-.40625-5.976562 19.625-14.972656 38.671875-26.914062 56.875-6.054688 9.234375-3.476563 21.632812 5.757812 27.691406s21.632812 3.480469 27.691406-5.757812c20.203125-30.800782 33.324219-63.824219 39.007813-98.15625 1.054687-6.367188-1.027344-12.851563-5.589844-17.410156zm-271.757813-215.089844 212.273438 212.1875c-115.816406-2.765625-209.511719-96.421875-212.273438-212.1875zm0 0" fill="currentColor"/></svg>
										</span>
										<ul class="dropdown-menu drop-up" style="left: -145px;width: 251px;" role="menu" onclick="event.stopPropagation()">
											<li>
												<div class="w100" id="chat-box-stickers">
													<div id="chat-box-stickers-cont">
														<?php 
															$stickers_system = lui_GetAllStickers(50000);
															if( count( $stickers_system ) > 0 ){
																foreach ($stickers_system as $wo['stickerlist']) {
																	echo '<img alt="gif" src="'. lui_GetMedia( $wo['stickerlist']['media_file'] ).'" data-gif="'.lui_GetMedia( $wo['stickerlist']['media_file'] ).'" onclick="Wo_ChatStickerMessage(this);" autoplay loop>';
																}
															} else {
																echo '<p class="no_chat_gifs_found"><i class="fa fa-frown-o"></i> '. $wo['lang']['no_result'] .'</p>';
															}
														?>
													</div>
												</div>
											</li>
										</ul>
									</span>
									<?php endif; ?>
									<?php if ($wo['config']['audio_upload'] == 1) { ?>

									<span class="btn btn-file MS-File" disabled id="messages-record" data-record="0">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264.02 264.02"><g> <path fill="currentColor" d="M210.506,126.764c-4.143,0-7.5,3.358-7.5,7.5c0,17.302-8.038,34.335-22.052,46.73 c-13.11,11.596-30.349,18.247-47.297,18.247h-3.295c-16.947,0-34.186-6.65-47.296-18.247 c-14.015-12.395-22.052-29.427-22.052-46.73c0-4.142-3.357-7.5-7.5-7.5s-7.5,3.358-7.5,7.5c0,21.598,9.883,42.726,27.114,57.966 c14.314,12.662,32.764,20.413,51.381,21.773v35.017H89.675c-4.143,0-7.5,3.358-7.5,7.5c0,4.142,3.357,7.5,7.5,7.5h84.667 c4.143,0,7.5-3.358,7.5-7.5c0-4.142-3.357-7.5-7.5-7.5H139.51v-35.017c18.617-1.361,37.067-9.112,51.382-21.773 c17.232-15.241,27.114-36.369,27.114-57.966C218.006,130.122,214.648,126.764,210.506,126.764z"/> <path fill="currentColor" d="M130.421,184.938h3.18c30.021,0,56.357-24.364,56.357-52.14v-80.66 C189.957,24.364,163.622,0,133.6,0h-3.18c-30.022,0-56.357,24.364-56.357,52.138v80.66 C74.063,160.573,100.398,184.938,130.421,184.938z M89.063,52.138C89.063,32.701,108.776,15,130.421,15h3.18 c21.645,0,41.357,17.701,41.357,37.138v80.66c0,19.438-19.712,37.14-41.357,37.14h-3.18c-21.644,0-41.357-17.702-41.357-37.14 V52.138z"/> </g></svg>
									</span>
									<span class="btn btn-file MS-File messages-rtime hidden" style="padding: 14px 1px;">00:00</span>
									<?php } ?>
								</span>
							</div>
							<span class="input-group-btn">
								<button onclick="Wo_GetMRecordLink();"  class="btn-main btn btn-file MS-File send-button" type="button">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
								</button>
							</span>
						</div>
						<input type="hidden" id="user-id" name="user_id" value="0" />
						<input type="hidden" id="messages-group-id" name="group_id" value="0" />
						<input type="hidden" id="messages-page-id" name="page_id" value="0" />
						<input type="hidden" id="messages-from-id" name="to_id" value="0" />
						<input type="hidden" id="message-record-file" name="record-file" value="" />
						<input type="hidden" id="message-record-name" name="record-name" value="" />
						<input type="hidden" name="chatSticker" id="chatStickerMessage">
					</form>
				</div>
			</ul>
			<div class="wo_msg_user_dtl">
				<div class="wo_msg_dtl_top">
					<span class="user_nm" id="user-name-right"></span>
					<span class="delete-icon" title="Delete Conversation"></span>
				</div>
				<div class="wo_msg_dtl_mid">
					<!-- <span id="user-avatar-right">
						<img src="<?php echo $wo['user']['avatar'];?>" alt="avatar" class="hidden" />
					</span> -->
				</div>
				<div class="wo_msg_dtl_bottom">
					<span class="video-icon" id="audio-button-right"></span>
					<span class="video-icon" id="video-button-right"></span>
				</div>
				<div class="wo_msg_dtl_most_bottom" style="display: none">
					<span><a href="javascript:void(0);" id="user-chat-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" data-reactid="501"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg> <?php echo $wo['lang']['view_profile'];?></a></span>
					<span><a href="javascript:void(0);" id="block-url"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg> <?php echo $wo['lang']['block'];?></a></span>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
  function escapeRegExp(str) {
        let arr = str.match(/[.*+?^{}()|[\]\\]/g)
        if (arr && arr.length) {
            for (let a of arr) {
                str = str.replace(/[.*+?^{}()|[\]\\]/g, '\\' + a)
            }
        }
        return str
  }
  function Wo_EmoSend(str) {
        var emo = {
            ':)': 'smile',
            '(<': 'joy',
            '**)': 'relaxed',
            ':p': 'stuck-out-tongue-winking-eye',
            ':_p': 'stuck-out-tongue',
            'B)': 'sunglasses',
            ';)': 'wink',
            ':D': 'grin',
            '/_)': 'smirk',
            '0)': 'innocent',
            ':_(': 'cry',
            ':__(': 'sob',
            ':(': 'disappointed',
            ':*': 'kissing-heart',
            '<3': 'heart',
            '</3': 'broken-heart',
            '*_*': 'heart-eyes',
            '<5': 'star',
            ':o': 'open-mouth',
            ':0': 'scream',
            'o(': 'anguished',
            '-_(': 'unamused',
            'x(': 'angry',
            'X(': 'rage',
            '-_-': 'expressionless',
            ':-/': 'confused',
            ':|': 'neutral-face',
            '!_': 'exclamation',
            ':|': 'neutral-face',
            ':|': 'neutral-face',
            ':yum:': 'yum',
            ':triumph:': 'triumph',
            ':imp:': 'imp',
            ':hear_no_evil:': 'hear-no-evil',
            ':alien:': 'alien',
            ':yellow_heart:': 'yellow-heart',
            ':sleeping:': 'sleeping',
            ':mask:': 'mask',
            ':no_mouth:': 'no-mouth',
            ':weary:': 'weary',
            ':dizzy_face:': 'dizzy-face',
            ':man:': 'man',
            ':woman:': 'woman',
            ':boy:': 'boy',
            ':girl:': 'girl',
            ':оlder_man:': 'older-man',
            ':оlder_woman:': 'older-woman',
            ':cop:': 'cop',
            ':dancers:': 'dancers',
            ':speak_no_evil:': 'speak-no-evil',
            ':lips:': 'lips',
            ':see_no_evil:': 'see-no-evil',
            ':dog:': 'dog',
            ':bear:': 'bear',
            ':rose:': 'rose',
            ':gift_heart:': 'gift-heart',
            ':ghost:': 'ghost',
            ':bell:': 'bell',
            ':video_game:': 'video-game',
            ':soccer:': 'soccer',
            ':books:': 'books',
            ':moneybag:': 'moneybag',
            ':mortar_board:': 'mortar-board',
            ':hand:': 'hand',
            ':tiger:': 'tiger',
            ':elephant:': 'elephant',
            ':scream_cat:': 'scream-cat',
            ':monkey:': 'monkey',
            ':bird:': 'bird',
            ':snowflake:': 'snowflake',
            ':sunny:': 'sunny',
            ':оcean:': 'ocean',
            ':umbrella:': 'umbrella',
            ':hibiscus:': 'hibiscus',
            ':tulip:': 'tulip',
            ':computer:': 'computer',
            ':bomb:': 'bomb',
            ':gem:': 'gem',
            ':ring:': 'ring'
        }
        var hasHTML = false;
        if (str) {
            //replace all using regex
            for (var code of Object.keys(emo).reverse()) {
                var searchRegExp = new RegExp(escapeRegExp(code), "gi");

                if (!hasHTML) {
                    var check = str.match(searchRegExp)
                    if (check) {
                        hasHTML = true;
                    } else {
                        continue
                    }
                }
                str = str.replace(searchRegExp, '<i class="twa-lg twa twa-' + emo[code] + '"></i>');
            }
        }
        return {str, hasHTML}
    }
var hash = $('.main_session').val();
$.ajaxSetup({ 
data: {
    hash: hash
},
cache: false 
});
function MarkAsReadAll(self) {
	$(self).html('<svg width="25px" height="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><rect x="0" y="0" width="25" height="25" fill="none" class="bk"></rect><circle cx="50" cy="50" r="40" stroke="currentColor" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502"></animate><animate attributeName="stroke-dasharray" dur="1.5s" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4"></animate></circle></svg>');
	$.post(Wo_Ajax_Requests_File() + '?f=mark_as_read', function(data, textStatus, xhr) {
		if (data.status == 200) {
			$('.messages-notification-container').find('.new-update-alert').hide();
	        $('.messages-notification-container').find('.sixteen-font-size').removeClass('unread-update');
	        $('.messages-notification-container').find('.new-update-alert').text(0);
	        $('.messages-notification-container').find('.new-update-alert').attr('data_messsages_count', 0);
			Wo_UpdateUsers();
			Wo_intervalUpdates();
			setTimeout(function () {
				$(self).html('<svg width="25px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve"> <circle style="fill:currentColor" cx="25" cy="25" r="25"/> <polyline style="fill:none;stroke:<?php echo $wo['config']['btn_background_color'];?>;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" points=" 38,15 22,33 12,25 "/> </svg>');
				setTimeout(function () {
					$(self).html('<svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"><path fill="currentColor" d="M14,10H2V12H14V10M14,6H2V8H14V6M2,16H10V14H2V16M21.5,11.5L23,13L16,20L11.5,15.5L13,14L16,17L21.5,11.5Z"></path></svg>');
				},1000);
			},1000);
		}
	});
}
$(document).on('click','.mobileopenlist',function(){
	$('.mobileleftpane').fadeIn(100);
});

$('.mobilemsgclose').on('click',function (){
	$('.mobileleftpane').fadeOut(100);
});

$('.emo-message-container').click(function(e) {
    e.stopPropagation();
});

$(function () {
  <?php if (!empty($user['user_id'])) { ?>
    setTimeout(function () {
      Wo_GetUserMessages(<?php echo $user['user_id'] ?>, "<?php echo $user['name']?>", "<?php echo $user['username']?>");
    }, 1000);
  <?php } ?>

  <?php if (!empty($_GET['page']) && !empty($_GET['user'])) {
  	$page_info = lui_PageData($_GET['page']);

  	$user_id = $_GET['page'].'_'.$_GET['user'];
	if ($page_info['user_id'] == $_GET['user']) {
	    $user_id = $_GET['page'].'_'.$_GET['to'];
	}

   ?>
    setTimeout(function () {
      Wo_GetPageMessages(<?php echo $_GET['page'] ?>, "<?php echo $_GET['user']?>","<?php echo($page_info['page_name']) ?>","<?php echo($user_id) ?>");
    }, 1000);
  <?php } ?>

  <?php if ($wo['config']['maxCharacters'] != 10000) { ?>
  $('#sendMessage').limit("<?php echo $wo['config']['maxCharacters']?>", '#charsLeft');
  <?php } ?>
 
  var main_hash_id   = $('.main_session').val();
  var file_uploading = false;

  <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
  Wo_getNewMessages()
  $('form.sendMessages').submit(()=>{
      chat_number = $('#user-id').val();
    	first_chat = $('.messages-recipients-list').first();
    	first_chat_id = $(first_chat).attr('id');
    	sending_text = $('.mobileleftpane .text-sender-container textarea').val();
    	if (sending_text.length  > 100) {
    		//sending_text = jQuery.trim(sending_text).substring(0, 97)+'...';
    	}

      $('#messages-recipient-'+chat_number).insertBefore( $( "#"+first_chat_id ) );
      var emosend = Wo_EmoSend(sending_text)
      if(emosend.hasHTML) {
        $('#messages-recipient-'+chat_number).find('p').html(emosend.str);
      } else {
        if(sending_text){
        $('#messages-recipient-'+chat_number).find('p').text(sending_text);
        }
      }
    	$('#messages-recipient-'+chat_number).find('.messages-last-sent').text('<?php echo $wo['lang']['now'];?>');
    	$('#messages-recipient-'+chat_number).find('.messages-last-sent').attr('title', '0 seconds');
    	$('#messages-recipient-'+chat_number).find('.messages-last-sent').removeClass('ajax-time');

      $('.mobileleftpane .text-sender-container textarea').val('');
      $('.sendMessage').attr('disabled', true);
      var user_id_ = $('#user-id').val();
      $('body').attr('sending-' + user_id_, true);
      $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>');
        console.log(" from message page ")
        
        var hexDigits = new Array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"); 
        function rgb2hex(rgb) {
          rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
          return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
        }

        function hex(x) {
          return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
        }
      if(sending_text!="" || sending_text.trim()!=""){
        if($('[data-target="#groups-message"]').attr("aria-expanded") === "true"){
        	message_reply_id = $('.message_reply_id').val();
        	story_id = $('#story_id').val();
            socket.emit("group_message_page", {
              group_id: $('#messages-group-id').val(), 
              from_id: _getCookie("user_id"),
              username: '<?php echo $wo['user']['username']; ?>',
              msg: sending_text,
              color: rgb2hex($(".send-button").css("background-color")),
              isSticker: false,
              message_reply_id: message_reply_id,
              story_id: story_id
            },  (data)=>{
            	$('#story_id').val('0');
		    	$('.message_reply_story_text').remove();
		    	Wo_ClearReplyMessage();
            if (data.status == 200) {
            $("#message-record-file").val('');
            $("#message-record-name").val('');
            $('#chatStickerMessage').val('');
            Wo_CleanRecordNodes();
            Wo_StopLocalStream();
            
            if($('.messages-container').length == 0) {
              $(".messages-container").html(data.html);
            } else {
              $(".no-messages").hide();
              $(".messages-container").append(data.html);
            }
          //   $('.message').last().append($('#message_text_reply_'+message_reply_id)[0].outerHTML);
          // $('.message').last().append($('#message_media_reply_'+message_reply_id)[0].outerHTML);
            var user_id_ = $('#user-id').val();
            $('body').attr('sending-' + user_id_, false);
            $('form.sendMessages').clearForm();
            $('#sendMessage').val('').attr('disabled', false).keyup().focus();
            setTimeout(function(){
              	$(".messages-container").animate({
                scrollTop: $('.messages-container')[0].scrollHeight
              }, 200);
              }, 100);
            if (data.invalid_file == 1) {
              $("#invalid_file").modal('show');
              Wo_Delay(function(){
                  $("#invalid_file").modal('hide');
              },3000);
            }
            if (data.invalid_file == 2) {
              $("#file_not_supported").modal('show');
              Wo_Delay(function(){
                  $("#file_not_supported").modal('hide');
              },3000);
            }
          }
          else if(data.status == 500 && data.invalid_file == 1){
            $("#invalid_file").modal('show');
            Wo_Delay(function(){
                $("#invalid_file").modal('hide');
            },3000);
          }
          else if(data.status == 500 && data.invalid_file == 2){
            $("#file_not_supported").modal('show');
            Wo_Delay(function(){
                $("#file_not_supported").modal('hide');
            },3000);
          }
          else if(data.status == 500 && data.invalid_file == 3){
            $("#pro_upload_file").modal('show');
            Wo_Delay(function(){
              $("#pro_upload_file").modal('hide');
            },3000);
          }
          if (file_uploading) {
            file_uploading = false;
            $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>');
          }
          $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>');
        })
        }
        else {
          message_reply_id = $('.message_reply_id').val();
          story_id = $('#story_id').val();
          socket.emit("private_message_page", {
            to_id: chat_number, 
            from_id: _getCookie("user_id"),
            username: '<?php echo $wo['user']['username']; ?>',
            msg: sending_text,
            color: rgb2hex($(".send-button").css("background-color")),
            isSticker: false,
            message_reply_id: message_reply_id,
            story_id: story_id
          },  (data)=>{
          	$('.message-seen').hide();
          	$('#story_id').val('0');
	    	$('.message_reply_story_text').remove();
	    	Wo_ClearReplyMessage();
          if (data.status == 200) {
          $("#message-record-file").val('');
          $("#message-record-name").val('');
          $('#chatStickerMessage').val('');
          Wo_CleanRecordNodes();
          Wo_StopLocalStream();
          
          if($('.messages-container').length == 0) {
            $(".messages-container").html(data.html);
          } else {
            $(".no-messages").hide();
            $(".messages-container").append(data.html);
          }
          // $('.message').last().append($('#message_text_reply_'+message_reply_id)[0].outerHTML);
          // $('.message').last().append($('#message_media_reply_'+message_reply_id)[0].outerHTML);
          var user_id_ = $('#user-id').val();
          $('body').attr('sending-' + user_id_, false);
          $('form.sendMessages').clearForm();
          $('#sendMessage').val('').attr('disabled', false).keyup().focus();
          setTimeout(function(){
              	$(".messages-container").animate({
                scrollTop: $('.messages-container')[0].scrollHeight
              }, 200);
              }, 100);
          if (data.invalid_file == 1) {
            $("#invalid_file").modal('show');
            Wo_Delay(function(){
                $("#invalid_file").modal('hide');
            },3000);
          }
          if (data.invalid_file == 2) {
            $("#file_not_supported").modal('show');
            Wo_Delay(function(){
                $("#file_not_supported").modal('hide');
            },3000);
          }
        }
        else if(data.status == 500 && data.invalid_file == 1){
          $("#invalid_file").modal('show');
          Wo_Delay(function(){
              $("#invalid_file").modal('hide');
          },3000);
        }
        else if(data.status == 500 && data.invalid_file == 2){
          $("#file_not_supported").modal('show');
          Wo_Delay(function(){
              $("#file_not_supported").modal('hide');
          },3000);
        }
        else if(data.status == 500 && data.invalid_file == 3){
          $("#pro_upload_file").modal('show');
          Wo_Delay(function(){
            $("#pro_upload_file").modal('hide');
          },3000);
        }
        if (file_uploading) {
          file_uploading = false;
          $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>');
        }
        $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>');
      })
    }
  }
  else{










  	$('form.sendMessages').ajaxSubmit({
    url: Wo_Ajax_Requests_File() + '?f=messages&s=send_message&hash=' + main_hash_id,
    beforeSend: function () {
    	chat_number = $('#user-id').val();
    	first_chat = $('.messages-recipients-list').first();
    	first_chat_id = $(first_chat).attr('id');
    	sending_text = $('.mobileleftpane .text-sender-container textarea').val();
    	if (sending_text.length  > 100) {
    		sending_text = jQuery.trim(sending_text).substring(0, 97)+'...';
    	}

    	$('#messages-recipient-'+chat_number).insertBefore( $( "#"+first_chat_id ) );

    	$('#messages-recipient-'+chat_number).find('p').text(sending_text);
    	$('#messages-recipient-'+chat_number).find('.messages-last-sent').text('<?php echo $wo['lang']['now'];?>');
    	$('#messages-recipient-'+chat_number).find('.messages-last-sent').attr('title', '0 seconds');
    	$('#messages-recipient-'+chat_number).find('.messages-last-sent').removeClass('ajax-time');

      $('.mobileleftpane .text-sender-container textarea').val('');
      $('.sendMessage').attr('disabled', true);
      var user_id_ = $('#user-id').val();
      $('body').attr('sending-' + user_id_, true);
      $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>');
    },
    uploadProgress: function () {
      if ($("#sendMessasgeFile").val() != '') {
        $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>');
        file_uploading = true;
      }
    },
    success: function (data) {
    	$('#story_id').val('0');
    	$('.message_reply_story_text').remove();
    	Wo_ClearReplyMessage();

      if(data.status == 200) {
        $("#message-record-file").val('');
        $("#message-record-name").val('');
        $('#chatStickerMessage').val('');
        Wo_CleanRecordNodes();
        Wo_StopLocalStream();
        
        if($('.messages-container').length == 0) {
          $(".messages-container").html(data.html);
        } else {
          $(".no-messages").hide();
          $(".messages-container").append(data.html);
        }
        var user_id_ = $('#user-id').val();
        $('body').attr('sending-' + user_id_, false);
        $('form.sendMessages').clearForm();
        $('#sendMessage').val('').attr('disabled', false).keyup().focus();
        setTimeout(function(){
              	$(".messages-container").animate({
                scrollTop: $('.messages-container')[0].scrollHeight
              }, 200);
              }, 100);
        if (data.invalid_file == 1) {
          $("#invalid_file").modal('show');
          Wo_Delay(function(){
              $("#invalid_file").modal('hide');
          },3000);
        }
        if (data.invalid_file == 2) {
          $("#file_not_supported").modal('show');
          Wo_Delay(function(){
              $("#file_not_supported").modal('hide');
          },3000);
        }
      }
      else if(data.status == 500 && data.invalid_file == 1){
        $("#invalid_file").modal('show');
        Wo_Delay(function(){
            $("#invalid_file").modal('hide');
        },3000);
      }
      else if(data.status == 500 && data.invalid_file == 2){
        $("#file_not_supported").modal('show');
        Wo_Delay(function(){
            $("#file_not_supported").modal('hide');
        },3000);
      }
      else if(data.status == 500 && data.invalid_file == 3){
	      $("#pro_upload_file").modal('show');
	      Wo_Delay(function(){
	        $("#pro_upload_file").modal('hide');
	      },3000);
	    }
      if (file_uploading) {
        file_uploading = false;
        $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>');
      }
      $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>');
      chat_number = $('#user-id').val();
    	var dom = $($.parseHTML(data.html));
      var mediaId = dom.find(".messages-wrapper").attr("data-message-id");
    	socket.emit("private_message_page", {
        to_id: chat_number, 
        from_id: _getCookie("user_id"),
        username: '<?php echo $wo['user']['username']; ?>',
        mediaId: mediaId,
        isSticker: true
      })
    }
  });
















  }
  return false
  })
  <?php } else { ?>
  setTimeout(Wo_getNewMessages, 5000);
  setTimeout(Wo_UpdateUsers, 10000);
  <?php if ($wo['config']['message_seen'] == 1) { ?>
  setTimeout(Wo_getMessageSeen, 12000);
  <?php } ?>
    $('form.sendMessages').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=messages&s=send_message&hash=' + main_hash_id,
    beforeSend: function () {
    	chat_number = $('#user-id').val();
    	first_chat = $('.messages-recipients-list').first();
    	first_chat_id = $(first_chat).attr('id');
    	sending_text = $('.mobileleftpane .text-sender-container textarea').val();
    	if (sending_text.length  > 100) {
    		sending_text = jQuery.trim(sending_text).substring(0, 97)+'...';
    	}

    	$('#messages-recipient-'+chat_number).insertBefore( $( "#"+first_chat_id ) );

    	$('#messages-recipient-'+chat_number).find('p').text(sending_text);
    	$('#messages-recipient-'+chat_number).find('.messages-last-sent').text('<?php echo $wo['lang']['now'];?>');
    	$('#messages-recipient-'+chat_number).find('.messages-last-sent').attr('title', '0 seconds');
    	$('#messages-recipient-'+chat_number).find('.messages-last-sent').removeClass('ajax-time');

      $('.mobileleftpane .text-sender-container textarea').val('');
      $('.sendMessage').attr('disabled', true);
      var user_id_ = $('#user-id').val();
      $('body').attr('sending-' + user_id_, true);
      $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>');
    },
    uploadProgress: function () {
      if ($("#sendMessasgeFile").val() != '') {
        $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>');
        file_uploading = true;
      }
    },
    success: function (data) {
    	$('#story_id').val('0');
    	$('.message_reply_story_text').remove();
    	Wo_ClearReplyMessage();
      if(data.status == 200) {
        $("#message-record-file").val('');
        $("#message-record-name").val('');
        $('#chatStickerMessage').val('');
        Wo_CleanRecordNodes();
        Wo_StopLocalStream();
        
        if($('.messages-container').length == 0) {
          $(".messages-container").html(data.html);
        } else {
          $(".no-messages").hide();
          $(".messages-container").append(data.html);
        }
        var user_id_ = $('#user-id').val();
        $('body').attr('sending-' + user_id_, false);
        $('form.sendMessages').clearForm();
        $('#sendMessage').val('').attr('disabled', false).keyup().focus();
        setTimeout(function(){
              	$(".messages-container").animate({
                scrollTop: $('.messages-container')[0].scrollHeight
              }, 200);
              }, 100);
        if (data.invalid_file == 1) {
          $("#invalid_file").modal('show');
          Wo_Delay(function(){
              $("#invalid_file").modal('hide');
          },3000);
        }
        if (data.invalid_file == 2) {
          $("#file_not_supported").modal('show');
          Wo_Delay(function(){
              $("#file_not_supported").modal('hide');
          },3000);
        }
      }
      else if(data.status == 500 && data.invalid_file == 1){
        $("#invalid_file").modal('show');
        Wo_Delay(function(){
            $("#invalid_file").modal('hide');
        },3000);
      }
      else if(data.status == 500 && data.invalid_file == 2){
        $("#file_not_supported").modal('show');
        Wo_Delay(function(){
            $("#file_not_supported").modal('hide');
        },3000);
      }
      else if(data.status == 500 && data.invalid_file == 3){
	      $("#pro_upload_file").modal('show');
	      Wo_Delay(function(){
	        $("#pro_upload_file").modal('hide');
	      },3000);
	    }
      if (file_uploading) {
        file_uploading = false;
        $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>');
      }
      $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>');
    }
  });
<?php } ?>
});

function Wo_ChatStickerMessage(self){
  if (!self) {
    return false;
  }
  $('#chatStickerMessage').val($(self).attr('data-gif'));
  $('form.sendMessages').submit();
  $("#chat-sticker-system").removeClass("open");
}

function Wo_AddEmoToMessageInput(code) {
    inputTag = $('#sendMessage');
    inputVal = inputTag.val();
    if (typeof(inputTag.attr('placeholder')) != "undefined") {
        inputPlaceholder = inputTag.attr('placeholder');
        if (inputPlaceholder == inputVal) {
            inputTag.val('');
            inputVal = inputTag.val();
        }
    }
    if (inputVal.length == 0) {
        inputTag.val(code + ' ');
    } else {
        inputTag.val(inputVal + ' ' + code);
    }
    inputTag.keyup().focus();
    $(".emo-messages-container").slideUp('fast');
}
function Wo_GetMessagesUsers(query) {
  searchForm = $('.messages-search-users-form');
  Wo_progressIconLoader(searchForm.find('.messages-search-icon'));
  $.get(Wo_Ajax_Requests_File(), {
    f: 'search',
    s: 'recipients',
    query: query
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        //$('.messages-users-list').find('.messages-chat-list').html('<span class="center-text"><?php $wo["lang"]["no_result"];?></span>');
        $('.messages-users-list').find('.messages-chat-list').html('<span class="no-online-users center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg><?php echo $wo['lang']['no_result']; ?></span>');

      } else {
        $('.messages-users-list').find('.messages-chat-list').html(data.html);
      }
      scrollToTop();
    }
    Wo_progressIconLoader(searchForm.find('.messages-search-icon'));
  });
}

function messageTyping(){
  // console.log("Typing registered")
  socket.on("typing",(data)=>{
    
    var user_id = $("#user-id").val()
    if (typeof $("#messages-recipient-" + data.sender_id).attr("data-content") === 'undefined') {
    	$("#messages-recipient-" + data.sender_id).attr("data-content", $("#messages-recipient-" + data.sender_id).find('p').text());
    }
    
    var last_message = $("#messages-recipient-" + data.sender_id).find('p').html();
    if ( data.sender_id === +user_id && data.is_typing == 200) {
      $('.message-contnaier:last').find('.message-typing').html('<div class="incoming pull-left" id="typing"><div class="message-typing message-details"><div class="message-user-image pull-left"><img src="' + data.img + '" alt="Profile Picture"></div><svg width="35" height="35" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="#999"> <circle cx="15" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.5s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.5s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate> </circle> <circle cx="60" cy="15" r="9" fill-opacity="0.3"> <animate attributeName="r" from="9" to="9" begin="0s" dur="0.5s" values="9;15;9" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.5s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite"></animate> </circle> <circle cx="105" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.5s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.5s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate> </circle> </svg></div></div>').fadeIn(300);
      if ($("#messages-recipient-" + data.sender_id).find('svg').length == 0 ) {
      	 $("#messages-recipient-" + data.sender_id).find('p').html('<svg width="35" height="35" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="#999"> <circle cx="15" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.5s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.5s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate> </circle> <circle cx="60" cy="15" r="9" fill-opacity="0.3"> <animate attributeName="r" from="9" to="9" begin="0s" dur="0.5s" values="9;15;9" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.5s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite"></animate> </circle> <circle cx="105" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.5s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.5s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate> </circle> </svg>'); 
      }
    } else if (data.is_typing == 300) {
    	$("#messages-recipient-" + data.sender_id).find('p').html($("#messages-recipient-" + data.sender_id).attr("data-content"));
    } else {
    	if ($("#messages-recipient-" + data.sender_id).find('svg').length == 0 ) {
    	  $("#messages-recipient-" + data.sender_id).find('p').html('<svg width="35" height="35" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="#999"> <circle cx="15" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.5s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.5s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate> </circle> <circle cx="60" cy="15" r="9" fill-opacity="0.3"> <animate attributeName="r" from="9" to="9" begin="0s" dur="0.5s" values="9;15;9" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.5s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite"></animate> </circle> <circle cx="105" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.5s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.5s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate> </circle> </svg>'); 
    	}
       for (let a of $('.message-contnaier')) {
         $(a).find('.message-typing').empty()
       }
    } 
  })
}

$(()=>{
  <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
  console.log("registering update user list")
    socket.on("update-message-users-list", (data)=>{
      if(data.status == 200) {
        $('.messages-users-list').find('.messages-chat-list').html(data.html);
      }
      else{
        $('.messages-users-list').find('.messages-chat-list').html('<span class="no-online-users center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg><?php echo $wo['lang']['no_users_found']; ?></span>');
      }
    })
    socket.on("update-group-side", (data)=>{
      if(data.status == 200) {
        $('.messages-users-list').find('.messages-group-list').html(data.html);
      }
      else{
        $('.messages-users-list').find('.messages-group-list').html('<span class="no-online-users center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg><?php echo $wo['lang']['no_users_found']; ?></span>');
      }
    })
    messageTyping()
    <?php } ?>
})

function Wo_UpdateUsers() {
  if ($('.messages-search-users-form #query').val().length > 0) {
       return false;
  }
  $.get(Wo_Ajax_Requests_File(), {
    f: 'messages',
    s: 'update_recipients'
  }, function (data) {
    setTimeout(Wo_UpdateUsers, 10000);
    if(data.status == 200) {
      $('.messages-users-list').find('.messages-chat-list').html(data.html);
    }
    else{
      $('.messages-users-list').find('.messages-chat-list').html('<span class="no-online-users center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg><?php echo $wo['lang']['no_users_found']; ?></span>');
    }
  });
}

function Wo_DeleteConversation(user_id) {
  if (!confirm("<?php echo $wo['lang']['messages_delete_confirmation']?>")) {
    return false;
  }
  $('.text-sender-container').find('.ball-pulse').fadeIn(100);
  $('.text-sender-container').find('.msg_progress').fadeIn(100);
  $.get(Wo_Ajax_Requests_File(), {
    f: 'messages',
    s: 'delete_conversation',
    user_id: user_id,
  }, function (data) {
    if(data.status == 200) {
      alert(data.message);
      $('.messages-container').empty();
	  location.reload();
    }
    $('.text-sender-container').find('.ball-pulse').fadeOut(100);
	$('.text-sender-container').find('.msg_progress').fadeOut(100);
  });
}

function Wo_GetUserMessages(user_id, user_name, userlink) {
	var old_user = $('#user-id').val();
	if ($('#user-id').val() > 0 && $('#user-id').val() != user_id) {
		$('#story_id').val('0');
    	$('.message_replsy_story_text').remove();
	}
	Wo_ClearReplyMessage();
	if ($('#user-id').val() > 0) {
		Wo_DeleteTyping($('#user-id').val());
	}
  view_more_wrapper = $('.view-more-wrapper');

  <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
    socket.emit("active-message-user-change", {from_id: _getCookie("user_id"), user_id: user_id})
  <?php } ?>

  $('.text-sender-container').find('.ball-pulse').fadeIn(100);
  $('.text-sender-container').find('.msg_progress').fadeIn(100);
  
  if($('.messages-recipients-list').hasClass('active')) {
	$('.messages-recipients-list').removeClass('active');
	$('#messages-recipient-' + user_id).addClass('active');
  } else { 
	$('#messages-recipient-' + user_id).addClass('active');
  }
  $('#user-id').attr('value', user_id);
  $('#messages-group-id').attr('value', 0);
  $('#messages-recipient-' + user_id).find('.new-message-alert').fadeOut(200);
  $('#messages-recipient-' + user_id).find('.messages-last-sent').removeClass('new_msg_lst_lsent');
  $('#messages-recipient-' + user_id).find('p').removeClass('new_msg_active_list');
  $.get(Wo_Ajax_Requests_File(), {
    f: 'messages',
    s: 'get_user_messages',
    user_id: user_id
  }, function (data) {
    if(data.status == 200) {
      window.history.pushState({state:'new'},'', "<?php echo($wo['config']['site_url']) ?>/messages/"+user_id);
      $('.wo_msg_user_dtl').css('display', 'none');

      $('.wo_msg_dtl_most_bottom').css('display', 'block');
      $('.send-button').css('background-color', data.color);
      $('.send-button').css('border-color', data.color);
	    $('#wo_msg_right_prt .message-option-btns .btn svg').css('color', data.color);
      $('#user-chat-link').attr('href', data.url);
      $('#block-url').attr('href', data.block_url);
      $('#user-avatar-right img').attr('src', data.avatar).removeClass('hidden');

      $('#user-name').html('<a target="_blank" href="' + data.url + '">' + user_name + '</a>').removeClass('hidden');
      $('#user-name-right').html('<a target="_blank" href="'+ data.url + '">' + user_name + '</a>');
      $('#user-last-seen').html(data.lastseen);

	  $('.delete-icon').html('<svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" onclick="Wo_DeleteConversation(' + user_id + ')"><path fill="currentColor" d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" /></svg>');


      if(data.can_replay == true) {
        $('#sendMessage').val('').attr('disabled', false);
        $('#sendMessasgeFile').attr('disabled', false);
        $('#messages-record').attr('disabled', false);
      } else {
        $('#sendMessage').val('<?php $wo["lang"]["sorry_cant_reply"];?>').attr('disabled', true);
        $('#sendMessasgeFile').attr('disabled', true);
      }
      <?php if ($wo['config']['maxCharacters'] != 10000) { ?>
        $('#charsLeft').text("<?php echo $wo['config']['maxCharacters']?>");
      <?php }?>
      if(data.html.length == 0) {
        view_more_wrapper.hide();
        $('.messages-container').html('<div class="no-messages empty_state"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.021 512.021" xml:space="preserve"> <path style="fill:#64B5F6;" d="M338.214,344.556l-64-64.107c-4.16-4.171-10.914-4.179-15.085-0.019 c-2.006,2.001-3.133,4.717-3.134,7.55v149.44c0.003,4.589,2.942,8.662,7.296,10.112c1.086,0.367,2.224,0.555,3.371,0.555 c3.357,0,6.519-1.581,8.533-4.267l64-85.333C342.376,354.244,341.958,348.31,338.214,344.556z"/> <path style="fill:#1976D2;" d="M291.366,320.641l-64-21.333c-5.587-1.868-11.631,1.147-13.499,6.734 c-0.732,2.19-0.734,4.558-0.005,6.749l42.667,128c1.453,4.362,5.536,7.302,10.133,7.296h0.661c4.819-0.3,8.836-3.8,9.792-8.533 l21.333-106.667C299.523,327.601,296.483,322.345,291.366,320.641z"/> <path style="fill:#2196F3;" d="M507.43,23.446c-3.399-2.377-7.867-2.568-11.456-0.491L90.641,257.622 c-5.096,2.955-6.832,9.482-3.877,14.578c1.306,2.253,3.391,3.95,5.861,4.771l191.573,63.872l148.907,63.829 c5.417,2.316,11.685-0.197,14.001-5.614c0.321-0.752,0.555-1.538,0.697-2.343l64-362.667 C512.531,29.965,510.825,25.829,507.43,23.446z"/> <g> <path style="fill:#1976D2;" d="M510.011,38.38c3.441-4.781,2.355-11.447-2.426-14.889c-4.259-3.065-10.115-2.578-13.808,1.15 L215.611,318.017l80.277,27.733L510.011,38.38z"/> <path style="fill:#1976D2;" d="M26.065,420.246c-2.679,0.003-5.26-1.003-7.232-2.816c-5.319-4.892-10.553-9.92-15.701-15.083 c-4.171-4.165-4.176-10.922-0.011-15.093c4.165-4.171,10.922-4.176,15.093-0.011c4.949,4.949,9.984,9.792,15.083,14.485 c4.336,3.988,4.618,10.736,0.63,15.072C31.904,418.999,29.052,420.249,26.065,420.246z"/> <path style="fill:#1976D2;" d="M171.387,490.54c-10.278-0.033-20.527-1.098-30.592-3.179c-5.814-0.95-9.757-6.434-8.806-12.248 c0.95-5.814,6.434-9.757,12.248-8.806c0.277,0.045,0.553,0.102,0.825,0.169c8.683,1.792,17.524,2.707,26.389,2.731h0.064h4.8 c5.559-0.531,10.497,3.545,11.028,9.104c0.037,0.385,0.051,0.771,0.044,1.157c0.216,5.884-4.377,10.831-10.261,11.051h-5.568 L171.387,490.54z M94.95,470.124c-1.708,0-3.39-0.409-4.907-1.195c-10.486-5.487-20.611-11.636-30.315-18.411 c-4.727-3.515-5.709-10.197-2.194-14.925c3.355-4.511,9.634-5.644,14.354-2.59c8.937,6.286,18.272,11.987,27.947,17.067 c5.231,2.709,7.276,9.146,4.567,14.377c-1.833,3.54-5.487,5.762-9.474,5.762L94.95,470.124z"/> <path style="fill:#1976D2;" d="M226.235,479.105c-5.891,0.048-10.705-4.688-10.753-10.579c-0.035-4.307,2.524-8.213,6.487-9.901 c6.141-2.627,12.105-5.648,17.856-9.045c5.146-2.867,11.642-1.019,14.509,4.127c2.767,4.967,1.152,11.231-3.672,14.241 c-6.542,3.867-13.325,7.309-20.309,10.304C229.05,478.806,227.651,479.097,226.235,479.105z"/> </g></svg><?php echo $wo["lang"]["no_more_message_to_show"];?> </div>');
      } else {
        $('.messages-container').html(data.html);
        view_more_wrapper.html('<a href="javascript:void(0);" title="' + data.view_more_text + '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13,15L15.5,17.5L16.92,16.08L12,11.16L7.08,16.08L8.5,17.5L11,15V21H13V15M3,3H21V5H3V3M3,7H13V9H3V7Z" /></svg></a>').show();
        view_more_wrapper.attr('onclick', 'Wo_getOldMessages(' + user_id + ');').removeClass('hidden');
        setTimeout(function(){
              	$(".messages-container").animate({
                scrollTop: $('.messages-container')[0].scrollHeight
              }, 200);
              }, 1000);
      }
      <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
      	var last_id = $('.messages-text:last').attr('data-message-id');
        socket.emit("seen_messages", {user_id: _getCookie("user_id"), recipient_id: user_id,message_id: last_id,current_user_id: "<?php echo($wo['user']['id']) ?>"}, (data)=>{})
		<?php } ?>
      <?php if ($wo['config']['message_seen'] == 1) { ?>
         Wo_getMessageSeen();
      <?php } ?>
      $('.emo-message').fadeIn(200);
      <?php if ($wo['config']['video_chat'] == 1 && ($wo['config']['twilio_video_chat'] == 1 || $wo['config']['agora_chat_video'] == 1)) {
      	if ($wo['config']['can_use_video_call']) {
       ?>
      if (data.video_call == 200) {
		video_call = '<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" onclick="Wo_GenerateVideoCall(<?php echo $wo['user']['user_id'];?>, ' + user_id + ')"><path fill="currentColor" d="M15,8V16H5V8H15M16,6H4A1,1 0 0,0 3,7V17A1,1 0 0,0 4,18H16A1,1 0 0,0 17,17V13.5L21,17.5V6.5L17,10.5V7A1,1 0 0,0 16,6Z" /></svg>';
      } else {
        video_call = '';
      }
      $('#video-button,#video-button-right').html(video_call);
      <?php } } ?>
      <?php if ($wo['config']['audio_chat'] == 1 && ($wo['config']['twilio_video_chat'] == 1 || $wo['config']['agora_chat_video'] == 1)) {
      	if ($wo['config']['can_use_audio_call']) {
       ?>
      if (data.audio_call == 200) {
		audio_call = '<svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" onclick="Wo_GenerateVoiceCall(<?php echo $wo['user']['user_id'];?>, ' + user_id + ')"><path fill="currentColor" d="M20,15.5C18.8,15.5 17.5,15.3 16.4,14.9C16.3,14.9 16.2,14.9 16.1,14.9C15.8,14.9 15.6,15 15.4,15.2L13.2,17.4C10.4,15.9 8,13.6 6.6,10.8L8.8,8.6C9.1,8.3 9.2,7.9 9,7.6C8.7,6.5 8.5,5.2 8.5,4C8.5,3.5 8,3 7.5,3H4C3.5,3 3,3.5 3,4C3,13.4 10.6,21 20,21C20.5,21 21,20.5 21,20V16.5C21,16 20.5,15.5 20,15.5M5,5H6.5C6.6,5.9 6.8,6.8 7,7.6L5.8,8.8C5.4,7.6 5.1,6.3 5,5M19,19C17.7,18.9 16.4,18.6 15.2,18.2L16.4,17C17.2,17.2 18.1,17.4 19,17.4V19Z" /></svg>';
      } else {
        audio_call = '';
      }
      $('#audio-button,#audio-button-right').html(audio_call);
      <?php } } ?>
      $('.text-sender-container').find('.ball-pulse').fadeOut(100);
	  $('.text-sender-container').find('.msg_progress').fadeOut(100);
    }
  });
}

function Wo_GetGroupMessages(group_id, group_name) {
	$('#story_id').val('0');
    $('.message_reply_story_text').remove();
	Wo_ClearReplyMessage()
	if ($('#user-id').val() > 0) {
		Wo_DeleteTyping($('#user-id').val());
	}
  view_more_wrapper = $('.view-more-wrapper');

  <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
    socket.emit("active-message-user-change", {from_id: _getCookie("user_id"), group_id: group_id, group:true})
  <?php } ?>
  
  $('.text-sender-container').find('.ball-pulse').fadeIn(100);
  $('.text-sender-container').find('.msg_progress').fadeIn(100);
  $('#user-name').text(group_name).removeClass('hidden');
  $('#user-name-right').html('<a target="_blank" href="javascript:void(0);">' + group_name + '</a>');
  if($('.messages-recipients-list').hasClass('active')) {
	$('.messages-recipients-list').removeClass('active');
	$('#messages-recipient-' + group_id).addClass('active');
  } else { 
	$('#messages-recipient-' + group_id).addClass('active');
  }
  $('#messages-group-id').attr('value', group_id);
  $('#user-id').attr('value', 0);
  $('#sendMessage').val('').attr('disabled', false);
  $('#sendMessasgeFile').attr('disabled', false);
  $('#messages-record').attr('disabled',false);
  $("#messages-group-"+ group_id).find('.group-lastseen').empty();
  $.get(Wo_Ajax_Requests_File(), {
    f: 'messages',
    s: 'get_group_messages',
    group_id: group_id
  }, function (data) {
    if(data.status == 200) {
    	$('.delete-icon').html('<svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" onclick="'+data.onclick+'(' + group_id + ')"><path fill="currentColor" d="M9,3V4H4V6H5V19A2,2 0 0,0 7,21H17A2,2 0 0,0 19,19V6H20V4H15V3H9M7,6H17V19H7V6M9,8V17H11V8H9M13,8V17H15V8H13Z" /></svg>');
    	$('.send-button').css('background-color', '#c45a5b');
        $('.send-button').css('border-color', '#c45a5b');
		$('#wo_msg_right_prt .message-option-btns .btn svg').css('color', '#c45a5b');
    	$('#user-last-seen').html('');
    	$('.wo_msg_user_dtl').css('display', 'none');
      <?php if ($wo['config']['maxCharacters'] != 10000) { ?>
      $('#charsLeft').text("<?php echo $wo['config']['maxCharacters']?>");
      <?php }?>

      if(data.html.length == 0) {
        view_more_wrapper.hide();
        $('.messages-container').html('<div class="no-messages empty_state"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.021 512.021" xml:space="preserve"> <path style="fill:#64B5F6;" d="M338.214,344.556l-64-64.107c-4.16-4.171-10.914-4.179-15.085-0.019 c-2.006,2.001-3.133,4.717-3.134,7.55v149.44c0.003,4.589,2.942,8.662,7.296,10.112c1.086,0.367,2.224,0.555,3.371,0.555 c3.357,0,6.519-1.581,8.533-4.267l64-85.333C342.376,354.244,341.958,348.31,338.214,344.556z"/> <path style="fill:#1976D2;" d="M291.366,320.641l-64-21.333c-5.587-1.868-11.631,1.147-13.499,6.734 c-0.732,2.19-0.734,4.558-0.005,6.749l42.667,128c1.453,4.362,5.536,7.302,10.133,7.296h0.661c4.819-0.3,8.836-3.8,9.792-8.533 l21.333-106.667C299.523,327.601,296.483,322.345,291.366,320.641z"/> <path style="fill:#2196F3;" d="M507.43,23.446c-3.399-2.377-7.867-2.568-11.456-0.491L90.641,257.622 c-5.096,2.955-6.832,9.482-3.877,14.578c1.306,2.253,3.391,3.95,5.861,4.771l191.573,63.872l148.907,63.829 c5.417,2.316,11.685-0.197,14.001-5.614c0.321-0.752,0.555-1.538,0.697-2.343l64-362.667 C512.531,29.965,510.825,25.829,507.43,23.446z"/> <g> <path style="fill:#1976D2;" d="M510.011,38.38c3.441-4.781,2.355-11.447-2.426-14.889c-4.259-3.065-10.115-2.578-13.808,1.15 L215.611,318.017l80.277,27.733L510.011,38.38z"/> <path style="fill:#1976D2;" d="M26.065,420.246c-2.679,0.003-5.26-1.003-7.232-2.816c-5.319-4.892-10.553-9.92-15.701-15.083 c-4.171-4.165-4.176-10.922-0.011-15.093c4.165-4.171,10.922-4.176,15.093-0.011c4.949,4.949,9.984,9.792,15.083,14.485 c4.336,3.988,4.618,10.736,0.63,15.072C31.904,418.999,29.052,420.249,26.065,420.246z"/> <path style="fill:#1976D2;" d="M171.387,490.54c-10.278-0.033-20.527-1.098-30.592-3.179c-5.814-0.95-9.757-6.434-8.806-12.248 c0.95-5.814,6.434-9.757,12.248-8.806c0.277,0.045,0.553,0.102,0.825,0.169c8.683,1.792,17.524,2.707,26.389,2.731h0.064h4.8 c5.559-0.531,10.497,3.545,11.028,9.104c0.037,0.385,0.051,0.771,0.044,1.157c0.216,5.884-4.377,10.831-10.261,11.051h-5.568 L171.387,490.54z M94.95,470.124c-1.708,0-3.39-0.409-4.907-1.195c-10.486-5.487-20.611-11.636-30.315-18.411 c-4.727-3.515-5.709-10.197-2.194-14.925c3.355-4.511,9.634-5.644,14.354-2.59c8.937,6.286,18.272,11.987,27.947,17.067 c5.231,2.709,7.276,9.146,4.567,14.377c-1.833,3.54-5.487,5.762-9.474,5.762L94.95,470.124z"/> <path style="fill:#1976D2;" d="M226.235,479.105c-5.891,0.048-10.705-4.688-10.753-10.579c-0.035-4.307,2.524-8.213,6.487-9.901 c6.141-2.627,12.105-5.648,17.856-9.045c5.146-2.867,11.642-1.019,14.509,4.127c2.767,4.967,1.152,11.231-3.672,14.241 c-6.542,3.867-13.325,7.309-20.309,10.304C229.05,478.806,227.651,479.097,226.235,479.105z"/> </g></svg><?php echo $wo["lang"]["no_more_message_to_show"];?> </div>');
      } 
      else {
        $('.messages-container').html(data.html);
		view_more_wrapper.html('<a href="javascript:void(0);" title="' + data.view_more_text + '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13,15L15.5,17.5L16.92,16.08L12,11.16L7.08,16.08L8.5,17.5L11,15V21H13V15M3,3H21V5H3V3M3,7H13V9H3V7Z" /></svg></a>').show();
        view_more_wrapper.attr('onclick', 'Wo_getOldGroupMessages(' + group_id + ');').removeClass('hidden');
        setTimeout(function(){
              	$(".messages-container").animate({
                scrollTop: $('.messages-container')[0].scrollHeight
              }, 200);
              }, 100);
      }
      $('.text-sender-container').find('.ball-pulse').fadeOut(100);
	  $('.text-sender-container').find('.msg_progress').fadeOut(100);
    }
  });
}
function Wo_ExitGroupChat(id = false){
	if (!id) {return false}
	$.ajax({
	  url: Wo_Ajax_Requests_File(),
	  type: 'GET',
	  dataType: 'json',
	  data: {f: 'chat',s:'exit_group_chat',group_id:id},
	})
	.done(function(data) {
	  if (data.status == 200) {
	    window.location.href = websiteUrl+"/messages";
	  }
	})
	.fail(function() {
	  console.log("error");
	})
}
function Wo_DeleteGroupChat(id = false){
    if (!id) {return false}
    $.ajax({
      url: Wo_Ajax_Requests_File(),
      type: 'GET',
      dataType: 'json',
      data: {f: 'chat',s:'delete_group_chat',group_id:id},
    })
   .done(function(data) {
      if (data.status == 200) {
        window.location.href = websiteUrl+"/messages";
      }
    })
    .fail(function() {
      console.log("error");
    })
  }
function Wo_GetPageMessages(page_id, page_user_id,page_name,user_id) {
	$('#story_id').val('0');
    $('.message_reply_story_text').remove();
	Wo_ClearReplyMessage()
	if ($('#user-id').val() > 0) {
		Wo_DeleteTyping($('#user-id').val());
	}
  view_more_wrapper = $('.view-more-wrapper');
  
  $('.text-sender-container').find('.ball-pulse').fadeIn(100);
  $('.text-sender-container').find('.msg_progress').fadeIn(100);
  $('#user-name').text(page_name).removeClass('hidden');
  $('#user-name-right').html('<a target="_blank" href="javascript:void(0);">' + page_name + '</a>');
  if($('.messages-recipients-list').hasClass('active')) {
	$('.messages-recipients-list').removeClass('active');
	$('#messages-recipient-' + user_id).addClass('active');
  } else { 
	$('#messages-recipient-' + user_id).addClass('active');
  }
  $('#user-avatar-right img').addClass('hidden');
  $('.msg_usr_lst_sen_main').html('');
  $('#messages-page-id').attr('value', page_id);
  $('#messages-from-id').attr('value', page_user_id);
  $('#user-id').attr('value', 0);
  $('#sendMessage').val('').attr('disabled', false);
  $('#sendMessasgeFile').attr('disabled', false);
  $('#messages-record').attr('disabled',false);
  $("#messages-group-"+ page_id).find('.group-lastseen').empty();
  $.get(Wo_Ajax_Requests_File(), {
    f: 'messages',
    s: 'get_page_messages',
    page_user_id: page_user_id,
    page_id: page_id
  }, function (data) {
    if(data.status == 200) {
    	$('.send-button').css('background-color', '#2e7be5');
        $('.send-button').css('border-color', '#2e7be5');
		$('#wo_msg_right_prt .message-option-btns .btn svg').css('color', '#2e7be5');
    	$('.wo_msg_user_dtl, .msg_srch_innr, .messages-search-icon').css('display', 'none');
      <?php if ($wo['config']['maxCharacters'] != 10000) { ?>
      $('#charsLeft').text("<?php echo $wo['config']['maxCharacters']?>");
      <?php }?>

      if(data.html.length == 0) {
        view_more_wrapper.hide();
        $('.messages-container').html('<div class="no-messages empty_state"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.021 512.021" xml:space="preserve"> <path style="fill:#64B5F6;" d="M338.214,344.556l-64-64.107c-4.16-4.171-10.914-4.179-15.085-0.019 c-2.006,2.001-3.133,4.717-3.134,7.55v149.44c0.003,4.589,2.942,8.662,7.296,10.112c1.086,0.367,2.224,0.555,3.371,0.555 c3.357,0,6.519-1.581,8.533-4.267l64-85.333C342.376,354.244,341.958,348.31,338.214,344.556z"/> <path style="fill:#1976D2;" d="M291.366,320.641l-64-21.333c-5.587-1.868-11.631,1.147-13.499,6.734 c-0.732,2.19-0.734,4.558-0.005,6.749l42.667,128c1.453,4.362,5.536,7.302,10.133,7.296h0.661c4.819-0.3,8.836-3.8,9.792-8.533 l21.333-106.667C299.523,327.601,296.483,322.345,291.366,320.641z"/> <path style="fill:#2196F3;" d="M507.43,23.446c-3.399-2.377-7.867-2.568-11.456-0.491L90.641,257.622 c-5.096,2.955-6.832,9.482-3.877,14.578c1.306,2.253,3.391,3.95,5.861,4.771l191.573,63.872l148.907,63.829 c5.417,2.316,11.685-0.197,14.001-5.614c0.321-0.752,0.555-1.538,0.697-2.343l64-362.667 C512.531,29.965,510.825,25.829,507.43,23.446z"/> <g> <path style="fill:#1976D2;" d="M510.011,38.38c3.441-4.781,2.355-11.447-2.426-14.889c-4.259-3.065-10.115-2.578-13.808,1.15 L215.611,318.017l80.277,27.733L510.011,38.38z"/> <path style="fill:#1976D2;" d="M26.065,420.246c-2.679,0.003-5.26-1.003-7.232-2.816c-5.319-4.892-10.553-9.92-15.701-15.083 c-4.171-4.165-4.176-10.922-0.011-15.093c4.165-4.171,10.922-4.176,15.093-0.011c4.949,4.949,9.984,9.792,15.083,14.485 c4.336,3.988,4.618,10.736,0.63,15.072C31.904,418.999,29.052,420.249,26.065,420.246z"/> <path style="fill:#1976D2;" d="M171.387,490.54c-10.278-0.033-20.527-1.098-30.592-3.179c-5.814-0.95-9.757-6.434-8.806-12.248 c0.95-5.814,6.434-9.757,12.248-8.806c0.277,0.045,0.553,0.102,0.825,0.169c8.683,1.792,17.524,2.707,26.389,2.731h0.064h4.8 c5.559-0.531,10.497,3.545,11.028,9.104c0.037,0.385,0.051,0.771,0.044,1.157c0.216,5.884-4.377,10.831-10.261,11.051h-5.568 L171.387,490.54z M94.95,470.124c-1.708,0-3.39-0.409-4.907-1.195c-10.486-5.487-20.611-11.636-30.315-18.411 c-4.727-3.515-5.709-10.197-2.194-14.925c3.355-4.511,9.634-5.644,14.354-2.59c8.937,6.286,18.272,11.987,27.947,17.067 c5.231,2.709,7.276,9.146,4.567,14.377c-1.833,3.54-5.487,5.762-9.474,5.762L94.95,470.124z"/> <path style="fill:#1976D2;" d="M226.235,479.105c-5.891,0.048-10.705-4.688-10.753-10.579c-0.035-4.307,2.524-8.213,6.487-9.901 c6.141-2.627,12.105-5.648,17.856-9.045c5.146-2.867,11.642-1.019,14.509,4.127c2.767,4.967,1.152,11.231-3.672,14.241 c-6.542,3.867-13.325,7.309-20.309,10.304C229.05,478.806,227.651,479.097,226.235,479.105z"/> </g></svg><?php echo $wo["lang"]["no_more_message_to_show"];?> </div>');
      } 
      else {
        $('.messages-container').html(data.html);
        view_more_wrapper.html('<a href="javascript:void(0);" title="' + data.view_more_text + '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13,15L15.5,17.5L16.92,16.08L12,11.16L7.08,16.08L8.5,17.5L11,15V21H13V15M3,3H21V5H3V3M3,7H13V9H3V7Z" /></svg></a>').show();
        view_more_wrapper.attr('onclick', 'Wo_getOldPageMessages(' + page_id + ','+page_user_id+');').removeClass('hidden');
        setTimeout(function(){
              	$(".messages-container").animate({
                scrollTop: $('.messages-container')[0].scrollHeight
              }, 200);
              }, 100);
      }
      $('.text-sender-container').find('.ball-pulse').fadeOut(100);
	  $('.text-sender-container').find('.msg_progress').fadeOut(100);
    }
  });
}


function Wo_getNewMessages() {
  let user_id = $('#user-id').val();
  let group_id = $('#messages-group-id').val();
  let page_id = $('#messages-page-id').val();
  let from_id = $('#messages-from-id').val();
  let to_id = $('#messages-to-id').val();
  let message_id = $('.messages-container').find('.messages-wrapper:last').attr('data-message-id');
  <?php if ($wo['config']['node_socket_flow'] == "1")
  {
    ?>
  socket.on("private_message_page", (data)=>{
  	$('.message-seen').hide();
       user_id = $('#user-id').val();
       group_id = $('#messages-group-id').val();
       page_id = $('#messages-page-id').val();
       from_id = $('#messages-from-id').val();
       to_id = $('#messages-to-id').val();
        if (data.color) {
            $(".text-sender-container .red-list").css('background', data.color);
        }
        isMedia = false;
        if (data.hasOwnProperty('isMedia')) {
        	if (isMedia == true) {
        		isMedia = true;
        	}
        } 
        if (isMedia == true) {
        	$("#messages-recipient-" + data.sender).find('p').html("<?php echo $wo['lang']['media'];?>");
        } else {
        	$("#messages-recipient-" + data.sender).find('p').html(data.message_html);
        }
        $("#messages-recipient-" + data.sender).parent().prepend($("#messages-recipient-" + data.sender));
        $("#messages-recipient-" + data.sender).find(".messages-last-sent").replaceWith(data.time);

        if ($('#user-id').val() != data.sender) {
		    $("#messages-recipient-" + data.sender).find('.new-message-alert').removeClass("hidden").fadeIn(200);
		    $("#messages-recipient-" + data.sender).find('.messages-last-sent').addClass('new_msg_lst_lsent');
		    $("#messages-recipient-" + data.sender).find('p').addClass('new_msg_active_list');
        }
        $("#messages-recipient-" + data.sender).attr("data-content", data.message);
        if(data.status == 200) {
          if(!$(".messages-container").find(".no-messages").length){
            if(+user_id === +data.sender || ((+data.id === +user_id))){
              $('.message-contnaier:last').find('.message-typing').empty()
              $(".messages-container").append(data.html);
              setTimeout(function(){
              	$(".messages-container").animate({
                scrollTop: $('.messages-container')[0].scrollHeight
              }, 200);
              }, 100);
              if(data.sender == <?php echo $wo['user']['user_id']; ?>){
                $('.send-button').css('background-color', data.color);
                $('.send-button').css('border-color', data.color);
                $('#wo_msg_right_prt .message-option-btns .btn svg').css('color', data.color);
                $(".messages-container").find(".pull-right").find(".message").css('background-color', data.color);
                $(".messages-container").find(".pull-right").find(".message-text").css('background-color', data.color)
              }
            }
            if(data.sender != <?php echo $wo['user']['user_id']; ?>) {
              document.getElementById('message-sound').play();
              if(!$('.sendMessage').is(':focus')) {
                document.title = 'New Message ' + document_title;
              }
            }
          }
          var last_id = $('.messages-text:last').attr('data-message-id');
          socket.emit("seen_messages", {user_id: _getCookie("user_id"), recipient_id: user_id,message_id: last_id}, (data)=>{})
        }
      });
      socket.on("group_message_page", (data)=>{
       user_id = $('#user-id').val();
       group_id = $('#messages-group-id').val();
       page_id = $('#messages-page-id').val();
       from_id = $('#messages-from-id').val();
       to_id = $('#messages-to-id').val();
        if (data.color) {
            $(".text-sender-container .red-list").css('background', data.color);
        }
        if(data.status == 200) {
          if(!$(".messages-container").find(".no-messages").length){
            if(+group_id === +data.id || (data.self && (+data.id === +group_id))){
              $('.message-contnaier:last').find('.message-typing').empty()
              $(".messages-container").append(data.html);
              setTimeout(function(){
              	$(".messages-container").animate({
                scrollTop: $('.messages-container')[0].scrollHeight
              }, 200);
              }, 100);
              if(data.self){
                $('.send-button').css('background-color', data.color);
                $('.send-button').css('border-color', data.color);
                $('#wo_msg_right_prt .message-option-btns .btn svg').css('color', data.color);
                $(".messages-container").find(".pull-right").find(".message").css('background-color', data.color);
                $(".messages-container").find(".pull-right").find(".message-text").css('background-color', data.color)
              }
            }
            if(!data.self) {
              document.getElementById('message-sound').play();
              if(!$('.sendMessage').is(':focus')) {
                document.title = 'New Message ' + document_title;
              }
            }
          }
        }
      });
  <?php } ?>

  if(user_id == 0 && group_id == 0) {
    return false;
  }
  if ($('body').attr('sending-' + user_id) == 'true' && group_id == 0) {
     return false;
  }
  if (message_id) {
  <?php if ($wo['config']['node_socket_flow'] == "0")
  {
    ?>
    $.get(Wo_Ajax_Requests_File(), {	
      f: 'messages',	
      s: 'get_new_messages',	
      user_id: user_id,	
      group_id: group_id,	
      page_id: page_id,	
      from_id: from_id,	
      to_id: to_id,	
      message_id: message_id	
    }, function (data) {
    	if (data.reactions) {
	      	for (var i = data.reactions.length - 1; i >= 0; i--) {
	      		$('.post-reactions-icons-m-'+data.reactions[i].id).html(data.reactions[i].reactions);
	      		
	      	}
	      }
    if ( data.is_typing == 200) {
      $('.message-contnaier:last').find('.message-typing').html('<div class="incoming pull-left" id="typing"><div class="message-typing message-details"><div class="message-user-image pull-left"><img src="' + data.img + '" alt="Profile Picture"></div><svg width="35" height="35" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="#999"> <circle cx="15" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.5s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.5s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate> </circle> <circle cx="60" cy="15" r="9" fill-opacity="0.3"> <animate attributeName="r" from="9" to="9" begin="0s" dur="0.5s" values="9;15;9" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.5s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite"></animate> </circle> <circle cx="105" cy="15" r="15"> <animate attributeName="r" from="15" to="15" begin="0s" dur="0.5s" values="15;9;15" calcMode="linear" repeatCount="indefinite"></animate> <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.5s" values="1;.5;1" calcMode="linear" repeatCount="indefinite"></animate> </circle> </svg></div></div>').fadeIn(300);
      setTimeout(function(){
              	$(".messages-container").animate({
                scrollTop: $('.messages-container')[0].scrollHeight
              }, 200);
              }, 100);

    } else {
       for (let a of $('.message-contnaier')) {
         $(a).find('.message-typing').empty()
       }
    }	
      if (data.color) {	
          $(".text-sender-container .red-list").css('background', data.color);	
      }	
      if(data.status == 200) {	
        $(".messages-container").append(data.html);	
        setTimeout(function(){
              	$(".messages-container").animate({
                scrollTop: $('.messages-container')[0].scrollHeight
              }, 200);
              }, 100);	
        if(data.sender == user_id) {	
          document.getElementById('message-sound').play();	
          if(!$('.sendMessage').is(':focus')) {	
            document.title = 'New Message ' + document_title;	
          }	
        }	
      }	
    });
  <?php } ?>

  }
  <?php if ($wo['config']['node_socket_flow'] == "0")
  {
    ?>

  setTimeout(Wo_getNewMessages, 5000);
  <?php } ?>
}

function Wo_getMessageSeen() {
  var last_id = $('.messages-text:last').attr('data-message-id');
  if(!$('.messages-text:last').find('.message-seen').is(':empty')) {
    return false;
  }
  $.get(Wo_Ajax_Requests_File(), {
    f: 'messages',
    s: 'get_last_message_seen_status',
    last_id: last_id
  }, function (data) {
    setTimeout(Wo_getMessageSeen, 12000);
    if(data.status == 200) {
      $('.messages-text:last').find('.message-seen').hide().html('<i class="fa fa-check"></i> <?php echo $wo["lang"]["seen"];?> (<span class="ajax-time" title="' + data.time + '">' + data.seen + '</span>)').fadeIn(300);
      setTimeout(function(){
              	$(".messages-container").animate({
                scrollTop: $('.messages-container')[0].scrollHeight
              }, 200);
              }, 100);
    }
  });
}
function Wo_RegisterTyping(recipient_id) {
  <?php if ($wo['config']['node_socket_flow'] == "0") { ?>
    $.get(Wo_Ajax_Requests_File(), {
        f: 'chat',
        s: 'recipient_is_typing',
        recipient_id: recipient_id
    });
  <?php } ?>

}
function Wo_DeleteTyping(recipient_id) {
  <?php if ($wo['config']['node_socket_flow'] == "0") { ?>
    $.get(Wo_Ajax_Requests_File(), {
        f: 'chat',
        s: 'remove_typing',
        recipient_id: recipient_id
    });
  <?php } ?>
}
function Wo_SubmitForm(e) {
  document.title = document_title;
  id = $('#user-id').val();
  <?php if ($wo['config']['node_socket_flow'] == "0") { ?>
  <?php if ($wo['config']['message_typing'] == 1) { ?>
	if ($('#sendMessage').val().length > 1) {
	    if (typeof ($('#sendMessage').attr('data-typing')) == "undefined" || $('#sendMessage').attr('data-typing') == 'false') {
	        $('#sendMessage').attr('data-typing', 'true');
	        Wo_RegisterTyping(id);
	    } 
	}
	else if ($('#sendMessage').val().length == 1 || $('#sendMessage').val().length == 0) {
	    if (typeof ($('#sendMessage').attr('data-typing')) != "undefined") {
	       if ($('#sendMessage').attr('data-typing') == 'true') {
	           $('#sendMessage').attr('data-typing', 'false');
	           //typing_chat_con.removeAttr('data-typing');
	           Wo_DeleteTyping(id);
	        }
	       }
	    }
	<?php } ?>
	<?php } ?>
  <?php if ($wo['config']['maxCharacters'] != 10000) { ?>
  $('.charsLeft-message').fadeIn(200);
  var chat_number = $('#user-id').val();
  if(e.keyCode && ![17, 18, 9, 13].includes(e.keyCode)){
  	<?php if ($wo['config']['node_socket_flow'] != "0"){ ?>
    socket.emit("typing", { recipient_id: chat_number, user_id: _getCookie("user_id") })
<?php } ?>
  }
  <?php } ?>
  if(e.keyCode == 13 && e.shiftKey == 0) {
    e.preventDefault();
    //$('form.sendMessages').submit()
    Wo_GetMRecordLink();
  }
}

function Wo_getOldMessages(user_id) {
  var $current_top_element = $('.messages-container').children().first();
  view_more_wrapper = $('.view-more-wrapper');
  before_message_id = $('.messages-text:first').attr('data-message-id');
  $('.text-sender-container').find('.msg_progress').fadeIn(100);
  let from_id = _getCookie("user_id")
  let to_id = $(".messages-users-list").find(".active").find(".active").attr("id").substr("messages-recipient-".length)
  var hexDigits = new Array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"); 
  function rgb2hex(rgb) {
    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
  }

  function hex(x) {
    return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
  }
  <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
      socket.emit("loadmore_page", {
        from_id: from_id,
        to_id: to_id,
        username: '<?php echo $wo['user']['username']; ?>',
        before_message_id: before_message_id,
        color: rgb2hex($(".send-button").css("background-color"))
      }, async (data)=>{
            if(data.status == 200) {
              if(data.html.length == 0) {
                view_more_wrapper.html('<a href="javascript:void(0);" title="<?php echo $wo["lang"]["no_more_message_to_show"];?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11,15H13V17H11V15M11,7H13V13H11V7M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20Z" /></svg></a>').show();
                view_more_wrapper.delay(2000).slideUp(200);
              } else {
                $('.messages-container').prepend(data.html);
                var previous_height = 0;
				$current_top_element.prevAll().each(function() {
				  previous_height += $(this).outerHeight();
				});

				$('.messages-container').scrollTop(previous_height);
              }
            } else {
            view_more_wrapper.hide();
          }
        $('.text-sender-container').find('.msg_progress').fadeOut(100);
      })
    <?php } ?>
  <?php if ($wo['config']['node_socket_flow'] == "0") { ?>
  $.get(Wo_Ajax_Requests_File(), {
    f: 'messages',
    s: 'load_previous_messages',
    user_id: user_id,
    before_message_id: before_message_id
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
		view_more_wrapper.html('<a href="javascript:void(0);" title="<?php echo $wo["lang"]["no_more_message_to_show"];?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11,15H13V17H11V15M11,7H13V13H11V7M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20Z" /></svg></a>').show();
        view_more_wrapper.delay(2000).slideUp(200);
      } else {
        $('.messages-container').prepend(data.html);
        var previous_height = 0;
		$current_top_element.prevAll().each(function() {
		  previous_height += $(this).outerHeight();
		});

		$('.messages-container').scrollTop(previous_height);
      }
    } else {
      view_more_wrapper.hide();
    }
	$('.text-sender-container').find('.msg_progress').fadeOut(100);
  });
<?php } ?>
}
function Wo_getOldGroupMessages(group_id) {
	var $current_top_element = $('.messages-container').children().first();
  view_more_wrapper = $('.view-more-wrapper');
  before_message_id = $('.messages-text:first').attr('data-message-id');
  $('.text-sender-container').find('.msg_progress').fadeIn(100);
  <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
  let from_id = _getCookie("user_id")
  var hexDigits = new Array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"); 
  function rgb2hex(rgb) {
    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
  }

  function hex(x) {
    return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
  }
  if($('[data-target="#groups-message"]').attr("aria-expanded") === "true"){
      socket.emit("loadmore_group_page", {
        from_id: from_id,
        group_id: group_id,
        username: '<?php echo $wo['user']['username']; ?>',
        before_message_id: before_message_id,
        color: rgb2hex($(".send-button").css("background-color"))
      }, async (data)=>{
            if(data.status == 200) {
              if(data.html.length == 0) {
                view_more_wrapper.html('<a href="javascript:void(0);" title="<?php echo $wo["lang"]["no_more_message_to_show"];?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11,15H13V17H11V15M11,7H13V13H11V7M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20Z" /></svg></a>').show();
                view_more_wrapper.delay(2000).slideUp(200);
              } else {
                $('.messages-container').prepend(data.html);
                var previous_height = 0;
				$current_top_element.prevAll().each(function() {
				  previous_height += $(this).outerHeight();
				});

				$('.messages-container').scrollTop(previous_height);
              }
            } else {
            view_more_wrapper.hide();
          }
        $('.text-sender-container').find('.msg_progress').fadeOut(100);
      })
    }
    else {
        $.get(Wo_Ajax_Requests_File(), {
          f: 'messages',
          s: 'load_previous_messages',
          group_id: group_id,
          before_message_id: before_message_id
        }, function (data) {
          if(data.status == 200) {
            if(data.html.length == 0) {
          view_more_wrapper.html('<a href="javascript:void(0);" title="<?php echo $wo["lang"]["no_more_message_to_show"];?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11,15H13V17H11V15M11,7H13V13H11V7M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20Z" /></svg></a>').show();
              view_more_wrapper.delay(2000).slideUp(200);
            } else {
              $('.messages-container').prepend(data.html);
              var previous_height = 0;
				$current_top_element.prevAll().each(function() {
				  previous_height += $(this).outerHeight();
				});

				$('.messages-container').scrollTop(previous_height);
            }
          } else {
            view_more_wrapper.hide();
          }
        $('.text-sender-container').find('.msg_progress').fadeOut(100);
        });
    }
  <?php } ?>

}

function Wo_getOldPageMessages(page_id,from_id,to_id) {
	var $current_top_element = $('.messages-container').children().first();
  view_more_wrapper = $('.view-more-wrapper');
  before_message_id = $('.messages-text:first').attr('data-message-id');
  $('.text-sender-container').find('.ball-pulse').fadeIn(100);
  $('.text-sender-container').find('.msg_progress').fadeIn(100);
  $.get(Wo_Ajax_Requests_File(), {
    f: 'messages',
    s: 'load_previous_messages',
    page_id: page_id,
    from_id: from_id,
    to_id: to_id,
    before_message_id: before_message_id
  }, function (data) {
    if(data.status == 200) {
      if(data.html.length == 0) {
        view_more_wrapper.html('<a href="javascript:void(0);" title="<?php echo $wo["lang"]["no_more_message_to_show"];?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11,15H13V17H11V15M11,7H13V13H11V7M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20Z" /></svg></a>').show();
        view_more_wrapper.delay(1000).slideUp(200);
      } else {
        $('.messages-container').prepend(data.html);
        var previous_height = 0;
				$current_top_element.prevAll().each(function() {
				  previous_height += $(this).outerHeight();
				});

				$('.messages-container').scrollTop(previous_height);
      }
    } else {
      view_more_wrapper.hide();
    }
    $('.text-sender-container').find('.ball-pulse').fadeOut(100);
	$('.text-sender-container').find('.msg_progress').fadeOut(100);
  });
}

function Wo_ShareFile() {
  document.title = document_title;
  $("#sendMessage").focus();
  <?php if ($wo['config']['node_socket_flow'] == "0") { ?>
    $("form.sendMessages").submit();
  <?php } ?>
  <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
  var main_hash_id   = $('.main_session').val();
  var file_uploading = false;
  var chat_number = $('#user-id').val();

    $("form.sendMessages").ajaxSubmit({
    url: Wo_Ajax_Requests_File() + '?f=messages&s=send_message&hash=' + main_hash_id,
    beforeSend: function () {
    	chat_number = $('#user-id').val();
    	group_id = $('#group-id').val();
    	first_chat = $('.messages-recipients-list').first();
    	first_chat_id = $(first_chat).attr('id');
    	sending_text = $('.mobileleftpane .text-sender-container textarea').val();
    	if (sending_text.length  > 100) {
    		sending_text = jQuery.trim(sending_text).substring(0, 97)+'...';
    	}

    	$('#messages-recipient-'+chat_number).insertBefore( $( "#"+first_chat_id ) );

    	$('#messages-recipient-'+chat_number).find('p').text(sending_text);
    	$('#messages-recipient-'+chat_number).find('.messages-last-sent').text('<?php echo $wo['lang']['now'];?>');
    	$('#messages-recipient-'+chat_number).find('.messages-last-sent').attr('title', '0 seconds');
    	$('#messages-recipient-'+chat_number).find('.messages-last-sent').removeClass('ajax-time');

      $('.mobileleftpane .text-sender-container textarea').val('');
      $('.sendMessage').attr('disabled', true);
      var user_id_ = $('#user-id').val();
      $('body').attr('sending-' + user_id_, true);
      $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>');
    },
    uploadProgress: function () {
      if ($("#sendMessasgeFile").val() != '') {
        $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>');
        file_uploading = true;
      }
    },
    success: function (data) {
    	$('#story_id').val('0');
    	$('.message_reply_story_text').remove();
    	Wo_ClearReplyMessage();
      if(data.status == 200) {
        $("#message-record-file").val('');
        $("#message-record-name").val('');
        $('#chatStickerMessage').val('');
        Wo_CleanRecordNodes();
        Wo_StopLocalStream();
        
        if($('.messages-container').length == 0) {
          $(".messages-container").html(data.html);
        } else {
          $(".no-messages").hide();
          $(".messages-container").append(data.html);
        }
        var user_id_ = $('#user-id').val();
        $('body').attr('sending-' + user_id_, false);
        $('form.sendMessages').clearForm();
        $('#sendMessage').val('').attr('disabled', false).keyup().focus();
        setTimeout(function(){
              	$(".messages-container").animate({
                scrollTop: $('.messages-container')[0].scrollHeight
              }, 200);
              }, 100);
        if (data.invalid_file == 1) {
          $("#invalid_file").modal('show');
          Wo_Delay(function(){
              $("#invalid_file").modal('hide');
          },3000);
        }
        if (data.invalid_file == 2) {
          $("#file_not_supported").modal('show');
          Wo_Delay(function(){
              $("#file_not_supported").modal('hide');
          },3000);
        }
      }
      else if(data.status == 500 && data.invalid_file == 1){
        $("#invalid_file").modal('show');
        Wo_Delay(function(){
            $("#invalid_file").modal('hide');
        },3000);
      }
      else if(data.status == 500 && data.invalid_file == 2){
        $("#file_not_supported").modal('show');
        Wo_Delay(function(){
            $("#file_not_supported").modal('hide');
        },3000);
      }
      else if(data.status == 500 && data.invalid_file == 3){
	      $("#pro_upload_file").modal('show');
	      Wo_Delay(function(){
	        $("#pro_upload_file").modal('hide');
	      },3000);
      }
      var dom = $($.parseHTML(data.html));
      var mediaId = dom.find(".messages-wrapper").attr("data-message-id");
      if($('[data-target="#groups-message"]').attr("aria-expanded") === "true"){
        socket.emit("group_message_page", {
          group_id: $('#messages-group-id').val(),
          from_id: _getCookie("user_id"),
          username: '<?php echo $wo['user']['username']; ?>',
          mediaId: mediaId,
          isSticker: false
        })
      }
      else{
      socket.emit("private_message_page", {
        to_id: chat_number, 
        from_id: _getCookie("user_id"),
        username: '<?php echo $wo['user']['username']; ?>',
        mediaId: mediaId,
        isSticker: false
      })
      }
      if (file_uploading) {
        file_uploading = false;
        $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>');
      }
      $('form.sendMessages').find('.send-button').html('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>');
    }
   })
  <?php } ?>
}


function Wo_DeleteMessage(message_id) {
  $('.text-sender-container').find('.msg_progress').fadeIn(100);
  $.get(Wo_Ajax_Requests_File(), {
    f:'messages',
    s:'delete_message',
    message_id: message_id
  }, function (data) {
    if(data.status == 200) {
      $('#messageId_' + message_id).slideUp(200, function () {
        $(this).remove();
      });
    }
	$('.text-sender-container').find('.msg_progress').fadeOut(100);
  });
}
function Wo_ShowMessageOptions(id) {
    $('.deleteMessage').hide();
    $('#messageId_' + id).find('.deleteMessage').show();
}
function Wo_ResizeVideoPlayer(message_id) {
  var message_container = $('#messageId_' + message_id);
  message_container.find('.message-media').toggleClass('full-size');
}


// Hide Header on on scroll down
$(function(){
    var lastScrollTop = 0, delta = 5;
    $('.messages-container').scroll(function(event){
       var st = $(this).scrollTop();
       
       if(Math.abs(lastScrollTop - st) <= delta)
          return;
       
if (st > lastScrollTop){
       // downscroll code
    $(".messages-load-more-messages").addClass("above_header")
       .hover(
           function() {
               $(".messages-load-more-messages").removeClass("above_header");
           }
       )
   } else {
      // upscroll code
      $(".messages-load-more-messages").removeClass("above_header");
   }
       lastScrollTop = st;
    });
});
function Wo_CreateGChat(e){
    e.preventDefault();
    $('#create_group_chat').modal('show');
}
function Wo_GetGChatParticipants(name){
    if (!name) {
        return false;
    }
    $.ajax({
        url: Wo_Ajax_Requests_File(),
        type: 'GET',
        dataType: 'json',
        data: {f: 'chat',s:'get_parts',name:name},
    })
    .done(function(data) {
        if (data.status == 200) {
            $('.group_chat_mbr_list').html(data.html);
        }
        else{
          $('.group_chat_mbr_list').html('<p class="no_participant"><?php echo $wo['lang']['no_result']; ?></p>');
        }
    })
    .fail(function() {
        console.log("error");
    })   
}
var chat_part_array = [];
$(document).on('click', '.group_chat_mbr_part', function(event) {
        event.preventDefault();
        var self_id    = $(this).attr('id');
        if ($.inArray(self_id, chat_part_array) == -1) {
            chat_part_array.push(self_id);
            $("#group_chat_mbrs").text(chat_part_array.length);
            
            $(this).fadeOut(100,function(){
                $("#chat_group_users").val(chat_part_array.join());
                $(this).remove();
            })
        }
        else{
          $(this).addClass('disabled').removeAttr('title');
        }
    });

jQuery(document).ready(function($) {
	$('#insert-caht-parts').ajaxForm({
      url: Wo_Ajax_Requests_File() + '?f=chat&s=create_group',
      type:'POST',
      dataType:'json',

      beforeSend: function() {
        Wo_progressIconLoader($('#insert-caht-parts').find('button'));
		$('#insert-caht-parts').find('.add_wow_loader').addClass('btn-loading');
      },
      success: function(data) {
        if (data['status'] == 200) {
        	if (node_socket_flow == "1") {
		      	for (var i = 0; i < chat_part_array.length; i++) {
		         socket.emit("user_notification", { to_id: chat_part_array[i], user_id: _getCookie("user_id"), type: "request" });
			    }
	      	}
            $("#create_group_chat").modal('hide');
            Wo_OpenChatTab(0,data.group_id);
            $("#insert-caht-parts").find('#reset').trigger('click');
            $(".group_chat_mbr_list").empty();
            $(".group_chat_avatar").empty();
            chat_part_array = [];
            socket.emit("sync_groups", {"from_id": _getCookie("user_id")})
        }
        else if (data.status == 500){
            $("#insert-caht-alert").html('<div class="alert alert-danger">' + data['message'] + '</div>');
        } 
        $('#insert-caht-parts').find('.add_wow_loader').removeClass('btn-loading');
    }});
});

</script>
<style>.message-text a.hash{color: #a84849 !important;}</style>

<style>
@media(max-width:992px){
.text-sender-container{height:100%;}
.text-sender-container .messagejoint{position: fixed;bottom: 0;right: 0;left: 0;}
}
</style>


<div class="modal fade" id="create_group_chat" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="wow_pops_head">
				<svg height="100px" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" xmlns="http://www.w3.org/2000/svg"><path d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729 c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="currentColor" opacity="0.6"></path> <path d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729 c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="currentColor" opacity="0.6"></path> <path d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428 c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="currentColor"></path></svg>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></button>
				<h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13,13C11,13 7,14 7,16V18H19V16C19,14 15,13 13,13M19.62,13.16C20.45,13.88 21,14.82 21,16V18H24V16C24,14.46 21.63,13.5 19.62,13.16M13,11A3,3 0 0,0 16,8A3,3 0 0,0 13,5A3,3 0 0,0 10,8A3,3 0 0,0 13,11M18,11A3,3 0 0,0 21,8A3,3 0 0,0 18,5C17.68,5 17.37,5.05 17.08,5.14C17.65,5.95 18,6.94 18,8C18,9.06 17.65,10.04 17.08,10.85C17.37,10.95 17.68,11 18,11M8,10H5V7H3V10H0V12H3V15H5V12H8V10Z"></path></svg> <?php echo $wo['lang']['create_group_chat'] ?></h4>
			</div>
			<form id="insert-caht-parts" class="wo_create_chat_group">
				<div class="modal-body">
					<div id="insert-caht-alert"></div>
					<div class="wow_form_fields">
						<label for="group_name"><?php echo $wo['lang']['name']; ?></label>
						<input id="group_name" name="group_name" type="text" max="50">
					</div>
					<div class="wow_form_fields">
						<label for="add_parts"><?php echo $wo['lang']['add_parts']; ?> (<span id="group_chat_mbrs">0</span>)</label>
						<input id="add_parts" type="text" onkeydown="Wo_GetGChatParticipants(this.value)">
						<div class="group_chat_mbr_list"></div>
					</div>
					<div class="wow_form_fields">
						<label><?php echo $wo['lang']['image']; ?></label>
						<div class="wow_fcov_image wow_group_chat_image">
							<div id="wow_fcov_img_holder">
								<img src="<?php echo $wo['config']['theme_url'];?>/img/ad_pattern.png">
							</div>
							<div class="upload_ad_image" onclick="document.getElementById('group_chat_avatar').click(); return false">
								<div class="upload_ad_image_content">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z"></path></svg> <?php echo $wo['lang']['choose_image'] ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button id="delete-all-post" type="submit" class="btn btn-main btn-mat btn-mat-raised add_wow_loader"><?php echo $wo['lang']['create']; ?></button>
				</div>
				<input type="hidden" name="parts" id="chat_group_users">
				<input type="reset" id="reset" class="hidden">
				<input type="file" name="avatar" class="hidden" id="group_chat_avatar" onchange="$('#wow_fcov_img_holder').html('<img src=\'' + window.URL.createObjectURL(this.files[0]) + '\' alt=\'Picture\'>');" accept="image/jpeg,image/png,image/gif">
			</form>
		</div>
	</div>
</div>