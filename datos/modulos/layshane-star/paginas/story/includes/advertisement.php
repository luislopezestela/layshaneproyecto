<div class="post-container user-ad-container" id="<?php echo $wo['story']['id']; ?>">
	<div class="post-advertisement">
		<div class="panel panel-white panel-shadow">
			<div class="ads-heading">
				<div class="<?php echo lui_RightToLeft('pull-left');?> ads-image">
					<a data-ajax="?link1=timeline&u=<?php echo $wo['story']['user_data']['username']?>" href="<?php echo $wo['story']['user_data']['url']?>">
						<img src="<?php echo $wo['story']['user_data']['avatar']; ?>" class="responsive-img">
					</a>
				</div>
		
				<div class="<?php echo lui_RightToLeft('pull-right');?>">
					<span class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
						</a>
						<ul class="dropdown-menu post-privacy-menu post-options" role="menu">
							<li>
								<div class="pointer" onclick="openInNewTab('https://www.facebook.com/sharer/sharer.php?u=<?php echo $wo['story']['url']; ?>', '<?php echo $wo['story']['id']; ?>')">
									<?php echo $wo['lang']['share'];?>
								</div>
							</li>
						</ul>
					</span>
				</div>
		 
				<div class="ads-meta">
					<div class="title h5">
						<a data-ajax="?link1=timeline&u=<?php echo $wo['story']['user_data']['username']?>" href="<?php echo $wo['story']['user_data']['url']?>">
							<b><?php echo $wo['story']['name']; ?></b>
						</a>
						<h6>
							<span class="time ajax-time" title="<?php echo date('c', $wo['story']['posted']); ?>">
								<?php echo lui_Time_Elapsed_String($wo['story']['posted']); ?>
							</span>
							<?php if (strlen($wo['story']['location']) > 3): ?>
							&nbsp;&nbsp;<span class="time">
								<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin" style="width: 14px;height: 14px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> <?php echo $wo['story']['location']; ?>
							</span>
							<?php endif;?>
						</h6>
					</div>
				</div>
				
				<div class="ads-headline">
					<p><?php echo ucfirst($wo['story']['description']); ?></p>
				</div>
				
				
				<div class="ads-cover rads-<?php echo $wo['story']['bidding']; ?> wo_post_ad" id="<?php echo $wo['story']['id']; ?>">
					<div class="post-fetched-url wo_post_fetch_blog" id="fullsizeimg">
						<div class="post-fetched-url-con">
							<a href="<?php echo $wo['story']['url']; ?>" class="text-dnone"><img src="<?php echo $wo['story']['ad_media']; ?>" alt="picture"/></a>
						</div>
						<div class="fetched-url-text">
							<div class="wow_post_blog_ico" title="<?php echo $wo['lang']['sponsored'];?>"><a href="<?php echo lui_SeoLink('index.php?link1=advertise'); ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#9c27b0" d="M12,8H4A2,2 0 0,0 2,10V14A2,2 0 0,0 4,16H5V20A1,1 0 0,0 6,21H8A1,1 0 0,0 9,20V16H12L17,20V4L12,8M21.5,12C21.5,13.71 20.54,15.26 19,16V8C20.53,8.75 21.5,10.3 21.5,12Z"></path></svg></a></div>
							<h4><a href="<?php echo $wo['story']['url']; ?>" class="text-dnone"><?php echo $wo['story']['headline']; ?></a></h4>
							<div class="url"><a href="<?php echo $wo['story']['url']; ?>" class="text-dnone"><?php echo lui_UrlDomain($wo['story']['url']); ?></a></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>