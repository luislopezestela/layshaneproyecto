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
    <span class="<?php echo lui_RightToLeft('pull-right');?> pointer status" onclick="Wo_AddGChatPart(<?php echo $wo['part']['group_id']; ?>,<?php echo $wo['part']['id']; ?>);">
		<?php if (lui_IsGChatMemeberExists($wo['part']['group_id'],$wo['part']['id'])): ?>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="red" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg>
		<?php else: ?>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="green" d="M17,13H13V17H11V13H7V11H11V7H13V11H17M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
		<?php endif; ?>
    </span>
</div>