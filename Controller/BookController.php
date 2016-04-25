<?php

/**
 * Created by PhpStorm.
 * User: koragg
 * Date: 21.04.16
 * Time: 16:32
 */
class BookController extends Controller
{
    public function indexAction(Request $request){
        return $this->render('index',$param);
    }
    
    public function contactAction(Request $request){
        return "<b>This is contact action of book controller</b>";  
    }
}