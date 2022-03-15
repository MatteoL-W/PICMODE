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
}