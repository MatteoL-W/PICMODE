<?php

namespace Controllers;

use Models\Database;

class IndexController
{
    public function home()
    {
        // load home
        $db = new Database();
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