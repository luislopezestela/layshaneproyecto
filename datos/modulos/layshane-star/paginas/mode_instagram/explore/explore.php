<style type="text/css">
	.explore_hdr{
    display: block;
    position: relative;
    width: 100%;
    text-align: center;
    padding: 10px 5px;
    margin-top: 15px;
}
</style>
<div class="page-margin">
	<div class="explore_hdr main">
		<div class="circle_one"></div>
		<div class="circle_two"></div>
		<div class="title"><?php echo $wo['lang']['explore'] ?></div>
		<p><?php echo $wo['lang']['explore_latest_media'] ?></p>
	</div>

	<div class="profile-lists">
		<div id="photos-list" class="user_media_list_section insta">
         <?php foreach ($wo['explore_posts'] as $wo['story']) { 
         	echo lui_LoadPage('mode_instagram/explore/list');
         } ?>
		</div>
		<?php if (count($wo['explore_posts']) > 0) { ?>
		<?php }else{
			echo lui_LoadPage('mode_instagram/explore/no-posts');
		} ?>
	</div>
</div>
<script type="text/javascript">
scrolled = 0;
$(window).scroll(function () {
	var nearToBottomm = 300;
	if($('.user_media_list_section').length > 0) {
		if ($(window).scrollTop() + $(window).height() > $(document).height() - nearToBottomm) {
			if (scrolled == 0) {
				scrolled = 1;
				Wo_LoadExplorePosts();
			}
		}
	}
});

	function Wo_LoadExplorePosts() {
		var after_post_id = $('div.photo-data:last').attr('data-post-id');
		$.post(Wo_Ajax_Requests_File() + '?f=explore&s=load_more_posts&mode_type=facebook', {
		    after_post_id: after_post_id,
		}, function (data) {
			if (data.status == 200) {
				if (data.html && data.html != '') {
					scrolled = 0;
					$('.user_media_list_section').append(data.html);
				}
				else{
					//$('.load-more-explore').slideUp();
				}
			}
			else{
				//$('.load-more-explore').slideUp();
			}
		});
	}
</script>