<?php defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php if (!empty($field_1_image)): ?>
	<img src="<?php echo $field_1_image->src; ?>" width="<?php echo $field_1_image->width; ?>" height="<?php echo $field_1_image->height; ?>" alt="" />
<?php endif; ?>

<?php if (!empty($field_2_link_url)):
	$link_url = $this->controller->valid_url($field_2_link_url);
	$link_text = empty($field_2_link_text) ? $field_2_link_url : htmlentities($field_2_link_text, ENT_QUOTES, APP_CHARSET);
	?>
	<a href="<?php echo $link_url; ?>" target="_blank"><?php echo $link_text; ?></a>
<?php endif; ?>


