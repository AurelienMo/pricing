<?php

namespace Pricing\Infrastructure\Actions;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

#[Route("/", name: "debug")]
class Debug
{
    public function __construct(private Environment $templating){}

    public function __invoke(): Response
    {
        return new Response($this->templating->render('debug/index.html.twig'));
    }
}
