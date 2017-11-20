<?php  
namespace Application\Block\VwEventsTeaser;

use Concrete\Core\Block\BlockController;
use View;
use File;
use stdClass;
use Loader;


class Controller extends BlockController {
	
	protected $btName = 'Events Teaser';
	protected $btDescription = 'Provides the means to provide a teaser for upcoming events';
	protected $btTable = 'btDCVwEventsTeaser';
	
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
		$content[] = $this->field_2_textbox_text;
		$content[] = $this->field_3_textbox_text;
		$content[] = $this->field_4_textbox_text;
		$content[] = $this->field_5_textbox_text;
		$content[] = $this->field_6_textarea_text;
		return implode(' - ', $content);
	}




	public function save($args) {
		$args['field_7_link_cID'] = empty($args['field_7_link_cID']) ? 0 : $args['field_7_link_cID'];
		parent::save($args);
	}




}
