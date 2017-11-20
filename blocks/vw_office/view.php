<?php defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php if (!empty($field_1_textbox_text)): ?>
	<div>
		<h3 class="vol-font"><strong><?php echo htmlentities($field_1_textbox_text, ENT_QUOTES, APP_CHARSET); ?></strong></h3>
	</div>
<?php endif; ?>

<div class="container">
	<div class="row">

<?php if (!empty($field_2_image)): ?>
		<div class="col-md-2">
			<div class="imgOffice">
				<img src="<?php echo $field_2_image->src; ?>" width="<?php echo $field_2_image->width; ?>" height="<?php echo $field_2_image->height; ?>" alt="<?php echo $field_2_image_altText; ?>" />
			</div>
		</div>
<?php endif; ?>

<?php if (!empty($field_3_wysiwyg_content)): ?>
	<div class="col-md-4">
		<p>
			<?php echo $field_3_wysiwyg_content; ?>
		</p>
	</div>
<?php endif; ?>

</div>
</div>

<?php if (!empty($field_4_link_url)):
	$link_url = $this->controller->valid_url($field_4_link_url);
	$link_text = empty($field_4_link_text) ? $field_4_link_url : htmlentities($field_4_link_text, ENT_QUOTES, APP_CHARSET);
	?>
		<div>
		<a href="<?php echo $link_url; ?>" class="btn btn-info btn-md" style="float:right" target="_blank"><?php echo $link_text; ?></a>
		</div>
		<div class="block-space">
		</div>
<?php endif; ?>
