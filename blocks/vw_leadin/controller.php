<?php  
namespace Application\Block\VwLeadin;

use Concrete\Core\Block\BlockController;
use View;
use File;
use stdClass;
use Loader;


class Controller extends BlockController {
	
	protected $btName = 'Leadin Block';
	protected $btDescription = 'Block for the leadin pages its doesn\'t contain links';
	protected $btTable = 'btDCVwLeadin';
	
	protected $btInterfaceWidth = "700";
	protected $btInterfaceHeight = "450";
	
	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
	
	public function getSearchableContent() {
		$content = array();
		$content[] = $this->field_1_textbox_text;
		$content[] = $this->field_2_textarea_text;
		return implode(' - ', $content);
	}








}
