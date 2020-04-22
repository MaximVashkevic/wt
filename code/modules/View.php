<?php

namespace modules;

abstract class View
{
    protected string $templatesDir;
    protected array $values;
    protected string $extendedTemplate;

    function __construct(array $values = array())
    {
        $this->values = $values;
    }

    abstract function render();
}