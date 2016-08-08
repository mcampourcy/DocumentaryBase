<?php

namespace App\Controller;
use App\DB\categoryDAO;
use App\Model\menuModel;

/**
 * Class menucontroller
 * @package App\Controller
 */

class menuController extends Controller
{

	private $DB;
	public $page;
	public $filename;

	public function __construct($page = null)
	{
		$this->page = ($page == null) ? __CLASS__ : $page;
		parent::__construct($this->page);
	}

	public function buildMenu()
	{
		$this->DB = new categoryDAO();
        $datas = $this->DB->getAllForMenu();
        $model = $this->callCategoryModel($datas);
        return $model;
	}

    public function callCategoryModel($datas){
        $data_array = [];
        foreach ($datas as $data){
            $data_array[] = new menuModel($data);
        }
        return $data_array;
    }

    public function Test($data){
        return 'this is'.$data;
    }

}