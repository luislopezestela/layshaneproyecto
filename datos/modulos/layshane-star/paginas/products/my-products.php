<?php if (lui_IsAdmin() != true){
   header('Location: ' . $wo['config']['site_url']);
   exit();
} ?>
<div class="page-margin">
	<div>
		<div class="col-md-2 leftcol"><?php echo lui_LoadPage("sidebar/left-sidebar"); ?></div>
		<div class="col-md-7 singlecol">
			<div class="page-margin wow_content">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_menu">
						<ul class="list-unstyled">
							<?php if ($wo['config']['can_use_market']) { ?>
							<li class="active"><a href="<?php echo lui_SeoLink('index.php?link1=my-products'); ?>" data-ajax="?link1=my-products"><?php echo $wo['lang']['my_products'] ?></a></li>
							<?php } ?>
							<?php if ($wo['config']['store_system'] == 'on') { ?>
							<li><a href="<?php echo lui_SeoLink('index.php?link1=purchased'); ?>" data-ajax="?link1=purchased"><?php echo $wo['lang']['purchased'] ?></a></li>
							<?php if ($wo['have_products'] > 0) { ?>
								<li><a href="<?php echo lui_SeoLink('index.php?link1=orders'); ?>" data-ajax="?link1=orders"><?php echo $wo['lang']['orders'] ?></a></li>
							<?php } ?>
							<?php } ?>
						</ul>
						<?php if ($wo['config']['can_use_market']) { ?>
						<a class="btn btn-main btn-mat btn-mat-raised" href="#" data-toggle="modal" data-target="#create-product-modal" data-backdrop="static" data-keyboard="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path></svg> <?php echo $wo['lang']['create'] ?></a>
						<?php } ?>
					</div>
				</div>
			</div>
			
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
<?php echo lui_LoadPage('products/create'); ?>
<div class="modal fade" id="delete-product-post" role="dialog">
	<div class="modal-dialog modal-md wow_mat_mdl">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['delete_product_post']; ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo $wo['lang']['confirm_delete_product_post']; ?></p>
			</div>
			<div class="modal-footer">
				<div class="ball-pulse"><div></div><div></div><div></div></div>
				<button id="delete-my-product-post" type="button" class="btn main btn-mat"><?php echo $wo['lang']['delete']; ?></button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function RemoveUserProduct(id,type = 'show') {
		if (type == 'hide') {
			$('#delete-product-post').find('#delete-my-product-post').attr('onclick', "RemoveUserProduct('"+id+"')");
			$('#delete-product-post').modal({
			    show: true
			});
			return false;
		}
		$('#delete-product-post').modal('hide');
		$('#product_'+id).slideUp(300).remove();
		$.post(Wo_Ajax_Requests_File() + "?f=products&s=delete",{id: id},function () {});
	}
</script>