<?php defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php if (!empty($field_1_textbox_text)): ?>
	<address>
<strong><?php echo htmlentities($field_1_textbox_text, ENT_QUOTES, APP_CHARSET); ?></strong><br>
<?php endif; ?>

<?php if (!empty($field_2_textbox_text)): ?>
	<abbr title="Phone">Phone:</abbr><?php echo htmlentities($field_2_textbox_text, ENT_QUOTES, APP_CHARSET); ?><br>
<?php endif; ?>

<?php if (!empty($field_3_textbox_text)): ?>
	<abbr title="Email">Email:</abbr><?php echo htmlentities($field_3_textbox_text, ENT_QUOTES, APP_CHARSET); ?><br><br>
<?php endif; ?>

<?php if (!empty($field_4_textarea_text)): ?>
	<?php echo nl2br(htmlentities($field_4_textarea_text, ENT_QUOTES, APP_CHARSET)); ?></address>
<?php endif; ?>

<?php if (!empty($field_5_image)): ?>
	<img src="<?php echo $field_5_image->src; ?>" width="<?php echo $field_5_image->width; ?>" height="<?php echo $field_5_image->height; ?>" alt="" />
<?php endif; ?>

<?php if (!empty($field_6_link_url)):
	$link_url = $this->controller->valid_url($field_6_link_url);
	$link_text = empty($field_6_link_text) ? $field_6_link_url : htmlentities($field_6_link_text, ENT_QUOTES, APP_CHARSET);
	?>
	<b>
	<a href="<?php echo $link_url; ?>" target="_blank"><?php echo $link_text; ?></a>
	</b>
	<br>
<?php endif; ?>


