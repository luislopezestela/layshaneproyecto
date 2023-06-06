<div class="modal fade" id="create-product-modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="wow_pops_head">
				<svg height="100px" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" xmlns="http://www.w3.org/2000/svg"><path d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729 c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="currentColor" opacity="0.6"></path> <path d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729 c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="currentColor" opacity="0.6"></path> <path d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428 c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="currentColor"></path></svg>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></button>
				<h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z"></path></svg> <?php echo $wo['lang']['sell_new_product'] ?></h4>
			</div>
			<form class="create-album-form form-horizontal" method="post">
				<div class="modal-body">
					<div class="app-general-alert setting-update-alert"></div>
					
					<div class="row">
						<div class="col-md-8">
							<div class="wow_form_fields">
								<label for="name"><?php echo $wo['lang']['name'] ?></label>
								<input id="name" name="name" type="text" value="">
							</div>
						</div>
						<div class="col-md-4">
							<div class="wow_form_fields">
								<label for="price"><?php echo $wo['lang']['price']; ?></label>
								<input id="price" name="price" type="text" placeholder="0.00" value="">
							</div>
						</div>
					</div>
					<div class="wow_form_fields">
						<label for="description"><?php echo $wo['lang']['description'] ?></label>
						<textarea name="description" rows="3" id="description" placeholder="<?php echo $wo['lang']['please_describe_your_product'] ?>"></textarea>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="wow_form_fields">
								<label for="category"><?php echo $wo['lang']['category'] ?></label>
								<select name="category" id="category" onchange="GetProductSubCategory(this)">
									<?php 
										foreach ($wo['products_categories'] as $key => $category) {
											if ($key > 1) {
									?>
										<option value="<?php echo $key;?>"><?php echo $category;?></option>
									<?php } ?>
									<?php if ($key == count($wo['products_categories']) && !empty($wo['products_categories'][1]) ) { ?>
										<option value="1"><?php echo $wo['products_categories'][1];?></option>
									<?php } ?>
									<?php } ?>
								</select>
							</div>
						</div>
						<?php if (!empty($wo['products_sub_categories'])) { ?>
						<div class="col-md-8 product_sub_category_class" style="<?php echo((empty($wo['products_sub_categories'][array_keys($wo['products_categories'])[0]])) ? 'display: none;' : '') ?>">
							<div class="wow_form_fields">
								<label for="product_sub_category"><?php echo $wo['lang']['sub_category'] ?></label>
								<select name="product_sub_category" id="product_sub_category">
									<?php
										unset($wo['products_categories'][1]);
										if (!empty($wo['products_sub_categories'][array_keys($wo['products_categories'])[0]])) {
										foreach ($wo['products_sub_categories'][array_keys($wo['products_categories'])[0]] as $id => $sub_category) { ?>
											<option value="<?php echo $sub_category['id']?>"><?php echo $sub_category['lang']; ?></option>
										<?php } } ?>
								</select>
							</div>
						</div>
					    <?php } ?>
						<div class="col-md-4">
							<div class="wow_form_fields">
								<label for="type"><?php echo $wo['lang']['type']; ?></label>
								<select name="type" id="type">
									<option value="0"><?php echo $wo['lang']['new'] ?></option>
									<option value="1"><?php echo $wo['lang']['used'] ?></option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="wow_form_fields">
								<label for="location"><?php echo $wo['lang']['location'] ?></label>
								<input id="location" name="location" type="text" value="">
							</div>
							<?php if ($wo['config']['yandex_map'] == 1) { ?>
								<div class="yandex_search_product"></div>
							<?php } ?>
						</div>
						<div class="col-md-4">
							<div class="wow_form_fields">
								<label for="currency"><?php echo $wo['lang']['currency']; ?></label>
								<select name="currency" id="currency">
									<?php foreach ($wo['currencies'] as $key => $currency) { ?>
										<option value="<?php echo $key; ?>"><?php echo  $currency['text'] ?> (<?php echo  $currency['symbol'] ?>)</option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<?php if ($wo['config']['store_system'] == 'on') { ?>
					<div class="row">
						<div class="col-md-8">
							<div class="wow_form_fields">
								<label for="units"><?php echo $wo['lang']['total_item'] ?></label>
								<input id="units" name="units" type="number" value="">
							</div>
						</div>
					</div>
					<?php } ?>
					<?php $fields = lui_GetCustomFields('product'); 
						if (!empty($fields)) {
							foreach ($fields as $key => $wo['field']) {
								echo lui_LoadPage('products/fields');
							}
						}
					?>
					<div class="wow_form_fields mb-0">
						<label for="photos"><?php echo $wo['lang']['photos']; ?></label>
					</div>
					<div class="wow_prod_imgs">
						<div class="upload-product-image" onclick="document.getElementById('product-photos').click(); return false">
							<div class="upload-image-content">
								<svg xmlns="http://www.w3.org/2000/svg" class="feather" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z" /></svg>
							</div>
						</div>
						<div id="productimage-holder"></div>
					</div>

					<div class="publisher-hidden-option">
						<div id="progress" class="create-product-progress">
							<span id="percent" class="create-product-percent <?php echo lui_RightToLeft('pull-right');?>">0%</span>
							<div class="progress">
								<div id="bar" class="progress-bar active create-product-bar"></div> 
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="hidden">
						<input type="file" id="product-photos" accept="image/x-png, image/gif, image/jpeg" name="postPhotos[]" multiple="multiple">
					</div>
					<input type="hidden" name="id" class="form-control input-md" value="">
					<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
					<input type="hidden" name="lat-product" id="lat-product" class="form-control input-md" value="">
					<input type="hidden" name="lng-product" id="lng-product" class="form-control input-md" value="">
					<input type="hidden" name="page_id" id="page_id_product" class="form-control input-md" value="<?php echo(!empty($wo['page_profile']) && !empty($wo['page_profile']['page_id']) ? $wo['page_profile']['page_id'] : 0) ?>">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-main btn-mat btn-mat-raised add_wow_loader"><?php echo $wo['lang']['publish']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	var imgArray = [];
	<?php 
$js_array = json_encode($wo['products_sub_categories']);
echo "var sub_categories_array = ". $js_array . ";\n";
?>
	function GetProductSubCategory(self) {
		id = $(self).val();
		$('.product_sub_category_class').slideUp();
		var text = "";
		if (typeof(sub_categories_array[id]) == 'undefined') {
		    $('#product_sub_category').html('');
		}
		else{
			$('.product_sub_category_class').slideDown();
		   	sub_categories_array[id].forEach(function(entry) {
				text = text + "<option value='"+entry.id+"'>"+entry.lang+"</option>";
			});
		    $('#product_sub_category').html(text);
		}
	}
	function DeleteUploadedImageByIdP(id,self) {
		$('#delete_uploaded_image_by_id_'+id).remove();
		imgArray.splice(id, 1);
		var image_holder = $(self).parents('#create-product-modal').find("#productimage-holder");
		image_holder.empty();

		for (var i = 0; i < imgArray.length; i++){

			var reader = new FileReader();
			var ii = 0;
			reader.onload = function (e) {
			  image_holder.append('<span class="thumb-image-delete" id="image_to_'+ii+'"><span onclick="DeleteUploadedImageByIdP('+ii+',this)" class="pointer thumb-image-delete-btn"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg></span><img src="'+e.target.result+'" class="thumb-image"></span>')
			  ii = ii +1;

			}
			image_holder.show();
	    reader.readAsDataURL(imgArray[i]);
		}
		$("#product-photos")[0].files = new FileListItems(imgArray);
	}
$(document).ready(function(){
	$("#product-photos").on('change', function(){
		let self = this;
		//Get count of selected files
		var product_countFiles = $(this)[0].files.length;
		var product_imgPath = $(this)[0].value;
		var extn = product_imgPath.substring(product_imgPath.lastIndexOf('.') + 1).toLowerCase();
		var product_image_holder = $(self).parents('#create-product-modal').find("#productimage-holder");
		//product_image_holder.empty();
		if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
			if (typeof(FileReader) != "undefined") {
				//loop for each file selected for uploaded.
				for (var i = 0; i < product_countFiles; i++){
					var reader = new FileReader();
							
					imgArray.push($(self)[0].files[i]);
					
					
					reader.onload = function (e) {
						if ($(self).parents('#create-product-modal').find("#productimage-holder .thumb-image-delete").length == 0) {
							var ii = 0;
						}else{
							var ii = $(self).parents('#create-product-modal').find("#productimage-holder .thumb-image-delete").length;
						}
					  $(product_image_holder).append('<span class="thumb-image thumb-image-delete" id="delete_uploaded_image_by_id_'+ii+'"><span class="pointer thumb-image-delete-btn" onclick="DeleteUploadedImageByIdP('+ii+',this)"><i class="fa fa-remove"></i></span><div class="background_image_product" style="background-image: url('+e.target.result+');"></div></span>');
					  ii = ii +1;

					}
					product_image_holder.show();
		      reader.readAsDataURL($(this)[0].files[i]);
		    }
		    $(this)[0].files = new FileListItemsP(imgArray);
	    }else{
	    	product_image_holder.html("<p>Este navegador no es compatible con FileReader.</p>");
	    }
	  }
	});
});
function FileListItemsP (files) {
  var b = new ClipboardEvent("").clipboardData || new DataTransfer()
  for (var i = 0, len = files.length; i<len; i++) b.items.add(files[i])
  return b.files
}
$(function() {
   	if (navigator.geolocation) {
        var location = navigator.geolocation.getCurrentPosition(function (position) {
            $("#lng-product").val(position.coords.longitude);
            $("#lat-product").val(position.coords.latitude);
        });
    }
    var create_bar = $('.create-product-bar');
    var create_percent = $('.create-product-percent');
    var status = $('#status');
     $('form.create-album-form').ajaxForm({
       url: Wo_Ajax_Requests_File() + '?f=products&s=create',
       beforeSend: function() {
         var percentVal = '0%';
         create_bar.width(percentVal);
         create_percent.html(percentVal);
         
         
         $('.create-album-form').find('.add_wow_loader').addClass('btn-loading');
       },
       uploadProgress: function (event, position, total, percentComplete) {
           var percentVal = percentComplete + '%';
           create_bar.width(percentVal);
           $('.create-product-progress').slideDown(200);
           create_percent.html(percentVal);
      },
       success: function(data) {
       	console.log(data)
         if (data.status == 200) {
         	$("#productimage-holder").empty();
      		imgArray = [];
         	if (data.message) {
         		$('.app-general-alert').html('<div class="alert alert-success">' + data.message + '</div>');
         		setTimeout(function (){
         			$('.app-general-alert').html('');
         			window.location.reload();
         		}, 3000);
         	}
         	else{
         		window.location.href = data.href;
         	}
         } else {
             var errors = data.errors.join("<br>");
             $('.app-general-alert').html('<div class="alert alert-danger">' + errors + '</div>');
             $('.alert-danger').fadeIn(300);
         }
         $('.create-album-form').find('.add_wow_loader').removeClass('btn-loading');
       }
     });
   });
<?php if ($wo['config']['google_map'] == 1) { ?>
var create_pac_input = document.getElementById('location');
  (function pacSelectFirst(input) {
    // store the original event binding function
    var _addEventListenerProduct = (input.addEventListener) ? input.addEventListener : input.attachEvent;
    function addEventListenerWrapper(type, listener) {
      // Simulate a 'down arrow' keypress on hitting 'return' when no pac suggestion is selected,
      // and then trigger the original listener.
      if(type == "keydown") {
        var orig_listener_product = listener;
        listener = function (event) {
          var suggestion_selected_product = $(".pac-item-selected").length > 0;
          if(event.which == 13 && !suggestion_selected_product) {
            var simulated_downarrow_product = $.Event("keydown", {
              keyCode: 40,
              which: 40
            });
            orig_listener_product.apply(input, [simulated_downarrow_product]);
          }
          orig_listener_product.apply(input, [event]);
        };
      }
      // add the modified listener
      _addEventListenerProduct.apply(input, [type, listener]);
    }
    if(input.addEventListener)
      input.addEventListener = addEventListenerWrapper;
    else if(input.attachEvent)
      input.attachEvent = addEventListenerWrapper;
  })(create_pac_input);

  $(function () {
     var autocompleteproduct = new google.maps.places.Autocomplete(create_pac_input);
  });
<?php } ?>
<?php if ($wo['config']['yandex_map'] == 1) { ?>
	$(function() {
		$('#location').on( "keydown", function() {
			let self = this;
		  var myGeocoder = ymaps.geocode($(this).val());
      myGeocoder.then(
          function (res) {
          	if (res.geoObjects.getLength() == 0) {
          		$('.yandex_search_product').html('');
          	}
          	else{
          		let html = '';
          		for (var i = 0; i < res.geoObjects.getLength(); i++) {
          			html += '<p class="pointer" onclick="AddYandexResult(\'#location\',this,\'.yandex_search_product\')">'+res.geoObjects.get(i).properties.get('name')+'</p>';
              }
              $('.yandex_search_product').html(html);
          	}
          },
          function (err) {
              $('.yandex_search_product').html('');
          }
      );
		});
	});
<?php } ?>
</script>