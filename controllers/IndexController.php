<?php

namespace Controllers;

use Models\Example;

class IndexController
{
    public function home()
    {
        return_view('index/home', [
            'nom' => 'cyb0rg'
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
}