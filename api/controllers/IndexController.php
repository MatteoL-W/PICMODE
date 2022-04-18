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

    public function about()
    {
        // load about
        return_view('index/about', []);
    }

    public function test(int $id)
    {
        $example = new Example;
        $example = $example->selectAll();
        return_json(json_encode($example));
    }

    public function test2(int $id, int $id2)
    {
        var_dump($id, $id2);
    }
}