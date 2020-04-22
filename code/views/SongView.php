<?php

namespace views;

use modules\View;

class SongView extends View
{
    public function __construct(array $values = array())
    {
        parent::__construct($values);
        $this->extendedTemplate = 'template.php';
    }

    public function main()
    {
        require_once 'templates/song.phtml';
    }
}