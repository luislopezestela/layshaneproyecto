<div class="wo_settings_page wow_content">
	<div class="avatar-holder avatarr">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Profile Picture" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['avatar_and_cover']; ?></p>
		</div>
	</div>
	<hr>

   <form  method="post" class="form-horizontal setting-profile-form" enctype="multipart/form-data">
      <div class="setting-profile-alert setting-update-alert"></div>
	  
	  <div class="wow_cset_cover" title="<?php echo $wo['lang']['cover']; ?>">
            <div class="wow_cset_cover_hdr">
                <span class="btn btn-file" id="coverimage-holder" onclick="$('#cover').trigger('click'); return false;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14,6L10.25,11L13.1,14.8L11.5,16C9.81,13.75 7,10 7,10L1,18H23L14,6Z" /></svg>
                </span>
                <input type="file" class="hidden" id="cover" accept="image/x-png, image/gif, image/jpeg" name="cover">
            </div>
			<div class="avatar-read" id="cover-form"><p></p></div>
		</div>
		<div class="wow_cset_avtr">
            <div class="wow_cset_avtr_hdr">
                <span class="btn btn-file" id="avatarimage-holder" onclick="$('#avatar').trigger('click'); return false;" title="<?php echo $wo['lang']['avatar']; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z" /></svg>
                </span>
                <input type="file" class="hidden" id="avatar" accept="image/x-png, image/gif, image/jpeg" name="avatar">
            </div>
			<div class="avatar-read" id="photo-form"><p></p></div>
		</div>
	  
		<div class="text-center">
			<button type="submit" class="btn btn-main btn-mat btn-mat-raised add_wow_loader"><?php echo $wo['lang']['save']; ?></button>
		</div>

      <input type="hidden" name="user_id" id="user-id" value="<?php echo $wo['setting']['user_id'];?>">
      <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
   </form>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$("#cover").on('change', function() {
	//Get count of selected files
	$("#coverimage-holder").html("<img src='" + window.URL.createObjectURL(this.files[0]) + "' alt='Picture'>");
	});
});

$(document).ready(function() {
	$("#avatar").on('change', function() {
	//Get count of selected files
	$("#avatarimage-holder").html("<img src='" + window.URL.createObjectURL(this.files[0]) + "' alt='Picture'>");
	});
});

$(function() {
  $("#cover").change(function() {
            var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
            $("#cover-form p").html(filename);
            $("#cover-form").fadeIn(200);
        });
  $('form.setting-profile-form').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=update_images_setting',
    beforeSend: function() {
      $('.wo_settings_page').find('.add_wow_loader').addClass('btn-loading');
    },
    success: function(data) {
      if (data.status == 200) {
        scrollToTop();
        $(".cover-read, .avatar-read").slideUp(200);
        if (data.avatar) {
          <?php if ($wo['config']['node_socket_flow'] == "1") { ?>
            socket.emit("on_avatar_changed", {from_id: _getCookie("user_id"), name: data.avatar});
          <?php } ?>
          var user_id = $('form.setting-profile-form').find('#user-id').val();
          $('[id^=updateImage-' + user_id + ']').fadeOut(300, function () { $('[id^=updateImage-' + user_id + ']').attr("src", data.avatar)}).fadeIn(300);
        }
        if (data.cover) {
          $('[id^=cover-image]').fadeOut(300, function () { $('[id^=cover-image]').attr("src", data.cover)}).fadeIn(300);
        }
        $('.setting-profile-alert').html('<div class="alert alert-success">' + data.message + '</div>');
        $('.alert-success').fadeIn('fast', function() {
          $(this).delay(2500).slideUp(500, function() {
            $(this).remove();
          });
        });
      } 
      $('.wo_settings_page').find('.add_wow_loader').removeClass('btn-loading');
    }
  });
});
</script>