<?php defined('C5_EXECUTE') or die("Access Denied.");
$al = Loader::helper('concrete/asset_library');
?>

<style type="text/css" media="screen">
	.ccm-block-field-group h2 { margin-bottom: 5px; }
	.ccm-block-field-group td { vertical-align: middle; }
</style>

<div class="ccm-block-field-group">
	<h2>Title</h2>
	<?php echo $form->text('field_1_textbox_text', $field_1_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '40')); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Story Image</h2>
	<?php echo $al->image('field_2_image_fID', 'field_2_image_fID', 'Choose Image', $field_2_image); ?>
</div>

<div class="ccm-block-field-group">
	<h2>Story snippet</h2>
	<textarea id="field_3_textarea_text" name="field_3_textarea_text" rows="5" style="width: 95%;"><?php echo $field_3_textarea_text; ?></textarea>
</div>

<div class="ccm-block-field-group">
	<h2>Acknowledgement</h2>
	<?php echo $form->text('field_4_textbox_text', $field_4_textbox_text, array('style' => 'width: 95%;', 'maxlength' => '100')); ?>
</div>


