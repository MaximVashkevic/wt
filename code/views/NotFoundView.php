<?php

namespace views;

use modules\View;

class NotFoundView extends View
{
    public function __construct(array $values = array())
    {
        parent::__construct($values);
        $this->extendedTemplate = 'template.php';
        $this->title = 'Страница не найдена';
    }

    public function main()
    {
        require_once 'templates/404.phtml';
    }
}