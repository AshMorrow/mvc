<?php

/**
 * Created by PhpStorm.
 * User: KoRaG
 * Date: 04.05.2016
 * Time: 13:26
 */
class FeedbackModel{
    public function save(array $massage){
        //TODO: проверить что бы в массиве $masage бфли ключи как поля в таблице

        $db = DbConnection::getInstance()->getPdo();
        $db = $db->prepare('INSERT INTO feedback VLUES (:id,:username,:email,:massage,:crated,:ip)');
    }
}