<?php

namespace Controllers;

class RouteError
{
    static public function error404()
    {
        view('error/error404', []);
    }
}