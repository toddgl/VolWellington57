<?php

namespace Application\Block\VWHdrImage;
defined('C5_EXECUTE') or die("Access Denied.");
use Concrete\Core\Block\BlockController;
use Core;

class Controller extends BlockController
{

    public $helpers = array('form');

    protected $btInterfaceWidth = 450;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
    protected $btInterfaceHeight = 560;
    protected $btExportFileColumns = array('fID');
    protected $btName = 'Header Image';
  	protected $btDescription = 'Image and page title for the top of the page';
    protected $btTable = 'btVWHdrImage';

    public function getBlockTypeDescription()
    {
        return t("Displays a the header image and text.");
    }

    public function getBlockTypeName()
    {
        return t("VWHdrImage");
    }

    public function getSearchableContent()
    {
        return $this->title . "\n" . $this->paragraph;
    }

    public function view()
    {
        $image = false;
        if ($this->fID) {
            $f = \File::getByID($this->fID);
            if (is_object($f)) {
                $image = Core::make('html/image', array($f, false))->getTag();
                $image->alt($this->name);
                $this->set('image', $image);

            }
        }
    }

}
