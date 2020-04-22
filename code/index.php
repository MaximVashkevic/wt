<?php

require_once 'modules/ViewFactory.php';

use modules\ViewFactory;
$request = $_GET['request'] ?? 'index';

$view = ViewFactory::createView($request, array('pageTitle' => 'abc', 1,3,4,5,6,7,7));
$view->render();