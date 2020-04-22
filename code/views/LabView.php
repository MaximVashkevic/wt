<?php

namespace views;

use modules\View;

class LabView extends View
{
    public function __construct(array $values = array())
    {
        parent::__construct($values);
        $this->extendedTemplate = 'labTemplate.php';
        $this->title = 'Лабораторная №2';
    }
}