<div class="ads-cont-wrapper">
	<?php if (count($wo['trans']) > 0): ?>
		<table class="table table-responsive wow_wallet_trans">
			<thead>
				<tr>
					<th><?php echo $wo['lang']['type']; ?></th>
					<th width="260"><?php echo $wo['lang']['description']; ?></th>
					<th><?php echo $wo['lang']['date']; ?></th>
					<th><?php echo $wo['lang']['amount']; ?></th>
				</tr>
			</thead>
			<tbody id="user-ads">
				<?php foreach ($wo['trans'] as $key => $transaction): ?>
					<tr data-ad-id="<?php echo $transaction['id']; ?>">
						<td><span><?php echo $transaction['kind']; ?></span></td>
						<td width="260"><span><?php echo $transaction['notes']; ?></span></td>
						<td><span><?php echo $transaction['transaction_dt']; ?></span></td>
						<td><span><?php echo lui_GetCurrency($wo['config']['ads_currency']); ?><?php echo sprintf('%.2f', $transaction['amount'] ); ?></span></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php else: ?>
		<div class="empty_state">
			<img class="empty_state_img" src="<?php echo $wo['config']['theme_url'];?>/img/no_transaction.svg"> <?php echo $wo['lang']['no_transactions_found']; ?>
		</div>
	<?php endif; ?>
</div>