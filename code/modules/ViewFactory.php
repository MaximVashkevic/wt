<?php

namespace modules;

require_once 'views/View.php';
require_once 'views/IndexView.php';
require_once 'views/AddView.php';
require_once 'views/TechnicsView.php';
require_once 'views/TuningView.php';
require_once 'views/SongView.php';
require_once 'views/NotFoundView.php';
require_once 'views/LabView.php';

use views\{AddView, IndexView, NotFoundView, SongView, TechnicsView, TuningView, LabView};

class ViewFactory
{
    public static function createView(string $request, array $values)
    {
        switch ($request) {
            case 'index':
                return new IndexView($values);
            case 'add':
                return new AddView($values);
            case 'technics':
                return new TechnicsView($values);
            case 'tuning':
                return new TuningView($values);
            case 'song':
                return new SongView($values);
            case 'lab':
                return new LabView($values);
        }
        return new NotFoundView($values);
    }
}