<?php

function view(string $view, array $data = []) : void
{
    $file = dirname(__FILE__, 2) . '/views/' . $view . '.php';

    if (is_readable($file)) {
        foreach ($data as $key => $value) {
            $$key = $value;
        }
        require_once $file;
    } else {
        // View does not exist
        die('<h1> 404 Page not found </h1>');
    }
}