<?php if ($wo['story']['multi_image'] == 1) {
if ($wo['story']['blur'] == 1) { ?>
  <div class="post-file show_album_<?php echo $wo['story']['id']; ?> blur_multi_images" id="fullsizeimg">
    <button class='btn btn-main image_blur_btn remover_blur_btn_<?php echo $wo['story']['id']; ?>' onclick='Wo_RemoveBlurAlbum(this,<?php echo $wo['story']['id']; ?>)'><?php echo $wo['lang']['view_image']; ?></button>
        <img src="<?php echo(lui_GetMedia($wo['story']['photo_multi'][0]['image_org'])) ?>" alt='image' class='image-file pointer image_blur remover_blur_<?php echo $wo['story']['id']; ?>'>
      </div>
<?php }
 $class = '';
 $small = '';
 if (count($wo['story']['photo_multi']) == 2) {
      $class = 'width-2';
 }
 if (count($wo['story']['photo_multi']) > 1) {
      $small = '_small';
 }
 if (count($wo['story']['photo_multi']) > 2) {
      $class = 'width-3';
 }

if (count($wo['story']['photo_multi']) == 3) {
echo "<div class='wo_adaptive_media'>";
   foreach ($wo['story']['photo_multi'] as $photo) {
    $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
      if (!empty($photo['parent_id'])) {
        $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
      }
      echo  "<div class='album-image'><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='".$multi_image_function."'></div>";
   }
echo "</div>";
}

else if (count($wo['story']['photo_multi']) == 4) {
echo "<div class='wo_adaptive_media_4'>";
   foreach ($wo['story']['photo_multi'] as $photo) {
    $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
      if (!empty($photo['parent_id'])) {
        $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
      }
      echo  "<div class='album-image'><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='".$multi_image_function."'></div>";
   }
echo "</div>";
}

else if (count($wo['story']['photo_multi']) == 5) {
echo "<div class='wo_adaptive_media_5'>";
   foreach ($wo['story']['photo_multi'] as $photo) {
    $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
      if (!empty($photo['parent_id'])) {
        $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
      }
      echo  "<div class='album-image'><img src='" . lui_GetMedia($photo['image_org']) . "' alt='image' class='image-file pointer' onclick='".$multi_image_function."'></div>";
   }
echo "</div>";
}

 else if (count($wo['story']['photo_multi']) > 3) {
   foreach (array_slice($wo['story']['photo_multi'],0,3) as $key => $photo) {
    $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
      if (!empty($photo['parent_id'])) {
        $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
      }
    if ($key == 2) {
        echo "<div onclick='".$multi_image_function."' class='album-collapse pointer'> 
                  <img src='".lui_GetMedia($photo['image_org'])."' class='image-file'>
                  <span>+".count(array_slice($wo['story']['photo_multi'],2))."</span>
              </div>
              "; 
    }
    else{
      echo  "<img src='" . lui_GetMedia($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer' 
             onclick='".$multi_image_function."'>";
    }
    
   }
   foreach (array_slice($wo['story']['photo_multi'],3) as $photo) {
    $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
      if (!empty($photo['parent_id'])) {
        $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
      }
      echo  "<img src='" . lui_GetMedia($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer hidden' 
            onclick='".$multi_image_function."'>";
   }
 }
 elseif (count($wo['story']['photo_multi']) == 1) {
   foreach ($wo['story']['photo_multi'] as $photo) {
      $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
      if (!empty($photo['parent_id'])) {
        $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
      }
      echo  "<img src='" . $photo['image'] ."' alt='image' class='" . $class . " image-file pointer' 
            onclick='".$multi_image_function."'>";
    }
 }
else{
    foreach ($wo['story']['photo_multi'] as $photo) {
      $multi_image_function = "Wo_OpenAlbumLightBox(" . $photo['id'] . ", \"album\");";
      if (!empty($photo['parent_id'])) {
        $multi_image_function = "Wo_OpenLightBox(" . $photo['parent_id'] . ", \"album\");";
      }
      echo  "<img src='" . lui_GetMedia($photo['image_org']) ."' alt='image' class='" . $class . " image-file pointer' 
            onclick='".$multi_image_function."'>";
    }
 }
}
?>