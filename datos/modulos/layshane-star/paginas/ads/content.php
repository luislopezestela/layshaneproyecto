<div>
	<div class="col-md-4 ads_col_4">
		<?php echo lui_LoadPage('ads/includes/header'); ?>
	</div>
	<div class="col-md-8 ads_col_8">
		<div class="page-margin wowonder-well">
			<div class="wo_page_hdng pag_neg_padd pag_alone">
				<div class="wo_page_hdng_innr">
					<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M12,8H4A2,2 0 0,0 2,10V14A2,2 0 0,0 4,16H5V20A1,1 0 0,0 6,21H8A1,1 0 0,0 9,20V16H12L17,20V4L12,8M21.5,12C21.5,13.71 20.54,15.26 19,16V8C20.53,8.75 21.5,10.3 21.5,12Z"></path></svg></span> <?php echo $wo['lang']['my_campaigns']; ?>
				</div>
			</div>
		</div>
		<div class="ads-cont-wrapper ads-cont-wrapper-home">
			<?php if (count($wo['ads']) > 0): ?>
				<ul class="list-unstyled wow_ads_list_head">
					<li class="aid"><?php echo $wo['lang']['id']; ?></li>
					<li class="acomp"><?php echo $wo['lang']['company']; ?></li>
					<li class="abid"><?php echo $wo['lang']['bidding']; ?></li>
					<li class="aclck"><?php echo $wo['lang']['clicks']; ?></li>
					<li class="avew"><?php echo $wo['lang']['views']; ?></li>
					<li class="asts"><?php echo $wo['lang']['status']; ?></li>
					<li class="aemp"></li>
				</ul>
				<ul class="list-unstyled wow_ads_lists" id="user-ads">
					<?php foreach ($wo['ads'] as $wo['ad']): ?>
						<?php echo lui_LoadPage('ads/includes/ads-list');?>
					<?php endforeach; ?>
				</ul>
			<?php else: ?>
				<div class="wow_content">
					<div class="empty_state">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,8H4A2,2 0 0,0 2,10V14A2,2 0 0,0 4,16H5V20A1,1 0 0,0 6,21H8A1,1 0 0,0 9,20V16H12L17,20V4L12,8M21.5,12C21.5,13.71 20.54,15.26 19,16V8C20.53,8.75 21.5,10.3 21.5,12Z"></path></svg> <?php echo $wo['lang']['no_ads_found']; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-sx-12">
			<div class="posts_load">
				<?php if (count($wo['ads']) > 0): ?>
					<div class="load-more">
						<button class="btn btn-default text-center pointer load-more-ads">
							<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather"><polyline points="6 9 12 15 18 9"></polyline></svg> <?php echo $wo['lang']['load_more'] ?>
						</button>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="delete-ad">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="wow_pops_head">
				<svg height="100px" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" xmlns="http://www.w3.org/2000/svg"><path d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729 c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="currentColor" opacity="0.6"></path> <path d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729 c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="currentColor" opacity="0.6"></path> <path d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428 c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="currentColor"></path></svg>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg></button>
				<h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"></path></svg> <?php echo $wo['lang']['delete_ad'] ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo $wo['lang']['confirm_delete_ad']; ?></p>
			</div>
			<div class="modal-footer">
				<button type="button" onclick="Wo_DeleteAd($('#delete-ad').attr('data-userad-id'))" class="btn btn-main btn-mat"><?php echo $wo['lang']['delete']; ?></button>
			</div>
		</div>
	</div>
</div>

<script>
	
	jQuery(document).ready(function($) {
		$(document).on('click', '.delete-ad', function(event) {
			var self = $(this);	
			$("#delete-ad").attr('data-userad-id',self.attr('id')).modal("show");

		});

		$(document).on('click', '.toggle-user-ad-status', function(event) {
			var self      = $(this);
			var ad_id     = self.attr('id');
			var ad_status = self.attr('data-status');
			$.ajax({
				url: Wo_Ajax_Requests_File(),
				type: 'GET',
				dataType: 'json',
				data: {f: 'ads',s:'ts',ad_id:ad_id,status:ad_status},
			})
			.done(function(data) {
				if (data.status == 200) {
					$("[data-ad-status='"+ad_id+"']").find('span').text(data.ad);
					if (ad_status == 0) {
						self.html('<span class="wow_ad_sts_actv"><?php echo $wo['lang']['active']; ?></span>');
						self.attr('data-status',1);
					}
					else{
						self.html('<span class="wow_ad_sts_noactv"><?php echo $wo['lang']['not_active']; ?></span>');
						self.attr('data-status',0);
					}
				}
			})
			.fail(function() {
				console.log("error");
			})
		
		});

		$(".load-more-ads").click(function(event) {
			var last_ad = ($("li[data-ad-id]").length > 0) ? $("li[data-ad-id]").last().attr('data-ad-id') : 0;
			var self    = $(this);
			$.ajax({
				url: Wo_Ajax_Requests_File(),
				type: 'GET',
				dataType: 'json',
				data: {f: 'ads',s:'lm',ad_id:last_ad},
			})
			.done(function(data) {
				if (data.status == 200) {
					$("#user-ads").append(data.html);
				}
				else if(data.status == 404){
					self.removeClass('load-more-ads').html(data.html);
				}
				else{
					self.remove();
				}
			})
			.fail(function() {
				console.log("error");
			})
			
		});
	});

	function Wo_DeleteAd(id){
		if (id && id > 0) {
			$.ajax({
				url: Wo_Ajax_Requests_File(),
				type: 'GET',
				dataType: 'json',
				data: {f: 'wallet',s:'remove',id:id},
			})
			.done(function(data) {
				if (data.status == 200) {
					$("tr[data-ad-id="+id+"]").slideUp(function(){
						$(this).remove();
					})
					$("#delete-ad").modal("hide");
					location.reload();
				}
			})
			.fail(function() {
				console.log("error");
			})
		}
	}
</script>