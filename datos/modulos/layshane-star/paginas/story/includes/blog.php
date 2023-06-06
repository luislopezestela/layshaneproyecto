<?php if(!empty($wo['story']['blog_id'])) { ?>
	<div class="post-fetched-url wo_post_fetch_blog" id="fullsizeimg">
		<a href="<?php echo $wo['story']['blog']['url'];?>">
			<?php if (!empty($wo['story']['blog']['thumbnail'])) {?>
				<div class="post-fetched-url-con">
					<img src="<?php echo $wo['story']['blog']['thumbnail'];?>" alt="<?php echo $wo['story']['blog']['title'];?>"/>
				</div>
			<?php } ?>
			<div class="fetched-url-text">
				<div class="wow_post_blog_ico"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#f35d4d" d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z"></path></svg></div>
				<h4><?php echo $wo['story']['blog']['title'];?></h4>
				<div class="description"><?php echo $wo['story']['blog']['description'];?></div>
			</div>
			<div class="clear"></div>
		</a>
	</div>
<?php } ?>