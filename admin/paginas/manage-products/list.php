<tr class="setting-event" id="list_<?php echo $wo['product']['post_id'] ?>" data_selected="<?php echo $wo['product']['post_id'] ?>">
  <td><input type="checkbox" id="check-data-<?php echo $wo['product']['post_id'] ?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo $wo['product']['post_id'] ?>"></label></td>
   <td><?php echo $wo['product']['id'] ?></td>
   <td>
    <?=lui_Secure($wo['product']['name']); ?>
   </td>
   <td>
    <?=$wo['product']['price']; ?>
   </td>
   <td>
    <?php echo $wo['product']['units']; ?>
   </td>
   <?php if(lui_IsAdmin()): ?>
     <td>
        <button type="button" class="delete-event btn bg-danger admn_table_btn" id="<?php echo $wo['product']['post_id'] ?>" onclick="DeleteProduct(<?php echo $wo['product']['post_id'] ?>,'hide')">Eliminar</button>
        <?php if ($wo['product']['active'] == 0) { ?>
          <button type="button" class="delete-event btn bg-info admn_table_btn" id="<?php echo $wo['product']['id'] ?>" onclick="ActivateProduct(<?php echo $wo['product']['id'] ?>,'hide')">Activar</button>
        <?php } ?>


        <a class="delete-event btn bg-success admn_table_btn" id="<?php echo $wo['product']['id'] ?>" href="<?php echo lui_SeoLink('index.php?link1=edit-product&id=' . $wo['product']['id']);?>">Editar</a>
     </td>
   <?php endif ?>

</tr>
