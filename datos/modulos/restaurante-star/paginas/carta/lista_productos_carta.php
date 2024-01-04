<?php $color_id = lui_buscar_color_en_opciones($wo['product']['images'][0]['id_color']); ?>
         <?php if(isset($color_id['id_color'])!=0): ?>
            <?php $buscar_el_color_por_id = lui_buscar_color_en_colores($color_id['id_color'])?>
            <?php $el_color = '/'.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
            <?php $el_color_b = '&opcion='.lui_SlugPost($wo['lang'][$buscar_el_color_por_id['lang_key']]); ?>
         <?php else: ?>
            <?php $el_color = ''; ?>
            <?php $el_color_b = ''; ?>
         <?php endif ?>
<div class="wo_my_products product" id="product_<?php echo $wo['product']['id'];?>" data-id="<?php echo $wo['product']['id']?>">
	<a href="<?php echo $wo['product']['url'].$el_color;?>" data-ajax="?link1=item&items=<?php echo $wo['product']['seo_id'].$el_color_b;?>">
      <div class="imagen_productos">
         <img src="<?php echo $wo['product']['images'][0]['image_org'];?>" alt="<?php echo $wo['product']['name']; ?>" />
      </div>
      <div class="produc_info">
         <div class="informations_item">
            <span title="<?php echo $wo['product']['name']; ?>"><?php echo $wo['product']['name']; ?></span>
            <p><?php echo html_entity_decode($wo['product']['description']);?></p>
         </div>
         <div class="buttons_prod_item">
            <h4><?php echo (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?><?php echo $wo['product']['price_format']; ?></h4>
            <span class="Btn_dorado">ORDENAR</span>
         </div>
         
         
      </div>
	</a>
</div>
