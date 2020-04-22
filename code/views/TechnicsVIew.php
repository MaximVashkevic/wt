<?php

namespace views;

use modules\View;

class TechnicsView extends View
{
    public function __construct(array $values = array())
    {
        parent::__construct($values);
        $this->extendedTemplate = 'template.php';
        $this->title = 'Приёмы игры';
    }

    public function main()
    {
        require_once 'templates/technics.phtml';
    }
}