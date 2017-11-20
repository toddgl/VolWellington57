<?php defined('C5_EXECUTE') or die("Access Denied.");
$al = Loader::helper('concrete/asset_library');
?>

<style type="text/css" media="screen">
	.ccm-block-field-group h2 { margin-bottom: 5px; }
	.ccm-block-field-group td { vertical-align: middle; }
</style>

<div class="ccm-block-field-group">
	<h2>GiveALittle Image</h2>
	<?php echo $al->image('field_1_image_fID', 'field_1_image_fID', 'Choose Image', $field_1_image); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Prompt</h2>
	<?php print Core::make('editor')->outputStandardEditor('field_2_wysiwyg_content', $field_2_wysiwyg_content); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Link</h2>
	<table border="0" cellspacing="3" cellpadding="0" style="width: 95%;">
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_3_link_url">Link to URL:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_3_link_url', $field_3_link_url, array('style' => 'width: 100%;')); ?></td>
		</tr>
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_3_link_text">Link Text:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_3_link_text', $field_3_link_text, array('style' => 'width: 100%;')); ?></td>
		</tr>
	</table>
</div>
