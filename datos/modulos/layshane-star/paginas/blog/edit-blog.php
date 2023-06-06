<div class="page-margin">
	<div>
		<div class="col-md-2 leftcol"><?php echo lui_LoadPage("sidebar/left-sidebar"); ?></div>
		<div class="col-md-7 singlecol">
			<div class="page-margin wow_content mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z"></path></svg></span> <?php echo $wo['lang']['edit'];?>
					</div>
				</div>
			</div>

			<div class="page-margin wow_content wow_sett_content">
				<form class="form form-horizontal create-article-form" method="post" id="update-blog" action="#">
					<div class="wow_form_fields">
						<label for="blog_title"><?php echo $wo['lang']['title']; ?></label>
						<input id="blog_title" name="blog_title" type="text" value="<?php echo $wo['article']['title']?>">
					</div>
					<div class="wow_form_fields">
						<label for="new-blog-desc"><?php echo $wo['lang']['description']; ?></label>
						<textarea name="blog_description" id="new-blog-desc" rows="3"><?php echo $wo['article']['description']?></textarea>
					</div>
					<div class="wow_form_fields">
						<label for="blog"><?php echo $wo['lang']['content']; ?></label>
						<textarea name="blog_content" id="blog"><?php echo $wo['article']['content']?></textarea> 
					</div>
					<div class="wow_form_fields">
						<label><?php echo $wo['lang']['thumbnail'];?></label>
						<div class="wow_fcov_image" data-block="thumdrop-zone">
							<div id="wow_fcov_img_holder">
								<img src="<?php echo $wo['article']['thumbnail']; ?>" alt="">
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
									<?php foreach ($wo['blog_categories'] as $category_id => $category_name):?>
										<option value="<?php echo $category_id?>" <?php if($category_id == $wo['article']['category']) echo "selected='selected'" ;?> ><?php echo $category_name;?></option>
									<?php endforeach;?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="wow_form_fields">
								<label for="blog_tags"><?php echo $wo['lang']['tags']; ?></label>
								<input data-role="tagsinput" value="<?php echo $wo['article']['tags']?>" id="blog_tags" name="blog_tags" type="text" placeholder="<?php echo $wo['lang']['tags'] ?>">
							</div>
						</div>
					</div>
					<div class="create-article-alerts" id="blog-alert"></div>
					<div class="text-center">
						<a class="btn btn-mat" data-ajax="?link1=my-blogs" href="<?php echo lui_SeoLink('index.php?link1=my-blogs');?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path></svg> <?php echo $wo['lang']['go_back'];?>
						</a>
						<button class="btn btn-main btn-mat btn-mat-raised add_wow_loader" type="submit"><?php echo $wo['lang']['save']; ?></button>
					</div>
					<input type="file" class="hidden" id="thumbnail" name="thumbnail" accept="image/*">
						<input name="image" type="file" id="upload" class="hidden" onchange="">
					<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
				</form>
			</div>
		</div>
	</div>
</div>
<script>
 jQuery(document).ready(function($) {

    var thumb_drop_block = $("[data-block='thumdrop-zone']");

    if (typeof(window.FileReader) == 'undefined') {
      thumb_drop_block.find('.error-text-renderer').text('Drag drop is not supported in your browsers!');
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

    $("#thumbnail").change(function(event) {
	  $("#wow_fcov_img_holder").html("<img src='" + window.URL.createObjectURL(this.files[0]) + "' alt='Picture'>")
    });

    $("#blog_tags").tagsinput({
      maxTags: 15,
    })


    $('#update-blog').ajaxForm({
      url: Wo_Ajax_Requests_File() + '?f=update-blog&blog_id=<?php echo $wo['article']['id'];?>',
      beforeSend: function() {
        $('#update-blog').find('.add_wow_loader').addClass('btn-loading');
      },
      success: function(data) {
        if (data['status'] == 200) {
          $("#blog-alert").html('<div class="alert alert-success">'+ data['message'] +'</div>');
          window.location = data.url;
        } else if (data['message']) {
          $("#blog-alert").html('<div class="alert alert-danger">' + data['message'] + '</div>');
        } 
        $('#update-blog').find('.add_wow_loader').removeClass('btn-loading');
      }
    });

 });

tinymce.init({
  selector: '#blog',
  height: 400,
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