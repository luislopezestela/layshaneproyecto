<div class="group_chat_mbr_part pointer" title="<?php echo $wo['lang']['add']; ?>" id="<?php echo $wo['part']['id']; ?>">
    <div class="avatar <?php echo lui_RightToLeft('pull-left');?>">
        <img src="<?php echo $wo['part']['avatar'];?>" alt="<?php echo $wo['part']['name']; ?> Profile Picture" />
    </div>
    <span class="user-popover" data-id="<?php echo $wo['part']['id'];?>" data-type="<?php echo $wo['part']['type'];?>">
        <span class="user-name">
            <?php echo $wo['part']['name']; ?>
            <?php  if($wo['part']['verified'] == 1) {   ?>
				<span class="verified-color"><i class="fa fa-check-circle" data-toggle="tooltip" title="<?php echo $wo['lang']['verified_user'];?>"></i></span>
            <?php  } ?>
        </span>
    </span>
    <?php if($wo['config']['user_lastseen'] == 1 && $wo['part']['showlastseen'] != 0) { ?>
    <div class="user-lastseen">
        <?php echo lui_UserStatus($wo['part']['user_id'],$wo['part']['lastseen']); ?>
    </div>
    <?php } ?>
</div>