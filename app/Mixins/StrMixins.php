<?php

namespace App\Mixins;

class StrMixins
{
    public function postfix()
    {
        return function ($name) {
            return $name . '-AB';
        };
    }
}
