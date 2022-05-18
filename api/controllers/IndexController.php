<?php

namespace Controllers;

use Models\Example;

class IndexController
{
    public function index($router)
    {
        return_view('index/home', [
            'routes' => $router
        ]);
    }

    public function demo_view()
    {
        // load about
        return_view('index/demo', []);
    }
}