
<div class="productos_listar_pagina_view products wo_market">
		<div class="contenedor_productos_lista leftcol">
			<div class="head_productos_fitrar wo_job_head_filter wo_market_head_filter">
				<div class="search-blog">
					<form action="">
						<?php
							$placeholder = $wo['lang']['search_for_products_main'];
							if (!empty($category_name)) {
								$placeholder = str_replace('{category_name}', $category_name, $wo['lang']['search_for_products']);
				    	    }
						?>
						<input type="text" onkeyup="Wo_SearchProducts(this.value)" placeholder="<?php echo $placeholder; ?>" id="product-text">
					</form>
				</div>
				<div class="dropdown market_widget">
					<div class="m_widget_head dropdown-toggle" data-toggle="dropdown" role="button">
						<?php echo $wo['lang']['sort_by'];?> <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M7,10L12,15L17,10H7Z" /></svg>
					</div>
					<div class="dropdown-menu menu_drop_up_page">
						<div class="market_categories">
							<ul class="product-sort-slider">
								<li class="active" onclick="changePriceSortValue('latest');$(this).addClass('active');"><a href="javascript:void(0)"><?php echo $wo['lang']['latest'] ?></a></li>
								<li onclick="changePriceSortValue('price_low');$(this).addClass('active');"><a href="javascript:void(0)"><?php echo $wo['lang']['price_low'] ?></a></li>
								<li onclick="changePriceSortValue('price_high');$(this).addClass('active');"><a href="javascript:void(0)"><?php echo $wo['lang']['price_high'] ?></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="dropdown market_widget">
					<div class="m_widget_head dropdown-toggle" data-toggle="dropdown" role="button">
						<?php echo $wo['lang']['categories'];?> <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M7,10L12,15L17,10H7Z" /></svg>
					</div>
					<div class="dropdown-menu menu_drop_up_page">
						<div class="market_categories">
							<ul class="product-category-slider">
								<?php 
									$category_id = (!empty($_GET['c_id'])) ? (int) $_GET['c_id'] : 0;
									foreach ($wo['products_categories'] as $key => $category) {
										$active = ($category_id == $key) ? 'active' : '';
								?>
									<li class="<?php echo $active?>" data_prodect_cat_id="<?php echo($key) ?>"><a href="<?php echo lui_SeoLink('index.php?link1=products&c_id=' . $key);?>"><?php echo $category;?></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
				<?php if ( !empty($_GET['c_id']) && !empty($wo['products_sub_categories'][$_GET['c_id']])) { ?>
					<div class="dropdown market_widget">
						<div class="m_widget_head dropdown-toggle" data-toggle="dropdown" role="button">
							<?php echo $wo['lang']['sub_category'];?> <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M7,10L12,15L17,10H7Z" /></svg>
						</div>
						<div class="dropdown-menu menu_drop_up_page">
							<div class="market_categories">
								<ul class="product-category-slider-sub">
									<?php 
										$category_id = (!empty($_GET['sub_id'])) ? (int) $_GET['sub_id'] : 0;
										foreach ($wo['products_sub_categories'][$_GET['c_id']] as $key => $category) {
											$active = ($category_id == $category['id']) ? 'active' : '';
									?>
										<li class="<?php echo $active?>" data_prodect_cat_id="<?php echo($category['id']) ?>"><a href="<?php echo lui_SeoLink('index.php?link1=products&c_id=' . $_GET['c_id'].'&sub_id='.$category['id']);?>"><?php echo $category['lang'];?></a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		
		<div class="caja_de_productos_en_lista">
			<div class="latest-products">
				<?php
					$category_name = '';
					$data = array();
					if (!empty($_GET['c_id'])) {
						if (is_numeric($_GET['c_id'])) {
							if (array_key_exists($_GET['c_id'], $wo['products_categories'])) {
								?>
								<input type="hidden" value="<?php echo lui_Secure($_GET['c_id']); ?>" id="c_id" />
								<?php
								$category_name = $wo['products_categories'][$_GET['c_id']];
								$data['c_id'] = lui_Secure($_GET['c_id']);
							}
						}
						if (!empty($wo['products_sub_categories'][$_GET['c_id']]) && !empty($_GET['sub_id'])) {
							foreach ($wo['products_sub_categories'][$_GET['c_id']] as $key => $value) {
								if ($_GET['sub_id'] == $value['id']) { ?>
									<input type="hidden" value="<?php echo lui_Secure($_GET['sub_id']); ?>" id="sub_id" />
									<?php
									$data['sub_id'] = lui_Secure($value['id']);
									break;
								}
							}
						}
					} else {
						echo '<input type="hidden" value="0" id="c_id" />';
						echo '<input type="hidden" value="" id="sub_id" />';
					}
				?>
				<div class="market_bottom">
					<?php
						$data['limit'] = 10;
						$products = lui_GetProducts($data);
						if (count($products) > 0) {
					?>
					<div id="products" class="productos_en_cuadros">
						<?php
						foreach ($products as $key => $wo['product']) {
							echo lui_LoadPage('products/products-list');
						}
						} else {
							echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg>' . $wo['lang']['no_available_products'] . '</div>';
						}
						?>
					</div>
				</div>
			</div> 	
			<div class="posts_load load-produts">
			    <?php if (count($products) > 0): ?>
				<div class="load-more">
                    <button class="btn btn-default text-center pointer" onclick="Wo_LoadProducts();"><?php echo $wo['lang']['load_more_products'] ?></button></div>
                <?php endif ?>
			</div>
		<div class="clear"></div>
	</div>
</div>

<script>
$('.wow_main_blogs_bg').css('height', ($('.wow_main_float_head').height()) + 'px');

function changePriceSortValue(price_sort) {
	cat_id = $('.product-category-slider').find('.active').attr('data_prodect_cat_id');
	sub_id = $('.product-category-slider-sub').find('.active').attr('data_prodect_cat_id');
	distance = $('#distance_val').text();
	$('.product-sort-slider li').removeClass('active');
	$(this).addClass('active');
	
	$.post(Wo_Ajax_Requests_File() + '?f=get_prodects_by_filter', {price_sort: price_sort, cat_id:cat_id, sub_id:sub_id, distance: distance}, function (data) {
		if (data.status == 200) {
			if (data.html.length > 0) {
				$('#products').html(data.html);
			} else {
				$('#products').html('<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg><?php echo $wo['lang']['no_available_products'] ?></div>');
			}
		}
	});
}

function Wo_SearchProductsNearBy() {
	length = $('#cusrange-reader').val();
	text_value = $('#product-text').val();
	var c_id = 0;
	if ($('#c_id').length > 0) {
		c_id = $('#c_id').val();
	}
	var sub_id = $('#sub_id').val();
	$.post(Wo_Ajax_Requests_File() + '?f=search_products', {value: text_value, c_id:c_id, sub_id:sub_id, length: length}, function (data) {
		if (data.status == 200) {
			if (data.html.length > 0) {
				$('#products').html(data.html);
			} else {
				$('#products').html('<?php echo $wo['lang']['no_available_products'] ?>');
			}
		}
	});
}
function Wo_LoadProducts() {
	$('.load-produts').html('<div class="white-loading list-group"><div class="cs-loader"><div class="cs-loader-inner"><label> ●</label><label> ●</label><label> ●</label><label> ●</label><label> ●</label><label> ●</label></div></div></div>');
	var $c_id = $('#c_id').val();
	var sub_id = $('#sub_id').val();
	var $last_id = $('.product:last').attr('data-id');
	var length = $('#cusrange-reader').val();
	$.post(Wo_Ajax_Requests_File() + '?f=load_more_products', {last_id: $last_id, c_id:$c_id, sub_id:sub_id, length: length}, function (data) {
		if (data.status == 200) {
			if (data.html.length > 0) {
				$('.load-produts').html('<div class="load-more"><button class="btn btn-default text-center pointer" onclick="Wo_LoadProducts();"><i class="fa fa-arrow-down progress-icon" data-icon="arrow-down"></i> <?php echo $wo['lang']['load_more_products'] ?></button></div>');
				$('#products').append(data.html);
			} else {
				$('.load-produts').html('<div class="load-more"><button class="btn btn-default text-center pointer" onclick="Wo_LoadProducts();"><?php echo $wo['lang']['no_available_products'] ?></button></div>');
			}
		}
	});
}
function Wo_SearchProducts(value) {
	length = $('#cusrange-reader').val();
	var c_id = 0;
	if ($('#c_id').length > 0) {
		c_id = $('#c_id').val();
	}
	var sub_id = $('#sub_id').val();
	$.post(Wo_Ajax_Requests_File() + '?f=search_products', {value: value, c_id:c_id, sub_id:sub_id, length: length}, function (data) {
		if (data.status == 200) {
			if (data.html.length > 0) {
				$('#products').html(data.html);
			} else {
				$('#products').html('<?php echo $wo['lang']['no_available_products'] ?>');
			}
		}
	});
}
</script>