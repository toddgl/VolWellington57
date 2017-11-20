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
		<div class="col-md-4">
			<?php
				$areaLeft1 = new Area('Left_Block1');
				$areaLeft1->display($c);
			?>
		</div>
		<div class="col-md-4">
			<?php
				$areaMiddle1 = new Area('Middle_Block1');
				$areaMiddle1->display($c);
			?>
		</div>
		<div class="col-md-4">
			<?php
				$areaRight1 = new Area('Right_Block1');
				$areaRight1->display($c);
			?>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php
				$areaLeft2 = new Area('Left_Block2');
				$areaLeft2->display($c);
			?>
		</div>
		<div class="col-md-3">
			<?php
				$areaLMiddle2 = new Area('Left_Middle2');
				$areaLMiddle2->display($c);
			?>
		</div>
    <div class="col-md-3">
			<?php
				$areaRMiddle2 = new Area('Right_Middle2');
				$areaRMiddle2->display($c);
			?>
		</div>
		<div class="col-md-3">
			<?php
				$areaRight2 = new Area('Right_Block2');
				$areaRight2->display($c);
			?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
				$areaContent3 = new Area('Content3');
				$areaContent3->display($c);
			?>
		</div>
  </div>
</div>

<?php
$view->inc('elements/footer_clean.php');
?>
