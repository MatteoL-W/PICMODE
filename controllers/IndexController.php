<?php

namespace Controllers;

use Models\Example;

class IndexController
{
    public function home()
    {
        // load home

        $example = new Example;
        var_dump($example->selectAll());

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
        view('index/testId', [
            'id' => $id
        ]);
    }
}