<?php

/**
 * @brief Si la vue existe, on l'affiche
 * @param string $view
 * @param array $data
 */
function return_view(string $view, array $data = []): void
{
    $file = APP_ROOT . '/views/' . $view . '.php';

    if (is_readable($file)) {
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        include(APP_ROOT . '/views/includes/header.php');
        require_once $file;
        include(APP_ROOT . '/views/includes/footer.php');

    } else {
        die('<h1>Fichier php de la vue inexistant</h1>');
    }
}

function return_json($json) {
    header('Content-Type: application/json; charset=utf-8');
    echo $json;
}