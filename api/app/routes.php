<?php

/**
 * Ce fichier recense toutes les routes et leurs controleurs associé.
 */

array_push($router, ['/', ['controller' => 'Index', 'action' => 'index', 'method' => 'get', 'desc' => 'api Documentation']]);
array_push($router, ['/about/', ['controller' => 'Index', 'action' => 'about', 'method' => 'get', 'desc' => 'About (demo) page']]);
array_push($router, ['/test/{id}/', ['controller' => 'Index', 'action' => 'test', 'method' => 'get', 'desc' => 'Test with id (demo) page']]);
array_push($router, ['/test/{id}/{id2}/', ['controller' => 'Index', 'action' => 'test2', 'method' => 'get', 'desc' => 'Test with id (demo) page']]);

array_push($router, ['/example/', ['controller' => 'Example', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the examples']]);
array_push($router, ['/example/', ['controller' => 'Example', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new example']]);
array_push($router, ['/example/{id}/', ['controller' => 'Example', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single example']]);
array_push($router, ['/example/{id}/', ['controller' => 'Example', 'action' => 'update', 'method' => 'put', 'desc' => 'Update an example']]);
array_push($router, ['/example/{id}/', ['controller' => 'Example', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete an example']]);

array_push($router, ['/user/', ['controller' => 'User', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the users']]);
array_push($router, ['/user/', ['controller' => 'User', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new user']]);
array_push($router, ['/user/login/', ['controller' => 'User', 'action' => 'login', 'method' => 'post', 'desc' => 'Login. Return a boolean.']]);
array_push($router, ['/user/{id}/', ['controller' => 'User', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single user']]);
array_push($router, ['/user/{id}/', ['controller' => 'User', 'action' => 'update', 'method' => 'put', 'desc' => 'Update an user']]);
array_push($router, ['/user/{id}/', ['controller' => 'User', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete an user']]);

array_push($router, ['/clothing/', ['controller' => 'Clothing', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the clothing']]);
array_push($router, ['/clothing/', ['controller' => 'Clothing', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new clothing']]);
array_push($router, ['/clothing/{id}/', ['controller' => 'Clothing', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single clothing']]);
array_push($router, ['/clothing/{id}/', ['controller' => 'Clothing', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a clothing']]);
array_push($router, ['/clothing/{id}/', ['controller' => 'Clothing', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a clothing']]);

array_push($router, ['/post/', ['controller' => 'Post', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the posts']]);
array_push($router, ['/post/', ['controller' => 'Post', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new post']]);
array_push($router, ['/post/{id}/', ['controller' => 'Post', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single post']]);
array_push($router, ['/post/{id}/', ['controller' => 'Post', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a post']]);
array_push($router, ['/post/{id}/', ['controller' => 'Post', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a post']]);

array_push($router, ['/comment/', ['controller' => 'Comment', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the comments']]);
array_push($router, ['/comment/', ['controller' => 'Comment', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new comment<br>(send text, idUser and idPost in query)']]);
array_push($router, ['/comment/{id}/', ['controller' => 'Comment', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single comment']]);
array_push($router, ['/comment/{id}/', ['controller' => 'Comment', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a comment']]);
array_push($router, ['/comment/{id}/', ['controller' => 'Comment', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a comment']]);

array_push($router, ['/tag/', ['controller' => 'Tag', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the tags']]);
array_push($router, ['/tag/', ['controller' => 'Tag', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new tag']]);
array_push($router, ['/tag/{id}/', ['controller' => 'Tag', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single tag']]);
array_push($router, ['/tag/{id}/', ['controller' => 'Tag', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a tag']]);
array_push($router, ['/tag/{id}/', ['controller' => 'Tag', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a tag']]);

array_push($router, ['/following/', ['controller' => 'Following', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the following']]);
array_push($router, ['/following/getFollowers/{id}/', ['controller' => 'Following', 'action' => 'getFollowers', 'method' => 'get', 'desc' => 'Get all the followers of a user']]);
array_push($router, ['/following/getFollowing/{id}/', ['controller' => 'Following', 'action' => 'getFollowing', 'method' => 'get', 'desc' => 'Get all the following of a user']]);
array_push($router, ['/following/countFollowers/{id}/', ['controller' => 'Following', 'action' => 'countFollowers', 'method' => 'get', 'desc' => 'Count the followers of a user']]);
array_push($router, ['/following/countFollowing/{id}/', ['controller' => 'Following', 'action' => 'countFollowing', 'method' => 'get', 'desc' => 'Count the following of a user']]);
array_push($router, ['/following/', ['controller' => 'Following', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new following<br>(send idFollower and idFollowing in query)']]);
array_push($router, ['/following/{id}/{id2}/', ['controller' => 'Following', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a following<br>(id = idFollower ; id2 = idFollowing)']]);

array_push($router, ['/contains/', ['controller' => 'Contains', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the contains']]);
array_push($router, ['/contains/getClothing/{id}/', ['controller' => 'Contains', 'action' => 'getClothing', 'method' => 'get', 'desc' => 'Get all the clothing of a post']]);
array_push($router, ['/contains/countClothing/{id}/', ['controller' => 'Contains', 'action' => 'countClothing', 'method' => 'get', 'desc' => 'Count the clothing of a post']]);
array_push($router, ['/contains/', ['controller' => 'Contains', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new contains<br>(send idPost and idClothing in query)']]);
array_push($router, ['/contains/{id}/{id2}/', ['controller' => 'Contains', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a contains<br>(id = idPost ; id2 = idClothing)']]);
