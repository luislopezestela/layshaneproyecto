<?php

if (strlen($wo['page_message']['message']['text']) > 100) {
   $wo['page_message']['message']['text'] = mb_substr( $wo['page_message']['message']['text'], 0, 97, "utf-8") . '...';
}
$unread_class = '';
if (!empty($wo['page_message']['message']) && isset($wo['page_message']['message']['time']) && isset($wo['page_message']['message']['from_id']) && $wo['page_message']['message']['from_id'] != $wo['user']['id']) {
   if ($wo['page_message']['message']['time'] > $wo['user']['lastseen']) {
       $unread_class = ' unread';
   }
}


$page_info = lui_PageData($wo['page_message']['message']['page_id']);
if ($page_info['user_id'] == $wo['page_message']['message']['from_id']) {
   $message_event = "Wo_OpenChatTab(0,0,0,".$wo['page_message']['message']['page_id'].",".$wo['page_message']['message']['to_id'].");";
}
else{
   $message_event = "Wo_OpenChatTab(0,0,0,".$wo['page_message']['message']['page_id'].",".$wo['page_message']['message']['from_id'].");";
}
$avatar = $page_info['avatar'];
$name = $page_info['page_name'];
if ($page_info['is_page_onwer'] == 1) {
   if ($page_info['user_id'] != $wo['page_message']['message']['from_id']) {
      $user_info = lui_UserData($wo['page_message']['message']['from_id']);
   }
   else{
      $user_info = lui_UserData($wo['page_message']['message']['to_id']);
   }
   
   $avatar = $user_info['avatar'];
   $name = $user_info['name'].' ('.$page_info['page_name'].')';
}
$wo['page_message']['message']['text'] = lui_Emo($wo['page_message']['message']['text']);
?>
<li>
   <div class="notification-list messages-list <?php echo $unread_class;?>" onclick="<?php echo $message_event ?>">
         <div class="notification-user-avatar <?php echo lui_RightToLeft('pull-left');?>">
            <img src="<?php echo $avatar;?>" alt="<?php echo $name; ?> Profile picture">
         </div>
         <div class="notification-text">
			<div class="notification-time active <?php echo lui_RightToLeft('pull-right');?>">
               <div class="ajax-time" title="<?php echo (!empty($wo['page_message']['message']['time'])) ? date('c',$wo['page_message']['message']['time']) : '';?>">
                <?php echo (!empty($wo['page_message']['message']['time'])) ? lui_Time_Elapsed_String($wo['page_message']['message']['time']) : '';?>
               </div>
            </div>
            <span class="main-color">
            <?php echo $name; ?>
            </span>
            <?php if (!empty($wo['page_message']['message']['from_id'])): ?>
            <div class="header-message">
                  <?php echo ($wo['user']['id'] == $wo['page_message']['message']['from_id']) ? $wo['lang']['me'] . ': ' : '';?>
                  <?php echo (!empty($wo['page_message']['message']['media'])) ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg> ' . $wo['lang']['file_n_label'] : $wo['page_message']['message']['text']; ?>
            </div>
            <?php endif ?>
         </div>
         <div class="clear"></div>
   </div>
</li>
<li class="divider"></li>