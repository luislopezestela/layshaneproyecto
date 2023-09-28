
<div class="slider__item slider__nuevo_item not_seen_story ">

	<a class="see_all_stories" href="<?php echo $wo['product']['url'];?>" data-ajax="?link1=post&id=<?php echo $wo['product']['seo_id'];?>">
		<img width="100%" src="<?php echo $wo['product']['images'][0]['image_org'];?>" alt="<?php echo $wo['product']['name']; ?>">
		<p class="name_producto_ultimo" style="padding:0px 5px;margin-bottom:0;"><?php echo $wo['product']['name']; ?></p>
		<h4 style="text-align:center;width:100%;margin-top:0;margin-bottom:3px;"><?php echo (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?><?php echo $wo['product']['price_format']; ?></h4>
	</a>
</div>