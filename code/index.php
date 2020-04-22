<?php

require_once 'modules/ViewFactory.php';
require_once 'modules/resolver.php';

use modules\{Resolver, ViewFactory};

$request = urldecode($_GET['request'] ?? Resolver::$INDEX_PAGE);

$viewID = Resolver::resolve($request, $values);
$view = ViewFactory::createView($viewID, $values);
$view->render();