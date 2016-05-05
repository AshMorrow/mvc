<?php

/**
 * Created by PhpStorm.
 * User: KoRaG
 * Date: 05.05.2016
 * Time: 21:49
 */
class LoginForm
{
    public $email;
    public $password;

    public function __construct(Request $request)
    {
        $this->email = $request->post('email');
        $this->password = $request->post('password');
    }
    
    public function isValid(){
        $rez = $this->password !== '' && $this->email !== '';
        return $rez;
    }
}