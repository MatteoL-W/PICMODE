<?php

/* Vérification de la route */
for ($i = 0; $i < count($router); $i++) {
    if ($router[$i][0] == $_SERVER['REQUEST_URI']) {
        $currentRoute = $router[$i];
        break;
    }
}

if ($currentRoute) {
    $controller = '\\Controllers\\' . $currentRoute[1]['controller'];
    $actionString = $currentRoute[1]['action'];

    //ToDo: Handle broken links
    if (class_exists($controller)) {
        $controller = new $controller;

        if (is_callable([$controller, $actionString])) {
            // on vérifie que ça fonctionne
            call_user_func_array([$controller, $actionString], []);
        }
    }
}
