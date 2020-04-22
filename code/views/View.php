<?php

declare(strict_types=1);

namespace modules;

abstract class View
{
    protected array $values;
    protected string $extendedTemplate;

    public function __construct(array $values = array())
    {
        $this->values = $values;
    }

    public function render(): void
    {
        require_once $this->extendedTemplate;
    }

    public function __get(string $name)
    {
        return $this->values[$name];
    }
}