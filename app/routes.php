<?php

/**
 * Ce fichier recense toutes les routes et leurs controleurs associé.
 */

array_push($router, ['/', ['controller' => 'Index', 'action' => 'home', 'method' => 'get']]);
array_push($router, ['/about/', ['controller' => 'Index', 'action' => 'about', 'method' => 'get']]);
array_push($router, ['/test/{id}/', ['controller' => 'Index', 'action' => 'test', 'method' => 'get']]);

array_push($router, ['/example/', ['controller' => 'Example', 'action' => 'read', 'method' => 'get']]);
array_push($router, ['/example/', ['controller' => 'Example', 'action' => 'create', 'method' => 'post']]);
array_push($router, ['/example/{id}/', ['controller' => 'Example', 'action' => 'read', 'method' => 'get']]);
array_push($router, ['/example/{id}/', ['controller' => 'Example', 'action' => 'update', 'method' => 'put']]);
array_push($router, ['/example/{id}/', ['controller' => 'Example', 'action' => 'delete', 'method' => 'delete']]);
