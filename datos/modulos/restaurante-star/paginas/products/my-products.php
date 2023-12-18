<?php if (lui_IsAdmin() != true){
   header('Location: ' . $wo['config']['site_url']);
   exit();
} ?>
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
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z"></path></svg></span> <?php echo $wo['lang']['blog']; ?>
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