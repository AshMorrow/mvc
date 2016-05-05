<?php

/**
 * Created by PhpStorm.
 * User: KoRaG
 * Date: 05.05.2016
 * Time: 3:12
 */
abstract class MetaHelper
{
    /**
     * Генерация присваевание тайтлов
     */

    private static $title = 'Mega site';
    const SEPARATOR = ' - ';
    public static function getTitle(){

        return self::$title;
    }

    public static function addTitle($title){
        self::$title.=self::SEPARATOR.$title;
    }

    public static function setTitle($title){
        self::$title = $title;
    }

}