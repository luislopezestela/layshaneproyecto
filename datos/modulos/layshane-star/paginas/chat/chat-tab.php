<div class="chat-wrapper chat_<?php echo $wo['chat']['recipient']['user_id'];?>" id="chat_<?php echo $wo['chat']['recipient']['user_id'];?>">
	<div class="online-toggle-hdr pointer" onclick="toggleChat(this, event);" data-chat-id="<?php echo $wo['chat']['recipient']['user_id'];?>">
		<div class="wow_chat_hdr_usr">
			<div class="avatar">
				<a href="<?php echo $wo['chat']['recipient']['url'];?>" data-ajax="?link1=timeline&u=<?php echo $wo['chat']['recipient']['username'];?>">
					<img class="cht_hd_avtr" src="<?php echo $wo['chat']['recipient']['avatar'];?>" alt="<?php echo $wo['chat']['recipient']['name'];?>" />
				</a>
			</div>
			<div>
				<a href="<?php echo $wo['chat']['recipient']['url'];?>" data-ajax="?link1=timeline&u=<?php echo $wo['chat']['recipient']['username'];?>"> 
					<h3><?php echo mb_substr($wo['chat']['recipient']['name'], 0, 20, "UTF-8");?></h3>
					<p class="chat-tab-status <?php echo (lui_IsOnline($wo['chat']['recipient']['user_id']) === true) ? 'active' : ''; ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg> <?php echo $wo['lang']['online'];?>
					</p>
				</a>
			</div>
		</div>
		<div class="close-chat">
			<?php if ($wo['config']['audio_chat'] == 1 && ($wo['config']['twilio_video_chat'] == 1 || $wo['config']['agora_chat_video'] == 1)) {
				if ($wo['config']['can_use_audio_call']) {
			 ?>
			<?php if ($wo['chat']['recipient']['lastseen'] > (time() - 60)) { ?>
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" onclick="Wo_GenerateVoiceCall(<?php echo $wo['user']['user_id'];?>, <?php echo $wo['chat']['recipient']['user_id'];?>)"><path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" /></svg>
			<?php } else { ?>
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="disabled"><path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" /></svg>
			<?php } } } ?>
			<?php if ($wo['config']['video_chat'] == 1 && ($wo['config']['twilio_video_chat'] == 1 || $wo['config']['agora_chat_video'] == 1)) {
				if ($wo['config']['can_use_video_call']) {
			 ?>
			<?php if ($wo['chat']['recipient']['lastseen'] > (time() - 60)) { ?>
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" onclick="Wo_GenerateVideoCall(<?php echo $wo['user']['user_id'];?>, <?php echo $wo['chat']['recipient']['user_id'];?>)"><path fill="currentColor" d="M17,10.5V7A1,1 0 0,0 16,6H4A1,1 0 0,0 3,7V17A1,1 0 0,0 4,18H16A1,1 0 0,0 17,17V13.5L21,17.5V6.5L17,10.5Z" /></svg>
			<?php } else { ?>
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="disabled"><path fill="currentColor" d="M17,10.5V7A1,1 0 0,0 16,6H4A1,1 0 0,0 3,7V17A1,1 0 0,0 4,18H16A1,1 0 0,0 17,17V13.5L21,17.5V6.5L17,10.5Z" /></svg>
			<?php } } } ?>
			<a class="white" href="<?php echo lui_SeoLink("index.php?link1=messages&user=" . $wo['chat']['recipient']['user_id']);?>" target="_blank" onclick="Wo_CloseChat(<?php echo $wo['chat']['recipient']['user_id'];?>);">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style=""><path fill="currentColor" d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z" /></svg>
			</a>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="width: 24px; height: 24px;"onclick="Wo_CloseChat(<?php echo $wo['chat']['recipient']['user_id'];?>);"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg>
		</div>
	</div>

	<div class="chat-tab-container chat-tab-container-<?php echo $wo['chat']['recipient']['user_id'];?> chat-tab-box-<?php echo $wo['chat']['recipient']['user_id'];?>">
		<div class="chat-messages-wrapper chat-messages-wrapper-<?php echo $wo['chat']['recipient']['user_id'];?>">
			<div class="chat-messages">
				<div class="chat-user-desc">
					<img src="<?php echo $wo['chat']['recipient']['avatar'];?>" alt="User avatar">
					<div class="text">
						<p class="head-text">
							<?php $is_following = lui_IsFollowing($wo['chat']['recipient']['user_id'], $wo['user']['user_id']);?>
							<?php if ($wo['config']['connectivitySystem'] == 0) { ?>
								<?php if ($is_following) { ?>
									<?php echo $wo['lang']['your_following'];?> <?php echo $wo['chat']['recipient']['name'];?>
								<?php } ?>
							<?php } else { ?>
								<?php 
									if ($is_following) { 
										echo $your_friends = str_replace('{site_name}', $wo['config']['siteName'], $wo['lang']['your_friends_chat']);
									} 
								?>
							<?php } ?>
						</p>
						<?php 
							$country = $wo['chat']['recipient']['country_id'];
							if ($country > 0) {
						?>
							<div class="desc-text">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" /></svg> <?php echo $wo['lang']['living_in'];?> <?php echo $wo['countries_name'][$country];?>
							</div>
						<?php } ?>
						<?php 
							$working = $wo['chat']['recipient']['working'];
							if (!empty($working)) {
						?>
							<div class="desc-text">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z" /></svg> <?php echo $wo['lang']['working_at'];?> <?php echo $working;?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="chat-textarea btn-group">
			<form action="#" method="post" class="chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>">
				<?php 
					$story_id = 0;
					if (!empty($wo['chat']['story_id']) && is_numeric($wo['chat']['story_id']) && $wo['chat']['story_id'] > 0) {
						$story_id = lui_Secure($wo['chat']['story_id']);
						$story = $db->where('id',$story_id)->getOne(T_USER_STORY);
					} 
					if (!empty($story)) {
						if (!empty($story->thumbnail)) {
							$story->thumbnail = lui_GetMedia($story->thumbnail);
						}
						else{
							$u = lui_UserData($story->user_id);
							if (!empty($u)) {
								$story->thumbnail = $u['avatar'];
							}
						}
							
				?>
					<input type="hidden" id="story_id" name="story_id" value="<?php echo($story->id) ?>" />
					<div class="message_reply_story_text">
					<?php echo $wo['lang']['replying_story']; ?>:&nbsp;<div class="message-user-image">
						<img src="<?php echo($story->thumbnail) ?>" alt="User image">
					</div>
					<svg onclick="$('.message_reply_story_text').remove();$('#story_id').val('0');" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" /></svg>
					</div>
				<?php } ?>
				<input type="hidden" name="reply_id" class="message_reply_id_<?php echo $wo['chat']['recipient']['user_id'];?>" readonly>
				<div class="chat_reply_text message_reply_text_<?php echo $wo['chat']['recipient']['user_id'];?>" style="display: none;">
					<span></span>
					<svg onclick="Wo_ClearReplyChatMessage(<?php echo $wo['chat']['recipient']['user_id'];?>)" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="pointer"><path fill="currentColor" d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" /></svg>
				</div>
				<textarea name="textSendMessage" id="sendMessage" class="form-control" cols="10" rows="5" placeholder="<?php echo $wo['lang']['type_message'];?>" onkeydown="Wo_SubmitChatForm(event, <?php echo $wo['chat']['recipient']['user_id'];?>);" onfocus="Wo_SubmitChatForm(event, <?php echo $wo['chat']['recipient']['user_id'];?>);" dir="auto" ></textarea>
				<div class="chat-btns-w">
					<div>
					<span class="btn btn-file chat_optns" id="progressIcon">
						<?php if($wo['config']['fileSharing'] == 1) { ?>
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  width="24" height="24" viewBox="0 0 24 24" class="select-color"><path fill="<?php echo $wo['chat']['color']; ?>" d="M14,17H7V15H14M17,13H7V11H17M17,9H7V7H17M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z" /></svg>
							<input type="file" id="sendMessasgeFile" name="sendMessageFile" class="pointer" onchange="Wo_ShareChatFile(<?php echo $wo['chat']['recipient']['user_id'];?>);" />
						<?php } else { ?>
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  width="24" height="24" viewBox="0 0 24 24" class="select-color"><path fill="<?php echo $wo['chat']['color']; ?>" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z" /></svg>
							<input type="file" id="sendMessasgeFile" name="sendMessageFile" onchange="Wo_ShareChatFile(<?php echo $wo['chat']['recipient']['user_id'];?>);" accept="image/x-png, image/gif, image/jpeg"  />
						<?php } ?>
					</span>
					<?php if ($wo['config']['audio_upload'] == 1) { ?>
						<span class="btn btn-file record-chat-audio chat_optns" data-record="0" data-chat-tab="<?php echo $wo['chat']['recipient']['user_id'];?>">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  width="24" height="24" viewBox="0 0 24 24" class="select-color"><path fill="<?php echo $wo['chat']['color']; ?>" d="M12,2A3,3 0 0,1 15,5V11A3,3 0 0,1 12,14A3,3 0 0,1 9,11V5A3,3 0 0,1 12,2M19,11C19,14.53 16.39,17.44 13,17.93V21H11V17.93C7.61,17.44 5,14.53 5,11H7A5,5 0 0,0 12,16A5,5 0 0,0 17,11H19Z" /></svg>
						</span>
					<?php } ?>
					<span data-chat-rtime="<?php echo $wo['chat']['recipient']['user_id'];?>" class="record_timei hidden">00:00</span>
					<?php if ($wo['config']['stickers'] == 1): ?>
						<span class="dropup chat_optns" id="chat-gifs">
							<span class="btn btn-file dropdown-toggle" data-toggle="dropdown" aria-expanded="true" role="button">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  width="24" height="24" viewBox="0 0 24 24" class="select-color"><path fill="<?php echo $wo['chat']['color']; ?>" d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3M10 10.5H7.5V13.5H8.5V12H10V13.7C10 14.4 9.5 15 8.7 15H7.3C6.5 15 6 14.3 6 13.7V10.4C6 9.7 6.5 9 7.3 9H8.6C9.5 9 10 9.7 10 10.3V10.5M13 15H11.5V9H13V15M17.5 10.5H16V11.5H17.5V13H16V15H14.5V9H17.5V10.5Z" /></svg>
							</span>
							<ul class="dropdown-menu drop-up" role="menu" onclick="event.stopPropagation()">
								<div class="w100" id="chat-box-stickers">
									<input type="text" class="form-control" placeholder="<?php echo $wo['lang']['search'] ?> GIFs" onkeyup="Wo_GetChatStickers(<?php echo $wo['chat']['recipient']['user_id'];?>,this.value)">
									<div id="chat-box-stickers-cont-<?php echo $wo['chat']['recipient']['user_id'];?>" style="height: 300px;overflow: auto;" onscroll="GifScrolledCH(this)" GId="<?php echo $wo['chat']['recipient']['user_id'];?>" GWord="" GOffset=""></div>
								</div>
							</ul>
						</span>
					<?php endif; ?>
					<?php if ($wo['config']['stickers_system'] == 1): ?>
						<span class="dropup chat_optns" id="chat-sticker-system">
							<span class="btn btn-file dropdown-toggle" data-toggle="dropdown" aria-expanded="true" role="button">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  width="24" height="24" viewBox="0 0 24 24" class="select-color"><path fill="<?php echo $wo['chat']['color']; ?>" d="M18.5 2H5.5C3.6 2 2 3.6 2 5.5V18.5C2 20.4 3.6 22 5.5 22H16L22 16V5.5C22 3.6 20.4 2 18.5 2M13 16H11V13H8V11H11V8H13V11H16V13H13V16M15 20V18.5C15 16.6 16.6 15 18.5 15H20L15 20Z" /></svg>
							</span>
							<ul class="dropdown-menu drop-up" role="menu">
								<div class="w100" id="chat-box-internal-stickers">
									<div id="chat-box-stickers-cont">
										<?php 
											$stickers_system = lui_GetAllStickers(50000);
											if( count( $stickers_system ) > 0 ){
												foreach ($stickers_system as $wo['stickerlist']) {
													echo '<img alt="gif" src="'. lui_GetMedia( $wo['stickerlist']['media_file'] ).'" data-gif="'.lui_GetMedia( $wo['stickerlist']['media_file'] ).'" onclick="Wo_ChatSticker('. $wo['chat']['recipient']['user_id'] .',this);" autoplay loop>';
												}
											} else {
												echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12.12,18.46L18.3,12.28C16.94,12.59 15.31,13.2 14.07,14.46C13.04,15.5 12.39,16.83 12.12,18.46M20.75,10H21.05C21.44,10 21.79,10.27 21.93,10.64C22.07,11 22,11.43 21.7,11.71L11.7,21.71C11.5,21.9 11.26,22 11,22L10.64,21.93C10.27,21.79 10,21.44 10,21.05C9.84,17.66 10.73,14.96 12.66,13.03C15.5,10.2 19.62,10 20.75,10M12,2C16.5,2 20.34,5 21.58,9.11L20,9H19.42C18.24,6.07 15.36,4 12,4A8,8 0 0,0 4,12C4,15.36 6.07,18.24 9,19.42C8.97,20.13 9,20.85 9.11,21.57C5,20.33 2,16.5 2,12C2,6.47 6.5,2 12,2Z" /></svg>'. $wo['lang']['no_result'] .'</div>';
											}
										?>
									</div>
								</div>
							</ul>
						</span>
					<?php endif; ?>
					<span class="dropup chat_optns">
						<span class="btn btn-file dropdown-toggle" data-toggle="dropdown" aria-expanded="true" role="button">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="select-color"><path fill="<?php echo $wo['chat']['color']; ?>" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
						</span>
						<ul class="dropdown-menu drop-up wow_choose_chat_clrs" role="menu">
							<div class="chat-colors-cont text-center">
								<?php foreach ($wo['colors'] as $key => $color) {?>
									<a class="chat-color" data-chat-color="<?php echo $color; ?>" data-recipient-u-id="<?php echo $wo['chat']['recipient']['user_id'];?>" style="color: <?php echo $color; ?>;">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
									</a>
								<?php } ?>
							</div>
						</ul>
					</span>
					</div>
					
					<div>
						<span class="dropup chat_optns">
							<span class="emo-btn-<?php echo $wo['chat']['recipient']['user_id'];?> dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" onclick="load_ajax_chat_emojii('<?php echo $wo['chat']['recipient']['user_id'];?>','<?php echo $wo['config']['theme_url'];?>/emoji/');">
								<span class="btn btn-file">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  width="24" height="24" viewBox="0 0 24 24" class="select-color"><path fill="<?php echo $wo['chat']['color']; ?>" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23M15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5C17,10.3 16.3,11 15.5,11Z" /></svg>
								</span>
							</span>
							<ul class="emo-container dropdown-menu emo-container-<?php echo $wo['chat']['recipient']['user_id'];?>" role="menu">
								
							</ul>
						</span>
						<div class="ball-pulse"><div></div><div></div><div></div></div>
					</div>
				</div>
				<input type="hidden" id="user-id" class="chat-user-id" name="user_id" value="<?php echo $wo['chat']['recipient']['user_id'];?>" />
				<input type="hidden" id="color" value="<?php echo $wo['chat']['color'];?>" />
				<input type="hidden" name="message-record" class="message-record" >
				<input type="hidden" name="media-name" class="media-name" >
				<input type="hidden" name="chatSticker" id='chatSticker'>
			</form>
		</div>
	</div>
</div>
<style>
#chat_<?php echo $wo['chat']['recipient']['user_id']; ?> .close-chat a, #chat_<?php echo $wo['chat']['recipient']['user_id']; ?> .close-chat svg {color:  <?php echo $wo['chat']['color']; ?>}
</style>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $(".chat-colors-cont a").click(function(event) {
      var recipient_id = $(this).attr('data-recipient-u-id');
      $.ajax({
        url:  Wo_Ajax_Requests_File(),
        type: 'get',
        data:{f:'chat',s:'set-chat-color',color:$(this).attr('data-chat-color'),recipient_user:$(this).attr('data-recipient-u-id')},
        dataType: 'json',
        success: function(data){
          if (data['status'] == 200) {
             $(".chat_" + recipient_id).find('.outgoing .message-text, .outgoing .message-media').css('background', data['color']);
             $(".chat_" + recipient_id).find('.outgoing .message-text').css('color', '#fff');
             $(".chat_" + recipient_id).find('.select-color path').css('fill', data['color']);
             $(".chat_" + recipient_id).find('.close-chat a, .close-chat svg').css('color', data.color);
             $(".chat_" + recipient_id).find('#color').val(data['color']);
             $(".text-sender-container .red-list").css('background', data.color);
             $(".text-sender-container .btn-file").css('background', data.color);
             $(".text-sender-container .btn-file").css('border-color', data.color);
             $(".chat_" + recipient_id).find('.record-chat-audio').find('[fill]').attr('fill', data.color);
          }
        }
      });
    });
   
});

function toggleChat(element, event) {
	if (event.target !== element) return;
	var chatID = $(element).attr('data-chat-id');
	$('.chat-tab-container-' + chatID).slideToggle(100);
}
$(function() {
    var main_hash_id = $('.main_session').val();
    $('.emo-btn-<?php echo $wo['chat']['recipient']['user_id'];?>').click(function () {
        $('.emo-container-<?php echo $wo['chat']['recipient']['user_id'];?>').toggle();
	});

  var chat_messages_wrapper = $('.chat-messages-wrapper-<?php echo $wo['chat']['recipient']['user_id'];?>');
	console.log("Private message")
  <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
    var color = $('.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?> #color').val();
    $('.chat-messages-wrapper-<?php echo $wo['chat']['recipient']['user_id'];?>').scroll(
    ()=>{
      var st = $('.chat-messages-wrapper-<?php echo $wo['chat']['recipient']['user_id'];?>').scrollTop();  
      if(st==0) {
        socket.emit("loadmore", {from_id: _getCookie("user_id"), color: color, to_id: '<?php echo $wo['chat']['recipient']['user_id'];?>', before_message_id: $(".chat-messages").find(".messages-wrapper").attr("id").substr("messageId_".length)}, (data)=>{
          var chat_messages_wrapper = $('.chat-messages-wrapper-<?php echo $wo['chat']['recipient']['user_id'];?>');
          chat_messages_wrapper.find(".chat-messages").prepend(data.html); 
        })
      }
    })
    $(".chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>").find(".chat-color").click(function() {
      let color = $(this).attr("data-chat-color")
      socket.emit("color-change", { color: color, from_id: _getCookie("user_id"), id: '<?php echo $wo['chat']['recipient']['user_id'];?>' })
    })
		$('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').submit(()=>{
      if (chat_messages_wrapper.find('.chat-user-desc').length == 1) {
          chat_messages_wrapper.find('.chat-user-desc').hide();
      }
      var text_message = escapeHTML($('.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?> #sendMessage').val());
      $('.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').attr('disabled', true);
      var color = $('.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?> #color').val();
      <?php  if (!empty($wo['chat']['color'])) { ?>
        var html_message = '<div class="sended_message"><div class="messages-wrapper pull-right messages-text" id="messageId_" data-message-id=""><div class="message outgoing pull-right"><p class="message-text" style="background: ' + color + ';color: #fff" dir="auto">' + text_message + '</p><div class="clear"></div><div class="message-media"></div></div><div class="clear"></div><div class="message-seen text-right message-details"></div><div class="clear"></div><div class="message-typing message-details"></div></div><div class="clear"></div></div>';
      <?php } else { ?>
        var html_message = '<div class="sended_message"><div class="messages-wrapper pull-right messages-text" id="messageId_" data-message-id=""><div class="message outgoing pull-right"><p class="message-text" dir="auto">' + text_message + '</p><div class="clear"></div><div class="message-media"></div></div><div class="clear"></div><div class="message-seen text-right message-details"></div><div class="clear"></div><div class="message-typing message-details"></div></div><div class="clear"></div></div>';
      <?php } ?>
      if (!text_message && $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('input.message-record').val() == '' && $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('#chatSticker').val() == '') {
        $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('#sendMessasgeFile').val('');
        return false;
      }
      $('body').attr('sending-<?php echo $wo['chat']['recipient']['user_id'];?>', true);
      if (text_message && $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?> #sendMessasgeFile').val() == '') {
        if (chat_messages_wrapper.length == 0) {
          chat_messages_wrapper.html(html_message);
        } else {
          chat_messages_wrapper.append(html_message);
        }
      }
      // setTimeout(function() {
            chat_messages_wrapper.scrollTop(chat_messages_wrapper[0].scrollHeight);
      // }, 10);
			$('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').clearForm();
     
     if(text_message!="" || text_message.trim() != ""){
     	message_reply_id = $('.message_reply_id_<?php echo $wo['chat']['recipient']['user_id'];?>').val();
     	story_id = $('#story_id').val();
      socket.emit("private_message", {
          to_id: '<?php echo $wo['chat']['recipient']['user_id'];?>', 
          from_id: _getCookie("user_id"),
          username: '<?php echo $wo['user']['username']; ?>',
          msg: text_message,
          color: color,
          isSticker: false,
          message_reply_id: message_reply_id,
          story_id: story_id
        },  (data)=>{
        	//$('#chat_<?php echo $wo['chat']['recipient']['user_id'];?>').find('.online-toggle-hdr').attr('style', 'background: #a84849;');
        if (data.status == 200) {
        	Wo_ClearReplyChatMessage('<?php echo $wo['chat']['recipient']['user_id'];?>');
        	$('#story_id').val('0');
		    $('.message_reply_story_text').remove();
            chat_messages_wrapper.find("div[class*='message-seen']").empty();
            chat_messages_wrapper.find("div[class*='message-typing']").empty();
            if( data.stickers == true ){
              chat_messages_wrapper.append(data.html); 
            } else {
              chat_messages_wrapper.find(".sended_message:last").html(data.html); 
            }
            if (message_reply_id != 0) {
		          // $('.message').last().append($('#message_text_reply_'+message_reply_id)[0].outerHTML);
		          // $('.message').last().append($('#message_media_reply_'+message_reply_id)[0].outerHTML);
		      }
		      $('.message_reply_id_<?php echo $wo['chat']['recipient']['user_id'];?>').val(0);
			  $('.message_reply_text_<?php echo $wo['chat']['recipient']['user_id'];?>').fadeOut(50);
            $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('input.message-record').val('');   
            $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('input.media-name').val('');
            $("#chatSticker").val('');
            $("#chat-gifs").removeClass('open');
            if (data.invalid_file == 1) {
              $("#invalid_file").modal('show');
              Wo_Delay(function(){
                $("#invalid_file").modal('hide');
              },3000);
              $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeOut(100);
            }
            if(data.invalid_file == 2){
              $("#file_not_supported").modal('show');
              Wo_Delay(function(){
                $("#file_not_supported").modal('hide');
              },3000);
            }
            $('body').attr('sending-<?php echo $wo['chat']['recipient']['user_id'];?>', false);
            if (data.file == true) {
              $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeOut(100);
            }
            
        }
        else if(data.status == 500 && data.invalid_file == 1){
          $("#invalid_file").modal('show');
          Wo_Delay(function(){
            $("#invalid_file").modal('hide');
          },3000);
          $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeOut(100);
        }
        else if(data.status == 500 && data.invalid_file == 2){
          $("#file_not_supported").modal('show');
          Wo_Delay(function(){
            $("#file_not_supported").modal('hide');
          },3000);
          $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeOut(100);
        }
        else if(data.status == 500 && data.invalid_file == 3){
          $("#pro_upload_file").modal('show');
          Wo_Delay(function(){
            $("#pro_upload_file").modal('hide');
          },3000);
          $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeOut(100);
        }
        setTimeout(function() {
          chat_messages_wrapper.scrollTop(chat_messages_wrapper[0].scrollHeight);
        }, 700);
      });
    } else{
      $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').ajaxSubmit({
		
    url: Wo_Ajax_Requests_File() + '?f=chat&s=send_message&hash=' + main_hash_id,
    beforeSend: function() {
    	//$('#chat_<?php echo $wo['chat']['recipient']['user_id'];?>').find('.online-toggle-hdr').attr('style', 'background: #a84849;');
        if (chat_messages_wrapper.find('.chat-user-desc').length == 1) {
            chat_messages_wrapper.find('.chat-user-desc').hide();
        }
        var text_message = escapeHTML($('.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?> #sendMessage').val());
        $('.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').attr('disabled', true);
        var color = $('.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?> #color').val();
        <?php  if (!empty($wo['chat']['color'])) { ?>
         var html_message = '<div class="sended_message"><div class="messages-wrapper pull-right messages-text" id="messageId_" data-message-id=""><div class="message outgoing pull-right"><p class="message-text" style="background: ' + color + ';color: #fff" dir="auto">' + text_message + '</p><div class="clear"></div><div class="message-media"></div></div><div class="clear"></div><div class="message-seen text-right message-details"></div><div class="clear"></div><div class="message-typing message-details"></div></div><div class="clear"></div></div>';
        <?php } else { ?>
          var html_message = '<div class="sended_message"><div class="messages-wrapper pull-right messages-text" id="messageId_" data-message-id=""><div class="message outgoing pull-right"><p class="message-text" dir="auto">' + text_message + '</p><div class="clear"></div><div class="message-media"></div></div><div class="clear"></div><div class="message-seen text-right message-details"></div><div class="clear"></div><div class="message-typing message-details"></div></div><div class="clear"></div></div>';
        <?php } ?>
        if (!text_message && $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('input.message-record').val() == '' && $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('#chatSticker').val() == '') {
          $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('#sendMessasgeFile').val('');
          return false;
        }
        $('body').attr('sending-<?php echo $wo['chat']['recipient']['user_id'];?>', true);
        if (text_message && $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?> #sendMessasgeFile').val() == '') {
          if (chat_messages_wrapper.length == 0) {
            chat_messages_wrapper.html(html_message);
          } else {
            chat_messages_wrapper.append(html_message);
          }
        }
        setTimeout(function() {
              chat_messages_wrapper.scrollTop(chat_messages_wrapper[0].scrollHeight);
        }, 100);
        $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').clearForm();
    },
    uploadProgress: function () {
        $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeIn(100);
    },
    success: function(data) {
    	Wo_ClearReplyChatMessage('<?php echo $wo['chat']['recipient']['user_id'];?>');
        if (data.status == 200) {
        	$('#story_id').val('0');
		    $('.message_reply_story_text').remove();
            chat_messages_wrapper.find("div[class*='message-seen']").empty();
            chat_messages_wrapper.find("div[class*='message-typing']").empty();
            if( data.stickers == true ){
              chat_messages_wrapper.append(data.html); 
            }else{
              chat_messages_wrapper.find(".sended_message:last").html(data.html); 
            }
            var dom = $($.parseHTML(data.html));
            var mediaId = dom.find(".message").attr("onclick").substr("Wo_ShowMessageOptions(".length, dom.find(".message").attr("onclick").indexOf(')')-"Wo_ShowMessageOptions(".length);
            $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('input.message-record').val('');   
            $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('input.media-name').val('');
            $("#chatSticker").val('');
            $("#chat-gifs").removeClass('open');
            if (data.invalid_file == 1) {
              $("#invalid_file").modal('show');
              Wo_Delay(function(){
                $("#invalid_file").modal('hide');
              },3000);
              $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeOut(100);
            }
            if(data.invalid_file == 2){
              $("#file_not_supported").modal('show');
              Wo_Delay(function(){
                $("#file_not_supported").modal('hide');
              },3000);
            }
            $('body').attr('sending-<?php echo $wo['chat']['recipient']['user_id'];?>', false);
            if (data.file == true) {
              $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeOut(100);
            }
            
        }
        else if(data.status == 500 && data.invalid_file == 1){
          $("#invalid_file").modal('show');
          Wo_Delay(function(){
            $("#invalid_file").modal('hide');
          },3000);
          $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeOut(100);
        }
        else if(data.status == 500 && data.invalid_file == 2){
          $("#file_not_supported").modal('show');
          Wo_Delay(function(){
            $("#file_not_supported").modal('hide');
          },3000);
          $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeOut(100);
        }
        else if(data.status == 500 && data.invalid_file == 3){
          $("#pro_upload_file").modal('show');
          Wo_Delay(function(){
            $("#pro_upload_file").modal('hide');
          },3000);
          $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeOut(100);
        }
        message_reply_id = $('.message_reply_id_<?php echo $wo['chat']['recipient']['user_id'];?>').val();
        socket.emit("private_message", {
            to_id: '<?php echo $wo['chat']['recipient']['user_id'];?>', 
            from_id: _getCookie("user_id"),
            username: '<?php echo $wo['user']['username']; ?>',
            mediaId: mediaId,
            isSticker: true,
            message_reply_id: message_reply_id,
              story_id: $('#story_id').val()
        })
        setTimeout(function() {
          chat_messages_wrapper.scrollTop(chat_messages_wrapper[0].scrollHeight);
        }, 700);
      }
    });
    }
    return false
    });
	<?php
	}
	else {
	?>
    $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').ajaxForm({
		
        url: Wo_Ajax_Requests_File() + '?f=chat&s=send_message&hash=' + main_hash_id,
        beforeSend: function() {
        	//$('#chat_<?php echo $wo['chat']['recipient']['user_id'];?>').find('.online-toggle-hdr').attr('style', 'background: #a84849;');
            if (chat_messages_wrapper.find('.chat-user-desc').length == 1) {
                chat_messages_wrapper.find('.chat-user-desc').hide();
            }
            var text_message = escapeHTML($('.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?> #sendMessage').val());
            $('.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').attr('disabled', true);
            var color = $('.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?> #color').val();
            <?php  if (!empty($wo['chat']['color'])) { ?>
             var html_message = '<div class="sended_message"><div class="messages-wrapper pull-right messages-text" id="messageId_" data-message-id=""><div class="message outgoing pull-right"><p class="message-text" style="background: ' + color + ';color: #fff" dir="auto">' + text_message + '</p><div class="clear"></div><div class="message-media"></div></div><div class="clear"></div><div class="message-seen text-right message-details"></div><div class="clear"></div><div class="message-typing message-details"></div></div><div class="clear"></div></div>';
            <?php } else { ?>
              var html_message = '<div class="sended_message"><div class="messages-wrapper pull-right messages-text" id="messageId_" data-message-id=""><div class="message outgoing pull-right"><p class="message-text" dir="auto">' + text_message + '</p><div class="clear"></div><div class="message-media"></div></div><div class="clear"></div><div class="message-seen text-right message-details"></div><div class="clear"></div><div class="message-typing message-details"></div></div><div class="clear"></div></div>';
            <?php } ?>
            if (!text_message && $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('input.message-record').val() == '' && $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('#chatSticker').val() == '') {
              $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('#sendMessasgeFile').val('');
              return false;
            }
            $('body').attr('sending-<?php echo $wo['chat']['recipient']['user_id'];?>', true);
            if (text_message && $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?> #sendMessasgeFile').val() == '') {
              if (chat_messages_wrapper.length == 0) {
                chat_messages_wrapper.html(html_message);
              } else {
                chat_messages_wrapper.append(html_message);
              }
            }
            setTimeout(function() {
                  chat_messages_wrapper.scrollTop(chat_messages_wrapper[0].scrollHeight);
            }, 100);
            $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').clearForm();
        },
        uploadProgress: function () {
		  $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeIn(100);
        },
        success: function(data) {
        	$('#story_id').val('0');
		    $('.message_reply_story_text').remove();
        	Wo_ClearReplyChatMessage('<?php echo $wo['chat']['recipient']['user_id'];?>');
            if (data.status == 200) {
                chat_messages_wrapper.find("div[class*='message-seen']").empty();
                chat_messages_wrapper.find("div[class*='message-typing']").empty();
                if( data.stickers == true ){
                  chat_messages_wrapper.append(data.html); 
                }else{
                  chat_messages_wrapper.find(".sended_message:last").html(data.html); 
                }
                $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('input.message-record').val('');   
                $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('input.media-name').val('');
                $("#chatSticker").val('');
                $("#chat-gifs").removeClass('open');
                if (data.invalid_file == 1) {
                  $("#invalid_file").modal('show');
                  Wo_Delay(function(){
                    $("#invalid_file").modal('hide');
                  },3000);
				          $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeOut(100);
                }
                if(data.invalid_file == 2){
                  $("#file_not_supported").modal('show');
                  Wo_Delay(function(){
                    $("#file_not_supported").modal('hide');
                  },3000);
                }
                $('body').attr('sending-<?php echo $wo['chat']['recipient']['user_id'];?>', false);
                if (data.file == true) {
                  $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeOut(100);
                }
                
            }
            else if(data.status == 500 && data.invalid_file == 1){
              $("#invalid_file").modal('show');
              Wo_Delay(function(){
                $("#invalid_file").modal('hide');
              },3000);
              $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeOut(100);
            }
            else if(data.status == 500 && data.invalid_file == 2){
              $("#file_not_supported").modal('show');
              Wo_Delay(function(){
                $("#file_not_supported").modal('hide');
              },3000);
              $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeOut(100);
            }
            else if(data.status == 500 && data.invalid_file == 3){
              $("#pro_upload_file").modal('show');
              Wo_Delay(function(){
                $("#pro_upload_file").modal('hide');
              },3000);
              $('form.chat-sending-form-<?php echo $wo['chat']['recipient']['user_id'];?>').find('.ball-pulse').fadeOut(100);
            }
            setTimeout(function() {
              chat_messages_wrapper.scrollTop(chat_messages_wrapper[0].scrollHeight);
            }, 700);
        }
	});
	<?php
	}
	?>
}); 
function escapeHTML(string) {
    var pre = document.createElement('pre');
    var text = document.createTextNode( string );
    pre.appendChild(text);
    return pre.innerHTML;
}

function Wo_ChatSticker(id,self){
  if (!self) {
    return false;
  }
  $('.chat_'+id).find('#chatSticker').val($(self).attr('data-gif'));
  Wo_RegisterTabMessage(id);
  $('.chat_'+id).find('#chatSticker').val('');
  $('.chat_'+id).find("#chat-sticker-system").removeClass("open");
}
function GifScrolledCH(self) {
	if ((($(self).prop("scrollHeight") - $(self).height()) - $(self).scrollTop()) < 300) {
		id = $(self).attr('GId');
		word = $(self).attr('GWord');
		offset = $(self).attr('GOffset');
		Wo_GetChatStickers(id,word,offset);
	}
}
function Wo_GetChatStickers(id,keyword = '',offset = 0){
  if (!keyword) {
    return false;
  }
	if ($('#chat-box-stickers-cont-'+id).attr('GWord') != keyword) {
		$('#chat-box-stickers-cont-'+id).empty();
		$('#chat-box-stickers-cont-'+id).attr('GOffset', 0);
		$('#chat-box-stickers-cont-'+id).attr('GWord', keyword);
	}
	else{
		$('#chat-box-stickers-cont-'+id).attr('GOffset', parseInt($('#chat-box-stickers-cont-'+id).attr('GOffset')) + 20);
	}
 //  var chat_gif_loading =  '\
 //  <div class="sk-circle">\
 //    <div class="sk-circle1 sk-child"></div>\
 //    <div class="sk-circle2 sk-child"></div>\
 //    <div class="sk-circle3 sk-child"></div>\
 //    <div class="sk-circle4 sk-child"></div>\
 //    <div class="sk-circle5 sk-child"></div>\
 //    <div class="sk-circle6 sk-child"></div>\
 //    <div class="sk-circle7 sk-child"></div>\
 //    <div class="sk-circle8 sk-child"></div>\
 //    <div class="sk-circle9 sk-child"></div>\
 //    <div class="sk-circle10 sk-child"></div>\
 //    <div class="sk-circle11 sk-child"></div>\
 //    <div class="sk-circle12 sk-child"></div>\
 //  </div>';
 // $('#chat-box-stickers-cont-'+id).html(chat_gif_loading);
  Wo_Delay(function(){
    $.ajax({
      url: 'https://api.giphy.com/v1/gifs/search?',
      type: 'GET',
      dataType: 'json',
      data: {q:keyword,api_key:'<?php echo $wo['config']['giphy_api'];?>',limit:15,offset:offset},
    })
    .done(function(data) {
      if (data.meta.status == 200 && data.data.length > 0) {
        // $('#chat-box-stickers-cont-'+id).empty();
        for (var i = 0; i < data.data.length; i++) {
          appended = true;
          if (appended == true) {
              appended = false;
            $('#chat-box-stickers-cont-'+id).append($('<img alt="gif" src="'+data.data[i].images.fixed_height_small.url+'" data-gif="' + data.data[i].images.fixed_height.url + '" onclick="Wo_ChatSticker('+id+',this)" autoplay loop>'));
            appended = true;
          } 
        }
      }
      else{
        $('#chat-box-stickers-cont-'+id).html('<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11,8H13V16H11V8M7.67,8H4.33C3.53,8 3,8.67 3,9.33V14.67C3,15.33 3.53,16 4.33,16H7.67C8.47,16 9,15.33 9,14.67V12H7V14H5V10H9V9.33C9,8.67 8.47,8 7.67,8M21,10V8H15V16H17V14H19.5V12H17V10H21Z" /></svg><?php echo $wo['lang']['no_result']; ?></div>');
      }
    })
    .fail(function() {
      console.log("error");
    })
  },1000);
}
var sent_seen_id = 0;
$(document).on('click focus', '.chat-tab-container-<?php echo $wo['chat']['recipient']['user_id'];?>', function(event) {
	var chat_container = $('.chat-tab').find('.chat_main_<?php echo $wo['chat']['recipient']['user_id'];?>');
	$('#chat_<?php echo $wo['chat']['recipient']['user_id'];?>').find('.online-toggle-hdr').attr('style', '').removeClass('white_online');
	var last_id = chat_container.find('.messages-text:last').attr('data-message-id');
	if (sent_seen_id != last_id) {
		sent_seen_id = last_id;
		<?php if ($wo['config']['node_socket_flow'] == "1"){ ?>
			socket.emit("seen_messages", {user_id: _getCookie("user_id"), recipient_id: '<?php echo $wo['chat']['recipient']['user_id'];?>',message_id: last_id}, (data)=>{})
		<?php }else{ ?>
			$.post( Wo_Ajax_Requests_File() + '?f=chat&s=seen&hash=' + $('.main_session').val(), {recipient_id: '<?php echo $wo['chat']['recipient']['user_id'];?>'}, function(data, textStatus, xhr) {});
		<?php } ?>
	}
});
</script>