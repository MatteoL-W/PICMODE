<?php

$router = [];

array_push($router, ['/', ['controller' => 'Index', 'action' => 'home']]);
array_push($router, ['/about', ['controller' => 'Index', 'action' => 'about']]);
array_push($router, ['/test/{id}', ['controller' => 'Index', 'action' => 'test']]);
