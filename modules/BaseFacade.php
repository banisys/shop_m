<?php


namespace Modules;


use Illuminate\Support\Facades\Facade;

class BaseFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return static::class;
    }

    public static function shouldProxyTo($class)
    {
        app()->singleton(self::getFacadeAccessor() , $class);
    }
}
