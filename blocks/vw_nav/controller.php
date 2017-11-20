<?php
namespace Application\Block\VwNav;

use Concrete\Core\Block\BlockController;
use View;
use File;
use stdClass;
use Loader;


class Controller extends BlockController {

	protected $btName = 'Manual Nav';
	protected $btDescription = 'Used to set the header global area nav';
	protected $btTable = 'btDCVwNav';

	protected $btInterfaceWidth = "700";
	protected $btInterfaceHeight = "450";

	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;





	public function save($args) {
		$args['field_1_link_cID'] = empty($args['field_1_link_cID']) ? 0 : $args['field_1_link_cID'];
		$args['field_2_link_cID'] = empty($args['field_2_link_cID']) ? 0 : $args['field_2_link_cID'];
		$args['field_3_link_cID'] = empty($args['field_3_link_cID']) ? 0 : $args['field_3_link_cID'];
		$args['field_4_link_cID'] = empty($args['field_4_link_cID']) ? 0 : $args['field_4_link_cID'];
		parent::save($args);
	}




}
