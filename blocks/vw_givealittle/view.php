<?php defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php if (!empty($field_1_image)): ?>
	<img src="<?php echo $field_1_image->src; ?>" width="<?php echo $field_1_image->width; ?>" height="<?php echo $field_1_image->height; ?>" alt="" />
<?php endif; ?>

<?php if (!empty($field_2_wysiwyg_content)): ?>
	<b>
	<?php echo $field_2_wysiwyg_content; ?>
	</b>
<?php endif; ?>

<?php if (!empty($field_3_link_url)):
	$link_url = $this->controller->valid_url($field_3_link_url);
	$link_text = empty($field_3_link_text) ? $field_3_link_url : htmlentities($field_3_link_text, ENT_QUOTES, APP_CHARSET);
	?>
	<div class="blue">
	<a href="<?php echo $link_url; ?>" target="_blank"><?php echo $link_text; ?></a>
	</div>
<?php endif; ?>


