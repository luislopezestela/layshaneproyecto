<div class="col-xs-6">
	<div class="wow_content wow_my_groups">
		<div class="avatar">
			<a href="<?php echo $wo['GroupList']['url'];?>" data-ajax="?link1=timeline&u=<?php echo $wo['GroupList']['username']?>">
				<img src="<?php echo $wo['GroupList']['avatar'];?>" alt="<?php echo $wo['GroupList']['name']; ?> Profile Picture" />
			</a>
		</div>
		<div class="wow_my_groups_info">
			<h3 class="page_title"><a href="<?php echo $wo['GroupList']['url'];?>" data-ajax="?link1=timeline&u=<?php echo $wo['GroupList']['username']?>"><?php echo $wo['GroupList']['name']; ?></a></h3>
			<p><?php echo lui_CountGroupMembers($wo['GroupList']['id']);?> <?php echo $wo['lang']['members'];?></p>
			<?php echo lui_GetJoinButton($wo['GroupList']['id']);?>
		</div>
	</div>
</div>