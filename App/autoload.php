<?php
/**
 * Class Autoloader
 */
class Autoloader{

    /**
     * Call the autoloader with the class in parameter
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Include the file corresponding to the class
     * @param $class string
     */
    static function autoload($class){
        $parts = explode('\\', $class);
        $namespace = array_pop($parts);

        $path = implode('/', $parts);
        $file = $namespace.'.php';

        $filepath = PRIVATE_ROOT.strtolower($path).'/'.$file;
        if(file_exists($filepath)) require_once($filepath);
    }

}