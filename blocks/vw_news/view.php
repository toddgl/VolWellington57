<?php defined('C5_EXECUTE') or die("Access Denied.");
$nh = Loader::helper('navigation');
?>
<div>
	<h3><strong>News and Updates</strong></h3>
</div>
<?php if (!empty($field_1_textbox_text)): ?>
	<div>
	<div class="vol-font">
	<h4><?php echo htmlentities($field_1_textbox_text, ENT_QUOTES, APP_CHARSET); ?></h4>
</div>
 <div>
<?php endif; ?>

<?php if (!empty($field_2_wysiwyg_content)): ?>
	<?php echo $field_2_wysiwyg_content; ?>
<?php endif; ?>

<?php if (!empty($field_3_link_cID)):
	$link_url = $nh->getLinkToCollection(Page::getByID($field_3_link_cID), true);
	$link_text = empty($field_3_link_text) ? $link_url : htmlentities($field_3_link_text, ENT_QUOTES, APP_CHARSET);
	?>
	<div>
	<a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
	</div>
</div>
</div>
<?php endif; ?>
