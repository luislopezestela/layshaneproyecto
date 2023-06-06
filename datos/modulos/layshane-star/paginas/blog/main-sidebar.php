<?php 
function lui_GetPopularBlogs($limit) {
    global $sqlConnect, $wo;
    $data = array();
    $query  = mysqli_query($sqlConnect, "SELECT * FROM  " . T_BLOG . "  
                                         ORDER BY `view` DESC LIMIT $limit");
    while ($fetched_data = mysqli_fetch_assoc($query)) {
        $data[] = lui_GetArticle($fetched_data['id']);
    }
    return $data;
}
?>
<div class="main-blog-sidebar">
	<!-- Search system -->
	<div class="widget search-blog">
		<div class="wo_page_hdng">
			<div class="wo_page_hdng_innr">
				<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z"></path></svg></span> <?php echo $wo['lang']['search'];?>
			</div>
		</div>
		<div class="wow_form_fields">
			<input type="text" placeholder="<?php echo $wo['lang']['keyword']?>" id="search-blog-input">
			<ul class="popular-articles search_suggs" id="recent-blogs-search"></ul>
		</div>
	</div>

	<!--Popular Posts-->
	<div class="widget">
		<div class="wo_page_hdng">
			<div class="wo_page_hdng_innr">
				<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M20,11H4V8H20M20,15H13V13H20M20,19H13V17H20M11,19H4V13H11M20.33,4.67L18.67,3L17,4.67L15.33,3L13.67,4.67L12,3L10.33,4.67L8.67,3L7,4.67L5.33,3L3.67,4.67L2,3V19A2,2 0 0,0 4,21H20A2,2 0 0,0 22,19V3L20.33,4.67Z"></path></svg></span> <?php echo $wo['lang']['popular_posts'];?>
			</div>
		</div>
		<ul class="popular-articles">
		<?php 
		$blogs = lui_GetPopularBlogs(5);
		foreach ($blogs as $key => $wo['blog-style']) {
			echo lui_LoadPage('blog/blog-popular');
		}
		?>
		</ul>
	</div>
	<?php if ($wo['config']['user_ads'] == 1 && $wo['loggedin']): ?>
	<div class="widget sidebar">
        <?php 
            foreach (lui_GetSideBarAds() as $wo['sidebar-ad']) {
                echo lui_LoadPage('ads/includes/sidebar-ad');
            }
        ?>
        <div class="clear"></div>
    </div>
    <?php endif; ?>
	
	<!--Categories-->
	<div class="widget">
		<div class="wo_page_hdng">
			<div class="wo_page_hdng_innr">
				<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M5.5,7A1.5,1.5 0 0,1 4,5.5A1.5,1.5 0 0,1 5.5,4A1.5,1.5 0 0,1 7,5.5A1.5,1.5 0 0,1 5.5,7M21.41,11.58L12.41,2.58C12.05,2.22 11.55,2 11,2H4C2.89,2 2,2.89 2,4V11C2,11.55 2.22,12.05 2.59,12.41L11.58,21.41C11.95,21.77 12.45,22 13,22C13.55,22 14.05,21.77 14.41,21.41L21.41,14.41C21.78,14.05 22,13.55 22,13C22,12.44 21.77,11.94 21.41,11.58Z"></path></svg></span> <?php echo $wo['lang']['categories'];?>
			</div>
		</div>
		<ul class="popular-categories">
			<?php 
				$category_id = (!empty($_GET['id'])) ? (int) $_GET['id'] : 0;
				foreach ($wo['blog_categories'] as $key => $category) {
			?>
			<li>
				<a href="<?php echo lui_SeoLink('index.php?link1=blog-category&id=' . $key) ?>" data-ajax="?link1=blog-category&id=<?php echo $key?>"><?php echo $category;?></a>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>

<script>
$('#search-blog-input').keyup(function(event) {
	$keyword = $(this).val();
	$('#load-search-icon').removeClass('hidden');
	$.post(Wo_Ajax_Requests_File() + '?f=search-blog-read', {keyword: $keyword}, function(data, textStatus, xhr) {
		if (data.status == 200) {
			$('#recent-blogs-search').html(data.html);
		} else {
			$('#recent-blogs-search').html('<div class="text-center">' + data.message + '</div>');
		}
		$('#load-search-icon').addClass('hidden');
	});
});
</script>