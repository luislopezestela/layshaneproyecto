<div class="page-margin">
	<div class="row">
		<div class="col-md-2 leftcol"><?php echo lui_LoadPage("sidebar/left-sidebar"); ?></div>
		<div class="col-md-7 middlecol">
			<div class="page-margin wow_content mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M5,3A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H14.09C14.03,20.67 14,20.34 14,20C14,19.32 14.12,18.64 14.35,18H5L8.5,13.5L11,16.5L14.5,12L16.73,14.97C17.7,14.34 18.84,14 20,14C20.34,14 20.67,14.03 21,14.09V5C21,3.89 20.1,3 19,3H5M19,16V19H16V21H19V24H21V21H24V19H21V16H19Z"></path></svg></span> <?php echo $wo['album']['title'];?>
					</div>
				</div>
			</div>

            <div class="page-margin wow_content wow_sett_content">
				<form class="create-album-form form-horizontal" method="post">
					<div class="wow_form_fields">
						<label for="album_name"><?php echo $wo['lang']['album_name']; ?></label>
						<input id="album_name" name="album_name" type="text" value="<?php echo $wo['album']['album_name'];?>">
						<span class="help-block"><?php echo $wo['lang']['album_name_help'] ?></span>
					</div>
					<div class="wow_form_fields"  data-block="thumdrop-zone">
						<label><?php echo $wo['lang']['photos'];?></label>
						<div class="wow_fcov_image">
							<div id="productimage-holder">
								<img src="<?php echo $wo['config']['theme_url'];?>/img/ad_pattern.png">
							</div>
							<div class="upload_ad_image" onclick="document.getElementById('publisher-photos').click(); return false">
								<div class="upload_ad_image_content">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z"></path></svg> <?php echo $wo['lang']['drop_img_here'] ?> <?php echo $wo['lang']['or']; ?> <?php echo $wo['lang']['browse_to_upload']; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="publisher-hidden-option">
						<div id="progress">
							<span id="percent">0%</span>
							<div class="progress">
								<div id="bar" class="progress-bar progress-bar-striped active"></div> 
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="hidden">
						<input type="file" id="publisher-photos" accept="image/x-png, image/gif, image/jpeg" name="postPhotos[]" multiple="multiple">
					</div>
					<div class="app-general-alert setting-update-alert"></div>
					<input type="hidden" name="id" class="form-control input-md" value="<?php echo $wo['album']['id'];?>">
					<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
					<div class="text-center">
						<a class="btn btn-mat" data-ajax="?link1=albums" href="<?php echo lui_SeoLink('index.php?link1=albums');?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path></svg> <?php echo $wo['lang']['go_back'];?>
						</a>
						<button class="btn btn-main btn-mat btn-mat-raised add_wow_loader" type="submit"><?php echo $wo['lang']['publish']; ?></button>
					</div>
				</form>
			</div>
		</div>
		<?php echo lui_LoadPage('sidebar/content');?>
	</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
    var thumb_drop_block = $("[data-block='thumdrop-zone']");

    if (typeof(window.FileReader) == 'undefined') {
      thumb_drop_block.find('.upload_ad_image_content').text('Drag drop is not supported in your browser!');
    }
    else{
      thumb_drop_block[0].ondragover = function() {
          thumb_drop_block.addClass('hover');
          return false;
      };
          
      thumb_drop_block[0].ondragleave = function() {
          thumb_drop_block.removeClass('hover');
          return false;
      };

      thumb_drop_block[0].ondrop = function(event) {
          event.preventDefault();
          var product_image_holder = $("#productimage-holder");
					product_image_holder.find('img').remove();

          thumb_drop_block.removeClass('hover');
          var file = event.dataTransfer.files;
          for (var i = file.length - 1; i >= 0; i--) {
          	product_image_holder.append("<img src='" + window.URL.createObjectURL(file[i]) + "' alt='Picture' class='thumb-image'>")
          }

          $("#publisher-photos").prop('files', file);
          $("#photo-form input").val(file.length + ' file(s) selected');
          $("#photo-form").slideDown(200);
      };
    }
  });
$(document).ready(function() {
	$("#publisher-photos").on('change', function() {
	//Get count of selected files
	var product_countFiles = $(this)[0].files.length;
	var product_imgPath = $(this)[0].value;
	var extn = product_imgPath.substring(product_imgPath.lastIndexOf('.') + 1).toLowerCase();
	var product_image_holder = $("#productimage-holder");
	product_image_holder.empty();
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
});

   $(function() {
    var bar = $('#bar');
    var percent = $('#percent');
    var status = $('#status');
    var publisher_button = $('#publisher-button');
   
     $('form.create-album-form').ajaxForm({
       url: Wo_Ajax_Requests_File() + '?f=album&s=create_album',
       beforeSend: function() {
         var percentVal = '0%';
         bar.width(percentVal);
         percent.html(percentVal);
         $('form.create-album-form').find('.add_wow_loader').addClass('btn-loading');
   
       },
       uploadProgress: function (event, position, total, percentComplete) {
           var percentVal = percentComplete + '%';
           bar.width(percentVal);
           $('#progress').slideDown(200);
           if(percentComplete > 50) {
             percent.addClass('white');
           }
           percent.html(percentVal);
      },
       success: function(data) {
         if (data.status == 200) {
           window.location.href = data.href;
         } else {
             var errors = data.errors.join("<br>");
             $('.app-general-alert').html('<div class="alert alert-danger">' + errors + '</div>');
             $('.alert-danger').fadeIn(300);
         }
         $('form.create-album-form').find('.add_wow_loader').removeClass('btn-loading');
         $('#progress').slideUp(200);
       }
     });
   });
</script>