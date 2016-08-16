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
	public $filename;

	public function __construct($name = null)
	{
        $page = ($name == null) ? __CLASS__ : $name;
		parent::__construct($page);
	}

	public function buildMenu($cat = null)
	{
		$this->DB = new categoryDAO();
        $datas = $this->DB->getAllCategories();
        foreach ($datas as $d){
            $d['select_cat'] = $cat;
        }
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

}