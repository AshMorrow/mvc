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
        return $this->render('index');

    }

}