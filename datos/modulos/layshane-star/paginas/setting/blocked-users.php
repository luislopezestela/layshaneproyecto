<div class="wo_settings_page wow_content profile-lists">
	<div class="avatar-holder blocked">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Profile Picture" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['blocked_users']; ?></p>
		</div>
	</div>
	<hr>

	<div class="setting-well">
         <?php
         $blocked_users = lui_GetBlockedMembers($wo['setting']['user_id']);
         if (count($blocked_users) > 0) {
            foreach ($blocked_users as $wo['member']) {
                echo lui_LoadPage('setting/blocked-users-list');
            }
         } else {
            echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M16 17V19H2V17S2 13 9 13 16 17 16 17M12.5 7.5A3.5 3.5 0 1 0 9 11A3.5 3.5 0 0 0 12.5 7.5M15.94 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13M15 4A3.39 3.39 0 0 0 13.07 4.59A5 5 0 0 1 13.07 10.41A3.39 3.39 0 0 0 15 11A3.5 3.5 0 0 0 15 4Z" /></svg>' . $wo['lang']['no_members_found'] . '</div>';
         }
         ?>
      <div class="clear"></div>
   </div>
</div>