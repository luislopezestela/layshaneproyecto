<?php $color_id = lui_buscar_color_en_opciones($wo['product']['images'][0]['id_color']); ?>
         <?php if(isset($color_id['id_color'])!=0): ?>
            <?php $buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color'])?>
            <?php $el_color = '/'.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
            <?php $el_color_b = '&opcion='.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
         <?php else: ?>
            <?php $el_color = ''; ?>
            <?php $el_color_b = ''; ?>
         <?php endif ?>
<div class="wo_my_products columna_xs-6 columna_sm-4 columna-3" id="product_<?php echo $wo['product']['id'];?>">
	<a href="<?php echo $wo['product']['url'].$el_color;?>" data-ajax="?link1=item&items=<?php echo $wo['product']['seo_id'].$el_color_b;?>">
      <div class="avatar">
         <img src="<?php echo $wo['product']['images'][0]['image_org'];?>" alt="<?php echo $wo['product']['name']; ?>" />
      </div>
      <div class="produc_info">
      	 <span title="<?php echo $wo['product']['name']; ?>"><?php echo $wo['product']['name']; ?></span>
		 <h4><?php echo (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?><?php echo $wo['product']['price_format']; ?></h4>
      </div>
	</a>
   <?php if ($wo['loggedin'] && $wo['product']['user_id'] == $wo['user']['user_id']) { ?>
      <span onclick="RemoveUserProduct(<?php echo $wo['product']['id'];?>,'hide')" class="pointer product-list"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"></path></svg></span>
   <?php } ?>
</div>
