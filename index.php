<?php

/** Load Controllers / ToDo: faire plus clean */
require_once('controllers/RouteError.php');
require_once('controllers/Index.php');

/** Load view function */
require_once('config/constants.php');
require_once('config/utilities.php');
require_once('config/credentials.php');

/** Load routes and routes Handler */
require_once('app/routesHandler.php');