<?php

/**
 * Ce fichier recense toutes les routes et leurs controleurs associé.
 */

$router[] = ['/', ['controller' => 'Index', 'action' => 'index', 'method' => 'get', 'desc' => 'api Documentation']];
$router[] = ['/about/', ['controller' => 'Index', 'action' => 'about', 'method' => 'get', 'desc' => 'About (demo) page']];
$router[] = ['/test/{id}/', ['controller' => 'Index', 'action' => 'test', 'method' => 'get', 'desc' => 'Test with id (demo) page']];
$router[] = ['/test/{id}/{id2}/', ['controller' => 'Index', 'action' => 'test2', 'method' => 'get', 'desc' => 'Test with id (demo) page']];

array_push($router, ['/example/', ['controller' => 'Example', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the examples']]);
array_push($router, ['/example/', ['controller' => 'Example', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new example']]);
array_push($router, ['/example/{id}/', ['controller' => 'Example', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single example']]);
array_push($router, ['/example/{id}/', ['controller' => 'Example', 'action' => 'update', 'method' => 'put', 'desc' => 'Update an example']]);
array_push($router, ['/example/{id}/', ['controller' => 'Example', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete an example']]);

$router[] = ['/user/', ['controller' => 'User', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the users']];
$router[] = ['/user/', ['controller' => 'User', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new user']];
$router[] = ['/user/login/', ['controller' => 'User', 'action' => 'login', 'method' => 'post', 'desc' => 'Login. Return a boolean.']];
$router[] = ['/user/{id}/', ['controller' => 'User', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single user']];
$router[] = ['/user/{id}/', ['controller' => 'User', 'action' => 'update', 'method' => 'put', 'desc' => 'Update an user']];
$router[] = ['/user/{id}/', ['controller' => 'User', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete an user']];

$router[] = ['/clothing/', ['controller' => 'Clothing', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the clothing']];
$router[] = ['/clothing/{id}/', ['controller' => 'Clothing', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single clothing']];
$router[] = ['/clothing/getFromPost/{id}/', ['controller' => 'Clothing', 'action' => 'getFromPost', 'method' => 'get', 'desc' => 'Get clothings from a post']];
$router[] = ['/clothing/', ['controller' => 'Clothing', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new clothing']];
$router[] = ['/clothing/{id}/', ['controller' => 'Clothing', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a clothing']];
$router[] = ['/clothing/{id}/', ['controller' => 'Clothing', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a clothing']];

$router[] = ['/post/', ['controller' => 'Post', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the posts']];
$router[] = ['/post/', ['controller' => 'Post', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new post']];
$router[] = ['/post/{id}/', ['controller' => 'Post', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single post']];
$router[] = ['/post/getAllPostsFromUserId/{id}/', ['controller' => 'Post', 'action' => 'getAllPostsFromUserId', 'method' => 'get', 'desc' => 'Get all the posts of a user']];
$router[] = ['/post/countPosts/{id}/', ['controller' => 'Post', 'action' => 'countPosts', 'method' => 'get', 'desc' => 'Count the posts of a user']];
$router[] = ['/post/getAllPosts/{id}/', ['controller' => 'Post', 'action' => 'getAllPosts', 'method' => 'get', 'desc' => 'Get all the posts (with the user s id who published it)']];
$router[] = ['/post/getLoggedPosts/{id}/', ['controller' => 'Post', 'action' => 'getLoggedPosts', 'method' => 'get', 'desc' => 'Get all posts only published by people followed (with the user s id who published it)']];
$router[] = ['/post/{id}/', ['controller' => 'Post', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a post']];
$router[] = ['/post/{id}/', ['controller' => 'Post', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a post']];

$router[] = ['/comment/', ['controller' => 'Comment', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the comments']];
$router[] = ['/comment/', ['controller' => 'Comment', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new comment<br>(send text, idUser and idPost in query)']];
$router[] = ['/comment/{id}/', ['controller' => 'Comment', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single comment']];
$router[] = ['/comment/{id}/', ['controller' => 'Comment', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a comment']];
$router[] = ['/comment/{id}/', ['controller' => 'Comment', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a comment']];

$router[] = ['/tag/', ['controller' => 'Tag', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the tags']];
$router[] = ['/tag/', ['controller' => 'Tag', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new tag']];
$router[] = ['/tag/{id}/', ['controller' => 'Tag', 'action' => 'read', 'method' => 'get', 'desc' => 'Get a single tag']];
$router[] = ['/tag/{id}/', ['controller' => 'Tag', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a tag']];
$router[] = ['/tag/{id}/', ['controller' => 'Tag', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a tag']];

$router[] = ['/following/', ['controller' => 'Following', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the following']];
$router[] = ['/following/getFollowers/{id}/', ['controller' => 'Following', 'action' => 'getFollowers', 'method' => 'get', 'desc' => 'Get all the followers of a user']];
$router[] = ['/following/getFollowing/{id}/', ['controller' => 'Following', 'action' => 'getFollowing', 'method' => 'get', 'desc' => 'Get all the following of a user']];
$router[] = ['/following/countFollowers/{id}/', ['controller' => 'Following', 'action' => 'countFollowers', 'method' => 'get', 'desc' => 'Count the followers of a user']];
$router[] = ['/following/countFollowing/{id}/', ['controller' => 'Following', 'action' => 'countFollowing', 'method' => 'get', 'desc' => 'Count the following of a user']];
$router[] = ['/following/', ['controller' => 'Following', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new following<br>(send idFollower and idFollowing in query)']];
$router[] = ['/following/{id}/{id2}/', ['controller' => 'Following', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a following<br>(id = idFollower ; id2 = idFollowing)']];

$router[] = ['/contains/', ['controller' => 'Contains', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the contains']];
$router[] = ['/contains/getClothing/{id}/', ['controller' => 'Contains', 'action' => 'getClothing', 'method' => 'get', 'desc' => 'Get all the clothing of a post']];
$router[] = ['/contains/countClothing/{id}/', ['controller' => 'Contains', 'action' => 'countClothing', 'method' => 'get', 'desc' => 'Count the clothing of a post']];
$router[] = ['/contains/', ['controller' => 'Contains', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new contains<br>(send idPost and idClothing in query)']];
$router[] = ['/contains/{id}/{id2}/', ['controller' => 'Contains', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a contains<br>(id = idPost ; id2 = idClothing)']];

$router[] = ['/like/', ['controller' => 'Like', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the likes']];
$router[] = ['/like/getLikes/{id}/', ['controller' => 'Like', 'action' => 'getLikes', 'method' => 'get', 'desc' => 'Get all the likes of a user']];
$router[] = ['/like/getLikers/{id}/', ['controller' => 'Like', 'action' => 'getLikers', 'method' => 'get', 'desc' => 'Get all the likers of a post']];
$router[] = ['/like/countLikes/{id}/', ['controller' => 'Like', 'action' => 'countLikes', 'method' => 'get', 'desc' => 'Count all the likes of a user']];
$router[] = ['/like/countLikers/{id}/', ['controller' => 'Like', 'action' => 'countLikers', 'method' => 'get', 'desc' => 'Count the likers of a post']];
$router[] = ['/like/', ['controller' => 'Like', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new like<br>(send idUser and idPost in query)']];
$router[] = ['/like/{id}/{id2}/', ['controller' => 'Like', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a Like<br>(id = idUser ; id2 = idPost)']];



