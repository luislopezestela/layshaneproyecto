<div class="alert alert-dark announcement-<?php echo $wo['inactiveAnnouncement']['id'];?>">
   <span class="close announcements-option" data-toggle="tooltip" onclick="Wo_DeleteAnnouncement(<?php echo $wo['inactiveAnnouncement']['id'];?>);" title="<?php echo $wo['lang']['delete']; ?>">
   <i class="fa fa-trash"></i>
   </span>
   <span class="close announcements-option" style="margin-right: 20px;" data-toggle="tooltip" onclick="Wo_ActivateAnnouncement(<?php echo $wo['inactiveAnnouncement']['id'];?>);" title="<?php echo $wo['lang']['enable']; ?>">
   <i class="fa fa-check"></i>
   </span>
   <?php echo $wo['inactiveAnnouncement']['text'];?>
   <span class="time ajax-time" title="<?php echo date('c',$wo['inactiveAnnouncement']['time']); ?>">
   <?php echo lui_Time_Elapsed_String($wo['inactiveAnnouncement']['time']);?>
   </span>
   <span class="time">
    <?php echo $wo['lang']['views'] . ' ' . lui_GetAnnouncementViews($wo['inactiveAnnouncement']['id']);?>
   </span>
</div>