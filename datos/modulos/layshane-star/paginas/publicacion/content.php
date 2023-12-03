<div class="page-margin page-wrapper grid">
	<main id="maincontent" class="page-main">
		<br>
	<?php
		$symbol =  (!empty($wo['currencies'][$wo['itemsdata']['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['itemsdata']['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];
		$text =  (!empty($wo['currencies'][$wo['itemsdata']['product']['currency']]['text'])) ? $wo['currencies'][$wo['itemsdata']['product']['currency']]['text'] : $wo['config']['classified_currency'];
		$status = '<span class="product-description">' . $wo['lang']['currently_unavailable'] . '</span>';
	    if ($wo['itemsdata']['product']['units'] > 0) {
	      $status = ($wo['itemsdata']['product']['status'] == 0) ? '' . $wo['lang']['in_stock'] . '' : '<span class="product-status-sold">' . $wo['lang']['sold'] . '</span><br><br>';
	    }

	    $estok = 'InStock';
	    if ($wo['itemsdata']['product']['units'] > 0) {
	      $estok = ($wo['itemsdata']['product']['status'] == 0) ? '' . "InStock" . '' : 'OutOfStock';
	    }

		$type = ($wo['itemsdata']['product']['type'] == 0) ? '' . $wo['lang']['new'] . '' : '' . $wo['lang']['used'] . '';
		$condicion = ($wo['itemsdata']['product']['type'] == 0) ? '' . "NewCondition" . '' : '' . "RefurbishedCondition" . '';

		$offerta = false;
		$marca = false;
		if($wo['itemsdata']['product']['marca']) {
			$marca = $wo['itemsdata']['product']['marca'];
		}
	?>
	<div class="columns">
		<div class="column main_columnas">
			<div name="bvSeoContainer" itemscope itemtype="https://schema.org/Product" itemid="<?=$wo['config']['site_url']."/".$wo['itemsdata']['id_publicacion'] ?>">
				<meta itemprop="name" content="<?=$wo['itemsdata']['product']['name'] ?>">
				<meta itemprop="sku" content="<?=$wo['itemsdata']['product']['sku'] ?>">
				<meta itemprop="GTIN" content="">
				<meta itemprop="mpn" content="<?=$wo['itemsdata']['product']['sku'] ?>">
				<link itemprop="image" href="<?php echo $wo['itemsdata']['product']['images'][0]['image_org'];?>">
				<meta itemprop="description" content="<?php echo html_entity_decode(lui_EditMarkup(br2nl($wo['itemsdata']['product']['description'], true, false, false)));?>">

				<?php if ($marca): ?>
					<div itemprop="brand" itemtype="https://schema.org/Brand" itemscope="">
			        	<meta itemprop="name" content="<?=$marca;?>">
			    	</div>
				<?php endif ?>
				
			    <div itemprop="offers" itemtype="https://schema.org/Offer" itemscope="">
			    	<meta itemprop="priceCurrency" content="<?=$text;?>">
			    	<meta itemprop="itemCondition" content="https://schema.org/<?=$condicion;?>" />
			    	<meta itemprop="price" content="<?=$wo['itemsdata']['product']['price_format'];?>">
			    	<meta itemprop="itemOffered" content="<?=$wo['itemsdata']['product']['units']; ?>">
			    	<meta itemprop="availability" content="http://schema.org/<?=$wo['itemsdata']['product']['name'] ?>">
			    	<meta itemprop="url" content="<?=$wo['config']['site_url']."/".$wo['itemsdata']['id_publicacion'] ?>">
			    	<?php if (isset($offerta)): ?>
			    		<meta itemprop="priceValidUntil" content="">
			    	<?php endif ?>
			    	
                </div>


				<div class="hpols-bts-pdp grid">
					<div class="producto_media_display media">
						<div class="wo_post_prod_full_img">
							<?php
							$el_colorv = null;
								foreach($wo['itemsdata']['product']['images'] as $photo){
									$color_id = lui_buscar_color_en_opciones($photo['id_color']);
									if(isset($color_id['id_color'])!=0) {
										$buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color']);
										$el_colorv = lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]);
										if ($wo['atributo_items']==$el_colorv) {
											echo  "<img src='" . ($photo['image_org']) ."' alt='".$wo['itemsdata']['product']['name']."' class='image-file pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"product\");'>";
										}
									}else{
										echo  "<img src='" . ($photo['image_org']) ."' alt='".$wo['itemsdata']['product']['name']."' class='image-file pointer' onclick='Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"product\");'>";
									}
								}
							?>
						</div>
						<div class="wo_post_prod_full_img_slider">
							<?php
							$el_colorx = null;
								foreach($wo['itemsdata']['product']['images'] as $photo){
									$color_id = lui_buscar_color_en_opciones($photo['id_color']);
									if(isset($color_id['id_color'])!=0) {
										$buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color']);
										$el_colorx = lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]);
										if($wo['atributo_items']==$el_colorx){
											echo  "<div><img src='" . ($photo['image_org']) ."' alt='".$wo['itemsdata']['product']['name']."' class='active pointer'></div>";
										}
									}else{
										echo  "<div><img src='" . ($photo['image_org']) ."' alt='".$wo['itemsdata']['product']['name']."' class='active pointer'></div>";
									}
									
									
								}
							?>
						</div>
					</div>
					<div class="informacion_del_producto">

						<div class="page-title-wrapper product">
							<h1 class="page-title">
			          <span class="base" data-ui-id="page-title-wrapper" itemprop="name"><?php echo $wo['itemsdata']['product']['name'] ?></span>
			        </h1>
			      </div>
						<?php
							$stars = '0';
							if (!empty($wo['itemsdata']['product']['rating']) && is_numeric($wo['itemsdata']['product']['rating'])) {
								$stars = $wo['itemsdata']['product']['rating'];
							}
						?>
						<?php if ($wo['config']['store_system'] == 'on') { ?>
							<div class="pr_stars wo_post_prod_full_stars" data-stars="<?php echo $stars; ?>">
								<svg class="star rating" viewBox="0 0 24 24" data-rating="1"><path d="M6.516,14.323l-1.49,6.452c-0.092,0.399,0.068,0.814,0.406,1.047C5.603,21.94,5.801,22,6,22 c0.193,0,0.387-0.056,0.555-0.168L12,18.202l5.445,3.63c0.348,0.232,0.805,0.223,1.145-0.024c0.338-0.247,0.487-0.68,0.372-1.082 l-1.829-6.4l4.536-4.082c0.297-0.268,0.406-0.686,0.278-1.064c-0.129-0.378-0.47-0.644-0.868-0.676L15.378,8.05l-2.467-5.461 C12.75,2.23,12.393,2,12,2s-0.75,0.23-0.911,0.589L8.622,8.05L2.921,8.503C2.529,8.534,2.192,8.791,2.06,9.16 c-0.134,0.369-0.038,0.782,0.242,1.056L6.516,14.323z"></path></svg>
								<svg class="star rating" viewBox="0 0 24 24" data-rating="2"><path d="M6.516,14.323l-1.49,6.452c-0.092,0.399,0.068,0.814,0.406,1.047C5.603,21.94,5.801,22,6,22 c0.193,0,0.387-0.056,0.555-0.168L12,18.202l5.445,3.63c0.348,0.232,0.805,0.223,1.145-0.024c0.338-0.247,0.487-0.68,0.372-1.082 l-1.829-6.4l4.536-4.082c0.297-0.268,0.406-0.686,0.278-1.064c-0.129-0.378-0.47-0.644-0.868-0.676L15.378,8.05l-2.467-5.461 C12.75,2.23,12.393,2,12,2s-0.75,0.23-0.911,0.589L8.622,8.05L2.921,8.503C2.529,8.534,2.192,8.791,2.06,9.16 c-0.134,0.369-0.038,0.782,0.242,1.056L6.516,14.323z"></path></svg>
								<svg class="star rating" viewBox="0 0 24 24" data-rating="3"><path d="M6.516,14.323l-1.49,6.452c-0.092,0.399,0.068,0.814,0.406,1.047C5.603,21.94,5.801,22,6,22 c0.193,0,0.387-0.056,0.555-0.168L12,18.202l5.445,3.63c0.348,0.232,0.805,0.223,1.145-0.024c0.338-0.247,0.487-0.68,0.372-1.082 l-1.829-6.4l4.536-4.082c0.297-0.268,0.406-0.686,0.278-1.064c-0.129-0.378-0.47-0.644-0.868-0.676L15.378,8.05l-2.467-5.461 C12.75,2.23,12.393,2,12,2s-0.75,0.23-0.911,0.589L8.622,8.05L2.921,8.503C2.529,8.534,2.192,8.791,2.06,9.16 c-0.134,0.369-0.038,0.782,0.242,1.056L6.516,14.323z"></path></svg>
								<svg class="star rating" viewBox="0 0 24 24" data-rating="4"><path d="M6.516,14.323l-1.49,6.452c-0.092,0.399,0.068,0.814,0.406,1.047C5.603,21.94,5.801,22,6,22 c0.193,0,0.387-0.056,0.555-0.168L12,18.202l5.445,3.63c0.348,0.232,0.805,0.223,1.145-0.024c0.338-0.247,0.487-0.68,0.372-1.082 l-1.829-6.4l4.536-4.082c0.297-0.268,0.406-0.686,0.278-1.064c-0.129-0.378-0.47-0.644-0.868-0.676L15.378,8.05l-2.467-5.461 C12.75,2.23,12.393,2,12,2s-0.75,0.23-0.911,0.589L8.622,8.05L2.921,8.503C2.529,8.534,2.192,8.791,2.06,9.16 c-0.134,0.369-0.038,0.782,0.242,1.056L6.516,14.323z"></path></svg>
								<svg class="star rating" viewBox="0 0 24 24" data-rating="5"><path d="M6.516,14.323l-1.49,6.452c-0.092,0.399,0.068,0.814,0.406,1.047C5.603,21.94,5.801,22,6,22 c0.193,0,0.387-0.056,0.555-0.168L12,18.202l5.445,3.63c0.348,0.232,0.805,0.223,1.145-0.024c0.338-0.247,0.487-0.68,0.372-1.082 l-1.829-6.4l4.536-4.082c0.297-0.268,0.406-0.686,0.278-1.064c-0.129-0.378-0.47-0.644-0.868-0.676L15.378,8.05l-2.467-5.461 C12.75,2.23,12.393,2,12,2s-0.75,0.23-0.911,0.589L8.622,8.05L2.921,8.503C2.529,8.534,2.192,8.791,2.06,9.16 c-0.134,0.369-0.038,0.782,0.242,1.056L6.516,14.323z"></path></svg>
								<span <?php if($wo['loggedin'] == true) { echo 'onclick="ShowProductReviews('.$wo['itemsdata']['product']['id'].')" ';}?>  class="pointer"><?php echo $wo['itemsdata']['product']['reviews_count'] ?> <?php echo $wo['lang']['reviews']; ?></span>
							</div>
						<?php } ?>
						<?php
							echo '<div class="wo_post_prod_full_price">' . $symbol . $wo['itemsdata']['product']['price_format'] . ' (' . $text . ')</div>';
						?>
						<style type="text/css">
							.atributos_from_publication_color{display:flex;width:100%;background:transparent;position:relative;margin:18px auto;}
							.content_atributos{display:flex;flex-wrap:wrap;}
							.content_atributos .atribut_product{border: 2px solid transparent; display:flex;border-radius:5px;box-shadow: -10px -10px 20px rgb(255, 255, 255), 10px 10px 20px rgba(0, 0, 0, 0.1);color:#b6b6b6;background:#f4f4f4;list-style:none;margin:7px;}
							.content_atributos span{position:absolute;top:-17px;left:1px;color:#998;}
							.content_atributos .atribut_product a{text-transform:uppercase;padding:6px 8px;text-decoration:none;display:flex;justify-content:center;align-items: center;}
							.content_atributos .atribut_product a i{display:block;height:20px;width:20px;border-radius:30px;margin:5px;}
							.btn_sty_go{box-shadow: -10px -10px 20px rgb(255, 255, 255), 10px 10px 20px rgba(0, 0, 0, 0.1);background:#f4f4f4;transition:all .5s;}
						</style>
						<?php $opciones_del_producto = lui_poner_en_lista_las_opciones($wo['itemsdata']['product']['id']) ?>
						
						<div class="atributos_from_publication_color">
							<?php if (isset($opciones_del_producto)): ?>
								<div class="content_atributos">
									<?php if(!empty($wo['atributo_items'])): ?>
										<span>Color</span>
									<?php endif ?>
									<?php foreach ($opciones_del_producto as $color => $valorcolor): $seleccionadocoloor='';?>
										<?php $buscar_el_color_por_id = lui_buscar_color_en_colores($valorcolor['id_color'])?>
										<?php $el_color = lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
										<?php if($el_color==$wo['atributo_items']): ?>
											<?php $seleccionadocoloor = 'style="border: 2px solid '.$buscar_el_color_por_id['color'].'!important;"'; ?>
										<?php endif ?>
										<li class="atribut_product" <?=$seleccionadocoloor; ?>>
											<a href="<?=$wo['itemsdata']['product']['url'].'/'.$el_color?>" data-ajax="?link1=timeline&items=<?=$wo['itemsdata']['product']['seo_id'].'&type='.$el_color;?>"><?=$wo['lang'][$buscar_el_color_por_id['lang_key']]; ?> <i style="background:<?=$buscar_el_color_por_id['color'];?>;"></i></a>
										</li>
									<?php endforeach ?>
								</div>
							<?php endif ?>
						</div>
						<?php $pagina = $wo['page'];?>
						<?php if ($wo['loggedin']) { if ($pagina == 'itemsdata' && $wo['itemsdata']['product']['user_id'] != $wo['user']['user_id']) { ?>
							<div class=" wo_post_prod_full_btns">
								<style>
									.contactar_vendedores_header_bt{display:block;background:#fff;width:100%;max-width:420px;position:relative;padding:10px;margin-top:10px;cursor:pointer;user-select:none;transition:all .5s;border-radius: 7px 7px 0 0;text-align:center;}
									.contactar_vendedores{transition:all .5s;background-color:#fff;padding-left:8px;max-width:420px;position:relative;height:200px;margin-bottom:10px;border-radius:0 0 7px 7px;}
									.active_list_vender{border-radius:7px;}
									.contactar_vendedores_header_bt:after{content:"X";position:absolute;right:15px;}
									.active_list_vender:after{content:""}
									.active_list_vender_hp{height:0;overflow:hidden;}
								</style>
								<script>
									$(document).on('click','.contactar_vendedores_header_bt', function(){
										$('.contactar_vendedores_header_bt').toggleClass('active_list_vender');
										$('.contactar_vendedores').toggleClass('active_list_vender_hp');
									})
								</script>
								<span class="contactar_vendedores_header_bt active_list_vender"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,2H4A2,2 0 0,0 2,4V22L6,18H20A2,2 0 0,0 22,16V4A2,2 0 0,0 20,2M6,9H18V11H6M14,14H6V12H14M18,8H6V6H18" /></svg> 
									<?php if($wo['user']['admin']==1 || $wo['user']['admin']==2): ?>
										<?php echo $wo['lang']['users'] ?>
									<?php else: ?>
										<?php echo $wo['lang']['contact_seller'] ?>
									<?php endif ?>
								</span>
								<div class="contactar_vendedores active_list_vender_hp">
										<div class="chat_usuarios_contenedor">
											<?php
											if($wo['loggedin'] == true && $wo['page'] != 'maintenance') {
												if($wo['config']['chatSystem'] == 1 && $wo['page'] != 'get_news_feed' && $wo['page'] != 'sharer' && $wo['page'] != 'video-api' && $wo['page'] != 'messages'){
													$OnlineUsers = lui_GetChatUsers('online');
													$Offlineusers = lui_GetChatUsers('offline');
													if(empty($Offlineusers) && empty($OnlineUsers)) { ?>
														<!--no hay chats-->
													<?php } else { ?>
														<div class="online-users">
															<?php
																if (count($OnlineUsers) == 0) {
																	echo '';
																}else{
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
										</div>
								</div>

								<?php if ($wo['config']['store_system'] == 'on') { ?>
								<?php if (!empty($wo['itemsdata']['product']['units']) && $wo['itemsdata']['product']['units'] > 0) { ?>
									<button class="contact btn-main btn btn-mat" onclick="AddProductToCart(this,'<?php echo($wo['itemsdata']['product']['id']); ?>','add')">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" /></svg> <?php echo($wo['lang']['buy_now']) ?>
									</button>
								<?php }else{}?> 
								<?php } ?>
							</div>
						<?php } else { ?>
							<div class="">
								<a class="btn btn-default btn-mat btn_sty_go" href="<?php echo lui_SeoLink('index.php?link1=edit-product&id=' . $wo['itemsdata']['product_id']);?>">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" /></svg> <?php echo $wo['lang']['edit_product']?>
								</a>
							</div>
						<?php } } ?>
						
						<ul class="wow_post_prod_shead wo_post_prod_full_info" style="padding:6px;">
							<?php
								echo '<li style="padding:3px;justify-content:flex-start;">&nbsp;' . $status . '</li>';
							?>
							<?php
								echo '<li style="padding:3px;justify-content:flex-start;">&nbsp;' .$wo['lang']['status'].' '.$type . '</li>';
							?>
						</ul>
						<?php if($wo['loggedin'] == false): ?>
							<div class="product-care-info stellar-body__small">
								<div class="care-container">
									<div class="title">
										<div class="carepack-image">
											<img src="<?php echo $wo['config']['theme_url'];?>/img/sidebar/carritocompra.png">
										</div>
										<div class="selected-carepack two-lines">Para realizar una compra, es necesario que <a href="<?php echo lui_SeoLink('index.php?link1=acceder');?>"> Acceder </a> al sistema, si es nuevo debe <a href="<?php echo lui_SeoLink('index.php?link1=register');?>"> Registrarse </a>. (es requerido por su seguridad al momento de comprar). Hacemos que tus compras sean mas seguras.</div>
									</div>
								</div>
							</div>
							<div>
							</div>
						<?php endif ?>
					</div>
				</div>
				
				<hr>
				<div class="description_container">
					<p><?php echo html_entity_decode(lui_EditMarkup(br2nl($wo['itemsdata']['product']['description'], true, false, false)));?></p>
					<hr>
					<?php echo html_entity_decode(lui_EditMarkup(br2nl($wo['itemsdata']['product']['detalles'], true, false, false)));?>
				</div>
				
				<?php
					$fields = lui_GetCustomFields('product'); 
					if (!empty($fields)) {
						foreach ($fields as $key => $wo['field']) { 
							if (!empty($wo['itemsdata']['product']['fid_'.$wo['field']['id']])) {
								if ($wo['field']['type'] == 'selectbox') {
									$options = @explode(',', $wo['field']['options']);
									foreach ($options as $key => $value) {
										if (($key + 1) == $wo['itemsdata']['product']['fid_'.$wo['field']['id']]) {
											$wo['itemsdata']['product']['fid_'.$wo['field']['id']] = $value;
										}
									}
								}
								echo '<div class="wow_post_prod_infos"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z" /></svg><p class="product-description">' . $wo['itemsdata']['product']['fid_'.$wo['field']['id']] . '</p></div>';
					        } 
					    } 
				    } 
				?>
			</div>
		</div>
	</div>

	<div class="page-margin wow_content wo_post_prod_full_related_prnt">
		<div class="wo_page_hdng pag_neg_padd pag_alone">
			<div class="wo_page_hdng_innr big_size">
				<?php echo $wo['lang']['related_prods']?>
			</div>
		</div>
		<?php
			$data['limit'] = 4;
			$products = lui_GetProducts($data);
			if (count($products) > 0) {
		?>
		<div class="row">
			<?php
				foreach ($products as $key => $wo['product']) {
					echo lui_LoadPage('products/full-product-related-list'); 
				}
				} else {
					echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg>' . $wo['lang']['no_available_products'] . '</div>';
				}
			?>
		</div>
	</div>

	<script>
	// 1st carousel, main
	$('.wo_post_prod_full_img').flickity({
		pageDots: false,
		draggable: false
	});
	// 2nd carousel, navigation
	$('.wo_post_prod_full_img_slider').flickity({
		asNavFor: '.wo_post_prod_full_img',
		contain: true,
		pageDots: false,
		prevNextButtons: false,
	});
	</script>
	</main>
</div>