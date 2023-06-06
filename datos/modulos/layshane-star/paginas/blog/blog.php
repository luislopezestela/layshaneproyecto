<style>body{overflow-x:hidden;}</style>
<div class="page-margin products">
	<div class="wow_main_float_head new_market blogs">
		<div class="container">
			<h1><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z"></path></svg> <?php echo $wo['lang']['most_recent_art']; ?></h1>
			<?php 
			$is_admin     = lui_IsAdmin();
			$is_moderoter = lui_IsModerator();
			?>
			<?php if ($wo['loggedin'] == true && $is_admin || ($is_moderoter && $wo['user']['permission']['manage-articles'] == 1) ) { ?>
			<?php if (lui_CanBlog() == true) { ?>

				<a class="btn btn-mat my_articles_btn" href="<?php echo lui_SeoLink('index.php?link1=my-blogs'); ?>" data-ajax="?link1=my-blogs">
					<?php echo $wo['lang']['my_articles'] ?>
				</a>

			<?php } } ?>
			
		</div>
	</div>
	
	<div class="wow_main_blogs_bg"></div>
	
	<div class="wow_content wo_job_head_filter blogs">
		<div class="search-blog">
			<div class="main-blog-sidebar">
				<input type="text" placeholder="<?php echo $wo['lang']['search_for_article']?>" id="search-blog-input">
				<ul class="popular-articles search_suggs" id="recent-blogs-search"></ul>
			</div>
		</div>

		<?php 
			$category_id = (!empty($_GET['id'])) ? (int) $_GET['id'] : 0;
			foreach ($wo['blog_categories'] as $key => $category) {
				$active = ($category_id == $key) ? 'active' : '';
		?>
			<div class="wo_job_main_widget wow_blog_cats"><a class="<?php echo $active?>" href="<?php echo lui_SeoLink('index.php?link1=blog-category&id=' . $key) ?>" data-ajax="?link1=blog-category&id=<?php echo $key?>"><?php echo $category;?></a></div>
		<?php } ?>
	</div>

	<div id="recent-blogs" class="">
		<?php
			$pages = lui_GetBlogs(array("limit" => 9));
			if (count($pages) > 0) {
				foreach ($pages as $key => $wo['article']){
					$wo['article']['first'] = ($key == 0) ? true : false;
					echo lui_LoadPage('blog/includes/card-list');
				}
			} 
			else {
				echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z" /></svg>' . $wo['lang']['no_blogs_found'] . '</div>';
			}
		?>
	</div>
			
	<div class="posts_load">
		<?php if (count($pages) >= 9): ?>
			<div class="load-more">
				<button class="btn btn-default text-center pointer load-more-blogs" id="hren">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg> <?php echo $wo['lang']['load_more_blogs'] ?>
				</button>
			</div>
		<?php endif ?>
	</div>
</div>

<script>
$('.wow_main_blogs_bg').css('height', ($('.wow_main_float_head').height()) + 'px');

$('#search-blog-input').keyup(function(event) {
	$keyword = $(this).val();
	//$('#load-search-icon').removeClass('hidden');
	$.post(Wo_Ajax_Requests_File() + '?f=search-blog-read', {keyword: $keyword}, function(data, textStatus, xhr) {
		if (data.status == 200) {
			$('#recent-blogs-search').html(data.html);
		} else {
			$('#recent-blogs-search').html('<div class="text-center">' + data.message + '</div>');
		}
		//$('#load-search-icon').addClass('hidden');
	});
});

jQuery(document).ready(function($) {
    $(".load-more-blogs").click(function () {
  		var last_id = (($("div[data-blog-id]").length > 0) ? $("div[data-blog-id]:last").attr('data-blog-id') : 0);
		$.ajax({	  
		     url: Wo_Ajax_Requests_File(),
		     type: 'GET',
		     dataType: 'json',
		     data: {f:"load-recent-blogs",offset:last_id,total:9},
		     success:function(data){
		        if (data['status'] == 200) {
		            $("#recent-blogs").append(data['html']);
		        }
		        else{
		           $(".posts_load").remove()
		        }
		     }
		});
	});
});
</script>