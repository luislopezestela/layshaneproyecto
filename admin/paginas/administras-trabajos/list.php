<tr class="setting-postlist" id="PostID_<?php echo $wo['story']->id?>" data-post-id="<?php echo $wo['story']->id?>" data_selected="<?php echo $wo['story']->id ?>">
   <td><input type="checkbox" id="check-data-<?php echo $wo['story']->id?>" class="delete-checkbox filled-in"><label for="check-data-<?php echo $wo['story']->id?>"></label></td>
   <td><?php echo $wo['story']->id?></td>
   <td>
      <a href="<?php echo $wo['story']->publisher['url']; ?>">
      <img src="<?php echo $wo['story']->publisher['avatar']?>" class="setting-avatar" alt="<?php echo $wo['story']->publisher['avatar']?> Foto de perfil">
      <?php echo $wo['story']->publisher['name']; ?>
      </a>
   </td>
   <td><?php echo $wo['story']->job['title'];?></td>
   <td><a href="<?php echo $wo['story']->job['url'];?>" target="_blank"><?php echo $wo['lang']['open_post'];?></a></td>
   <td>
      <div class="ajax-time" title="<?php echo date('c',$wo['story']->time); ?>">
         <?php echo lui_Time_Elapsed_String($wo['story']->time);?>
      </div>
   </td>
   <td>
      <button onclick="Wo_AdminDeletePost(<?php echo $wo['story']->id?>,'hide');" type="button" class="btn bg-danger admn_table_btn">Eliminar</button>
   </td>
</tr>