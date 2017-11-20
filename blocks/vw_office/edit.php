<?php defined('C5_EXECUTE') or die("Access Denied.");
$al = Loader::helper('concrete/asset_library');
?>

<style type="text/css" media="screen">
	.ccm-block-field-group h2 { margin-bottom: 5px; }
	.ccm-block-field-group td { vertical-align: middle; }
</style>

<div class="ccm-block-field-group">
	<h2>Office Name</h2>
	<?php echo $form->text('field_1_textbox_text', $field_1_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '40')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Image</h2>
	<?php echo $al->image('field_2_image_fID', 'field_2_image_fID', 'Choose Image', $field_2_image); ?>

	<table border="0" cellspacing="3" cellpadding="0" style="width: 95%; margin-top: 5px;">
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_2_image_altText">Alt Text:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_2_image_altText', $field_2_image_altText, array('style' => 'width: 100%;')); ?></td>
		</tr>
	</table>
</div>

<div class="ccm-block-field-group">
	<h2>Content</h2>
	<?php print Core::make('editor')->outputStandardEditor('field_3_wysiwyg_content', $field_3_wysiwyg_content); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Email to</h2>
	<table border="0" cellspacing="3" cellpadding="0" style="width: 95%;">
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_4_link_url">Link to URL:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_4_link_url', $field_4_link_url, array('style' => 'width: 100%;')); ?></td>
		</tr>
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_4_link_text">Link Text:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_4_link_text', $field_4_link_text, array('style' => 'width: 100%;')); ?></td>
		</tr>
	</table>
</div>
