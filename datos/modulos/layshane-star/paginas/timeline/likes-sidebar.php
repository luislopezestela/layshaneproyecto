<ul class="page-margin wow_content negg_padd list-unstyled event-options-list" id="sidebar-pages-list-container">
	<div class="wo_page_hdng" style="margin-bottom: 5px;">
		<div class="wo_page_hdng_innr">
			<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M23,10C23,8.89 22.1,8 21,8H14.68L15.64,3.43C15.66,3.33 15.67,3.22 15.67,3.11C15.67,2.7 15.5,2.32 15.23,2.05L14.17,1L7.59,7.58C7.22,7.95 7,8.45 7,9V19A2,2 0 0,0 9,21H18C18.83,21 19.54,20.5 19.84,19.78L22.86,12.73C22.95,12.5 23,12.26 23,12V10M1,21H5V9H1V21Z"></path></svg></span> <a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['user_profile']['username'] . '&type=likes');?>" data-ajax="?link1=timeline&u=<?php echo $wo['user_profile']['username']?>&type=likes"><?php echo $wo['lang']['likes'];?></a>&nbsp;<div style="font-weight: normal">(<?php echo number_format($wo['user_profile']['details']['likes_count']);?>)</div>
		</div>
	</div>
	<li>
		<div class="sidebar-likes-container list-sidebar-element"><?php 
			foreach (lui_GetLikes($wo['user_profile']['user_id'], 'profile', 9 , 0, array('in' => 'profile_sidebar', 'likes_data' => $wo['user_profile']['likes_data'])) as $wo['PageList']) {
				$wo['PageList']['user_name'] = $wo['PageList']['name'];
				echo lui_LoadPage('sidebar/sidebar-page-list');
			}
			?></div>
	</li>
	<li><div class="clear"></div></li>
</ul>