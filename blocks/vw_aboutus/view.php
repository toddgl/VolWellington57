<?php defined('C5_EXECUTE') or die("Access Denied.");
$nh = Loader::helper('navigation');
?>

<?php if (!empty($field_1_textarea_text)): ?>
	<h3 class="blue"><?php echo nl2br(htmlentities($field_1_textarea_text, ENT_QUOTES, APP_CHARSET)); ?></h3>
<?php endif; ?>

<?php if (!empty($field_2_wysiwyg_content)): ?>
	<div>
<b>
	<?php echo $field_2_wysiwyg_content; ?>
	</b>
</div>
<?php endif; ?>

<?php if (!empty($field_3_wysiwyg_content)): ?>
	<div>
<p>
	<?php echo $field_3_wysiwyg_content; ?>
	</p>
</div>
<?php endif; ?>

<?php if (!empty($field_4_link_cID)):
	$link_url = $nh->getLinkToCollection(Page::getByID($field_4_link_cID), true);
	$link_text = empty($field_4_link_text) ? $link_url : htmlentities($field_4_link_text, ENT_QUOTES, APP_CHARSET);
	?>
	<div>
<b>
	<a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
	</b>
</div>
<?php endif; ?>


