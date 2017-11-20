<?php defined('C5_EXECUTE') or die("Access Denied.");
$nh = Loader::helper('navigation');
?>

<?php if (!empty($field_1_link_cID)):
	$link_url = $nh->getLinkToCollection(Page::getByID($field_1_link_cID), true);
	$link_text = empty($field_1_link_text) ? $link_url : htmlentities($field_1_link_text, ENT_QUOTES, APP_CHARSET);
	?>
	<div class="teaser">
	<a href="<?php echo $link_url; ?>"><?php echo $link_text; ?>
<?php endif; ?>

<?php if (!empty($field_2_textbox_text)): ?>
	<div class="label">
		<span class="align">
			<h4><strong><?php echo htmlentities($field_2_textbox_text, ENT_QUOTES, APP_CHARSET); ?></strong></h4>
<?php endif; ?>

<?php if (!empty($field_3_textarea_text)): ?>
	<p><?php echo nl2br(htmlentities($field_3_textarea_text, ENT_QUOTES, APP_CHARSET)); ?></p></span>
<?php endif; ?>
		</span>
<?php if (!empty($field_4_textbox_text)): ?>
	<span class="add-label">
			<h4><strong><?php echo htmlentities($field_4_textbox_text, ENT_QUOTES, APP_CHARSET); ?></h4>
	</span>
<?php endif; ?>
</div>
    </a>
</div>



