<?php if(!empty($wo['story']['postYoutube'])) {  ?>
<div class="post-youtube wo_video_post">
  <iframe id="ytplayer" type="text/html" width="100%" height="340" src="https://www.youtube.com/embed/<?php echo $wo['story']['postYoutube']; ?>?autoplay=0"
    frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen/></iframe>
</div>
<?php } ?>
<?php if(!empty($wo['story']['postPlaytube'])) {  ?>
<div class="post-youtube wo_video_post">
  <iframe id="ptplayer" type="text/html" width="100%" height="340" src="<?php echo $wo['config']['playtube_url']; ?>/embed/<?php echo $wo['story']['postPlaytube']; ?>?autoplay=0&fullscreen=1"
    frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen/></iframe>
</div>
<?php } ?>
<?php if(!empty($wo['story']['postDeepsound'])) {  ?>
<div class="post-youtube wo_video_post">
  <iframe id="ptplayer" type="text/html" width="100%" height="340" src="<?php echo $wo['config']['deepsound_url']; ?>/embed/<?php echo $wo['story']['postDeepsound']; ?>?autoplay=0&fullscreen=1"
    frameborder="0" style="height: 140px !important;"/></iframe>
</div>
<?php } ?>
<?php if(!empty($wo['story']['postVimeo'])) {  ?>
<div class="post-youtube wo_video_post">
  <iframe src="https://player.vimeo.com/video/<?php echo $wo['story']['postVimeo'];?>?byline=0&portrait=0" width="100%" height="340" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</div>
<?php } ?>
<?php if(!empty($wo['story']['postFacebook'])) {  ?>
<script>
// window.fbAsyncInit = function() {
		  
// 		};
FB.init({
      appId      : '',
      xfbml      : true,
      version    : 'v3.2'
      });
</script>
<!-- <script crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script> -->
<div id="fb-root"></div>
<div class="fb-post" data-href="<?php echo $wo['story']['postFacebook'];?>" data-width="500"></div>
<div class="clear"></div>

<?php } ?>
<?php if(!empty($wo['story']['postDailymotion'])) {  ?>
<div class="post-youtube wo_video_post">
  <iframe frameborder="0" width="100%" height="340" src="https://www.dailymotion.com/embed/video/<?php echo $wo['story']['postDailymotion']?>" allowfullscreen></iframe>
</div>


<?php } ?>
<?php if(!empty($wo['story']['postVine'])) {  ?>
<iframe src="https://vine.co/v/<?php echo $wo['story']['postVine']; ?>/embed/simple" width="100%" height="400" frameborder="0"></iframe>
<?php } ?>
<?php if(!empty($wo['story']['postSoundCloud'])) { ?>
<iframe width="100%" src="https://w.soundcloud.com/player/?url=https://api.soundcloud.com/tracks/<?php echo $wo['story']['postSoundCloud'];?>&auto_play=false"></iframe>
<?php } ?>