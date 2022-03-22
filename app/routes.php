<?php

/**
 * Ce fichier recense toutes les routes et son controleur associé.
 */

$router = [];

array_push($router, ['/', ['controller' => 'Index', 'action' => 'home', 'method' => 'get']]);
array_push($router, ['/about/', ['controller' => 'Index', 'action' => 'about', 'method' => 'get']]);
array_push($router, ['/test/{id}/', ['controller' => 'Index', 'action' => 'test', 'method' => 'get']]);

array_push($router, ['/examples/delete/{id}/', ['controller' => 'Index', 'action' => 'test', 'method' => 'get']]);
