<?php 
if (!empty($wo['story']['parent_id'])) {
	$wo['story'] = $wo['post_shared_from'];
}
$is_voted = false;
if ($wo['loggedin'] == true) {
	$is_voted = lui_IsPostVoted($wo['story']['id'], $wo['user']['user_id']); 
}
?>
<div class="options" data-vote='<?php echo ($is_voted) ? 'true' : 'false'?>'>
	<?php foreach ($wo['story']['options'] as $key => $value):
	$is_option_voted = false;
    if ($wo['loggedin'] == true) {
    	$is_option_voted = lui_IsOptionVoted($value['id'], $wo['user']['user_id']);
    } 
	?>
	<div id="option-<?php echo $value['id']?>" class="wo_votes <?php echo ($is_option_voted) ? 'active':'';?>" onclick="Wo_VoteUp(<?php echo $value['id']?>);" data-post-id="<?php echo $wo['current_post']['id'];?>">
		<div class="poll-option">
			<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="<?php echo ($is_option_voted) ? '#2196f3' : 'currentColor';?>" d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" /></svg></span>
			<?php echo $value['text'];?>
		</div>
		<div class="result-bar-parent <?php echo ($is_voted) ? '' : 'hidden'?>">
			<div class="result-bar" style="width:<?php echo $value['percentage'];?>"><?php echo ($value['percentage_num'] > 0 && $is_voted) ? ' ' : '';?></div>
		</div>
		<div class="answer-vote <?php echo ($is_voted) ? '' : 'hidden'?>">
			<?php echo ($is_voted) ? $value['percentage']:''?>
		</div>
	</div>
	<?php endforeach ?>
	<div class="total-votes"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M3,22V8H7V22H3M10,22V2H14V22H10M17,22V14H21V22H17Z" /></svg> <span id="total-votes"><?php echo $value['all'];?></span> <?php echo $wo['lang']['total_votes'] ?></div>
</div>
<?php $wo['story'] = $wo['current_post']; ?>