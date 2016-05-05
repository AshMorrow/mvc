<?php

/**
 * Created by PhpStorm.
 * User: KoRaG
 * Date: 05.05.2016
 * Time: 21:39
 */
class SecurityController extends Controller // В контролере находится рендер
{
    public function loginAction(Request $request){
        $form = new LoginForm($request);

        if($request->isPost()){
            if($form->isValid()){
                Session::setFlash('Success');
                Router::redirect('/index.php?route=security/login');
            }

            Session::setFlash('You idiot');
        }
        return $this->render('index',compact($form));

    }

}