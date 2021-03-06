<?php defined('C5_EXECUTE') or die("Access Denied.");
?>

<style type="text/css" media="screen">
	.ccm-block-field-group h2 { margin-bottom: 5px; }
	.ccm-block-field-group td { vertical-align: middle; }
</style>

<div class="ccm-block-field-group">
	<h2>Link URL</h2>
	<?php echo $form->text('field_1_textbox_text', $field_1_textbox_text, array('style' => 'width: 95%;')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Search Subject</h2>
	<?php echo $form->text('field_2_textbox_text', $field_2_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '50')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Teaser Statement</h2>
	<textarea id="field_3_textarea_text" name="field_3_textarea_text" rows="5" style="width: 95%;"><?php echo $field_3_textarea_text; ?></textarea>
</div>

<div class="ccm-block-field-group">
	<h2>Rollover Prompt</h2>
	<?php echo $form->text('field_4_textbox_text', $field_4_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '50')); ?>
</div>
