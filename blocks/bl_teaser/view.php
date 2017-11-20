<?php defined('C5_EXECUTE') or die("Access Denied.");
$nh = Loader::helper('navigation');
?>
<div class="container">
	<div class="row">
	<div class="col-md-8">
	<div class="blue-wrapper">
<?php if (!empty($field_1_textbox_text)): ?>
	<div>
	<h3 class="vol-font"><?php echo htmlentities($field_1_textbox_text, ENT_QUOTES, APP_CHARSET); ?>
	</div>
<?php endif; ?>

<?php if (!empty($field_2_image)): ?>
	<div class="col-md-4">
	<img class="img-thumbnail img-responsive" src="<?php echo $field_2_image->src; ?>" width="<?php echo $field_2_image->width; ?>" height="<?php echo $field_2_image->height; ?>" alt="" />
	</div>
<?php endif; ?>

<?php if (!empty($field_3_textbox_text)): ?>
	<div class="bg-info col-md-8 pull-right">
<div class="inside"><?php echo htmlentities($field_3_textbox_text, ENT_QUOTES, APP_CHARSET); ?></br>
<?php endif; ?>

<?php if (!empty($field_4_link_cID)):
	$link_url = $nh->getLinkToCollection(Page::getByID($field_4_link_cID), true);
	$link_text = empty($field_4_link_text) ? $link_url : htmlentities($field_4_link_text, ENT_QUOTES, APP_CHARSET);
	?>
	<a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
	</div>
</div>
<?php endif; ?>
</div>
</div>
</div>
</div>
