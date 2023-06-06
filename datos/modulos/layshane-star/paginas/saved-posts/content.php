<div class="page-margin">
	<div class="">
		<div class="col-md-2 leftcol"><?php echo lui_LoadPage("sidebar/left-sidebar"); ?></div>
		<div class="col-md-7 middlecol">
			<div class="page-margin wow_content mt-0">
				<div class="wo_page_hdng pag_neg_padd pag_alone">
					<div class="wo_page_hdng_innr big_size">
						<?php echo $wo['lang']['saved']; ?>
					</div>
				</div>
			</div>
			
			<div class="saved-posts">
				<?php
					$stories = lui_GetSavedPosts($wo['user']['user_id']);
					if (count($stories) <= 0) {
						echo lui_LoadPage('saved-posts/no-posts');
					} else {
						foreach ($stories as $wo['story']) {
							echo lui_LoadPage('story/content');
						}
					}
				?>
			</div>
		</div>
		<?php echo lui_LoadPage('sidebar/content');?>
	</div>
</div>