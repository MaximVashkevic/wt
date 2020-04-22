<?php

namespace modules;

require_once 'View.php';
require_once 'views/IndexView.php';
require_once 'views/AddView.php';
require_once 'views/NotFoundView.php';

use templates\IndexView;
use modules\View;
use views\AddView;
use views\NotFoundView;

class ViewFactory
{
    public static function createView(string $request, array $values): View
    {
        switch ($request) {
            case 'index':
                return new IndexView($values);
            case 'add':
                return new AddView($values);

        }
        return new NotFoundView($values);
    }
}
