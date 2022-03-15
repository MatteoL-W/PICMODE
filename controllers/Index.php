<?php

namespace Controllers;

class Index
{
    public function home()
    {
        // load home
        view('home', [
            'nom' => 'matteo'
        ]);
    }

    public function about()
    {
        // load about
        view('about', []);
    }

    public function test(int $id)
    {
        view('testId', [
            'id' => $id
        ]);
    }
}