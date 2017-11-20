<?php defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php if (!empty($field_1_image)): ?>
	<table class="resources">
		<tbody>
		<tr>
		<td>
			<img src="<?php echo $field_1_image->src; ?>" width="<?php echo $field_1_image->width; ?>" height="<?php echo $field_1_image->height; ?>" alt="" />
			<?php if (!empty($field_5_textbox_text)): ?>
				<i><span class="size"><?php echo htmlentities($field_5_textbox_text, ENT_QUOTES, APP_CHARSET); ?></span></i>
			<?php endif; ?>
		</td>
<?php endif; ?>

<td>
<?php if (!empty($field_2_file)):
	$link_url = View::url('/download_file/force', $field_2_file_fID, Page::getCurrentPage()->getCollectionID());
	$link_class = 'file-'.$field_2_file->getExtension();
	$link_text = empty($field_2_file_linkText) ? $field_2_file->getFileName() : htmlentities($field_2_file_linkText, ENT_QUOTES, APP_CHARSET);
	?>
	<a href="<?php echo $link_url; ?>" class="<?php echo $link_class; ?>">
		<?php if (!empty($field_3_textbox_text)): ?>
			<h4><?php echo htmlentities($field_3_textbox_text, ENT_QUOTES, APP_CHARSET); ?></h4>
		<?php endif; ?>
	</a>
<?php endif; ?>

<?php if (!empty($field_4_textarea_text)): ?>
	<?php echo nl2br(htmlentities($field_4_textarea_text, ENT_QUOTES, APP_CHARSET)); ?>
<?php endif; ?>

</td>
</tr>
</tbody>
</table>
