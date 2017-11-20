<?php
namespace Application\Block\VwLinkBlock;

use Concrete\Core\Block\BlockController;
use View;
use File;
use stdClass;
use Loader;


class Controller extends BlockController {

	protected $btName = 'Link Block';
	protected $btDescription = 'Block to provide link to functionality';
	protected $btTable = 'btDCVwLinkBlock';

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
		$content[] = $this->field_3_textarea_text;
		$content[] = $this->field_4_textbox_text;
		return implode(' - ', $content);
	}








}
