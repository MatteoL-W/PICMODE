<?php

use Controllers\ErrorController;

require_once('routes.php');

/**
 * Ce fichier compare l'ensemble des routes à la page couramment exécuté
 * Si la page couramment éxécuté correspond à l'une des routes alors on on appelle le controleur correspondant.
 */

$currentRoute = 0;
$id = -1;

$uriAccess = explode('/', $_SERVER['REQUEST_URI']);

if ($uriAccess[count($uriAccess) - 1] != '') {
    $uriAccess[count($uriAccess)] = '';
}

if (is_numeric($uriAccess[count($uriAccess) - 2])) {
    $id = $uriAccess[count($uriAccess) - 2];
    $uriAccess[count($uriAccess) - 2] = '{id}';
}

for ($i = 0; $i < count($router); $i++) {
    $realUriAccess = implode('/', $uriAccess);
    $routeName = FOLDER_ACCESS . $router[$i][0];

    /* Vérification de la route et de la méthode */
    if ($routeName == $realUriAccess) {
        $requestedMethod = $router[$i][1]['method'];

        if ($_SERVER['REQUEST_METHOD'] == strtoupper($requestedMethod)) {
            $currentRoute = $router[$i];
            break;
        }

    }

}

if ($currentRoute) {
    $controller = '\\Controllers\\' . $currentRoute[1]['controller'] . 'Controller';
    $actionString = $currentRoute[1]['action'];

    //ToDo: Handle broken links
    if (class_exists($controller)) {
        $controller = new $controller;

        if (is_callable([$controller, $actionString])) {
            if ($id == -1) {
                call_user_func_array([$controller, $actionString], []);
            } else {
                call_user_func_array([$controller, $actionString], ['id' => $id]);
            }
        } else {
            // ToDo erreur
        }
    } else {
        // ToDo erreur
    }
} else {
    call_user_func_array([ErrorController::class, "error404"], []);
}
