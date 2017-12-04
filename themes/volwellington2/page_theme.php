<?php
namespace Application\Theme\Volwellington2;
use Concrete\Core\Page\Theme\Theme;
class PageTheme extends Theme {
   protected $pThemeGridFrameworkHandle = 'bootstrap3';
   public function registerAssets() {
      $this->requireAsset('javascript', 'jquery');
      //$this->requireAsset('javascript', 'bootstrap/*');
   }
}