<?php  
namespace Application\Block\EvSnippets;

use Concrete\Core\Block\BlockController;
use View;
use File;
use stdClass;
use Loader;


class Controller extends BlockController {
	
	protected $btName = 'EV Snippets';
	protected $btDescription = 'Block for creating Employee Volunteering opportunity snippets';
	protected $btTable = 'btDCEvSnippets';
	
	protected $btInterfaceWidth = "700";
	protected $btInterfaceHeight = "450";
	
	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
	
	public function getSearchableContent() {
		$content = array();
		$content[] = $this->field_1_textarea_text;
		$content[] = $this->field_2_textarea_text;
		$content[] = $this->field_3_textarea_text;
		$content[] = $this->field_4_textarea_text;
		return implode(' - ', $content);
	}








}
