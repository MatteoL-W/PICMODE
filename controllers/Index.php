<?php

namespace Controllers;

class Index
{
    public function home()
    {
        // load home
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