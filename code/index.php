<?php

require_once('modules/renderer.php');
require_once('modules/resolver.php');

use modules\{Renderer, Resolver};

$request = $_GET['request'];
$resolver = new Resolver(
    $serverRoot = $_SERVER['DOCUMENT_ROOT'],
    $templatesDir = 'templates',
    $notFoundTempate = '404.phtml'
);
$renderer = new Renderer(
    $links = array(
        '/' => 'Главная',
        '/technics' => 'Приёмы игры',
        '/tuning' => 'Настройка гитары',
        '/add' => 'Добавить подбор'
    ),
    $serverRoot = $_SERVER['DOCUMENT_ROOT'],
    $templateFile = 'template.php',
);
$path = $resolver->resolve($request);
$renderer->render($path);
