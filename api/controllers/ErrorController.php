<?php

namespace Controllers;

class ErrorController
{
    public static function error404()
    {
        return_view('error/error404', []);
    }

    public static function errorController()
    {
        echo "erreur de controlleur";
    }
}