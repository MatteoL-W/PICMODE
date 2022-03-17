<?php

/** Load Controllers and Models with composer */
require_once dirname(__FILE__) . '/bootstrap.php';

/** Load config files */
require_once('config/constants.php');
require_once('config/credentials.php');

/** Load routes and routes Handler -> start the page */
require_once('app/viewsHandler.php');
require_once('app/routesHandler.php');