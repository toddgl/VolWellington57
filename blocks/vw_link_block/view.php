<?php defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php if (!empty($field_1_textbox_text)): ?>
	<div class="teaser">
    <a href=<?php echo htmlentities($field_1_textbox_text, ENT_QUOTES, APP_CHARSET); ?>>
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
