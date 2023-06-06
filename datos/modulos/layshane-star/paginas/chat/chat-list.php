<?php 
$chat_id = $wo['chatMessage']['to_id'];
if ($wo['chatMessage']['from_id'] != $wo['user']['user_id']) {
	$chat_id = $wo['chatMessage']['from_id'];
} ?>
<div class="messages-wrapper <?php echo ($wo['chatMessage']['onwer'] == 1) ? 'pull-right' : 'pull-left';?> messages-text" id="messageId_<?php echo $wo['chatMessage']['id'] ?>" data-message-id="<?php echo $wo['chatMessage']['id'] ?>"  display="<?php echo ($wo['config']['node_socket_flow'] == "1") ? "hidden" : "visible" ?>">
	<?php if ($wo['chatMessage']['onwer'] == 0) { ?>
		<a href="<?php echo lui_SeoLink('index.php?link1=timeline&u='.$wo['chatMessage']['messageUser']['username']);?>" data-ajax="?link1=timeline&u=<?php echo $wo['chatMessage']['messageUser']['username']?>">
			<img class="user-avatar<?php echo ($wo['chatMessage']['onwer'] == 1) ? '-right' : '-left';?>" src="<?php echo $wo['chatMessage']['messageUser']['avatar'] ?>" alt="Profile Picture">
		</a>
	<?php } ?>
	<div class="message <?php if (!empty($wo['chatMessage']['product_id'])) {$wo['product'] = lui_GetProduct($wo['chatMessage']['product_id']);if (!empty($wo['product'])) {?>wo_msg_prod_prnt<?php } } ?> <?php echo ($wo['chatMessage']['onwer'] == 1) ? 'outgoing pull-right' : 'incoming pull-left';?>" onclick="Wo_ShowMessageOptions(<?php echo $wo['chatMessage']['id'] ?>);">
		<?php if (!empty($wo['chatMessage']['text'])): ?>
			<div class="message-text" id="message_text_reply_<?php echo $wo['chatMessage']['id'] ?>" dir="auto" style="background: <?php echo ($wo['chatMessage']['onwer'] == 1 && isset($wo['chat']['color'])) ? $wo['chat']['color'] . ' !important;' : '';?>;<?php echo ($wo['chatMessage']['onwer'] == 1) ? ' color:#fff !important;' : '';?>">
				<?php if($wo['chatMessage']['type_two'] == 'contact'): 
					$json = json_decode(trim(htmlspecialchars_decode($wo['chatMessage']['text'])), true);
					echo $json['Value'] . ' (' . $json['Key'] . ')';
				?>
				<?php else: echo $wo['chatMessage']['text']; endif;?>
				<!-- <div class="deleteMessage <?php echo ($wo['chatMessage']['onwer'] == 0) ? 'right': '';?>" onclick="Wo_DeleteChatMessage(<?php echo $wo['chatMessage']['id'] ?>);">
				  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
				</div> -->
				<div class="deleteMessage <?php echo ($wo['chatMessage']['onwer'] == 0) ? 'right': '';?>" style="<?php echo ($wo['chatMessage']['onwer'] == 0) ? 'right:-25px;': 'left: -25px;';?>" onclick="Wo_ReplyChatMessage(<?php echo $chat_id; ?>,<?php echo $wo['chatMessage']['id'] ?>);">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M10,9V5L3,12L10,19V14.9C15,14.9 18.5,16.5 21,20C20,15 17,10 10,9Z" /></svg>
				</div>
				<?php if ($wo['chatMessage']['onwer'] == 0) { ?>
				<div class="deleteMessage messages-reactions <?php echo ($wo['chatMessage']['onwer'] == 0) ? 'right': '';?>" style="<?php echo ($wo['chatMessage']['onwer'] == 0) ? 'right:-50px;': 'left: -50px;';?>" data-message-id="<?php echo $wo['chatMessage']['id'] ?>">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="feather"><path fill="currentColor" d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23M15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5C17,10.3 16.3,11 15.5,11Z" /></svg>
				</div>
				<?php } ?>
				<?php if (!empty($wo['chatMessage']['reply_id']) && !empty($wo['chatMessage']['reply'])) { ?>
			<div class="wo_reply_msg_bg">
				<p class="message-text" dir="auto"><?php echo $wo['chatMessage']['reply']['text'] ?></p>
				<div class="message-media">
				<div class="clear"></div>
				<?php
					if (isset($wo['chatMessage']['reply']['media']) && !empty($wo['chatMessage']['reply']['media'])) {
						$media = array(
							'type' => 'message',
							'storyId' => $wo['chatMessage']['reply']['id'],
							'filename' => $wo['chatMessage']['reply']['media'],
							'name' => $wo['chatMessage']['reply']['mediaFileName']
						);
						echo lui_DisplaySharedFile($media, 'message');
					}
				?>
				<?php if (!empty($wo['chatMessage']['reply']['stickers'])): ?>
				<?php if (strpos('.mp4', $wo['chatMessage']['reply']['stickers'])) { ?>
					<video autoplay loop><source src="<?php echo $wo['chatMessage']['reply']['stickers']; ?>" type="video/mp4"></video>
				<?php } else { ?>
					<img src="<?php echo $wo['chatMessage']['reply']['stickers']; ?>" alt="GIF">
				<?php } ?>
				<?php endif; ?>

				<?php if (!empty($wo['chatMessage']['reply']['product_id'])) { 
					$wo['product'] = lui_GetProduct($wo['chatMessage']['reply']['product_id']);
					if (!empty($wo['product'])) {
				?>
					<div class="wo_market">
						<div class="market_bottom">
							<div class="products">
								<div class="product" id="product-<?php echo $wo['product']['id']?>" data-id="<?php echo $wo['product']['id']?>">
									<div class="product_info">
										<div class="product-image">
											<a href="<?php echo $wo['product']['url']?>"><img src="<?php echo $wo['product']['images'][0]['image_org'];?>"></a>
										</div>
										<div class="produc_info">
											<div class="product-title">
												<a href="<?php echo $wo['product']['url']?>" title="<?php echo $wo['product']['name']?>"><?php echo $wo['product']['name']?></a>
											</div>
											<div class="product-by">
												<?php
													$product_by_ = $wo['product']['category'];
													$product_by_ = str_replace('{product_category_name}', $wo['products_categories'][$wo['product']['category']], $product_by_);
												?>
												<a href="<?php echo lui_SeoLink('index.php?link1=products&c_id=' . $wo['product']['category']);?>"><?php echo $wo['products_categories'][$wo['product']['category']];?></a>
											</div>
											<div class="product-price">
												<?php echo (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?><?php echo $wo['product']['price']?>
											</div>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
				<?php } } ?>
			</div>
			</div>
			<?php } ?>
			</div>
		<?php endif ?>
		<div class="clear"></div>
		<?php if (!empty($wo['chatMessage']['story'])) {
			if (!empty($wo['chatMessage']['story']['thumbnail'])) {
				$wo['chatMessage']['story']['thumbnail'] = lui_GetMedia($wo['chatMessage']['story']['thumbnail']);
			}
			else{
				$u = lui_UserData($wo['chatMessage']['story']['user_id']);
				if (!empty($u)) {
					$wo['chatMessage']['story']['thumbnail'] = $u['avatar'];
				}
			}
		 ?>
			<div class="wo_chat_story">
				<div class="wo_chat_story_innr" onclick="Get_CurrentStory(<?php echo $wo['chatMessage']['story']['id']?>,'user')">
					<img src="<?php echo $wo['chatMessage']['story']['thumbnail'];?>">
					<p><?php echo $wo['lang']['view_story'];?></p>
				</div>
			</div>
		<?php } ?>
		<div class="message-media" id="message_media_reply_<?php echo $wo['chatMessage']['id'] ?>" style="background: <?php echo ($wo['chatMessage']['onwer'] == 1 && isset($wo['chat']['color'])) ? $wo['chat']['color'] . ' !important;' : '';?>">
			<?php  
				if(isset($wo['chatMessage']['media']) && !empty($wo['chatMessage']['media'])) {
					$media = array('type' => 'chatMessage', 'storyId' => $wo['chatMessage']['id'], 'filename' => $wo['chatMessage']['media'], 'name' => $wo['chatMessage']['mediaFileName']); 
					echo lui_DisplaySharedFile($media, 'message');   
				} 
			?>
				<?php if (!empty($wo['chatMessage']['stickers'])): ?>
				<?php if (strpos('.mp4', $wo['chatMessage']['stickers'])) { ?>
					<video autoplay loop><source src="<?php echo $wo['chatMessage']['stickers']; ?>" type="video/mp4"></video>
				<?php } else { ?>
					<img src="<?php echo $wo['chatMessage']['stickers']; ?>" alt="GIF">
				<?php } ?>
			<?php endif; ?>
			
			<?php if (!empty($wo['chatMessage']['product_id'])) { 
				$wo['product'] = lui_GetProduct($wo['chatMessage']['product_id']);
				if (!empty($wo['product'])) {
			?>
				<div class="wo_market">
					<div class="market_bottom">
						<div class="products">
							<div class="product" id="product-<?php echo $wo['product']['id']?>" data-id="<?php echo $wo['product']['id']?>">
								<div class="product_info">
									<div class="product-image">
										<a href="<?php echo $wo['product']['url']?>"><img src="<?php echo $wo['product']['images'][0]['image_org'];?>"></a>
									</div>
									<div class="produc_info">
										<div class="product-title">
											<a href="<?php echo $wo['product']['url']?>" title="<?php echo $wo['product']['name']?>"><?php echo $wo['product']['name']?></a>
										</div>
										<div class="product-by">
											<?php
												$product_by_ = $wo['product']['category'];
												$product_by_ = str_replace('{product_category_name}', $wo['products_categories'][$wo['product']['category']], $product_by_);
											?>
											<a href="<?php echo lui_SeoLink('index.php?link1=products&c_id=' . $wo['product']['category']);?>"><?php echo $wo['products_categories'][$wo['product']['category']];?></a>
										</div>
										<div class="product-price">
											<?php echo (!empty($wo['currencies'][$wo['product']['currency']]['symbol'])) ? $wo['currencies'][$wo['product']['currency']]['symbol'] : $wo['config']['classified_currency_s'];?><?php echo $wo['product']['price']?>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
			<?php } } ?>
		</div>
		
		<div class="like-stat stat-item post-like-status" style="<?php if ($wo['chatMessage']['onwer'] == 0) {?> float:right;margin: -8px -12px 2px 0;<?php }else{ ?> float:left;margin: -8px -12px 2px 0;<?php }?>">
		  <span class="like-emo post-reactions-icons-m-<?php echo $wo['chatMessage']['id']; ?>">
			<?php echo lui_GetPostReactions($wo['chatMessage']['id'],'message');?>
		  </span>
		</div>
	</div>
	
	<ul class="reactions-box reactions-box-container-<?php echo $wo['chatMessage']['id']; ?>" data-id="<?php echo $wo['chatMessage']['id']; ?>">
			<?php if (!empty($wo['reactions_types'])) {
			    foreach ($wo['reactions_types'] as $key => $value) {
			    	if ($value['status'] == 1) {
			    		
			     ?>
				<li style="<?php if ($wo['chatMessage']['onwer'] == 0) {?> left: 10px; <?php }else{ ?> right: 10px; <?php }?>" class="reaction reaction-<?php echo $value['id'];?>" data-reaction="<?php echo $value['name'];?>" data-reaction-id="<?php echo $value['id'];?>" data-reaction-lang="<?php echo $value['name'];?>" data-post-id="<?php echo $wo['chatMessage']['id']; ?>" onclick="Wo_RegisterMessageReaction(this,'<?php echo($value['layshane_star_small_icon']) ?>',<?php echo($value['is_html']) ?>);">
					<?php if (preg_match("/<[^<]+>/",$value['layshane_star'],$m)) {
						  	echo($value['layshane_star']);
						 }
						 else{ ?>
				     	<img src="<?php echo($value['layshane_star']) ?>">
				    <?php } ?>
				</li>
			<?php } } } ?>
		</ul>

	<div class="clear"></div>
	<?php if($wo['chatMessage']['messageUser']['user_id'] == $wo['user']['user_id']) { ?>
		<div class="message-seen text-right message-details"></div>
		<div class="clear"></div>
	<?php } ?>
	<div class="message-typing message-details"></div>
</div>
<div class="clear"></div>