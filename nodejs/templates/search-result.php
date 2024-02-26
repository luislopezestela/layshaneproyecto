<?php 
$message_count = lui_CountMessages(array('new' => true,'user_id' => $wo['chatList']['user_id']));    
?>
<div class="recipient-chat-user" id="online_<?php echo $wo['chatList']['user_id'];?>">
	<?php 
		$lastseen = str_replace('<span class="small-last-seen">', '', lui_UserStatus($wo['chatList']['user_id'],$wo['chatList']['lastseen']));
		//$lastseen = str_replace('</span>', '', $lastseen);
		$lastseen = strip_tags($lastseen);

	?>
	<div class="user-info" onclick="Wo_OpenChatTab(<?php echo $wo['chatList']['user_id'];?>);" <?php if($wo['config']['user_lastseen'] == 1 && $wo['chatList']['showlastseen'] != 0) { ?>title="<?php echo $lastseen?>"<?php } ?>>
		<img src="<?php echo $wo['chatList']['avatar'];?>" alt="<?php echo $wo['chatList']['avatar'];?> Profile Picture" />
		<span class="chat-user-text" id="chat-tab-id"><?php echo $wo['chatList']['name']; ?></span>
		<div class="wow_chat_list-right">
			<span class="new-message-alert <?php echo ($message_count == 0) ? 'hidden' : ''; ?>"><?php echo $message_count; ?></span>
			<span class="chat-loading-icon"></span>
		</div>
	</div>
</div>
<div class="clear"></div>