<?php

declare(strict_types=1);

namespace modules;

class Renderer
{
    private $values = array();
    private array $links;
    private string $templateFile;

    
    public function __construct(array $links, string $serverRoot, string $templateFile)
    {
        $this->links = $links;
        $this->templateFile = $serverRoot . '/' . $templateFile;
}

    public function render(string $request)
    {
        require_once($this->templateFile);
    }

    public function __set(string $name, mixed $value)
    {
        $this->values[$name] = $value;
    }

    public function __get(string $name)
    {
        return $this->values[$name];
    }
}