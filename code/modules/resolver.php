<?php

declare(strict_types=1);

namespace modules;

class Resolver
{
    private string $templatesDir;
    private string $notFoundPath;

    public function __construct(string $serverRoot, string $templatesDir, string $notFoundTemplate)
    {
        $this->templatesDir = $serverRoot . '/' . $templatesDir;
        $this->notFoundPath = $this->templatesDir . '/' . $notFoundTemplate;
    }

    public function resolve(string $request): string
    {
        if ($request == '') {
            return $this->templatesDir . '/index.phtml';
        }
        $pagePath = $this->templatesDir . '/' . $request . '.phtml';
        if (file_exists($pagePath)) {
            return $pagePath;
        } else {
            return $this->notFoundPath;
        }
    }
}
