<?php
defined('C5_EXECUTE') or die('Access Denied.')
?>
<?php
$view->inc('elements/header.php');
?>
<div class="container-fluid">
	<div class="row-fluid">
			<!-- Lead in Image with page title -->
			<?php
			$areaHdrImage = new Area('HdrImage');
			$areaHdrImage->display($c);
			?>
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid section_nav">
		<!-- Section inline nav menu -->
		<?php
		$areaSectionNav = new Area('SectionNav');
		$areaSectionNav->display($c);
		?>
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid nav_separator">
		<hr>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php
				$areaLMain1 = new Area('Left_Main1');
				$areaLMain1->display($c);
			?>
		</div>
		<div class="col-md-4">
			<?php
				$areaRMain1 = new Area('Right_Main1');
				$areaRMain1->display($c);
			?>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<?php
				$areaLMain2 = new Area('Left_Main2');
				$areaLMain2->display($c);
			?>
		</div>
		<div class="col-md-4">
			<?php
				$areaRMain2 = new Area('Right_Main2');
				$areaRMain2->display($c);
			?>
		</div>
	</div>
</div>

<?php
$view->inc('elements/footer_clean.php');
?>
