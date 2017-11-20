<?php defined('C5_EXECUTE') or die("Access Denied.");
$nh = Loader::helper('navigation');
?>

<ul class="nav navbar-right navbar-upper">

	<?php if (!empty($field_1_link_cID)):
		$link_url = $nh->getLinkToCollection(Page::getByID($field_1_link_cID), true);
		$link_text = empty($field_1_link_text) ? $link_url : htmlentities($field_1_link_text, ENT_QUOTES, APP_CHARSET);
		?>
		<li>
		<a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
		</li>
	<?php endif; ?>

<?php if (!empty($field_2_link_cID)):
	$link_url = $nh->getLinkToCollection(Page::getByID($field_2_link_cID), true);
	$link_text = empty($field_2_link_text) ? $link_url : htmlentities($field_2_link_text, ENT_QUOTES, APP_CHARSET);
	?>
	<li>
	<a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
	</li>
<?php endif; ?>

<?php if (!empty($field_3_link_cID)):
	$link_url = $nh->getLinkToCollection(Page::getByID($field_3_link_cID), true);
	$link_text = empty($field_3_link_text) ? $link_url : htmlentities($field_3_link_text, ENT_QUOTES, APP_CHARSET);
	?>
	<li>
	<a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
	</li>
<?php endif; ?>

<?php if (!empty($field_4_link_cID)):
	$link_url = $nh->getLinkToCollection(Page::getByID($field_4_link_cID), true);
	$link_text = empty($field_4_link_text) ? $link_url : htmlentities($field_4_link_text, ENT_QUOTES, APP_CHARSET);
	?>
	<li>
	<a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
	</li>
<?php endif; ?>

</ul>
