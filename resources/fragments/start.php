<?php

/*
 * This code must be executed before a HTTP request can be handled.
 */

use TastyRecipes\Util\Util;

require_once 'classes/TastyRecipes/Util/Util.php';
Util::initRequest();