<div class="page-margin">
	<h2 class="ch_checkout_title">
		<?php echo $wo['lang']['status'] ?>: <span class="badge"><?php echo ucfirst($wo['lang'][$wo['order']->status]) ?></span>
		<?php if ($wo['order']->status == 'shipped') { ?>
			<select class="border-bottom" id="cart_product_qty" onchange="ChangeStatus(this,'<?php echo $wo['hash_id'] ?>')">
				<?php if ($wo['order']->status == 'shipped') { ?>
					<option value="shipped" <?php if ($wo['order']->status == 'shipped') {echo "selected";} ?>><?php echo $wo['lang']['shipped']; ?></option>
					<option value="delivered" <?php if ($wo['order']->status == 'delivered') {echo "selected";} ?>><?php echo $wo['lang']['delivered']; ?></option>
				<?php } ?>
			</select>
		<?php } ?>
	</h2>
	
	<?php if ($wo['order']->status != 'delivered') { ?>
		<div class="alert alert-info">
			<?php echo $wo['lang']['if_the_order_status']; ?>
		</div>
		<div class="alert alert-info">
			<?php echo $wo['lang']['if_the_order_delivered']; ?>
		</div>
	<?php } ?>
	
	<div class="row">
		<div class="col-md-5">
			<?php if (!empty($wo['order']->tracking_url) && !empty($wo['order']->tracking_id)) { ?>
				<h4><?php echo $wo['lang']['tracking_details'] ?></h4>
				<div class="panel wo_order_detail_widget">
					<h5 class="bold"><?php echo $wo['lang']['site_url']; ?></h5>
					<p><a href="<?php echo $wo['order']->tracking_url ?>"><?php echo $wo['order']->tracking_url ?></a></p>
					<br>
					<h5 class="bold"><?php echo $wo['lang']['tracking_number']; ?></h5>
					<p><?php echo $wo['order']->tracking_id ?></p>
				</div>
			<?php } ?>
			<h4><?php echo $wo['lang']['delivery_address'] ?></h4>
			<div class="address_book panel wo_order_detail_widget">
				<div class="address_book_innr">
					<div class="address_box">
						<p class="addrs_name"><?php echo($wo['address']->name) ?></p>
						<p class="addrs_phone"><?php echo($wo['address']->phone) ?></p>
						<p class="addrs_street"><?php echo($wo['address']->address) ?></p>
						<p class="addrs_street"><?php echo($wo['address']->city) ?><br><?php echo($wo['address']->country) ?></p>
						<p class="addrs_count"><?php echo($wo['address']->zip) ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="panel panel-white ch_card ch_cart">
				<div class="row ch_prod_items_row">
					<?php echo $wo['html']; ?>
				</div>
				<div class="ch_total_price">
					<div class="divider border-bottom"></div>

					<h4><?php echo $wo['lang']['payments'] ?> <?php echo $wo['lang']['subtotal']; ?></h4>
					<p><?php echo $wo['config']['currency_symbol_array'][$wo['config']['currency']]; ?><?php echo $wo['total']; ?></p>
					
					
						<div class="divider border-bottom"></div>
						<button type="button" class="btn btn-info btn-mat buy_button" onclick="DownloadPurchased('<?php echo $wo['hash_id'] ?>','order')"><?php echo $wo['lang']['download_invoice']; ?></button>
						<?php if (empty($wo['refund']) && $wo['order']->status != 'canceled') { ?>
						<button type="button" class="btn btn-success btn-mat buy_button" onclick="RefundOrder('<?php echo $wo['hash_id'] ?>','hide')" ><?php echo $wo['lang']['request_refund'] ?></button>
					    <?php } ?>
					    <?php if (!empty($wo['refund'])) { ?>
					    	<div class="alert alert-info">
								<?php echo $wo['lang']['your_request_pending_app']; ?>
							</div>
					    <?php } ?>
					<svg width="371" height="218" viewBox="0 0 371 218" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.4" d="M275.008 41.3416C307.369 28.1561 375.43 47.6713 391.786 57.0941L410.44 43.2371L532.518 -219.202L71.3192 -143.669C60.4225 -120.263 39.7451 -60.5365 44.2096 -8.88462C49.7902 55.6802 112.183 99.047 174.223 94.1242C232.5 89.5 234.557 57.8234 275.008 41.3416Z" fill="#48B774" stroke="white"/><path d="M300.467 72.6242C332.827 59.4387 663.274 90.2678 679.63 99.6906L766.842 -127.791L557.976 -187.919L96.7778 -112.387C85.881 -88.9802 65.2036 -29.2539 69.6681 22.398C75.2487 86.9628 136.92 125.407 199.682 125.407C262.5 125.407 260.016 89.1061 300.467 72.6242Z" stroke="#48B774" stroke-width="6"/></svg>
				</div>
			</div>
		</div>
	</div>
</div>


<a href="<?php echo lui_SeoLink('index.php?link1=customer_order&id=' . $wo['hash_id']); ?>" data-ajax="?link1=customer_order&id=<?php echo $wo['hash_id']; ?>" id="load_order"></a>

<div class="modal fade sun_modal" id="write_product_review" tabindex="-1" role="dialog" aria-labelledby="refund_order" aria-hidden="true" data-id="0">
	<div class="modal-dialog mat_box wow_mat_mdl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['write_review'] ?></h4>
			</div>
			<form id="write_review_form" method="post">
				<div class="modal-body">
					<div class="customer_order_write_review_alert"></div>
					<div class="star_rating">
						<input type="radio" id="5-stars" name="rating" value="5">
						<label for="5-stars" class="customer_order_star">★</label>
						<input type="radio" id="4-stars" name="rating" value="4">
						<label for="4-stars" class="customer_order_star">★</label>
						<input type="radio" id="3-stars" name="rating" value="3">
						<label for="3-stars" class="customer_order_star">★</label>
						<input type="radio" id="2-stars" name="rating" value="2">
						<label for="2-stars" class="customer_order_star">★</label>
						<input type="radio" id="1-star" name="rating" value="1">
						<label for="1-star" class="customer_order_star">★</label>
					</div>
					<div class="wow_form_fields mb-0">
						<label for="photos"><?php echo $wo['lang']['photos']; ?></label>
					</div>
					<div class="wow_prod_imgs" style="margin: 0;">
						<div class="upload-product-image" onclick="document.getElementById('p_photos').click(); return false">
							<div class="upload-image-content">
								<svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z"></path></svg>
							</div>
						</div>
						<div id="productimage-holder"></div>
					</div>
					<div class="hidden">
						<input type="file" id="p_photos" accept="image/x-png, image/jpeg" multiple="multiple" name="images[]">
					</div>
					<div class="wow_form_fields">
						<label class="form-label"><?php echo $wo['lang']['review']; ?></label>
						<textarea class="form-control" placeholder="<?php echo $wo['lang']['describe_your_review']; ?>" rows="3" name="review"></textarea>
					</div>
				</div>
				<input name="product_id" class="form-control" type="hidden" id="write_product_review_product_id">
				<div class="modal-footer">
					<button type="submit" class="btn btn-main btn-mat write_review_btn_submit" id="write_review_button"><?php echo $wo['lang']['submit']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#p_photos").on('change', function() {
		//Get count of selected files
		var product_countFiles = $(this)[0].files.length;
		var product_imgPath = $(this)[0].value;
		var extn = product_imgPath.substring(product_imgPath.lastIndexOf('.') + 1).toLowerCase();
		var product_image_holder = $("#productimage-holder");
		product_image_holder.find('img').remove();
		if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
			if (typeof(FileReader) != "undefined") {
				//loop for each file selected for uploaded.
				for (var i = 0; i < product_countFiles; i++) 
				{
				var product_reader = new FileReader();
				product_reader.onload = function(e) {
					$("<img />", {
						"src": e.target.result,
						"class": "thumb-image"
					}).appendTo(product_image_holder);
					}
					product_image_holder.show();
					product_reader.readAsDataURL($(this)[0].files[i]);
				}
			} else {
				product_image_holder.html("<p>This browser does not support FileReader.</p>");
			}
		}
	});
$(document).ready(function() { 
	$('#write_review_form').ajaxForm({ 
    	url: Wo_Ajax_Requests_File() + '?f=products&s=review&hash=' + $('.main_session').val(),
        beforeSubmit:  function () {
        	$('#write_review_button').html("<?php echo($wo['lang']['please_wait']) ?>");
		    $('#write_review_button').attr('disabled', "true");
        }, 
        success: function (data) {
        	$('#write_review_button').removeAttr('disabled');
			$('#write_review_button').text("<?php echo($wo['lang']['submit']) ?>");
        	if (data.status == 200) {
        		<?php if ($wo['config']['node_socket_flow'] == 1) { ?>
		            socket.emit("main_notification", {user_id: _getCookie("user_id"), type: "added",to_id: data.recipient_id });
		        <?php } ?>
        		$('.customer_order_write_review_alert').html("<div class='alert alert-success bg-success'><i class='fa fa-check'></i> "+data.message+"</div>");
				setTimeout(function () {
					$('#write_product_review').modal('hide');
	            	$('.customer_order_write_review_alert').html("");
	            	setTimeout(function () {
		            	$('#load_order').click();
		            },200);
	            },2000);
        	}
        	else{
        		$('.customer_order_write_review_alert').html("<div class='alert alert-danger bg-danger'><i class='fa fa-check'></i> "+data.message+"</div>");
				setTimeout(function () {
	            	$('.customer_order_write_review_alert').html("");
	            },2000);

        	}
        }
    });
});
</script>