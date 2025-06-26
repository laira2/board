<?php

namespace App\Http\Controllers;

abstract class Controller
{
   protected static function isJsonAccepts(): bool
    {
        return request()->wantsJson();
    }
}
