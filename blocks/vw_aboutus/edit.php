<?php defined('C5_EXECUTE') or die("Access Denied.");
$ps = Loader::helper('form/page_selector');
?>

<style type="text/css" media="screen">
	.ccm-block-field-group h2 { margin-bottom: 5px; }
	.ccm-block-field-group td { vertical-align: middle; }
</style>

<div class="ccm-block-field-group">
	<h2>Title</h2>
	<textarea id="field_1_textarea_text" name="field_1_textarea_text" rows="5" style="width: 95%;"><?php echo $field_1_textarea_text; ?></textarea>
</div>

<div class="ccm-block-field-group">
	<h2>Leader</h2>
	<?php print Core::make('editor')->outputStandardEditor('field_2_wysiwyg_content', $field_2_wysiwyg_content); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Summary</h2>
	<?php print Core::make('editor')->outputStandardEditor('field_3_wysiwyg_content', $field_3_wysiwyg_content); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Page Link</h2>
	<?php echo $ps->selectPage('field_4_link_cID', $field_4_link_cID); ?>
	<table border="0" cellspacing="3" cellpadding="0" style="width: 95%;">
		<tr>
			<td align="right" nowrap="nowrap"><label for="field_4_link_text">Link Text:</label>&nbsp;</td>
			<td align="left" style="width: 100%;"><?php echo $form->text('field_4_link_text', $field_4_link_text, array('style' => 'width: 100%;')); ?></td>
		</tr>
	</table>
</div>
