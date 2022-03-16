<?php

/** Load Controllers / ToDo: faire plus clean */
require_once('controllers/RouteError.php');
require_once('controllers/Index.php');

/** Load config files */
require_once('config/constants.php');
require_once('config/credentials.php');

/** Load routes and routes Handler -> start the page */
require_once('app/viewsHandler.php');
require_once('app/routesHandler.php');