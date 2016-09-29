<?php

namespace Core\Controllers;
use Core\Views\generateView;
use Modules\Category\Controllers\CategoryController;

/**
 * Class Controller
 * @package Core\Controllers
 */
class Controller
{
    private $_cat_id;
    private $_subcat_id;
	private $_page;

    /**
     * Controller constructor.
     * @param $name
     */
	public function __construct($name, $cat_id = null, $subcat_id = null){
	    $this->_cat_id = (int)$cat_id ? $cat_id : null;
        $this->_subcat_id = (int)$subcat_id ? $subcat_id : null;
		if(class_exists($name)){
			//ReflectionClass -  Give informations about a class.
			$this->_page = new \ReflectionClass($name);
			//ReflectionClass::getShortName - Return the name of a class, without the namespace
			$this->_page = explode('Controller', $this->_page->getShortName());
		} else {
			$this->_page = $name;
		}
		return $this->_page;
	}

    /**
     * @param $model
     * @param null $name
     * @param null $module
     */
	public function callView($model, $name = null, $module = null){
		if($name) $this->_page = $name;
        //set the menu
        $menu = new CategoryController();
        $menu_model = $menu->buildMenu();
		//instanciates the view
		$view = new generateView($this->_page, $module);
//        send datas in the view
        $view->generate($model, $menu_model, $this->_cat_id, $this->_subcat_id);
	}

}