<?php

namespace Controllers;

class ErrorController
{
    static public function error404()
    {
        view('error/error404', []);
    }
}