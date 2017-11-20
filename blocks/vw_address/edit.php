<?php defined('C5_EXECUTE') or die("Access Denied.");
$al = Loader::helper('concrete/asset_library');
?>

<style type="text/css" media="screen">
	.ccm-block-field-group h2 { margin-bottom: 5px; }
	.ccm-block-field-group td { vertical-align: middle; }
</style>

<div class="ccm-block-field-group">
	<h2>Centre</h2>
	<?php echo $form->text('field_1_textbox_text', $field_1_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '40')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Phone</h2>
	<?php echo $form->text('field_2_textbox_text', $field_2_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '20')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Email</h2>
	<?php echo $form->text('field_3_textbox_text', $field_3_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '80')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Address</h2>
	<textarea id="field_4_textarea_text" name="field_4_textarea_text" rows="5" style="width: 95%;"><?php echo $field_4_textarea_text; ?></textarea>
</div>

<div class="ccm-block-field-group">
	<h2>Icon</h2>
	<?php echo $al->image('field_5_image_fID', 'field_5_image_fID', 'Choose Image', $field_5_image); ?>
</div>

<div class="ccm-block-field-group">
	<h2>URL</h2>
	<table border="0" cellspacing="3" cellpadding="0" style="width: 95%;">
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_6_link_url">Link to URL:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_6_link_url', $field_6_link_url, array('style' => 'width: 100%;')); ?></td>
		</tr>
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_6_link_text">Link Text:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_6_link_text', $field_6_link_text, array('style' => 'width: 100%;')); ?></td>
		</tr>
	</table>
</div>


