<br>
<div class="wo_settings_page wow_content">
	<div class="avatar-holder my_earnings">
		<img src="<?php echo $wo['setting']['avatar']?>" alt="<?php echo $wo['setting']['name']?> foto de perfil" class="avatar">
		<div class="infoz">
			<h5 title="<?php echo $wo['setting']['name']?>"><a href="<?php echo lui_SeoLink('index.php?link1=timeline&u=' . $wo['setting']['username'] . '');?>" data-ajax="?link1=timeline&u=<?php echo $wo['setting']['username'] ?>"><?php echo $wo['setting']['name']?></a></h5>
			<p><?php echo $wo['lang']['my_earnings'] ?> <?php echo lui_GetCurrency($wo['config']['ads_currency']) . number_format($wo['setting']['balance'], 2);?></p>
		</div>
	</div>
	<hr>
  
	<?php if ($wo['setting']['balance'] < $wo['config']['m_withdrawal']): ?>
	<div class="alert alert-danger">
		<?php 
			$your_balance = str_replace('{balance}',  $wo['setting']['balance'], $wo['lang']['your_funds_balance']); 
			$your_balance = str_replace('{m_withdrawal}',  $wo['config']['m_withdrawal'], $your_balance); 
			$your_balance = str_replace('$', lui_GetCurrency($wo['config']['ads_currency']), $your_balance);
			
		?>
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg> <?php echo $your_balance;?>
	</div>
	<?php endif ?>
	<div class="alert alert-warning"><?php echo $wo['lang']['wallet_not_withdrawable'] ?></div>
  
	<form class="setting-general-form form-horizontal" method="post">
		<div class="setting-general-alert setting-update-alert"></div>
		
		<div class="row">
				<div class="col-md-12">
					<div class="wow_form_fields">
						<label for="withdraw_method"><?php echo $wo['lang']['withdraw_method']; ?></label>  
						<select id="withdraw_method" name="withdraw_method" class="form-control" onchange="Wo_ShowWithdrawMethod(this)">
							<?php
							$first = 0;
							foreach ($wo['config']['withdrawal_payment_method'] as $key => $value) { 
								if ($value == 1) {
									if ($first == 0) {
										$first = $key;
									}
									if ($key != 'custom') { ?>
										<option value="<?php echo $key; ?>"><?php echo $wo['lang'][$key]; ?></option>
							<?php	}elseif(!empty($wo['config']['custom_name'])){ ?>
								    <option value="<?php echo $key; ?>"><?php echo $wo['config']['custom_name']; ?></option>
							<?php }}} ?>
						</select>
					</div>
				</div>
			<div class="paypal_withdrawal" <?php echo($first == 'paypal' ? '' : 'style="display: none;"'); ?>>
				<div class="col-md-6">
					<div class="wow_form_fields">
						<label for="paypal_email"><?php echo $wo['lang']['paypal_email']; ?></label>  
						<input id="paypal_email" name="paypal_email" type="text" class="form-control input-md" value="<?php echo $wo['setting']['email']?>" autocomplete="off">
						<span class="help-block checking"></span>
					</div>
				</div>
			</div>
			<div class="transfer_to_withdrawal" <?php echo(($first == 'skrill' || $first == 'custom') ? '' : 'style="display: none;"'); ?>>
				<div class="col-md-6">
					<div class="wow_form_fields">
						<label for="transfer_to"><?php echo $wo['lang']['transfer_to']; ?></label>
						<input name="transfer_to" id="transfer_to" type="text" class="form-control input-md">
						<span class="help-block checking"></span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="wow_form_fields">
					<label for="amount"><?php echo $wo['lang']['amount']; ?></label>
					<input name="amount" id="amount" type="text" class="form-control input-md" value="<?php echo $wo['setting']['balance'];?>">
				</div>
			</div>
				<div class="bank_withdrawal" <?php echo($first == 'bank' ? '' : 'style="display: none;"'); ?>>
					<div class="col-md-6">
						<div class="wow_form_fields">
							<label for="iban"><?php echo $wo['lang']['iban']; ?></label>  
							<input name="iban" id="iban" type="text" class="form-control input-md">
						</div>
					</div>
					<div class="col-md-6">
						<div class="wow_form_fields">
							<label for="country"><?php echo $wo['lang']['country']; ?></label>  
							<input name="country" id="country" type="text" class="form-control input-md">
						</div>
					</div>
					<div class="col-md-6">
						<div class="wow_form_fields">
							<label for="full_name"><?php echo $wo['lang']['full_name']; ?></label>  
							<input name="full_name" id="full_name" type="text" class="form-control input-md">
						</div>
					</div>
					<div class="col-md-6">
						<div class="wow_form_fields">
							<label for="swift_code"><?php echo $wo['lang']['swift_code']; ?></label>  
							<input name="swift_code" id="swift_code" type="text" class="form-control input-md">
						</div>
					</div>
					<div class="col-md-12">
						<div class="wow_form_fields">
							<label for="address"><?php echo $wo['lang']['address']; ?></label>  
							<textarea name="address" id="address" type="text" class="form-control input-md"></textarea>
						</div>
					</div>
				</div>
		</div>
		<div class="text-center">
			<button type="submit" class="btn btn-main btn-mat btn-mat-raised add_wow_loader"><?php echo $wo['lang']['request_withdrawal']; ?></button>
		</div>
		<input type="hidden" name="user_id" value="<?php echo $wo['setting']['user_id'];?>">
		<input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
	</form>
</div>

<div class="wow_content page-margin">
	<div class="wo_page_hdng pag_neg_padd pag_alone">
		<div class="wo_page_hdng_innr">
			<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="M13.5,8H12V13L16.28,15.54L17,14.33L13.5,12.25V8M13,3A9,9 0 0,0 4,12H1L4.96,16.03L9,12H6A7,7 0 0,1 13,5A7,7 0 0,1 20,12A7,7 0 0,1 13,19C11.07,19 9.32,18.21 8.06,16.94L6.64,18.36C8.27,20 10.5,21 13,21A9,9 0 0,0 22,12A9,9 0 0,0 13,3"></path></svg></span> <?php echo $wo['lang']['payment_history']; ?>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-condensed setting-table wow_pymnt_table">
			<thead>
				<tr>
					<th>#</th>
					<th><?php echo $wo['lang']['amount']; ?></th>
					<th><?php echo $wo['lang']['requested']; ?></th>
					<th><?php echo $wo['lang']['status']; ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$get_payment = lui_GetPaymentsHistory($wo['setting']['user_id']);
					if (count($get_payment) > 0) {
						foreach ($get_payment as $wo['key'] => $wo['payment']) {
							$wo['key'] = ($wo['key'] + 1);
							$wo['html_class'] = 'label-warning';
							$wo['html_text'] = $wo['lang']['pending'];
							if ($wo['payment']['status'] == 1) {
								$wo['html_class'] = 'label-success';
								$wo['html_text'] = $wo['lang']['approved'];
							} else if ($wo['payment']['status'] == 2) {
								$wo['html_class'] = 'label-danger';
								$wo['html_text'] = $wo['lang']['declined'];
							}
							echo lui_LoadPage('setting/payment-history');
						}
					}
				?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
function Wo_ShowWithdrawMethod(self) {
	if ($(self).val() == 'bank') {
		$('.paypal_withdrawal').slideUp();
		$('.transfer_to_withdrawal').slideUp();
		$('.bank_withdrawal').slideDown();
	}
	else if($(self).val() == 'paypal'){
		$('.bank_withdrawal').slideUp();
		$('.transfer_to_withdrawal').slideUp();
		$('.paypal_withdrawal').slideDown();
	}
	else{
		$('.bank_withdrawal').slideUp();
		$('.transfer_to_withdrawal').slideDown();
		$('.paypal_withdrawal').slideUp();
	}
}
$(function() {
  $('form.setting-general-form').ajaxForm({
    url: Wo_Ajax_Requests_File() + '?f=request_payment',
    beforeSend: function() {
      $('.wo_settings_page').find('.add_wow_loader').addClass('btn-loading');
    },
    success: function(data) {
      scrollToTop();
      if (data.status == 200) {
        $('.setting-general-alert').html('<div class="alert alert-success">' + data.message + '</div>');
        $('.alert-success').fadeIn('fast');
      } else if (data.errors) {
          var errors = data.errors.join("<br>");
          $('.setting-general-alert').html('<div class="alert alert-danger">' + errors + '</div>');
          $('.alert-danger').fadeIn(300);
      }
      $('.wo_settings_page').find('.add_wow_loader').removeClass('btn-loading');
    }
  });
});
</script>