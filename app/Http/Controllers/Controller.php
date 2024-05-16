<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public static function returnSlashes(){
        if (env('APP_SO') == 'LINUX' ) {
            return '/';
        }else{
            return '\\';
        }
    }
}
