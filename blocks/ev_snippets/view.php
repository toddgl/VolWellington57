<?php defined('C5_EXECUTE') or die("Access Denied.");
?>

<?php if (!empty($field_1_textarea_text)): ?>
	<div class="blue-wrapper">
<div>
<h3 class="vol-font"><strong><?php echo nl2br(htmlentities($field_1_textarea_text, ENT_QUOTES, APP_CHARSET)); ?></strong></h3>
</div>
<?php endif; ?>

<?php if (!empty($field_2_textarea_text)): ?>
	<strong><?php echo nl2br(htmlentities($field_2_textarea_text, ENT_QUOTES, APP_CHARSET)); ?></strong>
<br>
<?php endif; ?>

<?php if (!empty($field_3_textarea_text)): ?>
	<?php echo nl2br(htmlentities($field_3_textarea_text, ENT_QUOTES, APP_CHARSET)); ?></br>
<?php endif; ?>

<?php if (!empty($field_4_textarea_text)): ?>
	<strong><?php echo nl2br(htmlentities($field_4_textarea_text, ENT_QUOTES, APP_CHARSET)); ?></strong>
</div>
<?php endif; ?>
