<?php defined('C5_EXECUTE') or die("Access Denied.");
$nh = Loader::helper('navigation');
?>

<?php if (!empty($field_1_textbox_text)): ?>
	<div class="section_hdr"><?php echo htmlentities($field_1_textbox_text, ENT_QUOTES, APP_CHARSET); ?></div>
<?php endif; ?>

<?php if (!empty($field_2_textbox_text)): ?>
	<table class="table table-hover">
<tbody>
<tr>
<td>
<time class="icon">
  <em><?php echo htmlentities($field_2_textbox_text, ENT_QUOTES, APP_CHARSET); ?></em>
<?php endif; ?>

<?php if (!empty($field_3_textbox_text)): ?>
	<strong><?php echo htmlentities($field_3_textbox_text, ENT_QUOTES, APP_CHARSET); ?></strong>
<?php endif; ?>

<?php if (!empty($field_4_textbox_text)): ?>
	<span><?php echo htmlentities($field_4_textbox_text, ENT_QUOTES, APP_CHARSET); ?></span>
</time>
</td>
<?php endif; ?>

<?php if (!empty($field_5_textbox_text)): ?>
	<td>
    <h3 class="vol-font"><?php echo htmlentities($field_5_textbox_text, ENT_QUOTES, APP_CHARSET); ?></h3>
<?php endif; ?>

<?php if (!empty($field_6_textarea_text)): ?>
	<p class="vol-font"><?php echo nl2br(htmlentities($field_6_textarea_text, ENT_QUOTES, APP_CHARSET)); ?></p>
<?php endif; ?>

<?php if (!empty($field_7_link_cID)):
	$link_url = $nh->getLinkToCollection(Page::getByID($field_7_link_cID), true);
	$link_text = empty($field_7_link_text) ? $link_url : htmlentities($field_7_link_text, ENT_QUOTES, APP_CHARSET);
	?>
	<div class="blue">
	<a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
	</div>
</td>
</tr>
</tbody>
</table>
<?php endif; ?>


