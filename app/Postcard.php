<?php

namespace App;

class Postcard
{
    public static function resolveFacade($name)
    {
        return app()[$name];
    }
    public static function __callStatic($method, $arguments)
    {
        // dump(app()->make('Postcard'));
        // dump(app()['Postcard']);
        return self::resolveFacade('Postcard')
            ->$method(...$arguments);
    }
}
