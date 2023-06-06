<tr class="setting-banlist" id="currency_<?php echo $wo['currency_value']?>" >
   <td><?php echo $wo['currency_key']?></td>
   <td>
      <div>
         <?php echo $wo['currency_value'];?>
      </div>
   </td>
   <td>
     <?php echo $wo['config']['currency_symbol_array'][$wo['currency_value']] ?>
   </td>
   <td>
     <?php echo ($wo['currency_value'] == $wo['config']['currency']) ? '<span class="label label-success">Por defecto</span>': '';?>
   </td>
   <td>
     <?php echo (!empty($wo['config']['exchange']) && !empty($wo['config']['exchange'][$wo['currency_value']]) ? $wo['config']['exchange'][$wo['currency_value']] : '');?>
   </td>
   <td>
      <?php if ($wo['currency_value'] != $wo['config']['currency']) { ?><a href="javascript:void()" onclick="make_default('<?php echo $wo['currency_value']; ?>')" class="btn bg-success admn_table_btn">Set Default</a>  <?php  } ?>
      <a href="javascript:void()" onclick="open_edit_currency('<?php echo $wo['currency_value']; ?>','<?php echo($wo['config']['currency_symbol_array'][$wo['currency_value']]) ?>','<?php echo $wo['currency_key']?>')" class="btn bg-info admn_table_btn">Editar</a>
      <a href="javascript:void()" onclick="delete_currency('<?php echo $wo['currency_value']; ?>','hide')" class="btn bg-danger admn_table_btn">Eliminar</a>
   </td>
</tr>