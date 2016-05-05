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

        $model = new BookModel();
        $books = $model->findAll();
        return $this->render('index',$books);
    }
    
    public function showAction(Request $request){
        $id = $request->get('id');
        $books = (new BookModel())->findById($id); // Оказывается так можно
        return $this->render('show',$books);
    }

    public function apiAction(Request $request){
        $model = new BookModel();
        $books = $model->findAll();
        return json_encode($books);
    }
}