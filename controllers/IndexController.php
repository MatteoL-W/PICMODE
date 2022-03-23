<?php

namespace Controllers;

use Models\Example;

class IndexController
{
    public function home()
    {
        view('index/home', [
            'nom' => 'matteo'
        ]);
    }

    public function about()
    {
        // load about
        view('index/about', []);
    }

    public function test(int $id)
    {
        $example = new Example;
        $example = $example->selectAll();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($example);
    }
}