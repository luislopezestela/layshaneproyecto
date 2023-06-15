<div class="wow_side_usrs">
	<div id="wo_sidebar_users">
		<div class="avatar">
			<img src="<?php echo $wo['UsersList']['avatar'];?>" alt="<?php echo $wo['UsersList']['name']; ?>"/>
		</div>
		<span class="user-popover" data-id="<?php echo $wo['UsersList']['id'];?>" data-type="<?php echo $wo['UsersList']['type'];?>">
			<a href="<?php echo $wo['UsersList']['url'];?>" data-ajax="?link1=timeline&u=<?php echo $wo['UsersList']['username']?>" class="wo_user_link_name">
				<span class="user-name" title="<?php echo $wo['UsersList']['name']; ?>"><?php echo $wo['UsersList']['name']; ?>
				<?php if (!empty($wo['UsersList']['is_open_to_work']) && $wo['config']['website_mode'] == 'linkedin') { ?>
			<span class="wo_open_job_badge" title="<?php echo($wo['lang']['open_to_work']); ?>" data-toggle="tooltip"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24"><path fill="currentColor" d="M10,2H14A2,2 0 0,1 16,4V6H20A2,2 0 0,1 22,8V19A2,2 0 0,1 20,21H4C2.89,21 2,20.1 2,19V8C2,6.89 2.89,6 4,6H8V4C8,2.89 8.89,2 10,2M14,6V4H10V6H14Z"></path></svg></span>
		<?php } ?>
				</span>
			</a>
		</span>
        <div class="user-follow-button">
            <?php echo lui_GetFollowButton($wo['UsersList']['user_id']);?>
        </div>
	</div>
</div>