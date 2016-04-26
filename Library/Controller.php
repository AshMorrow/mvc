<?php

/**
 * Created by PhpStorm.
 * User: koragg
 * Date: 21.04.16
 * Time: 17:58
 */
abstract class Controller
{
    protected function render($view_name,$param = []){
        if(count($param) >0) {
            extract($param);
        }
        $tpl_dir = str_ireplace('Controller','',get_class($this));
        $file = VIEW_DIR.$tpl_dir.DS.$view_name.'.phtml';
        if(!file_exists($file)){
            throw new Exception($file.' not found');
        }
        ob_start();
        require $file;
        return ob_get_clean();
    }

    public function renderError($code,$massage){
        ob_start();
        require_once VIEW_DIR.'error.phtml';
        return ob_get_clean();
    }
}