<?php

namespace views;

use modules\View;

class AddView extends View
{
    public function __construct(array $values = array())
    {
        parent::__construct($values);
        $this->extendedTemplate = 'template.php';
        $this->title = 'Добавить аккорды';
    }

    public function main()
    {
        require_once 'templates/add.phtml';
    }
}