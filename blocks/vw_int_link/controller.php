<?php  
namespace Application\Block\VwIntLink;

use Concrete\Core\Block\BlockController;
use View;
use File;
use stdClass;
use Loader;


class Controller extends BlockController {
	
	protected $btName = 'Internal Link Teaser';
	protected $btDescription = 'Creates an link to an internal page with teaser rollovers';
	protected $btTable = 'btDCVwIntLink';
	
	protected $btInterfaceWidth = "700";
	protected $btInterfaceHeight = "450";
	
	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
	
	public function getSearchableContent() {
		$content = array();
		$content[] = $this->field_2_textbox_text;
		$content[] = $this->field_3_textarea_text;
		$content[] = $this->field_4_textbox_text;
		return implode(' - ', $content);
	}




	public function save($args) {
		$args['field_1_link_cID'] = empty($args['field_1_link_cID']) ? 0 : $args['field_1_link_cID'];
		parent::save($args);
	}




}
