<?php
$is_admin     = lui_IsAdmin();
$is_moderoter = lui_IsModerator();
$notification_alert     = lui_CountNotifications(array(
    'unread' => true,
    'data' => 'all'
));
$messages_alert         = lui_CountMessages(array(
    'new' => true
));
$followers_alert        = lui_CountFollowRequests();
$hidden_class           = '';
$messages_hidden_class  = '';
$followers_hidden_class = '';
$unread_update_notification = 'unread-update';
$unread_update_messages = 'unread-update';
$unread_update_followers = 'unread-update';
if ($notification_alert == 0) {
    $hidden_class = ' hidden';
    $unread_update_notification = '';
}
if ($messages_alert == 0) {
    $messages_hidden_class = ' hidden';
    $unread_update_messages = '';
}
if ($followers_alert == 0) {
    $followers_hidden_class = ' hidden';
    $unread_update_followers = '';
}
?>

</ul>
<ul class="nav navbar-nav navbar-right <?php echo lui_RightToLeft('pull-right');?>" id="head_menu_rght">
	<li class="dropdown messages-notification-container" onclick="<?php echo(((!$wo['loggedin'] || ($wo['loggedin'] && $wo['user']['banned'] == 1)) ? "Wo_OpenBannedMenu('message');" : 'Wo_OpenMessagesMenu();')) ?>">
		<span class="new-update-alert<?php echo $messages_hidden_class;?>" data_messsages_count="<?php echo $messages_alert?>">
			<?php echo $messages_alert?>
		</span>
		<a href="#" class="dropdown-toggle <?php echo $unread_update_messages;?> sixteen-font-size" data-toggle="dropdown" role="button" aria-expanded="false">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M20 2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h3v3.766L13.277 18H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14h-7.277L9 18.234V16H4V4h16v12z"></path><circle cx="15" cy="10" r="2"></circle><circle cx="9" cy="10" r="2"></circle></svg>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="hide_fill_svg"><path d="M20 2H4c-1.103 0-2 .894-2 1.992v12.017C2 17.106 2.897 18 4 18h3v4l6.351-4H20c1.103 0 2-.894 2-1.992V3.992A1.998 1.998 0 0 0 20 2zm-9 8a2 2 0 1 1-2-2c.086 0 .167.015.25.025.082-.014.164-.025.25-.025A1.5 1.5 0 0 1 11 9.5c0 .086-.012.168-.025.25.01.083.025.165.025.25zm4 2a2 2 0 0 1-2-2c0-.086.015-.167.025-.25A1.592 1.592 0 0 1 13 9.5 1.5 1.5 0 0 1 14.5 8c.086 0 .168.011.25.025.083-.01.164-.025.25-.025a2 2 0 0 1 0 4z" fill="currentColor"/></svg>
		</a>
		<ul class="dropdown-menu clearfix notifications-dropdown messages-dropdown" role="menu" id="messages-list">
			<li>
				<div class="wo_loading_jelly" style="color: <?php echo $wo['config']['btn_background_color'];?>"><div></div><div></div></div>
			</li>
		</ul>
	</li>
	<li class="dropdown notification-container" onclick="<?php echo(((!$wo['loggedin'] || ($wo['loggedin'] && $wo['user']['banned'] == 1)) ? "Wo_OpenBannedMenu('notification');" : 'Wo_OpenNotificationsMenu();')) ?>">
		<span class="new-update-alert<?php echo $hidden_class;?>">
			<?php echo $notification_alert?>
		</span>
		<a href="#" class="dropdown-toggle <?php echo $unread_update_notification;?> sixteen-font-size" data-toggle="dropdown" role="button" aria-expanded="false">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z" fill="currentColor"/></svg>
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" class="hide_fill_svg"><path d="m5.705 3.71-1.41-1.42C1 5.563 1 7.935 1 11h1l1-.063C3 8.009 3 6.396 5.705 3.71zm13.999-1.42-1.408 1.42C21 6.396 21 8.009 21 11l2-.063c0-3.002 0-5.374-3.296-8.647zM12 22a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22zm7-7.414V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.184 4.073 5 6.783 5 10v4.586l-1.707 1.707A.996.996 0 0 0 3 17v1a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-1a.996.996 0 0 0-.293-.707L19 14.586z" fill="currentColor"/></svg>
		</a>
		<ul class="dropdown-menu clearfix notifications-dropdown" role="menu">
			<li onclick="Wo_TurnOffSound();" class="turn-off-sound <?php echo lui_RightToLeft('text-left');?>">
				<span>
					<?php if ($wo['user']['notifications_sound'] == 0): ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg> <?php echo $wo['lang']['turn_off_notification'] ?>
					<?php else: ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-volume-x"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><line x1="23" y1="9" x2="17" y2="15"></line><line x1="17" y1="9" x2="23" y2="15"></line></svg> <?php echo $wo['lang']['turn_on_notification'] ?>
					<?php endif; ?>
				</span>
			</li>
			<li id="notification-list">
				<div class="wo_loading_jelly" style="color: <?php echo $wo['config']['btn_background_color'];?>"><div></div><div></div></div>
			</li>
		</ul>
	</li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle user-menu-combination" data-toggle="dropdown" role="button" aria-expanded="false">
			<div class="user-avatar">
				<img id="updateImage-<?php echo $wo['user']['user_id']?>" src="<?php echo $wo['user']['avatar'];?>" alt="<?php echo $wo['user']['name'];?> Profile Picture">
			</div>
		</a>
		<ul class="dropdown-menu ani-acc-menu" role="menu">
			<li class="wo_user_name">
				<a id="update-username" href="<?php echo $wo['user']['url']; ?>" data-ajax="?link1=timeline&u=<?php echo $wo['user']['username'];?>" class="wow_hdr_menu_usr_lnk">
					<b><?php echo $wo['user']['name'];?></b>
					<img src="<?php echo $wo['user']['avatar'];?>" alt="<?php echo $wo['user']['name'];?> Foto de perfil">
				</a>
				
				<a href="<?php echo lui_SeoLink('index.php?link1=wallet'); ?>" data-ajax="?link1=wallet">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M21,18V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V6H12C10.89,6 10,6.9 10,8V16A2,2 0 0,0 12,18M12,16H22V8H12M16,13.5A1.5,1.5 0 0,1 14.5,12A1.5,1.5 0 0,1 16,10.5A1.5,1.5 0 0,1 17.5,12A1.5,1.5 0 0,1 16,13.5Z" /></svg> <?php echo $wo['lang']['wallet']; ?>: <?php echo lui_GetCurrency($wo['config']['ads_currency']); ?><?php echo sprintf('%.2f',$wo['user']['wallet']);?>
				</a>
			</li>
			
			<?php if ($wo['config']['website_mode'] == 'facebook') { ?>
				<li>
				<a href="<?php echo lui_SeoLink('index.php?link1=saved-posts');?>" data-ajax="?link1=saved-posts">
					<svg viewBox="0 0 24 24"><path fill="currentColor" d="M17,3H7A2,2 0 0,0 5,5V21L12,18L19,21V5C19,3.89 18.1,3 17,3Z" /></svg> <?php echo $wo['lang']['saved_posts'];?>
				</a>
				</li>
				<li><hr></li>
			<?php } ?>

			<?php if (!lui_IsAdmin()==0){ ?>
			<?php if ($wo['config']['classified'] == 1 && $wo['config']['can_use_market']) { ?>
				<li>
					<a href="<?php echo lui_SeoLink('index.php?link1=my-products'); ?>" data-ajax="?link1=my-products"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z" /></svg> <?php echo $wo['lang']['my_products']; ?></a>
				</li>
			<?php } ?>
			<?php } ?>

			<?php if ($wo['config']['classified'] == 1 && $wo['config']['can_use_market']) { ?>
				<li>
					<a href="<?php echo lui_SeoLink('index.php?link1=purchased'); ?>" data-ajax="?link1=purchased"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z" /></svg> <?php echo $wo['lang']['mis_compras']; ?></a>
				</li>
			<?php } ?>

			
			<?php if ($wo['config']['classified'] == 1) { ?>
				<li class="dropdown-search-link">
					<a href="<?php echo lui_SeoLink('index.php?link1=products'); ?>"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M12,18H6V14H12M21,14V12L20,7H4L3,12V14H4V20H14V14H18V20H20V14M20,4H4V6H20V4Z" /></svg> <?php echo $wo['lang']['market']; ?></a>
				</li>
			<?php } ?>
			<?php if ($wo['config']['blogs'] == 1) { ?>
				<li class="dropdown-search-link">
					<a href="<?php echo lui_SeoLink('index.php?link1=blogs'); ?>" data-ajax="?link1=blogs"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z" /></svg> <?php echo $wo['lang']['blog']; ?></a>
				</li>
				<?php if($wo['loggedin'] == true && lui_IsAdmin() || lui_IsModerator() && isset($wo['user']['permission']['manage-articles']) == 1): ?>
					
				
			    <?php if(lui_CanBlog() == true) { ?>
				<li>
					<a href="<?php echo lui_SeoLink('index.php?link1=my-blogs'); ?>" data-ajax="?link1=my-blogs"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M14,10H19.5L14,4.5V10M5,3H15L21,9V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3M5,12V14H19V12H5M5,16V18H14V16H5Z" /></svg> <?php echo $wo['lang']['my_articles']; ?></a>
				</li>
				<?php } ?>
				<?php endif ?>
			<?php } ?>

			<li class="dropdown-search-link">
					<a href="<?php echo lui_SeoLink('index.php?link1=albums'); ?>" data-ajax="?link1=albums"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z" /></svg> <?php echo $wo['lang']['albums']; ?></a>
			</li>
            <?php if ($wo['config']['website_mode'] != 'facebook') { ?>
			<li class="dropdown-search-link">
				<a href="<?php echo lui_SeoLink('index.php?link1=saved-posts');?>" data-ajax="?link1=saved-posts"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M17,3H7A2,2 0 0,0 5,5V21L12,18L19,21V5C19,3.89 18.1,3 17,3Z" /></svg> <?php echo $wo['lang']['saved_posts'];?>
				</a>
			</li>
			<?php } ?>
		
			<?php if ($wo['config']['popular_posts'] == 1) { ?>
			<li class="dropdown-search-link">
				<a href="<?php echo $wo['config']['site_url']; ?>/most_liked" data-ajax="?link1=most_liked"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M16,6L18.29,8.29L13.41,13.17L9.41,9.17L2,16.59L3.41,18L9.41,12L13.41,16L19.71,9.71L22,12V6H16Z" /></svg> <?php echo $wo['lang']['popular_posts'];?>
				</a>
			</li>
			<?php } ?>

			<?php if ($wo['config']['groups'] == 1 || $wo['config']['pages'] == 1) { ?><li><hr></li><?php } ?>
			<li class="dropdown-hidden-link">
				<a href="<?php echo lui_SeoLink('index.php?link1=setting&page=profile-setting'); ?>" data-ajax="?link1=setting&page=profile-setting"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M21.7,13.35L20.7,14.35L18.65,12.3L19.65,11.3C19.86,11.09 20.21,11.09 20.42,11.3L21.7,12.58C21.91,12.79 21.91,13.14 21.7,13.35M12,18.94L18.06,12.88L20.11,14.93L14.06,21H12V18.94M12,14C7.58,14 4,15.79 4,18V20H10V18.11L14,14.11C13.34,14.03 12.67,14 12,14M12,4A4,4 0 0,0 8,8A4,4 0 0,0 12,12A4,4 0 0,0 16,8A4,4 0 0,0 12,4Z" /></svg> <?php echo $wo['lang']['edit']; ?></a>
			</li>
			<li class="dropdown-hidden-link">
				<a href="<?php echo lui_SeoLink('index.php?link1=setting&page=general-setting'); ?>" data-ajax="?link1=setting&page=general-setting"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M10 4A4 4 0 0 0 6 8A4 4 0 0 0 10 12A4 4 0 0 0 14 8A4 4 0 0 0 10 4M17 12C16.87 12 16.76 12.09 16.74 12.21L16.55 13.53C16.25 13.66 15.96 13.82 15.7 14L14.46 13.5C14.35 13.5 14.22 13.5 14.15 13.63L13.15 15.36C13.09 15.47 13.11 15.6 13.21 15.68L14.27 16.5C14.25 16.67 14.24 16.83 14.24 17C14.24 17.17 14.25 17.33 14.27 17.5L13.21 18.32C13.12 18.4 13.09 18.53 13.15 18.64L14.15 20.37C14.21 20.5 14.34 20.5 14.46 20.5L15.7 20C15.96 20.18 16.24 20.35 16.55 20.47L16.74 21.79C16.76 21.91 16.86 22 17 22H19C19.11 22 19.22 21.91 19.24 21.79L19.43 20.47C19.73 20.34 20 20.18 20.27 20L21.5 20.5C21.63 20.5 21.76 20.5 21.83 20.37L22.83 18.64C22.89 18.53 22.86 18.4 22.77 18.32L21.7 17.5C21.72 17.33 21.74 17.17 21.74 17C21.74 16.83 21.73 16.67 21.7 16.5L22.76 15.68C22.85 15.6 22.88 15.47 22.82 15.36L21.82 13.63C21.76 13.5 21.63 13.5 21.5 13.5L20.27 14C20 13.82 19.73 13.65 19.42 13.53L19.23 12.21C19.22 12.09 19.11 12 19 12H17M10 14C5.58 14 2 15.79 2 18V20H11.68A7 7 0 0 1 11 17A7 7 0 0 1 11.64 14.09C11.11 14.03 10.56 14 10 14M18 15.5C18.83 15.5 19.5 16.17 19.5 17C19.5 17.83 18.83 18.5 18 18.5C17.16 18.5 16.5 17.83 16.5 17C16.5 16.17 17.17 15.5 18 15.5Z" /></svg> <?php echo $wo['lang']['general_setting']; ?></a>
			</li>
			<li class="dropdown-search-link">
				<a href="<?php echo lui_SeoLink('index.php?link1=setting'); ?>" data-ajax="?link1=setting"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M10 4A4 4 0 0 0 6 8A4 4 0 0 0 10 12A4 4 0 0 0 14 8A4 4 0 0 0 10 4M17 12C16.87 12 16.76 12.09 16.74 12.21L16.55 13.53C16.25 13.66 15.96 13.82 15.7 14L14.46 13.5C14.35 13.5 14.22 13.5 14.15 13.63L13.15 15.36C13.09 15.47 13.11 15.6 13.21 15.68L14.27 16.5C14.25 16.67 14.24 16.83 14.24 17C14.24 17.17 14.25 17.33 14.27 17.5L13.21 18.32C13.12 18.4 13.09 18.53 13.15 18.64L14.15 20.37C14.21 20.5 14.34 20.5 14.46 20.5L15.7 20C15.96 20.18 16.24 20.35 16.55 20.47L16.74 21.79C16.76 21.91 16.86 22 17 22H19C19.11 22 19.22 21.91 19.24 21.79L19.43 20.47C19.73 20.34 20 20.18 20.27 20L21.5 20.5C21.63 20.5 21.76 20.5 21.83 20.37L22.83 18.64C22.89 18.53 22.86 18.4 22.77 18.32L21.7 17.5C21.72 17.33 21.74 17.17 21.74 17C21.74 16.83 21.73 16.67 21.7 16.5L22.76 15.68C22.85 15.6 22.88 15.47 22.82 15.36L21.82 13.63C21.76 13.5 21.63 13.5 21.5 13.5L20.27 14C20 13.82 19.73 13.65 19.42 13.53L19.23 12.21C19.22 12.09 19.11 12 19 12H17M10 14C5.58 14 2 15.79 2 18V20H11.68A7 7 0 0 1 11 17A7 7 0 0 1 11.64 14.09C11.11 14.03 10.56 14 10 14M18 15.5C18.83 15.5 19.5 16.17 19.5 17C19.5 17.83 18.83 18.5 18 18.5C17.16 18.5 16.5 17.83 16.5 17C16.5 16.17 17.17 15.5 18 15.5Z" /></svg> <?php echo $wo['lang']['setting']; ?></a>
			</li>
			<?php if(lui_IsAdmin() || lui_IsModerator()) { ?>
				<li><hr></li>
				<li>
					<a href="<?php echo $wo['config']['site_url'] . '/admin-cp'; ?>"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M13,3V9H21V3M13,21H21V11H13M3,21H11V15H3M3,13H11V3H3V13Z" /></svg> <?php echo $wo['lang']['admin_area']; ?></a>
				</li>
			<?php } ?>
			<li><hr></li>
			<li>
				<a href="<?php echo lui_SeoLink('index.php?link1=logout')."/?cache=".time(); ?>"><svg viewBox="0 0 24 24"><path fill="currentColor" d="M14.08,15.59L16.67,13H7V11H16.67L14.08,8.41L15.5,7L20.5,12L15.5,17L14.08,15.59M19,3A2,2 0 0,1 21,5V9.67L19,7.67V5H5V19H19V16.33L21,14.33V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H19Z" /></svg> <?php echo $wo['lang']['log_out']; ?></a>
			</li>
			<li><hr></li>
			<li>
				<a data-toggle="modal" data-target="#keyboard_shortcuts_box" id="keyboard_shortcut">
					<?php echo $wo['lang']['keyboard_shortcuts']; ?>
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-command"><path d="M18 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3H6a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3V6a3 3 0 0 0-3-3 3 3 0 0 0-3 3 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 3 3 0 0 0-3-3z"></path></svg>
				</a>
			</li>
			<li>
				<a id="night_mode_toggle" data-mode='<?php echo lui_Secure($wo['mode_link']) ?>'>
					<span id="night-mode-text"><?php echo $wo['mode_text']; ?></span>
					<svg class="feather feather-moon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
				</a>
			</li>
		</ul>
	</li>
</ul>
