<?php defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php if (!empty($field_1_textbox_text)): ?>
	<div class="story">
<h3><?php echo htmlentities($field_1_textbox_text, ENT_QUOTES, APP_CHARSET); ?></h3>
<?php endif; ?>

<?php if (!empty($field_2_image)): ?>
	<img src="<?php echo $field_2_image->src; ?>" width="<?php echo $field_2_image->width; ?>" height="<?php echo $field_2_image->height; ?>" alt="" class="img-responsive"/>
<?php endif; ?>

<?php if (!empty($field_3_textarea_text)): ?>
	<p><?php echo nl2br(htmlentities($field_3_textarea_text, ENT_QUOTES, APP_CHARSET)); ?></p>
<?php endif; ?>

<?php if (!empty($field_4_textbox_text)): ?>
	<div class="callout"><?php echo htmlentities($field_4_textbox_text, ENT_QUOTES, APP_CHARSET); ?></div>
</div>
<?php endif; ?>
