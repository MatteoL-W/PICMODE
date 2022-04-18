<?php

use Controllers\ErrorController;
use Controllers\IndexController;

/**
 * Ce fichier compare l'ensemble des routes à la page couramment exécuté
 * Si la page couramment éxécuté correspond à l'une des routes alors on on appelle le controleur correspondant.
 */

$router = [];
$currentRoute = 0;
$id = -1;
$id2 = -1;
$isDoubleIdRoute = false;

require_once('routes.php');

// Redefine the access URI
$uriAccess = explode('/', $_SERVER['REQUEST_URI']);

if ($uriAccess[count($uriAccess) - 1] != '') {
    $uriAccess[count($uriAccess)] = '';
}

// Last-1 element of URL
if (is_numeric($uriAccess[count($uriAccess) - 3])) {
    $isDoubleIdRoute = true;
    $id = $uriAccess[count($uriAccess) - 3];
    $uriAccess[count($uriAccess) - 3] = '{id}';
}

// Last element of URL
if (is_numeric($uriAccess[count($uriAccess) - 2])) {
    if ($isDoubleIdRoute) {
        $id2 = $uriAccess[count($uriAccess) - 2];
        $uriAccess[count($uriAccess) - 2] = '{id2}';
    }

    else {
        $id = $uriAccess[count($uriAccess) - 2];
        $uriAccess[count($uriAccess) - 2] = '{id}';
    }
}

// Get the current route
for ($i = 0; $i < count($router); $i++) {
    $realUriAccess = implode('/', $uriAccess);
    $routeName = API_FOLDER_ACCESS . $router[$i][0];

    /* Vérification de la route et de la méthode */
    if ($routeName == $realUriAccess) {
        $requestedMethod = $router[$i][1]['method'];

        if ($_SERVER['REQUEST_METHOD'] == strtoupper($requestedMethod)) {
            $currentRoute = $router[$i];
            break;
        }
    }
}

// Call the right controller if the route is defined
if ($currentRoute) {
    $data = [];
    $controller = '\\Controllers\\' . $currentRoute[1]['controller'] . 'Controller';
    $method = $currentRoute[1]['action'];

    if (class_exists($controller)) {
        $controller = new $controller;

        if (is_callable([$controller, $method])) {
            if ($currentRoute[1]['controller'] === 'Index' && $method === 'index') {
                $data['router'] = $router;
            }

            if ($id != -1) {
                $data['id'] = $id;
            }

            if ($id2 != -1) {
                $data['id2'] = $id2;
            }

            call_user_func_array([$controller, $method], $data);

        } else {
            call_user_func_array([ErrorController::class, "errorController"], []);
        }

    } else {
        call_user_func_array([ErrorController::class, "errorController"], []);
    }
} else {
    call_user_func_array([ErrorController::class, "error404"], []);
}
