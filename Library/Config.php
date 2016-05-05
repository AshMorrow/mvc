
<?php

abstract class Config
{
    private static $element = array();

    public static function set($key,$vales){

        self::$element[$key] = $vales;
    }

    public static function get($key){

        if(isset(self::$element[$key])){
            return self::$element[$key];
        }

        return false;
    }
}