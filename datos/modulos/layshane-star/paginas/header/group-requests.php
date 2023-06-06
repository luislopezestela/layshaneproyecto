<li class="wow_hdr_requests user-group-request-<?php echo $wo['group_chat']['group_id'];?>">
	<div class="user-request-list ">
		<div class="user-info">
			<div class="avatar">
				<a href="javascript:void(0)">
					<img src="<?php echo $wo['group_chat']['avatar'];?>" alt="<?php echo $wo['group_chat']['group_name']; ?> Profile Picture" />
				</a>
			</div>
			<a href="javascript:void(0)"><?php echo $wo['group_chat']['group_name']; ?> (<?php echo $wo['lang']['group']; ?>)</a>
			<?php $user = lui_UserData($wo['group_chat']['user_id']); ?>
			<div class="user-lastseen"><?php echo $user['name']." " . $wo['lang']['invited_to_group']; ?></div>
		</div>
		<div class="accept-btns user-follow-button">
			<button type="button" id="accept-<?php echo $wo['group_chat']['group_id']?>" onclick="Wo_AcceptFollowGroupRequest(<?php echo $wo['group_chat']['group_id'];?>)" class="btn btn-default btn-sm btn-active" title="<?php echo $wo['lang']['accept']; ?>">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z" fill="currentColor"/></svg>
			</button>
			<button type="button" id="delete-<?php echo $wo['group_chat']['group_id']?>" onclick="Wo_DeleteFollowGroupRequest(<?php echo $wo['group_chat']['group_id'];?>)" class="btn btn-default btn-sm" title="<?php echo $wo['lang']['delete']; ?>">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z" fill="currentColor"/></svg>
			</button>
		</div>
	</div>
</li>