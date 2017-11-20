<?php defined('C5_EXECUTE') or die("Access Denied.");
$al = Loader::helper('concrete/asset_library');
?>

<style type="text/css" media="screen">
	.ccm-block-field-group h2 { margin-bottom: 5px; }
	.ccm-block-field-group td { vertical-align: middle; }
</style>

<div class="ccm-block-field-group">
	<h2>Image</h2>
	<?php echo $al->image('field_1_image_fID', 'field_1_image_fID', 'Choose Image', $field_1_image); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Resource File</h2>
	<?php echo $al->file('field_2_file_fID', 'field_2_file_fID', 'Choose File', $field_2_file); ?>
	<table border="0" cellspacing="3" cellpadding="0" style="width: 95%; margin-top: 5px;">
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_2_file_linkText">Link Text (or leave blank to use file name):</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_2_file_linkText', $field_2_file_linkText, array('style' => 'width: 100%;')); ?></td>
		</tr>
	</table>
</div>

<div class="ccm-block-field-group">
	<h2>Document Title</h2>
	<?php echo $form->text('field_3_textbox_text', $field_3_textbox_text, array('style' => 'width: 95%;')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Document Description</h2>
	<textarea id="field_4_textarea_text" name="field_4_textarea_text" rows="5" style="width: 95%;"><?php echo $field_4_textarea_text; ?></textarea>
</div>

<div class="ccm-block-field-group">
	<h2>Document Size</h2>
	<?php echo $form->text('field_5_textbox_text', $field_5_textbox_text, array('style' => 'width: 95%;')); ?>
</div>


