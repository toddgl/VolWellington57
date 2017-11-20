<?php defined('C5_EXECUTE') or die("Access Denied.");
$ps = Loader::helper('form/page_selector');
?>

<style type="text/css" media="screen">
	.ccm-block-field-group h2 { margin-bottom: 5px; }
	.ccm-block-field-group td { vertical-align: middle; }
</style>

<div class="ccm-block-field-group">
	<h2>Event Date 1</h2>
	<?php echo $form->text('field_1_textbox_text', $field_1_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '2')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Event Title 1</h2>
	<?php echo $form->text('field_2_textbox_text', $field_2_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '40')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Event Teaser 1</h2>
	<?php echo $form->text('field_3_textbox_text', $field_3_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '80')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Event Link 1</h2>
	<?php echo $ps->selectPage('field_4_link_cID', $field_4_link_cID); ?>
	<table border="0" cellspacing="3" cellpadding="0" style="width: 95%;">
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_4_link_text">Link Text:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_4_link_text', $field_4_link_text, array('style' => 'width: 100%;')); ?></td>
		</tr>
	</table>
</div>

<div class="ccm-block-field-group">
	<h2>Event Date 2</h2>
	<?php echo $form->text('field_5_textbox_text', $field_5_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '2')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Event Title 2</h2>
	<?php echo $form->text('field_6_textbox_text', $field_6_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '40')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Event Teaser 2</h2>
	<?php echo $form->text('field_7_textbox_text', $field_7_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '80')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Event Link 2</h2>
	<?php echo $ps->selectPage('field_8_link_cID', $field_8_link_cID); ?>
	<table border="0" cellspacing="3" cellpadding="0" style="width: 95%;">
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_8_link_text">Link Text:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_8_link_text', $field_8_link_text, array('style' => 'width: 100%;')); ?></td>
		</tr>
	</table>
</div>

<div class="ccm-block-field-group">
	<h2>Event Date 3</h2>
	<?php echo $form->text('field_9_textbox_text', $field_9_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '2')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Event Title 3</h2>
	<?php echo $form->text('field_10_textbox_text', $field_10_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '40')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Text Tease 3</h2>
	<?php echo $form->text('field_11_textbox_text', $field_11_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '80')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Event Link 3</h2>
	<?php echo $ps->selectPage('field_12_link_cID', $field_12_link_cID); ?>
	<table border="0" cellspacing="3" cellpadding="0" style="width: 95%;">
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_12_link_text">Link Text:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_12_link_text', $field_12_link_text, array('style' => 'width: 100%;')); ?></td>
		</tr>
	</table>
</div>


