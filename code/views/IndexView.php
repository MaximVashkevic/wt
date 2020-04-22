<?php

namespace views;

use modules\View;

class IndexView extends View
{
    public function __construct(array $values = array())
    {
        parent::__construct($values);
        $this->extendedTemplate = 'template.php';
    }

    public function main()
    {
        require_once 'templates/index.phtml';
    }
}