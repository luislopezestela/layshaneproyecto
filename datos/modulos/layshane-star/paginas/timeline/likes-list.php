<div class="col-xs-6 col-sm-4 nearby_user_wrapper text-center user-data" data-page-id="<?php echo $wo['PageList']['page_id'];?>">
  <a href="<?php echo $wo['PageList']['url'];?>" data-ajax="?link1=timeline&u=<?php echo $wo['PageList']['username']?>">
    <div class="avatar">
      <img src="<?php echo $wo['PageList']['avatar'];?>" alt="<?php echo $wo['PageList']['name']; ?>" />
    </div>
    <span class="user_wrapper_link"><?php echo $wo['PageList']['name']; ?></span>
  </a>
  <div class="user-lastseen">
    <?php echo $wo['lang']['category'];?>: <?php echo $wo['PageList']['category']; ?>
  </div>
  <div class="user-follow-button">
    <?php echo lui_GetLikeButton($wo['PageList']['page_id']);?>
  </div>
</div>