<?php  
namespace Application\Block\EventsTeaser;

use Concrete\Core\Block\BlockController;
use View;
use File;
use stdClass;
use Loader;


class Controller extends BlockController {
	
	protected $btName = 'Events teaser';
	protected $btDescription = 'Teaser to display three events';
	protected $btTable = 'btDCEventsTeaser';
	
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
		$content[] = $this->field_5_textbox_text;
		$content[] = $this->field_6_textbox_text;
		$content[] = $this->field_7_textbox_text;
		$content[] = $this->field_9_textbox_text;
		$content[] = $this->field_10_textbox_text;
		$content[] = $this->field_11_textbox_text;
		return implode(' - ', $content);
	}




	public function save($args) {
		$args['field_4_link_cID'] = empty($args['field_4_link_cID']) ? 0 : $args['field_4_link_cID'];
		$args['field_8_link_cID'] = empty($args['field_8_link_cID']) ? 0 : $args['field_8_link_cID'];
		$args['field_12_link_cID'] = empty($args['field_12_link_cID']) ? 0 : $args['field_12_link_cID'];
		parent::save($args);
	}




}
