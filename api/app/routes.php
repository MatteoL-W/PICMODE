<?php

/**
 * Ce fichier recense toutes les routes et leurs controleurs associé.
 */

array_push($router, ['/', ['controller' => 'Index', 'action' => 'index', 'method' => 'get', 'desc' => 'api Documentation']]);
array_push($router, ['/about/', ['controller' => 'Index', 'action' => 'about', 'method' => 'get', 'desc' => 'About (demo) page']]);
array_push($router, ['/test/{id}/', ['controller' => 'Index', 'action' => 'test', 'method' => 'get', 'desc' => 'Test with id (demo) page']]);
array_push($router, ['/test/{id}/{id2}/', ['controller' => 'Index', 'action' => 'test2', 'method' => 'get', 'desc' => 'Test with id (demo) page']]);

array_push($router, ['/example/', ['controller' => 'Example', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all examples']]);
array_push($router, ['/example/', ['controller' => 'Example', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new example']]);
array_push($router, ['/example/{id}/', ['controller' => 'Example', 'action' => 'read', 'method' => 'get', 'desc' => 'Return a single example']]);
array_push($router, ['/example/{id}/', ['controller' => 'Example', 'action' => 'update', 'method' => 'put', 'desc' => 'Update an example']]);
array_push($router, ['/example/{id}/', ['controller' => 'Example', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete an example']]);

array_push($router, ['/user/', ['controller' => 'User', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all users']]);
array_push($router, ['/user/', ['controller' => 'User', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new user<span>{pseudo, mail_adress, password, date_of_birth, name, firstname, profile_picture}</span>']]);
array_push($router, ['/user/login/', ['controller' => 'User', 'action' => 'login', 'method' => 'post', 'desc' => 'Login. Return a boolean.']]);
array_push($router, ['/user/{id}/', ['controller' => 'User', 'action' => 'read', 'method' => 'get', 'desc' => 'Return a single user']]);
array_push($router, ['/user/{id}/', ['controller' => 'User', 'action' => 'update', 'method' => 'put', 'desc' => 'Update an user<span>you can update one or more fields (see above)</span>']]);
array_push($router, ['/user/{id}/', ['controller' => 'User', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete an user']]);

array_push($router, ['/clothing/', ['controller' => 'Clothing', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all clothings']]);
array_push($router, ['/clothing/', ['controller' => 'Clothing', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new clothing<span>{type, color, url_shop, style, store, idTag}</span>']]);
array_push($router, ['/clothing/{id}/', ['controller' => 'Clothing', 'action' => 'read', 'method' => 'get', 'desc' => 'Return a single clothing']]);
array_push($router, ['/clothing/{id}/', ['controller' => 'Clothing', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a clothing<span>you can update one or more fields (see above)</span>']]);
array_push($router, ['/clothing/{id}/', ['controller' => 'Clothing', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a clothing']]);

array_push($router, ['/post/', ['controller' => 'Post', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all posts']]);
array_push($router, ['/post/', ['controller' => 'Post', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new post<span>{description, picture, date, idUser}</span>']]);
array_push($router, ['/post/{id}/', ['controller' => 'Post', 'action' => 'read', 'method' => 'get', 'desc' => 'Return a single post']]);
array_push($router, ['/post/getAllPostsFromUserId/{id}/', ['controller' => 'Post', 'action' => 'getAllPostsFromUserId', 'method' => 'get', 'desc' => 'Return all posts of an user']]);
array_push($router, ['/post/getAllPostsFromTagId/{id}/', ['controller' => 'Post', 'action' => 'getAllPostsFromTagId', 'method' => 'get', 'desc' => 'Get all the posts with a specific tag']]);
array_push($router, ['/post/countPosts/{id}/', ['controller' => 'Post', 'action' => 'countPosts', 'method' => 'get', 'desc' => 'Return the number of posts of an user']]);
array_push($router, ['/post/getAllPosts/', ['controller' => 'Post', 'action' => 'getAllPosts', 'method' => 'get', 'desc' => 'Return all posts with the user who posted it']]);
array_push($router, ['/post/getLoggedPosts/{id}/', ['controller' => 'Post', 'action' => 'getLoggedPosts', 'method' => 'get', 'desc' => 'Get all posts only published by people followed (with the user s id who published it)']]);
array_push($router, ['/post/{id}/', ['controller' => 'Post', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a post<span>you can update one or more fields (see above)</span>']]);
array_push($router, ['/post/{id}/', ['controller' => 'Post', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a post']]);

array_push($router, ['/comment/', ['controller' => 'Comment', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all comments']]);
array_push($router, ['/comment/', ['controller' => 'Comment', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new comment<span>{text, idUser, idPost}</span>']]);
array_push($router, ['/comment/{id}/', ['controller' => 'Comment', 'action' => 'read', 'method' => 'get', 'desc' => 'Return a single comment']]);
array_push($router, ['/comment/getComments/{id}/', ['controller' => 'Comment', 'action' => 'getCommentsFromPost', 'method' => 'get', 'desc' => 'Get all comments from one post']]);
array_push($router, ['/comment/{id}/', ['controller' => 'Comment', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a comment<span>you can update one or more fields (see above)</span>']]);
array_push($router, ['/comment/{id}/', ['controller' => 'Comment', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a comment']]);

array_push($router, ['/tag/', ['controller' => 'Tag', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all tags']]);
array_push($router, ['/tag/', ['controller' => 'Tag', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new tag<span>{name}</span>']]);
array_push($router, ['/tag/{id}/', ['controller' => 'Tag', 'action' => 'read', 'method' => 'get', 'desc' => 'Return a single tag']]);
array_push($router, ['/tag/{id}/', ['controller' => 'Tag', 'action' => 'update', 'method' => 'put', 'desc' => 'Update a tag<span>you can update one or more fields (see above)</span>']]);
array_push($router, ['/tag/{id}/', ['controller' => 'Tag', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a tag']]);

array_push($router, ['/following/', ['controller' => 'Following', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all followings']]);
array_push($router, ['/following/getFollowers/{id}/', ['controller' => 'Following', 'action' => 'getFollowers', 'method' => 'get', 'desc' => 'Return all the followers of an user']]);
array_push($router, ['/following/getFollowing/{id}/', ['controller' => 'Following', 'action' => 'getFollowing', 'method' => 'get', 'desc' => 'Return all the followings of an user']]);
array_push($router, ['/following/countFollowers/{id}/', ['controller' => 'Following', 'action' => 'countFollowers', 'method' => 'get', 'desc' => 'Return the number of followers of an user']]);
array_push($router, ['/following/countFollowing/{id}/', ['controller' => 'Following', 'action' => 'countFollowing', 'method' => 'get', 'desc' => 'Return the number of followings of an user']]);
array_push($router, ['/following/', ['controller' => 'Following', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new following<span>{idFollower, idFollowing}</span>']]);
array_push($router, ['/following/{id}/{id2}/', ['controller' => 'Following', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a following<span>{id1 (follower), id2 (following}</span>']]);

array_push($router, ['/contains/', ['controller' => 'Contains', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all contains']]);
array_push($router, ['/contains/getClothing/{id}/', ['controller' => 'Contains', 'action' => 'getClothing', 'method' => 'get', 'desc' => 'Return the clothings of a post']]);
array_push($router, ['/contains/countClothing/{id}/', ['controller' => 'Contains', 'action' => 'countClothing', 'method' => 'get', 'desc' => 'Return the number of clothings of a post']]);
array_push($router, ['/contains/', ['controller' => 'Contains', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new contains<span>{idPost, idClothing}</span>']]);
array_push($router, ['/contains/{id}/{id2}/', ['controller' => 'Contains', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a contains<br>(id = idPost ; id2 = idClothing)']]);

array_push($router, ['/like/', ['controller' => 'Like', 'action' => 'read', 'method' => 'get', 'desc' => 'Return all the likes']]);
array_push($router, ['/like/getLikes/{id}/', ['controller' => 'Like', 'action' => 'getLikes', 'method' => 'get', 'desc' => 'Get all the likes of a user']]);
array_push($router, ['/like/getLikers/{id}/', ['controller' => 'Like', 'action' => 'getLikers', 'method' => 'get', 'desc' => 'Get all the likers of a post']]);
array_push($router, ['/like/countLikes/{id}/', ['controller' => 'Like', 'action' => 'countLikes', 'method' => 'get', 'desc' => 'Count all the likes of a user']]);
array_push($router, ['/like/countLikers/{id}/', ['controller' => 'Like', 'action' => 'countLikers', 'method' => 'get', 'desc' => 'Count the likers of a post']]);
array_push($router, ['/like/', ['controller' => 'Like', 'action' => 'create', 'method' => 'post', 'desc' => 'Create a new like<br>(send idUser and idPost in query)']]);
array_push($router, ['/like/{id}/{id2}/', ['controller' => 'Like', 'action' => 'delete', 'method' => 'delete', 'desc' => 'Delete a Like<br>(id = idUser ; id2 = idPost)']]);



