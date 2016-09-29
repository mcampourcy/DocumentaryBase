<?php

namespace Modules\Media\Controllers;
use Core\Controllers\Controller;
use Modules\Media\DAO\MediaDAO;

/**
 * Class MediaController
 * @package Modules\Media\Controllers
 */

class MediaController extends Controller
{
    /**
     * @var MediaDAO
     */
	private $_DB;

    /**
     * MediaController constructor.
     * @param null $name
     */
	public function __construct($name = null){
		$page = ($name == null) ? __CLASS__ : $name;
		parent::__construct($page);
		$this->_DB = new MediaDAO();
	}

    /**
     *
     */
	public function getAllMedias(){
	    $datas = $this->_DB->getAllMedias();
        if(is_array($datas)){
            $this->callView($datas, 'medias', 'media');
        } else {
            echo $datas;
        }
    }

    public function includeMediasDocument(){
        $datas = $this->_DB->getAllMedias();
        if(is_array($datas)){
            return $datas;
        } else {
            echo $datas;
        }
    }

    /**
     * @param $datas
     * @return string
     */
    public function postMediaForm($datas){
        $media = $this->_DB->uploadMedia($datas);
        $this->callView($media, 'mediaPost', 'media');
    }

    public function deleteMedia($id){
        $this->_DB->deleteMedia($id);
    }

}