<?php if(lui_IsAdmin() || lui_IsModerator()){
   
}else{
	header('Location: ' . $wo['config']['site_url']);
   exit();
}?>
<style type="text/css">
	body{background-color:#F0F2FD;}
.wow_main_blogs{background-color:#fff;box-shadow:0 1px 2px rgba(0, 0, 0, 0.2);border-radius:6px;margin-bottom:30px;}
.view-blog{color:#666;font-size:14.5px;line-height:17px;}
.wow_main_blogs .avatar{display:block;position:relative;padding-bottom:80%;}
.wow_main_blogs .avatar > img{width:100%;border-radius:6px;position:absolute;top:0;right:0;bottom:0;left:0;height:100%;object-fit:cover;vertical-align:middle;}
.wo_my_products {
    padding-right: 10px;
    padding-left: 10px;
    margin-bottom: 20px;
}
.wo_my_products a {
	background: #fff;
   display: block;
   border-radius: 2px;
   box-shadow: 0 1px 2px rgba(0,0,0,0.2);
}
.wo_my_products .avatar img, .wo_sidebar_products .avatar img {
    width: 100%;
    vertical-align: middle;
}
.wo_my_products .produc_info, .wo_sidebar_products .produc_info {
    padding: 7px 10px;
    word-break:break-word;
}
.wo_my_products .produc_info span, .wo_sidebar_products .produc_info span {
    font-size: 16px;
    display: block;
    word-break: break-all;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    word-wrap: break-word;
}
.wo_my_products .produc_info h4, .wo_sidebar_products .produc_info h4 {
    font-size: 14.5px;
    color: #4CAF50;
    font-weight: 700;
    letter-spacing: .3px;
    margin: 7px 0 0;
    display: block;
    word-break: break-all;
    overflow: hidden;
    text-overflow: ellipsis;
    word-wrap: break-word;
}
</style>

<?php echo lui_LoadPage("sidebar/left-sidebar"); ?>
<div class="columna-8 sett_page wo_new_sett_pagee main_layshane_configuration_user">
	<br>
	<div class="wo_settings_page">
		<div class="profile-lists singlecol">

			<div class="avatar-holder mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr big_size">
						<span><svg viewBox="0 0 1024 1024" fill="currentColor" whidth="16" height="16"><path d="M504.1 452.5c-18.3 0-36.5-4.1-50.7-10.1l-280.1-138c-18.3-10.1-30.4-24.4-30.4-40.6 0-16.2 10.2-32.5 30.4-42.6L455.4 77.1c16.2-8.1 34.5-12.2 54.8-12.2 18.3 0 36.5 4.1 50.7 10.1L841 213c18.3 10.1 30.4 24.4 30.4 40.6 0 16.2-10.1 32.5-30.4 42.6L558.9 440.3c-16.3 8.1-34.5 12.2-54.8 12.2zM193.6 261.7l280.1 138c8.1 4.1 18.3 6.1 30.4 6.1 12.2 0 24.4-2 32.5-6.1l284.1-144.1-280.1-138c-8.1-4.1-18.3-6.1-30.4-6.1-12.2 0-24.4 2-32.5 6.1L193.6 261.7z m253.6 696.1c-10.1 0-20.3-2-30.4-8.1L165.1 817.8c-30.4-14.2-52.8-46.7-52.8-73.1V391.6c0-24.4 18.3-42.6 44.6-42.6 10.1 0 20.3 2 30.4 8.1L437.1 489c30.4 14.2 52.8 46.7 52.8 73.1v353.1c0 24.4-18.3 42.6-42.7 42.6z m-10.1-48.7c2 2 4.1 2 6.1 2v-349c0-8.1-10.1-24.4-26.4-32.5L165.1 397.7c-2-2-4.1-2-6.1-2v349.1c0 8.1 10.2 24.4 26.4 32.5l251.7 131.8z m144.1 48.7c-24.4 0-42.6-18.3-42.6-42.6V562.1c0-26.4 22.3-58.9 52.8-73.1L841 357.1c10.1-4.1 20.3-8.1 30.4-8.1 24.4 0 42.6 18.3 42.6 42.6v353.1c0 26.4-22.3 58.9-52.8 73.1L611.6 949.7c-12.2 6.1-20.3 8.1-30.4 8.1z m280-560.1L611.6 529.6c-16.2 8.1-26.4 24.4-26.4 32.5v349.1c2 0 4.1-2 6.1-2l249.6-131.9c16.2-8.1 26.4-24.4 26.4-32.5V395.7c-2 0-4 2-6.1 2z m0 0"></path></svg></span> <?php echo $wo['lang']['blog']; ?>
					</div>
				</div>
				<?php if ($wo['config']['can_use_market']) { ?>
					<a class="boton_add_nluis first" href="#" data-toggle="modal" data-target="#create-product-modal" data-backdrop="static" data-keyboard="false"><?php echo $wo['lang']['create'] ?></a>
				<?php } ?>
			</div>
			<br><br>
			<div class="wo_my_pages">
				<div class="row my_products">
					<?php
						$products = lui_GetProducts(array('user_id' => $wo['user']['user_id']));
						if (count($products) > 0) {
							foreach ($products as $wo['product']) {
								echo lui_LoadPage('products/product-style');
							}
						} else {
							echo '<h5 class="search-filter-center-text empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> ' . $wo['lang']['no_available_products'] . '</h5>';
						}
					?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<!-- .row -->
</div>