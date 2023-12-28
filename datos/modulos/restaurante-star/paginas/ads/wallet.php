<style type="text/css">
body{background-color:#F0F2FD;}
.page-margin{
    margin-top: 0px;
    margin-bottom: 20px;
}
.layshane-well {
    background-color: #fff;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    border-radius: max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;
    padding: 15px 15px 1px;
}
/*Wallet Header*/
.wow_mini_wallets {
    display: flex;
    align-items: center;
    padding-bottom: 7px;
}
.wo_new_wallet {
    position: relative;
    text-align: center;
    overflow: hidden;
    padding: 40px 10px;
}

.wo_new_wallet > svg {
    position: absolute;
    width: 100%;
    pointer-events: none;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0.15;
}
.wow_add_money_hid_form {
    display: none;
}
.wow_add_money_hid_form form {
    padding: 20px 0;
    border-top: 1px solid #ececec;
}
.wo_new_wallet .wow_mini_wallets {
    align-items: center;
    padding-bottom: 7px;
    flex-direction: column;
    justify-content: center;
    position: relative;
}
.wow_add_money_hid_form .add-amount, .wow_snd_money_form .add-amount {
    display: flex;
    margin: 15px 0 25px;
}
.wow_add_money_hid_form .add-amount h5, .wow_snd_money_form .add-amount h5 {
    margin: 0 auto;
    font-size: 42px;
    font-family: "Lato", sans-serif;
    width: auto;
    max-width: 100%;
    padding: 4px 0;
    border-bottom: 2px solid #ddd;
}
.wow_add_money_hid_form .add-amount h5 input, .wow_snd_money_form .add-amount h5 input {
    width: auto;
    border: 0;
    outline: none;
}
.wo_new_wallet .wow_mini_wallets h5 {
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: 60px;
    margin-bottom: 20px;
}
.dt_bank_trans_modal .bank_info {
    width: 100%;
    margin-top: 24px;
    margin-bottom: 30px;
}
.wo_new_wallet .wow_mini_wallets_btns {
    margin: 0!important;
}
.wow_pops_head {
    position: relative;
    background: #2196f3;
    color:#fff;
    user-select:none;
    text-align: center;
    padding:15px 0 15px;
}
.wow_pops_head h4 {
    margin: 0;
    font-weight: 400;
    font-family: Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif;
    font-size: 19px;
}
.wow_pops_head h4 svg {
    width: 27px;
    height: 27px;
    margin: -2px 2px 0 0;
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    padding: 5px;
}
.wallet_transactions > p {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.dt_bank_trans_modal .bank_info .dt_settings_header {
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    border-radius: 7px;
    height: auto;
    background-color: #2196f3;
    background: linear-gradient(90deg, #03A9F4 0%, #2196f3 35%, #3F51B5 100%);
    padding: 16px;
    overflow: hidden;
    position: relative;
}
.dt_bank_trans_modal .dt_settings_circle-1 {
    width: 290px;
    height: 290px;
    background-image: radial-gradient(circle 800px at 75% -25%,#000000 0,rgba(255, 255, 255, 0) 100%);
    left: -28px;
    top: -28px;
    opacity: .05;
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
}
.dt_bank_trans_modal .dt_settings_circle-2 {
    opacity: .03;
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    width: 500px;
    height: 500px;
    background-image: radial-gradient(circle 800px at 10% -25%,#000000 0,rgba(255, 255, 255, 0) 100%);
    right: -242px;
    top: 17px;
}
.dt_bank_trans_modal .bank_info .bank_info_innr {
    position: relative;
    width: 100%;
    color: #fff;
    z-index: 1;
    border: 6px solid rgba(255, 255, 255, 0.3);
    padding: 20px;
    border-radius: max(0px, min(8px, calc((100vw - 4px - 100%) * 9999))) / 8px;
}
.dt_bank_trans_modal .bank_info .bank_info_innr > svg {
    position: absolute;
    opacity: 0.3;
    left: 16px;
    top: 16px;
    width: 45px;
    z-index: -1;
}
.dt_bank_trans_modal .bank_info .bank_info_innr .bank_name {
    font-size: 22px;
    padding: 5px 0.75rem 0 55px;
}
.dt_bank_trans_modal .bank_info .bank_info_innr .row .col {
    margin-top: 18px;
}
.dt_bank_trans_modal .dt_user_profile {
    background-color: #f8f8f8;
    margin: 0 auto 25px;
    padding: 10px;
	margin-top:20px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    border-radius: 7px;
    overflow: hidden;
}
.dt_bank_trans_modal .dt_user_profile > span {
    margin-bottom: 5px;
    font-size: 18px;
    display: flex;
    align-items: center;
}
.dt_bank_trans_modal .dt_user_profile > span svg {
    margin-right: 5px;
    color: #6b6b6b;
}
.dt_bank_trans_modal .dt_prof_vrfy {
    display: block;
    list-style-type: disc;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
}
.dt_bank_trans_modal .dt_prof_vrfy {
    margin: 0;
    list-style-type: disc;
}
.dt_bank_trans_upl_rec {
    text-align: center;
}
.dt_bank_trans_upl_rec a {
    display: inline-block;
    border-bottom: 1px dashed;
    color: #3f3f3f;
    padding-bottom: 5px;
    font-size: 14.5px;
    transition: all 0.15s;
    text-decoration: none;
}.dt_bank_trans_upl_rec a svg {
    width: 20px;
    height: 20px;
    margin-top: -3px;
}
.upload_bank_receipts {
    text-align: center;
    display: none;
}
.upload_bank_receipts > div {
    width: 100%;
    max-width: 200px;
    height: 185px;
    margin: auto;
    background-color: #f0f0f0;
    border: 2px solid #ddd;
    border-radius: 7px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    cursor: pointer;
}
.upload_bank_receipts svg {
    width: 45px;
    height: 45px;
    color: #4a4a4a;
    background-color: lightgrey;
    padding: 10px;
    border-radius: 50%;
    margin-bottom: 10px;
}
.upload_bank_receipts p {
    margin-bottom: 0px;
}
#bank_transfer_modal.up_rec_active .hide_alert_info_bank_trans, #bank_transfer_modal.up_rec_active .dt_bank_trans_upl_rec {
    display: none;
}
#bank_transfer_modal.up_rec_active .upload_bank_receipts {
    display: block;
}
.dt_bank_trans_modal .bank_info .bank_info_innr .help-block {
    text-transform: uppercase;
    font-size: 13px;
    color: rgba(255, 255, 255, 0.73);
}
.wow_pops_head .close {
    position: absolute;
    top: 18px;
    right: 27px;
    padding: 0;
    opacity: 0.4;
    text-shadow: none;
    color: var(--header-color);
}
.ads-cont-wrapper {
    width: 100%;
}
.empty_state {
    margin: 85px 0;
    font-family: Segoe UI Historic, Segoe UI, Helvetica, Arial, sans-serif;
    font-size: 15px;
    color: #6d6d6d;
    text-align: center;
    width: 100%;
}
.empty_state .empty_state_img {
    display: block;
    margin: 0 auto 15px;
    width: 100px;
    height: 100px;
    float: none;
}
@media (min-width: 992px){
	.wo_new_wallet .wow_mini_wallets h5{margin-bottom:0;}
	.wo_new_wallet .wow_mini_wallets{flex-direction:row;justify-content:space-between;padding:0 20px;}
	.wo_new_wallet{padding:30px 10px;}
    .wo_new_wallet > p{display:none;}
}
</style>
<?php if ($wo['config']['credit_card'] == 'yes') { ?>
<script src="https://js.stripe.com/v3/"></script>
<?php } ?>
<?php if ($wo['config']['securionpay_payment'] == '1') { ?>
    <script src="https://securionpay.com/checkout.js"></script>
<?php } ?>
<div>
	<br>
	<div class="columna-12 ads_col_12">
		<div class="page-margin layshane-well wo_new_wallet">
			<?php if (isset($wo['replenishment_notif'])): ?>
				<div id="replenish-user-account-alert">
					<div class="alert alert-success"><?php echo $wo['replenishment_notif'];?></div>
				</div>
			<?php endif; ?>
			<div id="replenish-user-account-alert-warning"></div>
			<div class="alert alert-danger hidden please-check"><?php echo $wo['lang']['please_check_details'];?></div>

			<p class="bold"><?php echo $wo['lang']['my_balance'];?></p>
			<div class="my_wallet wow_mini_wallets">
				<div>
					<h5><?php echo lui_GetCurrency($wo['config']['ads_currency']); ?><?php echo sprintf('%.2f',$wo['user']['wallet']);?></h5>
				</div>
				<div class="wow_mini_wallets_btns">
					<button data-toggle="modal" data-target="#send_money_modal" class="btn btn-default btn-mat">
						<?php echo $wo['lang']['send_money'];?>
					</button>
					<button class="btn btn-main btn-mat btn-mat-raised" onclick="$('.wow_add_money_hid_form').slideToggle();">
						<?php echo $wo['lang']['add_funds'];?>
					</button>
				</div>
			</div>
			<div class="wow_add_money_hid_form text-center">
				<form class="form" id="replenish-user-account">
					<p class="bold"><?php echo $wo['lang']['replenish_my_balance'];?></p>
					<div class="add-amount">
						<h5><?php echo lui_GetCurrency($wo['config']['ads_currency']); ?><input type="number" placeholder="0.00" min="1.00" name="amount" id="amount" /></h5>
					</div>
					<button type="submit" class="btn btn-main btn-mat btn-mat-raised">
						<?php echo $wo['lang']['continue'];?>
					</button>
				</form>
			</div>
		</div>

		<div class="page-margin layshane-well">
			<?php $wo['trans'] = lui_GetMytransactions(); ?>
			<div class="wallet_transactions">
				<p class="bold">
					<?php echo $wo['lang']['transaction_log']; ?>
				</p>
				<div class="tabbable">
					<?php echo lui_LoadPage('ads/includes/latest_activities');?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo lui_LoadPage('ads/send_money'); ?>

<div id="pay-modal"></div>
<div class="modal fade" id="paystack_wallet_modal" role="dialog" data-keyboard="false" style="overflow-y: auto;">
	<div class="modal-dialog modal-md wow_mat_mdl">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['paystack'] ?></h4>
			</div>
			<form class="form form-horizontal" method="post" id="paystack_wallet_form" action="#">
				<div class="modal-body twocheckout_modal">
					<div id="paystack_wallet_alert"></div>
					<div class="clear"></div>
					<div class="wow_form_fields">
						<label for="paystack_wallet_email"><?php echo $wo['lang']['email']; ?></label>
						<input id="paystack_wallet_email" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['email']; ?>" value="<?php echo($wo['user']['email']) ?>">
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div class="modal-footer">
					<div class="ball-pulse"><div></div><div></div><div></div></div>
					<button type="button" class="btn btn-main btn-mat" id="paystack_btn" onclick="InitializeWalletPaystack()"><?php echo $wo['lang']['pay']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="cashfree_wallet_modal" role="dialog" data-keyboard="false" style="overflow-y: auto;">
	<div class="modal-dialog modal-md wow_mat_mdl">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['cashfree'] ?></h4>
			</div>
			<form class="form form-horizontal" method="post" id="cashfree_form" action="#">
				<div class="modal-body twocheckout_modal">
					<div id="cashfree_wallet_alert"></div>
					<div class="clear"></div>
					<div class="wow_form_fields">
						<label for="cashfree_name"><?php echo $wo['lang']['name']; ?></label>
						<input id="cashfree_name" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['name']; ?>" value="<?php echo($wo['user']['name']) ?>">

					</div>
					<div class="wow_form_fields">
						<label for="cashfree_email"><?php echo $wo['lang']['email']; ?></label>
						<input id="cashfree_email" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['email']; ?>" value="<?php echo($wo['user']['email']) ?>">

					</div>
					<div class="wow_form_fields">
						<label for="cashfree_phone"><?php echo $wo['lang']['phone_number']; ?></label>
						<input id="cashfree_phone" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['phone_number']; ?>" value="<?php echo($wo['user']['phone_number']) ?>">

					</div>
					<input type="hidden" name="cashfree_type" id="cashfree_type">
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div class="modal-footer">
					<div class="ball-pulse"><div></div><div></div><div></div></div>
					<button type="button" class="btn btn-main btn-mat" id="cashfree_btn" onclick="SignatureWalletCashfree()"><?php echo $wo['lang']['pay']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<style type="text/css">
input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}
</style>

<?php if ($wo['config']['razorpay_payment'] == 'yes' && !empty($wo['config']['razorpay_key_id']) && !empty($wo['config']['razorpay_key_secret'])) { ?>
<div class="modal fade" id="razorpay_modal" role="dialog" data-keyboard="false" style="overflow-y: auto;">
	<div class="modal-dialog modal-md wow_mat_mdl">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['razorpay'] ?></h4>
			</div>
			<form class="form form-horizontal" method="post" id="razorpay_form" action="#">
				<div class="modal-body twocheckout_modal">
					<div id="razorpay_alert"></div>
					<div class="clear"></div>
					<div class="wow_form_fields">
						<label for="razorpay_name"><?php echo $wo['lang']['name']; ?></label>
						<input id="razorpay_name" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['name']; ?>" value="<?php echo($wo['user']['name']) ?>">
					</div>
					<div class="wow_form_fields">
						<label for="razorpay_email"><?php echo $wo['lang']['email']; ?></label>
						<input id="razorpay_email" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['email']; ?>" value="<?php echo($wo['user']['email']) ?>">
					</div>
					<div class="wow_form_fields">
						<label for="razorpay_phone"><?php echo $wo['lang']['phone_number']; ?></label>
						<input id="razorpay_phone" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['phone_number']; ?>" value="<?php echo($wo['user']['phone_number']) ?>">
					</div>
					<input type="hidden" name="razorpay_type" id="razorpay_type">
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div class="modal-footer">
					<div class="ball-pulse"><div></div><div></div><div></div></div>
					<button type="button" class="btn btn-main btn-mat" id="razorpay_btn" onclick="SignatureRazorpay()"><?php echo $wo['lang']['pay']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<?php } ?>
<?php if ($wo['config']['fluttewave_payment'] == 1) { ?>
<div class="modal fade" id="fluttewave_modal" role="dialog" data-keyboard="false" style="overflow-y: auto;">
	<div class="modal-dialog modal-md wow_mat_mdl">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['fluttewave'] ?></h4>
			</div>
			<form class="form form-horizontal" method="post" id="fluttewave_form" action="#">
				<div class="modal-body twocheckout_modal">
					<div id="fluttewave_alert"></div>
					<div class="clear"></div>
					<div class="wow_form_fields">
						<label for="fluttewave_email"><?php echo $wo['lang']['email']; ?></label>
						<input id="fluttewave_email" type="text" autocomplete="off" placeholder="<?php echo $wo['lang']['email']; ?>" value="<?php echo($wo['user']['email']) ?>">
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div class="modal-footer">
					<div class="ball-pulse"><div></div><div></div><div></div></div>
					<button type="button" class="btn btn-main btn-mat" id="fluttewave_btn" onclick="SignatureFluttewave()"><?php echo $wo['lang']['pay']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php } ?>
<?php if ($wo['config']['aamarpay_payment'] == 1) { ?>
<div class="modal fade" id="aamarpay_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md wow_mat_mdl" role="document">
        <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['aamarpay']; ?></h4>
			</div>
			<form id="aamarpay_form" method="post">
				<div class="modal-body">
                <div id="aamarpay_alert" style="    color: red;"></div>
                    <div class="wow_form_fields">
						<label for="aamarpay_name"><?php echo $wo['lang']['name']; ?></label>
                        <input type="text" placeholder="<?php echo $wo['lang']['name']; ?>"  value="<?php echo($wo['user']['name']) ?>" id="aamarpay_name">
                    </div>
                    <div class="wow_form_fields">
						<label for="aamarpay_email"><?php echo $wo['lang']['email']; ?></label>
                        <input type="email" placeholder="<?php echo $wo['lang']['email']; ?>" value="<?php echo($wo['user']['email']) ?>" id="aamarpay_email">
                    </div>
                    <div class="wow_form_fields">
						<label for="aamarpay_number"><?php echo $wo['lang']['phone_number']; ?></label>
                        <input id="aamarpay_number" type="text" placeholder="<?php echo $wo['lang']['phone_number']; ?>" value="<?php echo($wo['user']['phone_number']) ?>">
                    </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-main btn-mat" onclick="AamarpayRequest()" id="aamarpay_button"><?php echo $wo['lang']['pay']; ?></button>
				</div>
			</form>
        </div>
    </div>
</div>
<?php } ?>
<script>
<?php if ($wo['config']['ngenius_payment'] == '1') { ?>
	function pay_using_ngenius() {
		amount = $("#amount").val();
		$.post(Wo_Ajax_Requests_File() + '?f=ngenius&s=pay',{amount:amount}, function (data) {
	        if (data.status == 200) {
	        	location.href = data.url;
	        }
	        else{
	        	$('.pay-go-pro-alert').html("<div class='alert alert-danger'>"+data.message+"</div>");
				setTimeout(function () {
					$('.pay-go-pro-alert').html("");
				},3000);
	        }
	    }).fail(function(data) {
	    	$('.pay-go-pro-alert').html("<div class='alert alert-danger'>"+data.message+"</div>");
			setTimeout(function () {
				$('.pay-go-pro-alert').html("");
			},3000);
		});
	}
<?php } ?>
<?php if ($wo['config']['aamarpay_payment'] == '1') { ?>
	function pay_using_aamarpay() {
		$('#pay-go-pro').modal('hide');
		$('#aamarpay_modal').modal({
             show: true
            });
	}
	function AamarpayRequest() {
		$('#aamarpay_button').attr('disabled', true).text("<?php echo $wo["lang"]["please_wait"]?>");
		amount = $("#amount").val();
		$.post(Wo_Ajax_Requests_File() + '?f=aamarpay&s=pay',{amount:amount,name:$('#aamarpay_name').val(),email:$('#aamarpay_email').val(),phone:$('#aamarpay_number').val()}, function (data) {
			$('#aamarpay_button').removeAttr('disabled');
	        $('#aamarpay_button').text("<?php echo($wo['lang']['pay']) ?>");
	        if (data.status == 200) {
	        	location.href = data.url;
	        }
	    }).fail(function(data) {
	    	// $('#aamarpay_button').removeAttr('disabled');
	     //    $('#aamarpay_button').text("<?php echo($wo['lang']['pay']) ?>");
    		// M.toast({html: data.responseJSON.message});
		});

	}
<?php } ?>
<?php if ($wo['config']['fortumo_payment'] == '1') { ?>
	function pay_using_fortumo() {
		$.post(Wo_Ajax_Requests_File() + '?f=fortumo&s=pay', function (data) {
	        if (data.status == 200) {
	        	location.href = data.url;
	        }
	    }).fail(function(data) {
    		// M.toast({html: data.responseJSON.message});
		});
	}
<?php } ?>
<?php if ($wo['config']['fluttewave_payment'] == 1) { ?>
	function open_fluttewave() {
		$('#pay-go-pro').modal('hide');
		$('#fluttewave_modal').modal({
	        show: true
	    });
	}
	function SignatureFluttewave() {
		$('#fluttewave_btn').attr('disabled', true).text("<?php echo $wo["lang"]["please_wait"]?>");
		amount = $('#amount').val();
		email = $('#fluttewave_email').val();
	    $.post(Wo_Ajax_Requests_File() + '?f=fluttewave&s=pay', {amount:amount,email:email}, function(data) {
	    	$('#fluttewave_btn').html("<?php echo($wo['lang']['pay']) ?>");
		    $('#fluttewave_btn').removeAttr('disabled');
	        if (data.status == 200) {
	            window.location.href = data.url;
	        } else {
	         	$('#fluttewave_alert').html("<div class='alert alert-danger'>"+data.message+"</div>");
				setTimeout(function () {
					$('#fluttewave_alert').html("");
				},3000);
	        }
	    });
	}
<?php } ?>
<?php if ($wo['config']['razorpay_payment'] == 'yes' && !empty($wo['config']['razorpay_key_id']) && !empty($wo['config']['razorpay_key_secret'])) { ?>
function pay_using_razorpay(type) {
	$("#razorpay_alert").html('');
	$('#razorpay_type').val(type)
	$('#pay-go-pro').modal('hide');
	$('#razorpay_modal').modal({
        show: true
    });
}

function SignatureRazorpay() {
	$('#razorpay_btn').html("<?php echo($wo['lang']['please_wait']) ?>");
	$('#razorpay_btn').attr('disabled','true');
    var merchant_order_id = "<?php echo(round(111111,9999999)) ?>";
    var card_holder_name_id = $('#razorpay_name').val();
    var type = $('#razorpay_type').val();
    var email = $('#razorpay_email').val();
    var phone = $('#razorpay_phone').val();
    //var currency_code_id = "<?php echo($wo['config']['currency']) ?>";
    var currency_code_id = "INR";

    if (!email || !phone || !card_holder_name_id) {
    	$('#razorpay_alert').html("<div class='alert alert-danger'><?php echo($wo['lang']['please_check_details']) ?></div>");
		setTimeout(function () {
			$('#razorpay_alert').html("");
		},3000);
		$('#razorpay_btn').html("<?php echo($wo['lang']['pay']) ?>");
		$('#razorpay_btn').removeAttr('disabled');
		return false;
    }


    var merchant_total = Number($('#amount').val()) * 100;

    var razorpay_options = {
        key: "<?php echo $wo['config']['razorpay_key_id']; ?>",
        amount: merchant_total,
        name: "<?php echo $wo['config']['siteName']; ?>",
        description: "Top up wallet",
        image: '<?php echo $wo['config']['theme_url'];?>/img/logo.<?php echo $wo['config']['logo_extension'];?>',
        netbanking: true,
        currency: currency_code_id,
        prefill: {
            name: card_holder_name_id,
            email: email,
            contact: phone
        },
        notes: {
            soolegal_order_id: merchant_order_id,
        },
        handler: function (transaction) {
            jQuery.ajax({
                url:Wo_Ajax_Requests_File() + '?f=razorpay&s=wallet',
                type: 'post',
                data: {payment_id: transaction.razorpay_payment_id, order_id: merchant_order_id, card_holder_name_id: card_holder_name_id,  merchant_amount: merchant_total, currency: currency_code_id, type: 'wallet'},
                dataType: 'json',
                success: function (data) {
                	if (data.status == 200) {
                		<?php if (!empty($_COOKIE['redirect_page'])) {
                			$redirect_page = preg_replace('/on[^<>=]+=[^<>]*/m', '', $_COOKIE['redirect_page']);
					        $redirect_page = preg_replace('/\((.*?)\)/m', '', $redirect_page);
                			?>
                			window.location = "<?php echo($redirect_page); ?>";
                		<?php }else{ ?>
	                		window.location = data.url;
                	    <?php } ?>
                	}
                	else{
                		if (data.url != '') {
                			window.location = data.url;
                		}
                		else{
                			$('#razorpay_alert').html("<div class='alert alert-danger'>"+data.message+"</div>");
							setTimeout(function () {
								$('#razorpay_alert').html("");
							},3000);
							$('#razorpay_btn').html("<?php echo($wo['lang']['pay']) ?>");
							$('#razorpay_btn').removeAttr('disabled');

                		}
                	}
                }
            });
        },
        "modal": {
            "ondismiss": function () {
                // code here
            }
        }
    };
    // obj
    var objrzpv1 = new Razorpay(razorpay_options);
    objrzpv1.open();
    e.preventDefault();
}
<?php } ?>

<?php if ($wo['config']['paysera_payment'] == 'yes' && !empty($wo['config']['paysera_project_id']) && !empty($wo['config']['paysera_sign_password'])) { ?>
	function pay_using_paysera(type) {
		$('.btn-paysera').attr('disabled', true).text("<?php echo $wo["lang"]["please_wait"]?>");
		amount = $('#amount').val();
	    $.post(Wo_Ajax_Requests_File() + '?f=paysera&s=get_url', {type:'wallet',amount:amount}, function(data) {
	        if (data.status == 200) {
	            window.location.href = data.url;
	        } else {
	         	$('.btn-paysera').attr('disabled', false).html("Paysera App not set yet.");
	        }
	    });
	}
<?php } ?>




	function pay_using_cashfree(type) {
		$("#cashfree_wallet_alert").html('');
		$('#pay-go-pro').modal('hide');
		$('#cashfree_wallet_modal').modal({
	        show: true
	    });
	}
	function SignatureWalletCashfree() {
		$('#cashfree_btn').html("<?php echo($wo['lang']['please_wait']) ?>");
		$('#cashfree_btn').attr('disabled','true');
		type = $('#cashfree_type').val();
		email = $('#cashfree_email').val();
		name = $('#cashfree_name').val();
		phone = $('#cashfree_phone').val();
		amount = $('#amount').val();
		$.post(Wo_Ajax_Requests_File() + '?f=cashfree&s=initialize', {type:'wallet',email:email,name:name,phone:phone,amount:amount}, function(data) {
			if (data.status == 200) {
				$('body').append(data.html);
				document.getElementById("redirectForm").submit();
			} else {
				$('#cashfree_wallet_alert').html("<div class='alert alert-danger'>"+data.message+"</div>");
				setTimeout(function () {
					$('#cashfree_wallet_alert').html("");
				},3000);
			}
			$('#cashfree_btn').html("<?php echo($wo['lang']['pay']) ?>");
			$('#cashfree_btn').removeAttr('disabled');
		});
	}



	function pay_using_paystack(type) {
		$("#paystack_wallet_alert").html('');
		$('#pay-go-pro').modal('hide');
		$('#paystack_wallet_modal').modal({
	        show: true
	    });
	}

	function InitializeWalletPaystack() {
		$('#paystack_btn').html("<?php echo($wo['lang']['please_wait']) ?>");
	    $('#paystack_btn').attr('disabled','true');
		email = $('#paystack_wallet_email').val();
		amount = $('#amount').val();
		$.post(Wo_Ajax_Requests_File() + '?f=paystack&s=initialize', {type:'wallet',email:email,amount:amount}, function(data) {
			if (data.status == 200) {
				window.location.href = data.url;
			} else {
				$('#paystack_wallet_alert').html("<div class='alert alert-danger'>"+data.message+"</div>");
				setTimeout(function () {
					$('#paystack_wallet_alert').html("");
				},3000);
			}
			$('#paystack_btn').html("<?php echo($wo['lang']['pay']) ?>");
		    $('#paystack_btn').removeAttr('disabled');
		});
	}

	function Wo_GetPayPalLink(type) {
		$('.btn-paypal').attr('disabled', true).text("<?php echo $wo["lang"]["please_wait"]?>");
		$.get(Wo_Ajax_Requests_File() + '?f=wallet&s=replenish-user-account', {amount:$('#amount').val(), desc: '<?php echo $wo['lang']['replenish_my_balance'];?>'}, function(data) {
			if (data.status == 200) {
				window.location.href = data.url;
			} else {
				$('.btn-paypal').attr('disabled', false).html("PayPal App not set yet.");
			}
		});
	}
	function Wo_CheckOutCard(type, description, amount, payment_type) {
		description = "Wallet replenishment";
		amount = $('#amount').val() * 100;

		if (payment_type == 'bitcoin') {
			$('.btn-bitcoin').attr('disabled', true).text("<?php echo $wo["lang"]["please_wait"]?>");
			$('#pay-go-pro').modal({
				show: false
			});
		} else if (payment_type == 'credit_card') {
			$('.btn-cart').attr('disabled', true);
		} else if (payment_type == 'alipay') {
			$('.btn-alipay').attr('disabled', true);
		}
		var img = 'star';
		if (type == 1) {
			img = 'star';
		} else if (type == 2) {
			img = 'hot';
		} else if (type == 3) {
			img = 'ultima';
		} else if (type == 4) {
			img = 'vip';
		}
		if (payment_type != 'bank_payment' && payment_type != 'checkout' && payment_type != 'bitcoin') {
			var stripe = Stripe('<?php echo $wo['config']['stripe_id'];?>');
			$.post(Wo_Ajax_Requests_File() + '?f=stripe&s=session', {amount: $('#amount').val(),type:'wallet',payment_type:payment_type}, function(data, textStatus, xhr) {
				if (data.status == 200) {
					return stripe.redirectToCheckout({ sessionId: data.sessionId });
				}
				else{
			    	$('.pay-go-pro-alert').html("<div class='alert alert-danger'>"+data.message+"</div>");
					setTimeout(function () {
						$('.pay-go-pro-alert').html("");
					},3000);
			    }
			    if (payment_type == 'credit_card') {
			    	$('.btn-cart').removeAttr('disabled');
			    }
			    if (payment_type == 'alipay') {
				    $('.btn-alipay').removeAttr('disabled');
				}
			});
		}
		if (payment_type == 'bitcoin') {
			if( $('#amount').val() <= 0 ){
				$('#pay-go-pro').modal('hide');
				alert('You must enter value greater than ZERO');
				return false;
			}else{
				$.get(Wo_Ajax_Requests_File() + '?f=pay_with_bitcoin&s=pay&amount=' + $('#amount').val(), function (data) {
					if (data.status == 200) {
						$(data.html).appendTo('body').submit();
					}
					else{
			        	$('.pay-go-pro-alert').html("<div class='alert alert-danger'>"+data.message+"</div>");
						setTimeout(function () {
							$('.pay-go-pro-alert').html("");
						},3000);
			        }
				});
			}

		} else if (payment_type == 'bank_payment') {
	    	$('#configreset').click();
	    	$(".prv-img").html('<div class="thumbnail-rendderer"><div><h4 class="bold"><?php echo $wo['lang']['drop_img_here']; ?></h4><div class="error-text-renderer"></div><div><span><?php echo $wo['lang']['or']; ?></span><p><?php echo $wo['lang']['browse_to_upload']; ?></p></div></div> </div>');
			$("#blog-alert").html('');
	    	$('#bank_transfer_des').val('Add to balance');
	    	$('#bank_transfer_price').val($('#amount').val());
	    	$('#pay-go-pro').modal('hide');
	    	$('#bank_transfer_modal').modal({
	             show: true
	            });


		} else if (payment_type == 'checkout') {
			$("#2checkout_alert_wallet").html('');
			$('#pay-go-pro').modal('hide');
	    	$('#2checkout_wallet_modal').modal({
	            show: true
	        });
		}
		$(window).on('popstate', function() {
		handler.close();
		});
	}

	jQuery(document).ready(function($) {

		$("#replenish-user-account").submit(function(e) {
			e.preventDefault();
			var string = $('#amount').val();
			if (string.indexOf(',') > -1 || string < 0 || string == 0) {
				$('.please-check').removeClass("hidden");
				return false;
			}
			$('.please-check').addClass("hidden");
			var type = 1;
			$.get(Wo_Ajax_Requests_File() + '?f=get_payment_method&type=' + type, function (data) {
				if (data.status == 200) {
					$('#pay-modal').html(data.html);
					$('#pay-go-pro').modal({
						show: true
					});
				}
			});
		});
		
		$('#bank_transfer_form_wallet').ajaxForm({
			url: Wo_Ajax_Requests_File() + '?f=bank_transfer_wallet',
			beforeSend: function() {
				$('#bank_transfer_form_wallet').find('.ball-pulse').fadeIn(100);
			},
		  	success: function(data) {
			    if (data['status'] == 200) {
			    	$("#blog-alert").html('<div class="alert alert-success">'+ data['message'] +'</div>');
			    	setTimeout(function () {
			    		window.location = "<?php echo $wo['config']['site_url'];?>";
			    		$(".prv-img").html('<div class="thumbnail-rendderer"><div><h4 class="bold"><?php echo $wo['lang']['drop_img_here']; ?></h4><div class="error-text-renderer"></div><div><span><?php echo $wo['lang']['or']; ?></span><p><?php echo $wo['lang']['browse_to_upload']; ?></p></div></div> </div>');
			    		$("#blog-alert").html('');
			    		$('#configreset').click();

			    	},3000)
			    } else if (data['message']) {
			      $("#blog-alert").html('<div class="alert alert-danger">' + data['message'] + '</div>');
			    }
			    $('#bank_transfer_form_wallet').find('.ball-pulse').fadeOut(100);
			}
		});
	});
	$(document).on('change', '#upload', function(event) {
	let imgPath = $(this)[0].files[0].name;
    if (typeof(FileReader) != "undefined") {
        let reader = new FileReader();
        reader.onload = function(e) {
			$('#receipt_img_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    }
	$('#bank_transfer_modal').addClass('up_rec_img_ready');
});





// Called when token created successfully.
var successCallback = function(data) {
	console.log(data);
    var myForm = document.getElementById('2checkout_form_wallet');
    $.post(Wo_Ajax_Requests_File() + '?f=2checkout_wallet', {card_number: $("#card_number").val(),card_cvc: $("#card_cvc").val(),card_month: $("#card_month").val(),card_year: $("#card_year").val(),card_name: $("#card_name").val(),card_address: $("#card_address").val(),card_city: $("#card_city").val(),card_state: $("#card_state").val(),card_zip: $("#card_zip").val(),card_country: $("#card_country").val(),card_email: $("#card_email").val(),card_phone: $("#card_phone").val(),amount: $('#amount').val(),token: data.response.token.token}, function(data, textStatus, xhr) {
    	$('#2checkout_btn_wallet').html("<?php echo($wo['lang']['pay']) ?>");
    	$('#2checkout_btn_wallet').attr('disabled');
    	$('#2checkout_btn_wallet').removeAttr('disabled');
    	$('#2checkout_form_wallet').find('.ball-pulse').fadeOut(100);
    	if (data.status == 200) {
    		<?php if (!empty($_COOKIE['redirect_page'])) {
    			$redirect_page = preg_replace('/on[^<>=]+=[^<>]*/m', '', $_COOKIE['redirect_page']);
		        $redirect_page = preg_replace('/\((.*?)\)/m', '', $redirect_page);
    			?>
    			window.location = "<?php echo($redirect_page); ?>";
    		<?php }else{ ?>
        		window.location.href = data.location;
    	    <?php } ?>
      	} else {
      	 	$('#2checkout_alert_wallet').html("<div class='alert alert-danger'>"+data.error+"</div>");
			setTimeout(function () {
				$('#2checkout_alert_wallet').html("");
			},3000);
      	}
    	/*optional stuff to do after success */
    });
};

// Called when token creation fails.
var errorCallback = function(data) {
	$('#2checkout_btn_wallet').html("<?php echo($wo['lang']['pay']) ?>");
	$('#2checkout_btn_wallet').removeAttr('disabled');
	$('#2checkout_form_wallet').find('.ball-pulse').fadeOut(100);
    if (data.errorCode === 200) {
        tokenRequest();
    } else {
    	$('#2checkout_alert_wallet').html("<div class='alert alert-danger'>"+data.errorMsg+"</div>");
		setTimeout(function () {
			$('#2checkout_alert_wallet').html("");
		},3000);
    }
};

var tokenRequest = function() {
	$('#card_number').val($('#_number_').val());
	$('#2checkout_btn_wallet').html("<?php echo($wo['lang']['please_wait']) ?>");
	$('#2checkout_btn_wallet').attr('disabled','true');
	if ($("#card_number").val() != '' && $("#card_cvc").val() != '' && $("#card_month").val() != '' && $("#card_year").val() != '' && $("#card_name").val() != '' && $("#card_address").val() != '' && $("#card_city").val() != '' && $("#card_state").val() != '' && $("#card_zip").val() != '' && $("#card_country").val() != 0 && $("#card_email").val() != '' && $("#card_phone").val() != '') {
		$('#2checkout_form_wallet').find('.ball-pulse').fadeIn(100);
		// Setup token request arguments
	    var args = {
	        sellerId: "<?php echo($wo['config']['checkout_seller_id']) ?>",
	        publishableKey: "<?php echo($wo['config']['checkout_publishable_key']) ?>",
	        ccNo: $("#card_number").val(),
	        cvv: $("#card_cvc").val(),
	        expMonth: $("#card_month").val(),
	        expYear: $("#card_year").val()
	    };

	    // Make the token request
	    TCO.requestToken(successCallback, errorCallback, args);
	}
	else{
		$('#2checkout_btn_wallet').html("<?php echo($wo['lang']['pay']) ?>");
		$('#2checkout_btn_wallet').removeAttr('disabled');
		$('#2checkout_alert_wallet').html("<div class='alert alert-danger'><?php echo($wo['lang']['please_check_details']) ?></div>");
		setTimeout(function () {
			$('#2checkout_alert_wallet').html("");
		},3000);

	}


};

<?php if ($wo['config']['checkout_payment'] == 'yes') { ?>
$(function() {
    // Pull in the public encryption key for our environment
    TCO.loadPubKey("<?php echo($wo['config']['checkout_mode']) ?>");
});
<?php } ?>
<?php if ($wo['config']['coinbase_payment'] == '1' && !empty($wo['config']['coinbase_key'])) { ?>
function pay_using_coinbase() {
    amount = $('#amount').val();
    $.get(Wo_Ajax_Requests_File() + '?f=coinbase&s=create',{amount:amount}, function (data) {
	    if (data.status == 200) {
	    	$('#pay-go-pro').modal('hide');
	        window.location.href = data.url;
	    }
	    else{
	    	$('.pay-go-pro-alert').html("<div class='alert alert-danger'>"+data.error+"</div>");
			setTimeout(function () {
				$('.pay-go-pro-alert').html("");
			},3000);
	    }
    });
}
<?php } ?>
<?php if ($wo['config']['yoomoney_payment'] == '1' && !empty($wo['config']['yoomoney_wallet_id']) && !empty($wo['config']['yoomoney_notifications_secret'])) { ?>
function pay_using_yoomoney() {
    amount = $('#amount').val();
    $.get(Wo_Ajax_Requests_File() + '?f=yoomoney&s=create',{amount:amount}, function (data) {
	    if (data.status == 200) {
	    	$('#pay-go-pro').modal('hide');
	    	$('body').append(data.html);
			document.getElementById("yoomoney_form").submit();
			$("#yoomoney_form").remove();
	    }
	    else{
	    	$('.pay-go-pro-alert').html("<div class='alert alert-danger'>"+data.error+"</div>");
			setTimeout(function () {
				$('.pay-go-pro-alert').html("");
			},3000);
	    }
    });
}
<?php } ?>
<?php if ($wo['config']['iyzipay_payment'] == '1' && !empty($wo['config']['iyzipay_key']) && !empty($wo['config']['iyzipay_secret_key'])) { ?>
function pay_using_iyzipay() {
    amount = $('#amount').val();
    $.get(Wo_Ajax_Requests_File() + '?f=iyzipay&s=create',{amount:amount}, function (data) {
	    if (data.status == 200) {
	    	$('#pay-go-pro').modal('hide');
	    	$('#iyzipay_content').html('');
			$('#iyzipay_content').html(data.html);
	    }
	    else{
	    	$('.pay-go-pro-alert').html("<div class='alert alert-danger'>"+data.error+"</div>");
			setTimeout(function () {
				$('.pay-go-pro-alert').html("");
			},3000);
	    }
    });
}
<?php } ?>
<?php if ($wo['config']['securionpay_payment'] == '1' && !empty($wo['config']['securionpay_public_key']) && !empty($wo['config']['securionpay_secret_key'])) { ?>
$(function () {
    SecurionpayCheckout.key = '<?php echo($wo['config']['securionpay_public_key']); ?>';
    SecurionpayCheckout.success = function (result) {
        $.post(Wo_Ajax_Requests_File() + '?f=securionpay&s=handle', result, function(data, textStatus, xhr) {
            if (data.status == 200) {
                window.location.href = data.url;
            }
        }).fail(function(data) {
                  M.toast({html: data.responseJSON.message});
        });
    };
    SecurionpayCheckout.error = function (errorMessage) {
              M.toast({html: errorMessage});
    };
});
function securionpay_pay(){
	amount = $('#amount').val();
	$.post(Wo_Ajax_Requests_File() + '?f=securionpay&s=create',{amount:amount}, function (data) {
	    if (data.status == 200) {
	    	$('#pay-go-pro').modal('hide');
	    	SecurionpayCheckout.open({
	            checkoutRequest: data.token,
	            name: 'Top Up Wallet',
	            description: 'Top Up Wallet'
            });
	    }
	    else{
	    	$('.pay-go-pro-alert').html("<div class='alert alert-danger'>"+data.error+"</div>");
			setTimeout(function () {
				$('.pay-go-pro-alert').html("");
			},3000);
	    }
    });
}
<?php } ?>
<?php if ($wo['config']['authorize_payment'] == '1' && !empty($wo['config']['authorize_login_id']) && !empty($wo['config']['authorize_transaction_key'])) { ?>
	function open_authorize() {
		$('#pay-go-pro').modal('hide');
		$('#authorize_modal').modal({
	     	show: true
	    });
	}
	function AuthorizeRequest(self) {
	  $('#authorize_btn').html("<?php echo($wo['lang']['please_wait']) ?>");
	  $('#authorize_btn').attr('disabled','true');
	  amount = $('#amount').val();
	  authorize_number = $('#authorize_number').val();
	  authorize_month = $('#authorize_month').val();
	  authorize_year = $('#authorize_year').val();
	  authorize_cvc = $('#authorize_cvc').val();
	  $.post(Wo_Ajax_Requests_File() + '?f=authorize&s=pay', {card_number:authorize_number,card_month:authorize_month,card_year:authorize_year,card_cvc:authorize_cvc,amount:amount}, function(data) {
	    if (data.status == 200) {
	      window.location.href = data.url;
	    } else {
	      $('#authorize_alert').html("<div class='alert alert-danger'>"+data.error+"</div>");
	      setTimeout(function () {
	        $('#authorize_alert').html("");
	      },3000);
	    }
	    $('#authorize_btn').html("<?php echo $wo['lang']['pay']; ?>");
	      $('#authorize_btn').removeAttr('disabled');
	  }).fail(function(data) {
	      $('#authorize_alert').html("<div class='alert alert-danger'>"+data.responseJSON.error+"</div>");
	    setTimeout(function () {
	      $('#authorize_alert').html("");
	    },3000);
	    $('#authorize_btn').html("<?php echo $wo['lang']['pay']; ?>");
	    $('#authorize_btn').removeAttr('disabled');
	  });
	}
<?php } ?>
</script>

<div id="iyzipay_content"></div>
<div class="modal fade" id="authorize_modal" role="dialog" data-keyboard="false" >
    <div class="modal-dialog mat_box">
        <div class="modal-content">
		    <div class="modal-header">
		    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['authorize'] ?></h4>
		    </div>
            <form class="form form-horizontal" method="post" id="authorize_form" action="#">
            	<div id="authorize_alert"></div>
                <div class="modal-body authorize_modal">
                	<div class="row two_check_card">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8H4V6H20M20,18H4V12H20M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg>
						<div class="sun_input col-lg-12">
							<input id="authorize_number" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['card_number']; ?>">
						</div>
						<div class="sun_input col-xs-4">
							<select id="authorize_month" name="card_month" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['month']; ?> (01)">
								<option value="01">01</option>
								<option value="02">02</option>
								<option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
								<option value="09">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
							<!-- <input id="card_month" name="card_month" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['month']; ?> (01)"> -->
						</div>
						<div class="sun_input col-xs-4 no-padding-both">
							<select id="authorize_year" name="card_year" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['year']; ?> (2019)">
								<?php for ($i=date('Y'); $i <= date('Y')+15; $i++) {  ?>
									<option value="<?php echo($i) ?>"><?php echo($i) ?></option>
								<?php } ?>
							</select>
							<!-- <input id="card_year" name="card_year" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['year']; ?> (2019)"> -->
						</div>
						<div class="sun_input col-xs-4">
							<input id="authorize_cvc" name="card_cvc" type="text" class="form-control input-md" autocomplete="off" placeholder="CVC" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
						</div>
					</div>
                </div>
                <div class="clear"></div>
                <div class="modal-footer">
                    <div class="ball-pulse"><div></div><div></div><div></div></div>
                    <button type="button" class="btn btn-primary btn-mat" id="authorize_btn" onclick="AuthorizeRequest($(this))"><?php echo $wo['lang']['pay']; ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="payu_modal" role="dialog" data-keyboard="false" >
    <div class="modal-dialog mat_box">
        <div class="modal-content">
		    <div class="modal-header">
		    	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
		    	<?php if (isset($wo['lang']['payu'])): ?>
		    		<h4 class="modal-title"><?php echo $wo['lang']['payu'] ?></h4>
		    	<?php else: ?>
		    		<h4 class="modal-title">Pay</h4>
		    	<?php endif ?>
				
		    </div>
            <form class="form form-horizontal" method="post" id="payu_form" action="#">
            	<div id="payu_alert"></div>
                <div class="modal-body payu_modal">
                	<div class="row two_check_card">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8H4V6H20M20,18H4V12H20M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg>
						<div class="sun_input col-lg-12">
							<input id="payu_card_number" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['card_number']; ?>">
						</div>
						<div class="sun_input col-xs-4">
							<select id="payu_card_month" name="card_month" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['month']; ?> (01)">
								<option value="01">01</option>
								<option value="02">02</option>
								<option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
								<option value="09">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
							<!-- <input id="card_month" name="card_month" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['month']; ?> (01)"> -->
						</div>
						<div class="sun_input col-xs-4 no-padding-both">
							<select id="payu_card_year" name="card_year" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['year']; ?> (2019)">
								<?php for ($i=date('Y'); $i <= date('Y')+15; $i++) {  ?>
									<option value="<?php echo($i) ?>"><?php echo($i) ?></option>
								<?php } ?>
							</select>
							<!-- <input id="card_year" name="card_year" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['year']; ?> (2019)"> -->
						</div>
						<div class="sun_input col-xs-4">
							<input id="payu_card_cvc" name="card_cvc" type="text" class="form-control input-md" autocomplete="off" placeholder="CVC" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
						</div>
					</div>
                </div>
                <div class="clear"></div>
                <input id="payu_type" type="hidden">
                <div class="modal-footer">
                    <div class="ball-pulse"><div></div><div></div><div></div></div>
                    <button type="button" class="btn btn-primary btn-mat" id="payu_btn" onclick="pay_using_payu($(this))"><?php echo $wo['lang']['pay']; ?></button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="2checkout_wallet_modal" role="dialog" data-keyboard="false" style="overflow-y: auto;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><?php echo $wo['lang']['2checkout'] ?></h4>
			</div>
			<form class="form form-horizontal" method="post" id="2checkout_form_wallet" action="#">
				<div class="modal-body twocheckout_modal">
					<div id="2checkout_alert_wallet"></div>
					<div class="clear"></div>
					<div class="sun_input col-md-6">
						<input id="card_name" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['name']; ?>" value="<?php echo($wo['user']['name']) ?>">
					</div>
					<div class="sun_input col-md-6">
						<input id="card_address" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['address']; ?>" value="<?php echo($wo['user']['address']) ?>">
					</div>
					<div class="sun_input col-md-6">
						<input id="card_city" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['city']; ?>" value="<?php echo($wo['user']['city']) ?>">
					</div>
					<div class="sun_input col-md-6">
						<input id="card_state" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['state']; ?>" value="<?php echo($wo['user']['state']) ?>">
					</div>
					<div class="sun_input col-md-6">
						<input id="card_zip" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['zip']; ?>" value="<?php echo($wo['user']['zip']) ?>">
					</div>
					<div class="sun_input col-md-6">
						<select id="card_country" name="card_country" class="form-control">
							<?php
								foreach ($wo['countries_name'] as $country_ids => $country) {
									$country_id = $wo['user']['country_id'];
									$selected_contry = ($country_ids == $country_id) ? ' selected' : '' ;
							?>
								<option value="<?php echo $country_ids;?>" <?php echo $selected_contry;?> ><?php echo $country;?></option>
							<?php } ?>
						</select>
					</div>
					<div class="sun_input col-md-6">
						<input id="card_email" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['email']; ?>" value="<?php echo($wo['user']['email']) ?>">
					</div>
					<div class="sun_input col-md-6">
						<input id="card_phone" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['phone_number']; ?>" value="<?php echo($wo['user']['phone_number']) ?>">
					</div>
					<div class="clear"></div>
					<hr>
					<div class="row two_check_card">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20,8H4V6H20M20,18H4V12H20M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" /></svg>
						<div class="sun_input col-lg-12">
							<input id="_number_" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['card_number']; ?>">
							<input id="card_number" name="card_number" type="hidden" class="form-control input-md" autocomplete="off">
						</div>
						<div class="sun_input col-xs-4">
							<select id="card_month" name="card_month" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['month']; ?> (01)">
								<option value="01">01</option>
								<option value="02">02</option>
								<option value="03">03</option>
								<option value="04">04</option>
								<option value="05">05</option>
								<option value="06">06</option>
								<option value="07">07</option>
								<option value="08">08</option>
								<option value="09">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
							<!-- <input id="card_month" name="card_month" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['month']; ?> (01)"> -->
						</div>
						<div class="sun_input col-xs-4 no-padding-both">
							<select id="card_year" name="card_year" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['year']; ?> (2019)">
								<?php for ($i=date('Y'); $i <= date('Y')+15; $i++) {  ?>
									<option value="<?php echo($i) ?>"><?php echo($i) ?></option>
								<?php } ?>
							</select>
							<!-- <input id="card_year" name="card_year" type="text" class="form-control input-md" autocomplete="off" placeholder="<?php echo $wo['lang']['year']; ?> (2019)"> -->
						</div>
						<div class="sun_input col-xs-4">
							<input id="card_cvc" name="card_cvc" type="text" class="form-control input-md" autocomplete="off" placeholder="CVC" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
						</div>
					</div>
					<div class="clear"></div>
					<input id="card_token" name="token" type="hidden" value="">
				</div>
				<div class="clear"></div>
				<div class="modal-footer">
					<div class="ball-pulse"><div></div><div></div><div></div></div>
					<button type="button" class="btn btn-main btn-mat" onclick="tokenRequest()" id="2checkout_btn_wallet"><?php echo $wo['lang']['pay']; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="bank_transfer_modal" role="dialog" data-keyboard="false" style="overflow-y: auto;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span></button>
				<h4 class="modal-title"><i class="fa fa-money"></i> <?php echo $wo['lang']['bank_transfer'] ?></h4>
			</div>
			<form class="form form-horizontal" method="post" id="bank_transfer_form_wallet" action="#">
			<div class="modal-body dt_bank_trans_modal">
				<div id="blog-alert"></div>
				<p><?php echo $wo['config']['bank_description'];?></p>
				<?php if (!empty($wo['config']['bank_transfer_note'])) { ?>
					<div class="dt_user_profile hide_alert_info_bank_trans">
							<span class="valign-wrapper">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13,13H11V7H13M13,17H11V15H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z"></path></svg> Note:
							</span>
							<ul class="dt_prof_vrfy">
								<li><?php echo $wo['config']['bank_transfer_note'];?></li>
							</ul>
						</div>
				<?php } ?>
				<p class="dt_bank_trans_upl_rec"><a href="javascript:void(0);" onclick="$('#bank_transfer_modal').addClass('up_rec_active'); return false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M13.5,16V19H10.5V16H8L12,12L16,16H13.5M13,9V3.5L18.5,9H13Z"></path></svg> <?php echo $wo['lang']['upload'] ?></a></p>
					<div class="upload_bank_receipts">
						<div onclick="document.getElementById('upload').click(); return false">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M13.5,16V19H10.5V16H8L12,12L16,16H13.5M13,9V3.5L18.5,9H13Z"></path></svg>
							<p><?php echo $wo['lang']['browse_to_upload']; ?></p>
							<img id="receipt_img_preview" src="">
						</div>
					</div>
					<input name="price" type="hidden" id="bank_transfer_price" class="hidden">
					<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
					<input name="thumbnail" type="file" id="upload" class="hidden" accept="image/*">
					<input name="type" type="hidden" id="bank_transfer_type" class="hidden">
					<input name="description" type="hidden" id="bank_transfer_des" class="hidden">
					<input type="reset" id="configreset" value="Reset" class="hidden">
			</div>
			<div class="modal-footer">
					<div class="ball-pulse"><div></div><div></div><div></div></div>
					<button type="submit" class="btn btn-main btn-mat"><?php echo $wo['lang']['publish']; ?></button>
				</div>
				</form>
		</div>
	</div>
</div>
