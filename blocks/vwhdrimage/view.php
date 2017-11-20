<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>
<div class="col-sm-12 thumbnail text-center">
	<?php if ($image): ?>
		<img src="<?php echo $image->src ?>" class="img-responsive" alt="Responsive image"/>
	<?php endif; ?>
<div class="caption">
	<h3>
		<?php echo $title?>
	</h3>
</div>
</div>
