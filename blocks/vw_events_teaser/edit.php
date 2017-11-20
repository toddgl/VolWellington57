<?php defined('C5_EXECUTE') or die("Access Denied.");
$ps = Loader::helper('form/page_selector');
?>

<style type="text/css" media="screen">
	.ccm-block-field-group h2 { margin-bottom: 5px; }
	.ccm-block-field-group td { vertical-align: middle; }
</style>

<div class="ccm-block-field-group">
	<h2>Section Title</h2>
	<?php echo $form->text('field_1_textbox_text', $field_1_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '100')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Day of the week</h2>
	<?php echo $form->text('field_2_textbox_text', $field_2_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '10')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Month</h2>
	<?php echo $form->text('field_3_textbox_text', $field_3_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '10')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Date (e.g. 31)</h2>
	<?php echo $form->text('field_4_textbox_text', $field_4_textbox_text, array('style' => 'width: 95%;')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Title</h2>
	<?php echo $form->text('field_5_textbox_text', $field_5_textbox_text, array('style' => 'width: 95%;')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Short description</h2>
	<textarea id="field_6_textarea_text" name="field_6_textarea_text" rows="5" style="width: 95%;"><?php echo $field_6_textarea_text; ?></textarea>
</div>

<div class="ccm-block-field-group">
	<h2>Page link label</h2>
	<?php echo $ps->selectPage('field_7_link_cID', $field_7_link_cID); ?>
	<table border="0" cellspacing="3" cellpadding="0" style="width: 95%;">
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_7_link_text">Link Text:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_7_link_text', $field_7_link_text, array('style' => 'width: 100%;')); ?></td>
		</tr>
	</table>
</div>


