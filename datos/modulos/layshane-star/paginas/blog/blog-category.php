<div class="page-margin products">
	<div class="wow_main_float_head new_market blogs">
		<div class="container">
			<h1><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z"></path></svg> <?php echo $wo['lang']['most_recent_art']; ?></h1>
			
			<?php if ($wo['loggedin'] == true) { ?>
			<?php if (lui_CanBlog() == true) { ?>

				<a class="btn btn-mat my_articles_btn" href="<?php echo lui_SeoLink('index.php?link1=my-blogs'); ?>" data-ajax="?link1=my-blogs">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17,9H7V7H17M17,13H7V11H17M14,17H7V15H14M12,3A1,1 0 0,1 13,4A1,1 0 0,1 12,5A1,1 0 0,1 11,4A1,1 0 0,1 12,3M19,3H14.82C14.4,1.84 13.3,1 12,1C10.7,1 9.6,1.84 9.18,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3Z"></svg> <?php echo $wo['lang']['my_articles'] ?>
				</a>

			<?php } } ?>
			
		</div>
	</div>
	
	<div class="wow_main_blogs_bg"></div>
	
	<div class="wow_content wo_job_head_filter blogs">
		<div class="search-blog">
			<div class="main-blog-sidebar">
				<input type="text" placeholder="<?php echo $wo['lang']['search_for_article']?>" id="search-blog-input">
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
	
	<div id="blog-list" class="latest-blogs row">
		<?php
			$pages = lui_GetBlogs(array("category" => $_GET['id'],'limit' => 10));
			if (count($pages) > 0) {
				foreach ($pages as $wo['blog']) {
					echo lui_LoadPage('blog/includes/card-horiz-list');
				}
			} 
			else {
				echo '<div class="empty_state"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z" /></svg>' . $wo['lang']['no_blogs_found'] . '</div>';
			}
		?>
	</div>
	
	<div class="posts_load">
		<?php if (count($pages) >= 0): ?>
			<div class="load-more">
				<button class="btn btn-default text-center pointer load-more-blogs" id="hren"><?php echo $wo['lang']['load_more_blogs'] ?></button>
			</div>
		<?php endif ?>
	</div>
</div>

<script>
$('.wow_main_blogs_bg').css('height', ($('.wow_main_float_head').height()) + 'px');

jQuery(document).ready(function($) {
  var delay = (function(){
    var timer = 0;
    return function(callback, ms){
      clearTimeout (timer);
      timer = setTimeout(callback, ms);
    };
  })();

  $("#search-art").keyup(function() {
      delay(function(){
      if ($("#search-art").val().trim()) {
	      $.ajax({
	        url: Wo_Ajax_Requests_File(),
	        type: 'GET',
	        data: {f:"search-art",keyword:$("#search-art").val(),cat:'<?php echo $_GET['id']; ?>'},
	        dataType: "json",
	        success: function(data){
	          if (data['status'] == 200) {
	          	$(".latest-blogs").html(data['html'])
	          }else{
	          	$("#blog-list").html('<div class="empty_state"> ' + data['warning'] + '</div>')
	          }
	        }
	      })}
      }, 1000 );
  });

   $(".load-more-blogs").click(function () {
      $.ajax({
         url: Wo_Ajax_Requests_File(),
         type: 'GET',
         dataType: 'json',
         data: {f:"load-blogs",offset:($(".wow_main_blogs").length > 0) ? $(".wow_main_blogs:last").attr('id') : 0,id:<?php echo $_GET['id'] ?>},
         success:function(data){
            if (data['status'] == 200) {
            	$(".latest-blogs h5.search-filter-center-text").remove();
                $(".latest-blogs").append(data['html'])
             }else{
               $(".posts_load").remove()
             }
         }
      })
   });
});
</script>