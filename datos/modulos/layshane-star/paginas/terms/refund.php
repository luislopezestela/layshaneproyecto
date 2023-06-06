<div class="page-margin">
	<div class="wow_main_float_head contactus">
		<div class="container">
			<h1><?php echo $wo['lang']['refund']; ?></h1>
			<p class="text-center" style="margin: 15px 0 0;">
				<a class="btn btn-default btn-mat btn-refund" href="<?php echo lui_SeoLink('index.php?link1=refund');?>" data-ajax="?link1=refund">
					<svg  viewBox="0 0 24 24"><path fill="currentColor" d="M20 4H4C2.9 4 2 4.89 2 6V18C2 19.11 2.9 20 4 20H11.68C11.57 19.5 11.5 19 11.5 18.5C11.5 14.91 14.41 12 18 12C19.5 12 20.9 12.53 22 13.4V6C22 4.89 21.11 4 20 4M20 11H4V8H20V11M20.83 15.67L22 14.5V18.5H18L19.77 16.73C19.32 16.28 18.69 16 18 16C16.62 16 15.5 17.12 15.5 18.5S16.62 21 18 21C18.82 21 19.54 20.61 20 20H21.71C21.12 21.47 19.68 22.5 18 22.5C15.79 22.5 14 20.71 14 18.5S15.79 14.5 18 14.5C19.11 14.5 20.11 14.95 20.83 15.67Z" /></svg> <?php echo $wo['lang']['request_refund']; ?>
				</a>
			</p>
		</div>
	</div>
	
	<div class="wow_main_blogs_bg"></div>
	
	<div class="wow_content wo_terms_page">
		<div class="setting-well">
			<?php echo $wo['lang']['refund_terms_page'];?>
		</div>
	</div>
</div>

<script>
$('.wow_main_blogs_bg').css('height', ($('.wow_main_float_head').height()) + 'px');
</script>