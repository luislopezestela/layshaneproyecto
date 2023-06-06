<div class="page-margin">
	<div>
		<div class="col-md-2 leftcol"><?php echo lui_LoadPage("sidebar/left-sidebar"); ?></div>
		<div class="col-md-10 singlecol">
			<div class="page-margin wow_content mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M17,14H19V17H22V19H19V22H17V19H14V17H17V14M20,11V8H4V11H20M13,13V14.68C12.37,15.63 12,16.77 12,18C12,19.09 12.29,20.12 12.8,21H4A2,2 0 0,1 2,19V3L3.67,4.67L5.33,3L7,4.67L8.67,3L10.33,4.67L12,3L13.67,4.67L15.33,3L17,4.67L18.67,3L20.33,4.67L22,3V13.5C20.93,12.58 19.53,12 18,12C16.77,12 15.63,12.37 14.68,13H13M11,19V13H4V19H11Z"></path></svg></span> <?php echo $wo['lang']['create_new_article'];?>
					</div>
				</div>
			</div>
			
			<div class="page-margin wow_content wow_sett_content">
				<form class="form form-horizontal create-article-form" method="post" id="insert-blog" action="#">
					<div class="wow_form_fields">
						<label for="blog_title"><?php echo $wo['lang']['title']; ?></label>
						<input id="blog_title" name="blog_title" type="text">
					</div>
					<div class="wow_form_fields">
						<label for="new-blog-desc"><?php echo $wo['lang']['description']; ?></label>
						<textarea name="blog_description" id="new-blog-desc" rows="3"></textarea>
					</div>
					<div class="wow_form_fields">
						<label for="blog"><?php echo $wo['lang']['content']; ?></label>
						<textarea name="blog_content" id="blog" placeholder="<?php echo $wo['lang']['content'] ?>"></textarea> 
					</div>
					<div class="wow_form_fields">
						<label><?php echo $wo['lang']['thumbnail'];?></label>
						<div class="wow_fcov_image" data-block="thumdrop-zone">
							<div id="wow_fcov_img_holder">
								<img src="<?php echo $wo['config']['theme_url'];?>/img/ad_pattern.png">
							</div>
							<div class="upload_ad_image" onclick="document.getElementById('thumbnail').click(); return false">
								<div class="upload_ad_image_content">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z"></path></svg> <?php echo $wo['lang']['drop_img_here'] ?> <?php echo $wo['lang']['or']; ?> <?php echo $wo['lang']['browse_to_upload']; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="wow_form_fields">
								<label for="blog_category"><?php echo $wo['lang']['category'] ?></label>
								<select name="blog_category" id="blog_category">
									<option value="0"><?php echo $wo['lang']['category'];?></option>
									<?php foreach ($wo['blog_categories'] as $category_id => $category_name): ?>
										<option value="<?php echo $category_id?>"><?php echo $category_name; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="wow_form_fields">
								<label for="blog_tags"><?php echo $wo['lang']['tags']; ?></label>
								<input data-role="tagsinput" id="blog_tags" name="blog_tags" type="text" placeholder="<?php echo $wo['lang']['tags']; ?>">
							</div>
						</div>
						<?php if($wo['config']['reCaptcha'] == 1) {?>
							<div class="col-md-3">
							</div>
							<div class="col-md-6">
								<div class="wow_form_fields">
									<div class="form-group" style="margin-top:10px;">
										<div class="g-recaptcha" data-sitekey="<?php echo $wo['config']['reCaptchaKey']?>"></div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="setting-update-alert" id="blog-alert"></div>
					<div class="text-center">
						<a class="btn btn-mat" data-ajax="?link1=my-blogs" href="<?php echo lui_SeoLink('index.php?link1=my-blogs');?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path></svg> <?php echo $wo['lang']['go_back'];?>
						</a>
						<button class="btn btn-main btn-mat btn-mat-raised add_wow_loader" type="submit"><?php echo $wo['lang']['publish']; ?></button>
					</div>
					<input type="file" class="hidden" id="thumbnail" name="thumbnail" accept="image/*">
					<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
					<input name="image" type="file" id="upload" class="hidden">
				</form>
			</div>
		</div>
	</div>
	<!-- .row -->
</div>
<script>
jQuery(document).ready(function($) {
    var thumb_drop_block = $("[data-block='thumdrop-zone']");
    if (typeof(window.FileReader) == 'undefined') {
      thumb_drop_block.find('.thumbnail-rendderer div').text('Drag drop is not supported in your browser!');
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
          thumb_drop_block.removeClass('hover');
          var file = event.dataTransfer.files;
          $("#thumbnail").prop('files', file);
          $("#wow_fcov_img_holder").html("<img src='" + window.URL.createObjectURL(event.dataTransfer.files[0]) + "' alt='Picture'>")
      };
    }

    $("#blog_tags").tagsinput({
      maxTags: 15,
    });

    $("#thumbnail").change(function(event) {
      $("#wow_fcov_img_holder").html("<img src='" + window.URL.createObjectURL(this.files[0]) + "' alt='Picture'>")
    });


    $('#insert-blog').ajaxForm({
      url: Wo_Ajax_Requests_File() + '?f=insert-blog',
      beforeSend: function() {
        $('#insert-blog').find('.add_wow_loader').addClass('btn-loading');
      },
      success: function(data) {
        if (data['status'] == 200) {
          $("#blog-alert").html('<div class="alert alert-success">'+ data['message'] +'</div>');
          window.location = data.url;
        } else if (data['status'] == 300) {
          $("#approve_post").modal('show');
          Wo_Delay(function(){
            $("#approve_post").modal('hide');
            location.reload();
          },3000);
        } else if (data['message']) {
          $("#blog-alert").html('<div class="alert alert-danger">' + data['message'] + '</div>');
        } 
        $('#insert-blog').find('.add_wow_loader').removeClass('btn-loading');
      }});
 });

tinymce.init({
  selector: '#blog',
  height: 270,
  images_upload_credentials: true,
  paste_data_images: true,
  image_advtab: true,
  entity_encoding : "raw",
  images_upload_url: Wo_Ajax_Requests_File() + '?f=upload-blog-image',
  toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  toolbar2: "print preview media | forecolor backcolor emoticons",
  plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    file_picker_callback: function(callback, value, meta) {
      if (meta.filetype == 'image') {
        $('#upload').trigger('click');
        $('#upload').on('change', function() {
          var file = this.files[0];
          var reader = new FileReader();
          reader.onload = function(e) {
            callback(e.target.result, {
              alt: ''
            });
          };
          reader.readAsDataURL(file);
        });
      }
    },
});
</script> 