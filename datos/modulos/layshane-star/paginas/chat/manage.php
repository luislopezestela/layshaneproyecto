<?php if ($wo['group']['owner']): ?>
	<div class="wow_form_fields">
		<label for="add_parts"><?php echo $wo['lang']['add_parts']; ?></label>
		<input id="add_parts" type="text" onkeydown="Wo_SearchGChatParticipants(this.value,<?php echo $wo['group']['group_id']; ?>)">
	</div>
<?php endif;?>
<div class="group_chat_mbr_list_<?php echo $wo['group']['group_id']; ?>">
	<?php if (count($wo['group']['parts']) > 0): ?>
		<?php foreach ($wo['group']['parts'] as $wo['part']): ?>
            <div class="home-sidebar profile-style wow_add_groupcht_mmbrs" data-group-chat-part="<?php echo $wo['part']['id']; ?>">
				<div class="avatar <?php echo lui_RightToLeft('pull-left');?>">
					<img src="<?php echo $wo['part']['avatar'];?>" alt="<?php echo $wo['part']['name']; ?> Profile Picture" />
				</div>
				<div>
					<h3><?php echo $wo['part']['name']; ?> <?php  if($wo['part']['verified'] == 1) {   ?><span class="verified-color"><i class="fa fa-check-circle" data-toggle="tooltip" title="<?php echo $wo['lang']['verified_user'];?>"></i></span><?php  } ?></h3>
					<?php if($wo['config']['user_lastseen'] == 1 && $wo['part']['showlastseen'] != 0) { ?>
						<div class="user-lastseen"><?php echo lui_UserStatus($wo['part']['user_id'],$wo['part']['lastseen']); ?></div>
					<?php } ?>
				</div>
				<span class="<?php echo lui_RightToLeft('pull-right');?> pointer status" onclick="Wo_AddGChatPart(<?php echo $wo['group']['group_id']; ?>,<?php echo $wo['part']['id']; ?>);">
					<?php if ($wo['group']['owner']): ?>
						<?php if (lui_IsGChatMemeberExists($wo['group']['group_id'],$wo['part']['id'])): ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="red" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg>
						<?php else: ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="green" d="M17,13H13V17H11V13H7V11H11V7H13V11H17M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
						<?php endif; ?>
					<?php endif; ?>
				</span>
			</div>
		<?php endforeach ?>
	<?php else: ?>
          <div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15 17,16.5V19H23V16.5C23,14.17 18.33,13 16,13M8,13C5.67,13 1,14.17 1,16.5V19H15V16.5C15,14.17 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z" /></svg> <?php echo $wo['lang']['no_members_found']; ?></div>
	<?php endif;?>
</div>