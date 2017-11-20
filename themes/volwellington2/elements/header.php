<?php
defined('C5_EXECUTE') or die('Access Denied.')
?>
<!DOCTYPE html>
<html lang ="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="canonical" href="https://volunteerwellington.nz/">
		<link rel="stylesheet" href="<?php echo $this->getThemePath()?>/css/bootstrap.min.css" >
		<link rel="stylesheet" type="text/css" href="<?php echo $view->getStylesheet('main.less')?>" >
		<script src="<?php echo $this->getThemePath()?>/js/jquery.min.js"></script>
		<script src="<?php echo $this->getThemePath()?>/js/bootstrap.min.js"></script>
				<script type="text/javascript">
				$(document).ready(function() {
    		$('.dropdown-toggle').dropdown();
				});
		</script>
		<!--HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!-- [if 1t IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php Loader::element('header_required');?>
	</head>
	<body>
	<div class="<?php echo $c->getPageWrapperClass()?>">
	<header class="red">
		<nav class="nav-upper">
			<a class="navbar-logo" href=<?php echo DIR_REL?>/index.php><img src="<?php echo $this->getThemePath()?>/images/VolunteerWellington_white.png" alt="Volunteer Wellington Icon" height="60" width="60"/></a>
			<p class="navbar-text">Volunteer Wellington <br>Te Puna Tautoko <br>A Catalyst for Involvement in the Community</p>
			<div class="container-fluid">
				<?php
		 			$uppernav = new GlobalArea('uppernav');
		 			$uppernav->display($c);
	 			?>
			</div>
		</nav>
		<nav class="navbar navbar-static-top navbar-lower">
  		<div class="container-fluid bg-black">
				<div class="navbar-header">
	    		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	      		<span class="sr-only">Toggle navigation</span>
	      		<span class="icon-bar"></span>
	      		<span class="icon-bar"></span>
	      		<span class="icon-bar"></span>
	    		</button>
	    	</div>
	  		<div class="navbar navbar-collapse collapse" id="navbar" >
					<?php
						$nav = BlockType::getByHandle('autonav');
						$nav->controller->orderBy = 'display_asc';
						$nav->controller->displayPages = 'top';
						$nav->controller->displaySubPages = 'all';
						$nav->controller->displaySubPageLevels = 'custom';
						$nav->controller->displaySubPageLevelsNum = 3;
						$nav->render('templates/bootstrapdropdownnav');
					?>
	  		</div><!--/.nav-collapse -->
			</div>
		</nav>
</header>
