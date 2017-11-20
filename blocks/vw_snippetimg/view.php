<?php defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php if (!empty($field_1_image)): ?>
	<div class="snippet text-center">
	<img src="<?php echo $field_1_image->src; ?>" width="<?php echo $field_1_image->width; ?>" height="<?php echo $field_1_image->height; ?>" alt="" />
<?php endif; ?>

<?php if (!empty($field_2_textarea_text)): ?>
	<div class="caption">
		<p><?php echo nl2br(htmlentities($field_2_textarea_text, ENT_QUOTES, APP_CHARSET)); ?></p>
	</div>
</div>
<?php endif; ?>


