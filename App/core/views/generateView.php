<?php
namespace Core\Views;

/**
 * Class generateView
 * @package Core
 */
class generateView
{
    private $_layout;
    private $_menu;
	private $_content;
    private $_datas;
    private $_page;

    /**
     * generateView constructor.
     * @param $page
     * @param $module
     * each content is wrapped in a layout
     * the menu is in the layout, in all the pages
     */
    public function __construct($page, $module)
    {
        $this->_page = $page;
        //define the layout template path
        $this->_layout = PRIVATE_ROOT.'core/views/templates/layout.php';
        //define the menu template path
        $this->_menu = PRIVATE_ROOT.'modules/category/templates/menuView.php';
        //define datas name
	    $this->_datas = $this->_page.'Data';
        //define, if needed, the module
        $module = $module ? $module : $this->_page;
        //define the content path
        $this->_content = PRIVATE_ROOT.'modules/'.$module.'/templates/'.$this->_page.'View.php';
    }

    /**
     * generate method
     * @param $datas
     * @param $menu_datas
     */
    public function generate($datas, $menu_datas, $cat_id = null, $subcat_id = null){
        //generate the HTML of the content view
        $content = $this->render($this->_content, $datas, $this->_datas);
        //generate the HTML of the menu
        $menu = $this->render($this->_menu, array('menu' => $menu_datas, 'cat_id' => $cat_id, 'subcat_id' => $subcat_id, 'page' => $this->_page), 'menuData');
        //generate the HTML of the layout, include the content and the menu
        $view = $this->render($this->_layout, array('menu' => $menu, 'content' => $content, 'page' => $this->_page),
            'viewData');
        echo $view;
    }

    /**
     * render methode
     * @param $template
     * @param array $data_array
     * @param $viewPage
     * @return string
     */
    public function render($template, $data_array = [], $viewPage){
        if(file_exists($template)){
            //if the template file exists, fills the array with the objects array (=> 2 dimensions array)
            $datas = [$viewPage => $data_array];
            if(!empty($data_array)) extract($datas);
            //ob_start — Turn on output buffering. While output buffering is active no output is sent from the script (other than headers), instead the output is stored in an internal buffer.
            ob_start();
            require_once $template;
            return ob_get_clean(); //ob_get_clean — Get current buffer contents and delete current output buffer

        }
    }

}