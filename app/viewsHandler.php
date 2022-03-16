<?php

/**
 * @brief Si la vue existe, on l'affiche
 * @param string $view
 * @param array $data
 */
function view(string $view, array $data = []) : void
{
    $file = APP_ROOT . '/views/' . $view . '.php';

    if (is_readable($file)) {
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        include('views/includes/header.php');
        require_once $file;
        include('views/includes/footer.php');

    } else {
        die('<h1>Fichier php de la vue inexistant</h1>');
    }
}