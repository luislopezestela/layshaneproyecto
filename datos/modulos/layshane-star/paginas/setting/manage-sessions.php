<div class="wo_settings_page wow_content">
	<div class="avatar-holder sessions">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> Profile Picture" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['manage_sessions']; ?></p>
			<div>
				<a href="javascript:void();" class="btn btn-danger btn-mat" id="upgrade-button" onclick="Wo_RemoveAllSessions();"><?php echo $wo['lang']['remove_all_sessions'];?></a>
			</div>
		</div>
	</div>
	<hr>
	
	<div class="active_sessions">
		<div class="row">
			<?php
				$get_sessions = lui_GetAllSessionsFromUserID($wo['setting']['user_id']);
				if (count($get_sessions) > 0) {
					foreach ($get_sessions as $wo['key'] => $wo['session']) {
						echo lui_LoadPage('setting/includes/sessions');
					}
				}
				 ?>
		</div>
		<?php if (count($get_sessions) == 10) { ?>
			<div class="load-more">
                <button class="btn btn-default text-center wo_load_more" onclick="Wo_LoadSessions();">
					<span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"></path></svg></span> <?php echo $wo['lang']['load_more'] ?>
				</button>
            </div>
		<?php } ?>
	</div>
</div>
<script type="text/javascript">
function Wo_LoadSessions() {
	var sessions = $('.session_list');
	ids = [];
	for (var i = 0; i < sessions.length; i++) {
		ids.push($(sessions[i]).attr('data-id'));
	}
	$.post(Wo_Ajax_Requests_File() + '?f=session_load', {ids: ids}, function (data) {
		if (data.status == 200 && data.html != '') {
			$('.active_sessions .row').append(data.html);
		}
		else{
			$('.load-more').slideUp();
		}
	});
}
function logOutSession(id) {
	if (!confirm('Are you sure you want to log out from this device?')) {
		return false;
	}
	$('#session_' + id).remove();
	$.post(Wo_Ajax_Requests_File() + '?f=delete_s', {id: id}, function () {
		Wo_IsLogged();
	});
}
function Wo_RemoveAllSessions() {
	if (!confirm('Are you sure you want to log out from this device and all devices ?')) {
		return false;
	}
	$.post(Wo_Ajax_Requests_File() + '?f=delete_all_sessions', function () {
		Wo_IsLogged();
	});
}
</script>