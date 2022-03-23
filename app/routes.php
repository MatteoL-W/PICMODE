<?php

/**
 * Ce fichier recense toutes les routes et son controleur associé.
 */

array_push($router, ['/', ['controller' => 'Index', 'action' => 'home', 'method' => 'get']]);
array_push($router, ['/about/', ['controller' => 'Index', 'action' => 'about', 'method' => 'get']]);
array_push($router, ['/test/{id}/', ['controller' => 'Index', 'action' => 'test', 'method' => 'get']]);

array_push($router, ['/example/', ['controller' => 'Example', 'action' => 'read', 'method' => 'get']]);
array_push($router, ['/example/create/', ['controller' => 'Example', 'action' => 'create', 'method' => 'get']]);
array_push($router, ['/example/update/{id}/', ['controller' => 'Example', 'action' => 'read', 'method' => 'get']]);
array_push($router, ['/example/delete/{id}/', ['controller' => 'Example', 'action' => 'delete', 'method' => 'get']]);

array_push($router, ['/example/create/', ['controller' => 'Example', 'action' => 'create_treatment', 'method' => 'post']]);
array_push($router, ['/example/update/{id}/', ['controller' => 'Example', 'action' => 'read_treatment', 'method' => 'post']]);
array_push($router, ['/example/delete/{id}/', ['controller' => 'Example', 'action' => 'delete_treatment', 'method' => 'post']]);
