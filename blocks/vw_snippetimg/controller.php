<?php
namespace Application\Block\VwSnippetimg;

use Concrete\Core\Block\BlockController;
use View;
use File;
use stdClass;
use Loader;


class Controller extends BlockController {

	protected $btName = 'Snippet & Image';
	protected $btDescription = 'Image with snippet of information';
	protected $btTable = 'btDCVwSnippetimg';

	protected $btInterfaceWidth = "700";
	protected $btInterfaceHeight = "450";

	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;

	public function getSearchableContent() {
		return $this->field_2_textarea_text;
	}

	public function view() {
		$this->set('field_1_image', (empty($this->field_1_image_fID) ? null : $this->get_image_object($this->field_1_image_fID, 280, 280, true)));
	}


	public function edit() {
		$this->set('field_1_image', (empty($this->field_1_image_fID) ? null : File::getByID($this->field_1_image_fID)));
	}

	public function save($args) {
		$args['field_1_image_fID'] = empty($args['field_1_image_fID']) ? 0 : $args['field_1_image_fID'];
		parent::save($args);
	}

	//Helper function for image fields
	private function get_image_object($fID, $width = 0, $height = 0, $crop = false) {
		if (empty($fID)) {
			$image = null;
		} else if (empty($width) && empty($height)) {
			//Show image at full size (do not generate a thumbnail)
			$file = File::getByID($fID);
			$image = new stdClass;
			$image->src = $file->getRelativePath();
			$image->width = $file->getAttribute('width');
			$image->height = $file->getAttribute('height');
		} else {
			//Generate a thumbnail
			$width = empty($width) ? 9999 : $width;
			$height = empty($height) ? 9999 : $height;
			$file = File::getByID($fID);
			$ih = Loader::helper('image');
			$image = $ih->getThumbnail($file, $width, $height, $crop);
		}

		return $image;
	}



}
