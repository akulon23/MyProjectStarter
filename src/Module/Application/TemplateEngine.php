<?php


namespace Application;


use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class TemplateEngine
{
    private $templateEngine;

    /**
     * TemplateEngine constructor.
     * @param string $templatePath
     */
    public function __construct(string $templatePath)
    {
        $loader = new FilesystemLoader($templatePath);
        $this->templateEngine = new Environment($loader);
    }

    /**
     * The method is responsible for rendering the template.
     * @param string $templateName
     * @param array $templateParams
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function render(string $templateName, array $templateParams = []): void
    {
        $render = $this->templateEngine->load($templateName);
        echo $render->render($templateParams);
    }

}
