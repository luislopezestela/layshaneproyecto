<?php if ($wo['config']['second_post_button'] == 'reaction') { ?>
	<!-- reaction -->
	<?php if ( isset($wo['story']['viewmode']) && $wo['story']['viewmode'] == 'lightbox') { ?>
    <div class="wo-reaction wo-reaction-lightbox stat-item unselectable" data-id="<?php echo $wo['story']['id']; ?>">
		<span class="like-btn like-btn-lightbox unselectable" data-id="<?php echo $wo['story']['id']; ?>" >
			<?php
				if ($wo['loggedin'] && lui_IsReacted($wo['story']['id'], $wo['user']['user_id']) === true) {    
					echo lui_GetReactedTextIcon($wo['story']['id'], $wo['user']['user_id']);
				} else {   
					echo '<span class="status-reaction-'.$wo['story']['id'].' unselectable"><svg xmlns="http://www.w3.org/2000/svg" width="58.553" height="58.266" viewBox="0 0 58.553 58.266" class="feather"> <path d="M-7080.317,1279.764l-26.729-1.173a1.657,1.657,0,0,1-1.55-1.717l1.11-33.374a4.112,4.112,0,0,1,2.361-3.6l.014-.005a13.62,13.62,0,0,1,1.978-.363h.007a9.007,9.007,0,0,0,3.249-.771c2.645-1.845,3.973-4.658,5.259-7.378l.005-.013.031-.061.059-.13.012-.023c.272-.576.61-1.289.944-1.929l0-.007c.576-1.105,2.327-4.46,4.406-5.107a2.3,2.3,0,0,1,.59-.105c.036,0,.072,0,.109,0a2.55,2.55,0,0,1,1.212.324c2.941,1.554,1.212,7.451.561,9.672a38.306,38.306,0,0,1-3.7,8.454l-.71,1.218,18.363.808a3.916,3.916,0,0,1,3.784,3.735,3.783,3.783,0,0,1-1.123,2.834,3.629,3.629,0,0,1-2.559,1.055c-.046,0-.1,0-.145,0h-.027l-2.141-.093-9.331-.41-.075,1.7,9.333.408a3.721,3.721,0,0,1,2.666,1.3,3.855,3.855,0,0,1,.936,2.934,3.779,3.779,0,0,1-3.821,3.38c-.061,0-.122,0-.181-.005l-1.974-.082-8.9-.392-.075,1.7,8.9.39a3.723,3.723,0,0,1,2.666,1.3,3.86,3.86,0,0,1,.937,2.933,3.784,3.784,0,0,1-3.827,3.381c-.057,0-.118,0-.177,0l-1.976-.088-8.472-.372-.075,1.7,8.474.372a3.726,3.726,0,0,1,2.666,1.3,3.857,3.857,0,0,1,.935,2.933,3.782,3.782,0,0,1-3.827,3.381C-7080.2,1279.765-7080.26,1279.765-7080.317,1279.764Zm-38.4,0-.089,0a6.558,6.558,0,0,1-6.193-6.8l.907-27.293a6.446,6.446,0,0,1,2.074-4.553,6.214,6.214,0,0,1,3.954-1.672c.081,0,.17-.005.29-.005s.212,0,.292.005a6.561,6.561,0,0,1,6.192,6.8l-.907,27.293a6.441,6.441,0,0,1-2.072,4.547,6.249,6.249,0,0,1-4.261,1.681Z" transform="translate(7126.251 -1222.75)" fill="none" stroke="currentColor" stroke-width="2.5"/> </svg> <span class="t_likes'.$wo['story']['id'].'"></span> ' . $wo['lang']['like'] . '</span>';   
				}    
			?>
		</span>
		<ul class="reactions-box reactions-lightbox-container-<?php echo $wo['story']['id']; ?> unselectable" data-id="<?php echo $wo['story']['id']; ?>" style="<?php if ($wo['language_type'] == 'rtl') {?> left: auto; <?php }else{ ?> right: auto; <?php }?>">

			<?php if (!empty($wo['reactions_types'])) {
			    foreach ($wo['reactions_types'] as $key => $value) {
			    	if ($value['status'] == 1) {
			    		
			     ?>
				<li class="reaction reaction-<?php echo $value['id'];?>" data-reaction="<?php echo $value['name'];?>" data-reaction-id="<?php echo $value['id'];?>" data-reaction-lang="<?php echo $value['name'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterReaction(this,'<?php echo($value['layshane_star_small_icon']) ?>',<?php echo($value['is_html']) ?>);">
					<?php if (preg_match("/<[^<]+>/",$value['layshane_star'],$m)) {
						  	echo($value['layshane_star']);
						 }
						 else{ ?>
				     	<img src="<?php echo($value['layshane_star']) ?>">
				    <?php } ?>
				</li>
			<?php } } } ?>



			<!-- <li class="reaction reaction-like" data-reaction="Like" data-reaction-lang="<?php echo $wo['lang']['like'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterReaction(this);">
				<div class="emoji emoji--like">
					<div class="emoji__hand"><div class="emoji__thumb"></div></div>
				</div>
			</li>
			<li class="reaction reaction-love" data-reaction="Love" data-reaction-lang="<?php echo $wo['lang']['love'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterReaction(this);">
				<div class="emoji emoji--love">
					<div class="emoji__heart"></div>
				</div>
			</li>
			<li class="reaction reaction-haha" data-reaction="HaHa" data-reaction-lang="<?php echo $wo['lang']['haha'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterReaction(this);">
				<div class="emoji emoji--haha">
					<div class="emoji__face">
						<div class="emoji__eyes"></div>
						<div class="emoji__mouth">
							<div class="emoji__tongue"></div>
						</div>
					</div>
				</div>
			</li>
			<li class="reaction reaction-wow" data-reaction="Wow" data-reaction-lang="<?php echo $wo['lang']['wow'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterReaction(this);">
				<div class="emoji emoji--wow">
					<div class="emoji__face">
						<div class="emoji__eyebrows"></div>
						<div class="emoji__eyes"></div>
						<div class="emoji__mouth"></div>
					</div>
				</div>
			</li>
			<li class="reaction reaction-sad" data-reaction="Sad" data-reaction-lang="<?php echo $wo['lang']['sad'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterReaction(this);">
				<div class="emoji emoji--sad">
					<div class="emoji__face">
						<div class="emoji__eyebrows"></div>
						<div class="emoji__eyes"></div>
						<div class="emoji__mouth"></div>
					</div>
				</div>
			</li>
			<li class="reaction reaction-angry" data-reaction="Angry" data-reaction-lang="<?php echo $wo['lang']['angry'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterReaction(this);">
				<div class="emoji emoji--angry">
					<div class="emoji__face">
						<div class="emoji__eyebrows"></div>
						<div class="emoji__eyes"></div>
						<div class="emoji__mouth"></div>
					</div>
				</div>
			</li> -->
		</ul>
	</div>
	
	<?php } else { ?>

	<div class="wo-reaction wo-reaction-post stat-item unselectable" data-id="<?php echo $wo['story']['id']; ?>">
		<span class="like-btn like-btn-post unselectable"  data-id="<?php echo $wo['story']['id']; ?>" id="react_<?php echo $wo['story']['id']; ?>" <?php if ($wo['loggedin'] && lui_IsReacted($wo['story']['id'], $wo['user']['user_id'])) { ?> data_react="1" <?php }else{ ?> data_react="0"<?php } ?> data-reaction-id="<?php echo $wo['reactions_types'][1]['id'];?>"  data-reaction="Like" data-reaction-lang="<?php echo $wo['lang']['like'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterReactionLike(this,'<?php echo($wo['reactions_types'][1]['layshane_star_small_icon']) ?>',<?php echo($wo['reactions_types'][1]['is_html']) ?>);">
			<?php
				if ($wo['loggedin'] && lui_IsReacted($wo['story']['id'], $wo['user']['user_id']) === true) {    
					echo lui_GetReactedTextIcon($wo['story']['id'], $wo['user']['user_id']);
				} else {   
					echo '<span class="status-reaction-'.$wo['story']['id'].' unselectable"><svg xmlns="http://www.w3.org/2000/svg" width="58.553" height="58.266" viewBox="0 0 58.553 58.266" class="feather"> <path d="M-7080.317,1279.764l-26.729-1.173a1.657,1.657,0,0,1-1.55-1.717l1.11-33.374a4.112,4.112,0,0,1,2.361-3.6l.014-.005a13.62,13.62,0,0,1,1.978-.363h.007a9.007,9.007,0,0,0,3.249-.771c2.645-1.845,3.973-4.658,5.259-7.378l.005-.013.031-.061.059-.13.012-.023c.272-.576.61-1.289.944-1.929l0-.007c.576-1.105,2.327-4.46,4.406-5.107a2.3,2.3,0,0,1,.59-.105c.036,0,.072,0,.109,0a2.55,2.55,0,0,1,1.212.324c2.941,1.554,1.212,7.451.561,9.672a38.306,38.306,0,0,1-3.7,8.454l-.71,1.218,18.363.808a3.916,3.916,0,0,1,3.784,3.735,3.783,3.783,0,0,1-1.123,2.834,3.629,3.629,0,0,1-2.559,1.055c-.046,0-.1,0-.145,0h-.027l-2.141-.093-9.331-.41-.075,1.7,9.333.408a3.721,3.721,0,0,1,2.666,1.3,3.855,3.855,0,0,1,.936,2.934,3.779,3.779,0,0,1-3.821,3.38c-.061,0-.122,0-.181-.005l-1.974-.082-8.9-.392-.075,1.7,8.9.39a3.723,3.723,0,0,1,2.666,1.3,3.86,3.86,0,0,1,.937,2.933,3.784,3.784,0,0,1-3.827,3.381c-.057,0-.118,0-.177,0l-1.976-.088-8.472-.372-.075,1.7,8.474.372a3.726,3.726,0,0,1,2.666,1.3,3.857,3.857,0,0,1,.935,2.933,3.782,3.782,0,0,1-3.827,3.381C-7080.2,1279.765-7080.26,1279.765-7080.317,1279.764Zm-38.4,0-.089,0a6.558,6.558,0,0,1-6.193-6.8l.907-27.293a6.446,6.446,0,0,1,2.074-4.553,6.214,6.214,0,0,1,3.954-1.672c.081,0,.17-.005.29-.005s.212,0,.292.005a6.561,6.561,0,0,1,6.192,6.8l-.907,27.293a6.441,6.441,0,0,1-2.072,4.547,6.249,6.249,0,0,1-4.261,1.681Z" transform="translate(7126.251 -1222.75)" fill="none" stroke="currentColor" stroke-width="2.5"/> </svg> <span class="t_likes'.$wo['story']['id'].'"></span> ' . $wo['lang']['like'] . '</span>';   
				}    
			?>
		</span>
		<ul class="reactions-box reactions-box-container-<?php echo $wo['story']['id']; ?>" data-id="<?php echo $wo['story']['id']; ?>" style="<?php if ($wo['language_type'] == 'rtl') {?> left: auto; <?php }else{ ?> right: auto; <?php }?>">
			<?php if (!empty($wo['reactions_types'])) {
			    foreach ($wo['reactions_types'] as $key => $value) {
			    	if ($value['status'] == 1) {
			    		
			     ?>
				<li class="reaction reaction-<?php echo $value['id'];?>" data-reaction="<?php echo $value['name'];?>" data-reaction-id="<?php echo $value['id'];?>" data-reaction-lang="<?php echo $value['name'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterReaction(this,'<?php echo($value['layshane_star_small_icon']) ?>',<?php echo($value['is_html']) ?>);">
					<?php if (preg_match("/<[^<]+>/",$value['layshane_star'],$m)) {
						  	echo($value['layshane_star']);
						 }
						 else{ ?>
				     	<img src="<?php echo($value['layshane_star']) ?>">
				    <?php } ?>
				</li>
			<?php } } } ?>



			<!-- <li class="reaction reaction-like animated_2" data-reaction="Like" data-reaction-lang="<?php echo $wo['lang']['like'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterReaction(this);">
				<div class="emoji emoji--like">
					<div class="emoji__hand"><div class="emoji__thumb"></div></div>
				</div>
			</li>
			<li class="reaction reaction-love animated_4" data-reaction="Love" data-reaction-lang="<?php echo $wo['lang']['love'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterReaction(this);">
				<div class="emoji emoji--love">
					<div class="emoji__heart"></div>
				</div>
			</li>
			<li class="reaction reaction-haha animated_6" data-reaction="HaHa" data-reaction-lang="<?php echo $wo['lang']['haha'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterReaction(this);">
				<div class="emoji emoji--haha">
					<div class="emoji__face">
						<div class="emoji__eyes"></div>
						<div class="emoji__mouth">
							<div class="emoji__tongue"></div>
						</div>
					</div>
				</div>
			</li>
			<li class="reaction reaction-wow animated_8" data-reaction="Wow" data-reaction-lang="<?php echo $wo['lang']['wow'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterReaction(this);">
				<div class="emoji emoji--wow">
					<div class="emoji__face">
						<div class="emoji__eyebrows"></div>
						<div class="emoji__eyes"></div>
						<div class="emoji__mouth"></div>
					</div>
				</div>
			</li>
			<li class="reaction reaction-sad animated_10" data-reaction="Sad" data-reaction-lang="<?php echo $wo['lang']['sad'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterReaction(this);">
				<div class="emoji emoji--sad">
					<div class="emoji__face">
						<div class="emoji__eyebrows"></div>
						<div class="emoji__eyes"></div>
						<div class="emoji__mouth"></div>
					</div>
				</div>
			</li>
			<li class="reaction reaction-angry animated_12" data-reaction="Angry" data-reaction-lang="<?php echo $wo['lang']['angry'];?>" data-post-id="<?php echo $wo['story']['id']; ?>" onclick="Wo_RegisterReaction(this);">
				<div class="emoji emoji--angry">
					<div class="emoji__face">
						<div class="emoji__eyebrows"></div>
						<div class="emoji__eyes"></div>
						<div class="emoji__mouth"></div>
					</div>
				</div>
			</li> -->
		</ul>
	</div>
	<?php } ?>

<?php }else{ ?>

  <!-- Normal Like -->
  <span <?php echo(PatreonPostSubscribed($wo['story']['user_id'],$wo['story']['id']) ? 'onclick="Wo_RegisterLike('.$wo['story']['id'].');"' : '') ?> id="like-button" class="btn btn-default stat-item" title="<?php echo $wo['lang']['like'];?>">
  <?php
	  $second_btn_wonder = ($wo['config']['second_post_button'] == 'dislike') ? $wo['lang']['dislike'] : $wo['lang']['wonder'];
	  $second_btn_wondered = ($wo['config']['second_post_button'] == 'dislike') ? $wo['lang']['disliked'] : $wo['lang']['wondered'];
	  if ($wo['story']['is_liked'] === true) {    
	    echo GetModeBtn('liked_btn');  
	  } else {   
	    echo GetModeBtn('like_btn');
	  } 
  ?>
  </span>
  <?php if ($wo['config']['second_post_button'] != 'disabled') { ?>
  <span <?php echo(PatreonPostSubscribed($wo['story']['user_id'],$wo['story']['id']) ? 'onclick="Wo_RegisterWonder('.$wo['story']['id'].');"' : '') ?> id="wonder-button" class="btn btn-default stat-item" title="<?php echo $wo['second_post_button_text'];?>">
  <?php 
  if ($wo['story']['is_wondered'] === true) {  
    echo '<span class="active-wonder">' . $wo['second_post_button_icon'] . '<span class="like-btn-mobile">' . $second_btn_wondered . '</span></span>'; 
  } else {    
    echo '' . $wo['second_post_button_icon'] . ' <span class="like-btn-mobile">' . $second_btn_wonder . '</span>';
  }
  ?>          
  </span>
  <?php } ?>

<?php } ?>