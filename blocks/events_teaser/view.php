<?php defined('C5_EXECUTE') or die("Access Denied.");
$nh = Loader::helper('navigation');
?>

<h3><strong>Events</strong></h3>
<?php if (!empty($field_1_textbox_text)): ?>
<div>
<table class="table table-hover">
<tbody>
<tr>
<td><button type="button" class="btn bn-secondary white"><p class="text-right"><?php echo htmlentities($field_1_textbox_text, ENT_QUOTES, APP_CHARSET); ?></p></button></td>
<?php endif; ?>

<?php if (!empty($field_2_textbox_text)): ?>
	<td><b class="vol-font"><?php echo htmlentities($field_2_textbox_text, ENT_QUOTES, APP_CHARSET); ?></b><br/>
<?php endif; ?>

<?php if (!empty($field_3_textbox_text)): ?>
	<p class="vol-font"><?php echo htmlentities($field_3_textbox_text, ENT_QUOTES, APP_CHARSET); ?></p>

<?php endif; ?>

<?php if (!empty($field_4_link_cID)):
	$link_url = $nh->getLinkToCollection(Page::getByID($field_4_link_cID), true);
	$link_text = empty($field_4_link_text) ? $link_url : htmlentities($field_4_link_text, ENT_QUOTES, APP_CHARSET);
	?>
	<div class="blue">
	<a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
	</div>
</td>
</tr>
<?php endif; ?>

<?php if (!empty($field_5_textbox_text)): ?>
	<tr>
<td><button type="button" class="btn bn-secondary"><p class="text-right"><?php echo htmlentities($field_5_textbox_text, ENT_QUOTES, APP_CHARSET); ?></p></button></td>
<?php endif; ?>

<?php if (!empty($field_6_textbox_text)): ?>
	<td><b class="vol-font"><?php echo htmlentities($field_6_textbox_text, ENT_QUOTES, APP_CHARSET); ?></b><br/>
<?php endif; ?>

<?php if (!empty($field_7_textbox_text)): ?>
	<p class="vol-font"><?php echo htmlentities($field_7_textbox_text, ENT_QUOTES, APP_CHARSET); ?></p>
<?php endif; ?>

<?php if (!empty($field_8_link_cID)):
	$link_url = $nh->getLinkToCollection(Page::getByID($field_8_link_cID), true);
	$link_text = empty($field_8_link_text) ? $link_url : htmlentities($field_8_link_text, ENT_QUOTES, APP_CHARSET);
	?>
	<div class="blue">
	<a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
	</div>
</td>
</tr>
<?php endif; ?>

<?php if (!empty($field_9_textbox_text)): ?>
	<tr>
<td><button type="button" class="btn bn-secondary"><p class="text-right"><?php echo htmlentities($field_9_textbox_text, ENT_QUOTES, APP_CHARSET); ?></p></button></td>
<?php endif; ?>

<?php if (!empty($field_10_textbox_text)): ?>
	<td><b class="vol-font"><?php echo htmlentities($field_10_textbox_text, ENT_QUOTES, APP_CHARSET); ?></b><br/>
<?php endif; ?>

<?php if (!empty($field_11_textbox_text)): ?>
	<p class="vol-font"><?php echo htmlentities($field_11_textbox_text, ENT_QUOTES, APP_CHARSET); ?></p>
<?php endif; ?>

<?php if (!empty($field_12_link_cID)):
	$link_url = $nh->getLinkToCollection(Page::getByID($field_12_link_cID), true);
	$link_text = empty($field_12_link_text) ? $link_url : htmlentities($field_12_link_text, ENT_QUOTES, APP_CHARSET);
	?>
	<div class="blue">
	<a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
	</div>
<?php endif; ?>
</td>
</tr>
</tbody>
</table>
</div>
