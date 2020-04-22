<?php

namespace views;

use modules\View;

class TuningView extends View
{
    public function __construct(array $values = array())
    {
        parent::__construct($values);
        $this->extendedTemplate = 'template.php';
        $this->title = 'Настройка гитары';
    }

    public function main()
    {
        require_once 'templates/tuning.phtml';
    }
}