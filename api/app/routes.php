<?php

/**
 * Ce fichier recense toutes les routes et leurs controleurs associé.
 */

array_push($router, ['/', ['controller' => 'Index', 'action' => 'index', 'method' => 'get', 'desc' => 'api Documentation']]);
array_push($router, ['/about/', ['controller' => 'Index', 'action' => 'about', 'method' => 'get', 'desc' => 'About (demo) page']]);
array_push($router, ['/test/{id}/', ['controller' => 'Index', 'action' => 'test', 'method' => 'get', 'desc' => 'Test with id (demo) page']]);

array_push($router, ['/example/', ['controller' => 'Example', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the examples']]);
array_push($router, ['/example/', ['controller' => 'Example', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new example']]);
array_push($router, ['/example/{id}/', ['controller' => 'Example', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single example']]);
array_push($router, ['/example/{id}/', ['controller' => 'Example', 'action' => 'update', 'method' => 'put', 'desc' => 'Update an example']]);
array_push($router, ['/example/{id}/', ['controller' => 'Example', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete an example']]);

array_push($router, ['/user/', ['controller' => 'User', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the users']]);
array_push($router, ['/user/', ['controller' => 'User', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new user']]);
array_push($router, ['/user/{id}/', ['controller' => 'User', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single user']]);
array_push($router, ['/user/{id}/', ['controller' => 'User', 'action' => 'update', 'method' => 'put', 'desc' => 'Update an user']]);
array_push($router, ['/user/{id}/', ['controller' => 'User', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete an user']]);

array_push($router, ['/clothing/', ['controller' => 'Clothing', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the clothing']]);
array_push($router, ['/clothing/', ['controller' => 'Clothing', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new clothing']]);
array_push($router, ['/clothing/{id}/', ['controller' => 'Clothing', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single clothing']]);
array_push($router, ['/clothing/{id}/', ['controller' => 'Clothing', 'action' => 'update', 'method' => 'put', 'desc' => 'Update an clothing']]);
array_push($router, ['/clothing/{id}/', ['controller' => 'Clothing', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete an clothing']]);

array_push($router, ['/post/', ['controller' => 'Post', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the posts']]);
array_push($router, ['/post/', ['controller' => 'Post', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new post']]);
array_push($router, ['/post/{id}/', ['controller' => 'Post', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single post']]);
array_push($router, ['/post/{id}/', ['controller' => 'Post', 'action' => 'update', 'method' => 'put', 'desc' => 'Update an post']]);
array_push($router, ['/post/{id}/', ['controller' => 'Post', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete an post']]);