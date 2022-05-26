<?php

/**
 * Ce fichier recense toutes les routes et leurs controleurs associé.
 */

$router[] = ['/', ['controller' => 'Index', 'action' => 'index', 'method' => 'get', 'desc' => 'API Documentation']];
$router[] = ['/demo_view/', ['controller' => 'Index', 'action' => 'demo_view', 'method' => 'get', 'desc' => 'Page de démo pour les vues']];

$router[] = ['/user/', ['controller' => 'User', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all users']];
$router[] = ['/user/{id}/', ['controller' => 'User', 'action' => 'read', 'method' => 'get', 'desc' => 'Return a single user']];
$router[] = ['/user/', ['controller' => 'User', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new user<span>{pseudo, mail_adress, password, date_of_birth, name, firstname, profile_picture}</span>']];
$router[] = ['/user/login/', ['controller' => 'User', 'action' => 'login', 'method' => 'post', 'desc' => 'Login. Return a boolean.']];
$router[] = ['/user/{id}/', ['controller' => 'User', 'action' => 'update', 'method' => 'put', 'desc' => 'Update an user<span>you can update one or more fields (see above)</span>']];
$router[] = ['/user/{id}/', ['controller' => 'User', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete an user']];

$router[] = ['/clothing/', ['controller' => 'Clothing', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all clothings']];
$router[] = ['/clothing/{id}/', ['controller' => 'Clothing', 'action' => 'read', 'method' => 'get', 'desc' => 'Return a single clothing']];
$router[] = ['/clothing/getFromPost/{id}/', ['controller' => 'Clothing', 'action' => 'getFromPost', 'method' => 'get', 'desc' => 'Get clothings from a post']];
$router[] = ['/clothing/', ['controller' => 'Clothing', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new clothing<span>{type, color, url_shop, style, store, idTag}</span>']];
$router[] = ['/clothing/{id}/', ['controller' => 'Clothing', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a clothing<span>you can update one or more fields (see above)</span>']];
$router[] = ['/clothing/{id}/', ['controller' => 'Clothing', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a clothing']];

$router[] = ['/post/', ['controller' => 'Post', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all posts']];
$router[] = ['/post/getAllPosts/', ['controller' => 'Post', 'action' => 'getAllPosts', 'method' => 'get', 'desc' => 'Return all posts with the user who posted it']];
$router[] = ['/post/{id}/', ['controller' => 'Post', 'action' => 'read', 'method' => 'get', 'desc' => 'Return a single post']];
$router[] = ['/post/getLoggedPosts/{id}/', ['controller' => 'Post', 'action' => 'getLoggedPosts', 'method' => 'get', 'desc' => 'Get all posts only published by people followed (with the user id of who published it)']];
$router[] = ['/post/getAllPostsFromUserId/{id}/', ['controller' => 'Post', 'action' => 'getAllPostsFromUserId', 'method' => 'get', 'desc' => 'Return all posts of an user']];
$router[] = ['/post/getAllPostsFromTagId/{id}/', ['controller' => 'Post', 'action' => 'getAllPostsFromTagId', 'method' => 'get', 'desc' => 'Get all the posts with a specific tag']];
$router[] = ['/post/countPosts/{id}/', ['controller' => 'Post', 'action' => 'countPosts', 'method' => 'get', 'desc' => 'Return the number of posts of an user']];
$router[] = ['/post/', ['controller' => 'Post', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new post<span>{description, picture, date, idUser}</span>']];
$router[] = ['/post/{id}/', ['controller' => 'Post', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a post<span>you can update one or more fields (see above)</span>']];
$router[] = ['/post/{id}/', ['controller' => 'Post', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a post']];

$router[] = ['/comment/', ['controller' => 'Comment', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all comments']];
$router[] = ['/comment/{id}/', ['controller' => 'Comment', 'action' => 'read', 'method' => 'get', 'desc' => 'Return a single comment']];
$router[] = ['/comment/getComments/{id}/', ['controller' => 'Comment', 'action' => 'getCommentsFromPost', 'method' => 'get', 'desc' => 'Get all comments from one post']];
$router[] = ['/comment/', ['controller' => 'Comment', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new comment<span>{text, idUser, idPost}</span>']];
$router[] = ['/comment/{id}/', ['controller' => 'Comment', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a comment<span>you can update one or more fields (see above)</span>']];
$router[] = ['/comment/{id}/', ['controller' => 'Comment', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a comment']];

$router[] = ['/tag/', ['controller' => 'Tag', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all tags']];
$router[] = ['/tag/{id}/', ['controller' => 'Tag', 'action' => 'read', 'method' => 'get', 'desc' => 'Return a single tag']];
$router[] = ['/tag/getTagFromIdPost/{id}/', ['controller' => 'Tag', 'action' => 'getTagFromIdPost', 'method' => 'get', 'desc' => 'Return tags of an idPost']];
$router[] = ['/tag/', ['controller' => 'Tag', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new tag<span>{name}</span>']];
$router[] = ['/tag/{id}/', ['controller' => 'Tag', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a tag<span>you can update one or more fields (see above)</span>']];
$router[] = ['/tag/{id}/', ['controller' => 'Tag', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a tag']];

$router[] = ['/following/', ['controller' => 'Following', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all followings']];
$router[] = ['/following/getFollowers/{id}/', ['controller' => 'Following', 'action' => 'getFollowers', 'method' => 'get', 'desc' => 'Return all the followers of an user']];
$router[] = ['/following/getFollowing/{id}/', ['controller' => 'Following', 'action' => 'getFollowing', 'method' => 'get', 'desc' => 'Return all the followings of an user']];
$router[] = ['/following/countFollowers/{id}/', ['controller' => 'Following', 'action' => 'countFollowers', 'method' => 'get', 'desc' => 'Return the number of followers of an user']];
$router[] = ['/following/countFollowing/{id}/', ['controller' => 'Following', 'action' => 'countFollowing', 'method' => 'get', 'desc' => 'Return the number of followings of an user']];
$router[] = ['/following/', ['controller' => 'Following', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new following<span>{idFollower, idFollowing}</span>']];
$router[] = ['/following/{id}/{id2}/', ['controller' => 'Following', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a following<span>{id1 (follower), id2 (following}</span>']];

$router[] = ['/contains/', ['controller' => 'Contains', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all contains']];
$router[] = ['/contains/getClothing/{id}/', ['controller' => 'Contains', 'action' => 'getClothing', 'method' => 'get', 'desc' => 'Return the clothings of a post']];
$router[] = ['/contains/countClothing/{id}/', ['controller' => 'Contains', 'action' => 'countClothing', 'method' => 'get', 'desc' => 'Return the number of clothings of a post']];
$router[] = ['/contains/', ['controller' => 'Contains', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new contains<span>{idPost, idClothing}</span>']];
$router[] = ['/contains/{id}/{id2}/', ['controller' => 'Contains', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a contains<span>{id = idPost ; id2 = idClothing}<span>']];

$router[] = ['/like/', ['controller' => 'Like', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the likes']];
$router[] = ['/like/getLikes/{id}/', ['controller' => 'Like', 'action' => 'getLikes', 'method' => 'get', 'desc' => 'Get all the likes of a user']];
$router[] = ['/like/getLikers/{id}/', ['controller' => 'Like', 'action' => 'getLikers', 'method' => 'get', 'desc' => 'Get all the likers of a post']];
$router[] = ['/like/countLikes/{id}/', ['controller' => 'Like', 'action' => 'countLikes', 'method' => 'get', 'desc' => 'Count all the likes of a user']];
$router[] = ['/like/countLikers/{id}/', ['controller' => 'Like', 'action' => 'countLikers', 'method' => 'get', 'desc' => 'Count the likers of a post']];
$router[] = ['/like/', ['controller' => 'Like', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new like<span>{idUser, idPost}</span>']];
$router[] = ['/like/{id}/{id2}/', ['controller' => 'Like', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a Like<span>{id = idUser ; id2 = idPost}</span>']];



