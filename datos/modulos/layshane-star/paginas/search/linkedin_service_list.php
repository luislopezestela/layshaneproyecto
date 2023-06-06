<div class="col-md-6 col-sm-12 linkedin_data" data-id="<?php echo $wo['result']['sort_time'];?>">
	<div class="wow_content wo_job_detail_block">
		<div class="wo_job_experience">
			<div class="avatar">
				<a href="<?php echo $wo['result']['url']. $wo['marker'];?>ref=se" data-ajax="?link1=timeline&u=<?php echo $wo['result']['username']?>&ref=se"><img src="<?php echo $wo['result']['avatar'];?>" alt="<?php echo $wo['result']['name']; ?> Profile Picture" /></a>
			</div>&nbsp;&nbsp;&nbsp;&nbsp;
			<div class="wo_job_experience_info">
				<h4 class="title">
					<span class="user-popover" data-type="<?php echo $wo['result']['type']; ?>" data-id="<?php echo $wo['result']['id']; ?>" data-search-type="<?php echo $wo['result']['type']; ?>">
						<a href="<?php echo $wo['result']['url']. $wo['marker'];?>ref=se" data-ajax="?link1=timeline&u=<?php echo $wo['result']['username']?>&ref=se"><?php echo $wo['result']['name']; ?></a>
					</span>
				</h4>
				<p class="sub-title">
					<?php echo lui_CountFollowers($wo['result']['user_id']);?> <?php if ($wo['config']['connectivitySystem'] == 1) {
								echo $wo['lang']['friends_btn'];
							} else {
								echo $wo['lang']['followers'];
							} ?>&nbsp;• &nbsp;<?php echo $wo['result']['details']['post_count'];?> <?php echo $wo['lang']['posts']; ?>
				</p>
				<div class="wo_job_detail_item">
					<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M11,13.5V21.5H3V13.5H11M12,2L17.5,11H6.5L12,2M17.5,13C20,13 22,15 22,17.5C22,20 20,22 17.5,22C15,22 13,20 13,17.5C13,15 15,13 17.5,13Z"></path></svg>&nbsp;
					<div>
						<h4><?php echo $wo['lang']['services']; ?></h4>
						<p><?php echo $wo['result']['providing_service']->services;?></p>
					</div>
				</div>

				<?php if (!isset($wo['result']['no_btn'])) { ?>
					<p class="user-follow-button">
						<?php echo lui_GetFollowButton($wo['result']['user_id']);?>
					</p>
				<?php } ?>
			</div>
		</div>
	</div>
</div>