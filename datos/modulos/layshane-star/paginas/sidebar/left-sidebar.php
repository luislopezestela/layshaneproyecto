<?php if (lui_IsMobile() == false) { ?>
<div class="left-sidebar">
	<?php if ($wo['loggedin'] == true && $wo['page'] != 'maintenance'): ?>
		<span><?=$wo['lang']['contact_us'];?></span>
	<?php endif ?>
	 <?php
	 if($wo['loggedin'] == true && $wo['page'] != 'maintenance') {
	 	if($wo['config']['chatSystem'] == 1 && $wo['page'] != 'get_news_feed' && $wo['page'] != 'sharer' && $wo['page'] != 'video-api' && $wo['page'] != 'messages') {
					$OnlineUsers = lui_GetChatUsers('online');
					$Offlineusers = lui_GetChatUsers('offline');
					if (empty($Offlineusers) && empty($OnlineUsers)) { ?>
						<!--no hay chats-->
					<?php } else { ?>
						<div class="online-users">
							<?php
								if (count($OnlineUsers) == 0) {
									echo '';
								} else {
									foreach ($OnlineUsers as $wo['chatList']) {
										echo lui_LoadPage('chat/online-user');
									}
								}
							?>
						</div>
						<div class="offline-users">
							<?php
								if (count($Offlineusers) == 0) {
									echo '';
								} else {
									foreach ($Offlineusers as $wo['chatList']) {
										echo lui_LoadPage('chat/offline-user');
									}
								}
							?>
						</div>
					<?php } 
	 	}
	 }
	 ?>

	 <ul class="categorias_de_tienda_pagina_principal">
	 	<?php if ($wo['loggedin'] == true): ?>
	 	<span><?=$wo['lang']['opciones'];?></span>
	 	<li>
			<a href="<?=lui_SeoLink('index.php?link1=purchased');?>" data-ajax="?link1=purchased">
				<?=$wo['lang']['mis_compras'];?>
			</a>
		</li>
	 	<li>
			<a href="<?=lui_SeoLink('index.php?link1=saved-posts');?>" data-ajax="?link1=saved-posts">
				<?=$wo['lang']['saved_posts'];?>
			</a>
		</li>

		<li>
			<a href="<?php echo lui_SeoLink('index.php?link1=explore');?>" data-ajax="?link1=explore" title="<?php echo $wo['lang']['explore'];?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="8 16 10 10 16 8 14 14 8 16"></polyline><circle cx="12" cy="12" r="9"></circle></svg>
				<?=TextForMode('explore');?>
			</a>
		</li>
		<?php endif ?>
		

		<?php if ($wo['loggedin'] == true): ?>

			<?php if (lui_IsAdmin() || lui_IsModerator()): ?>
				<li>
					<a href="<?php echo lui_SeoLink('index.php?link1=wallet'); ?>" data-ajax="?link1=wallet">
							<svg viewBox="0 0 24 24"><path fill="currentColor" d="M21,18V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V6H12C10.89,6 10,6.9 10,8V16A2,2 0 0,0 12,18M12,16H22V8H12M16,13.5A1.5,1.5 0 0,1 14.5,12A1.5,1.5 0 0,1 16,10.5A1.5,1.5 0 0,1 17.5,12A1.5,1.5 0 0,1 16,13.5Z" /></svg> <?php echo $wo['lang']['wallet']; ?>: <?php echo lui_GetCurrency($wo['config']['ads_currency']); ?><?php echo sprintf('%.2f',$wo['user']['wallet']);?>
						</a>
				</li>
			<?php endif ?>


		<?php if ($wo['config']['popular_posts'] == 1) { ?>
		<li>
			<a href="<?=$wo['config']['site_url']; ?>/most_liked" data-ajax="?link1=most_liked">
				<?=TextForMode('trending');?>
			</a>
		</li>
		<?php } ?>
		<?php endif ?>

		<span><?=$wo['lang']['categories'];?></span>
	 	<?php 
	 	$category_id = (!empty($_GET['c_id'])) ? (int) $_GET['c_id'] : 0;
	 	foreach ($wo['products_categories'] as $key => $category) {
	 		$active = ($category_id == $key) ? 'active' : '';
	 		?>
	 		<li class="<?php echo $active?>" data_prodect_cat_id="<?=($key) ?>"><a href="<?=lui_SeoLink('index.php?link1=products&c_id='.$key);?>"><?=$category;?></a></li>
	 	<?php } ?>
	 </ul>

</div>
<?php } ?>


<?php if ($wo['config']['order_posts_by'] == 0) { ?>
<script>
function Wo_StorePosts(type) {
  if (type > 1) {
     return false;
  }
  if (type == 0) {
	$('.order_all').addClass('active');
	$('.order_people').removeClass('active');
  } else {
	$('.order_all').removeClass('active');
	$('.order_people').addClass('active');
  }
  $('#posts-laoded').html('<div class="wo_loading_post"><div class="lightui1-shimmer"> <div class="_2iwr"></div> <div class="_2iws"></div> <div class="_2iwt"></div> <div class="_2iwu"></div> <div class="_2iwv"></div> <div class="_2iww"></div> <div class="_2iwx"></div> <div class="_2iwy"></div> <div class="_2iwz"></div> <div class="_2iw-"></div> <div class="_2iw_"></div> <div class="_2ix0"></div> </div></div><div class="wo_loading_post"><div class="lightui1-shimmer"> <div class="_2iwr"></div> <div class="_2iws"></div> <div class="_2iwt"></div> <div class="_2iwu"></div> <div class="_2iwv"></div> <div class="_2iww"></div> <div class="_2iwx"></div> <div class="_2iwy"></div> <div class="_2iwz"></div> <div class="_2iw-"></div> <div class="_2iw_"></div> <div class="_2ix0"></div> </div></div>');
  $.get(Wo_Ajax_Requests_File() + '?f=update_order_by', {type:type}, function (data) {
    if (data.status == 200) {
      loadposts();
    }
  });
}
</script>
<?php } ?>