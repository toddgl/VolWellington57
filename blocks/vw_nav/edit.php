<?php defined('C5_EXECUTE') or die("Access Denied.");
$ps = Loader::helper('form/page_selector');
?>

<style type="text/css" media="screen">
	.ccm-block-field-group h2 { margin-bottom: 5px; }
	.ccm-block-field-group td { vertical-align: middle; }
</style>

<div class="ccm-block-field-group">
	<h2>Resources</h2>
	<?php echo $ps->selectPage('field_1_link_cID', $field_1_link_cID); ?>
	<table border="0" cellspacing="3" cellpadding="0" style="width: 95%;">
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_1_link_text">Link Text:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_1_link_text', $field_1_link_text, array('style' => 'width: 100%;')); ?></td>
		</tr>
	</table>
</div>

<div class="ccm-block-field-group">
	<h2>About</h2>
	<?php echo $ps->selectPage('field_2_link_cID', $field_2_link_cID); ?>
	<table border="0" cellspacing="3" cellpadding="0" style="width: 95%;">
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_2_link_text">Link Text:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_2_link_text', $field_2_link_text, array('style' => 'width: 100%;')); ?></td>
		</tr>
	</table>
</div>

<div class="ccm-block-field-group">
	<h2>Join</h2>
	<?php echo $ps->selectPage('field_3_link_cID', $field_3_link_cID); ?>
	<table border="0" cellspacing="3" cellpadding="0" style="width: 95%;">
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_3_link_text">Link Text:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_3_link_text', $field_3_link_text, array('style' => 'width: 100%;')); ?></td>
		</tr>
	</table>
</div>

<div class="ccm-block-field-group">
	<h2>Contact</h2>
	<?php echo $ps->selectPage('field_4_link_cID', $field_4_link_cID); ?>
	<table border="0" cellspacing="3" cellpadding="0" style="width: 95%;">
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_4_link_text">Link Text:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_4_link_text', $field_4_link_text, array('style' => 'width: 100%;')); ?></td>
		</tr>
	</table>
</div>
