<?php
defined('C5_EXECUTE') or die('Access Denied.')
?>

<div class="container-fluid">
 	<div class="row">
		<section class="footer-header white vol-font ">
      <?php
         $areaFooterHdr = new GlobalArea('FooterHdr');
         $areaFooterHdr->display($c);
       ?>
		</section>
	</div>
</div>


  <div class="container-fluid bg-connect vol-font white">
    <div class="row ">
      <section class="col-md-4">
    	   <?php
			      $areaAddress1 = new GlobalArea('address1');
            $areaAddress1->display($c);
          ?>
      </section>
      <section class="col-md-4">
        <?php
			    $areaAddress2 = new GlobalArea('address2');
			    $areaAddress2->display($c);
		    ?>
      </section>

      <section class="col-md-4">
        <?php
			   $areaAddress3 = new GlobalArea('address3');
         $areaAddress3->display($c);
		    ?>
      </section>
    </div>
  </div>



 <footer id="concrete5-brand">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span><?php  echo t('Built with <a href="http://www.concrete5.org" class="concrete5">concrete5</a> CMS.')?></span>
            </div>
        </div>
    </div>
	</footer>
  <?php Loader::element('footer_required')?>
</div>

</body>
</html>
