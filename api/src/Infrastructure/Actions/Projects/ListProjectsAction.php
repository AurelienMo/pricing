<?php

namespace Pricing\Infrastructure\Actions\Projects;

use Pricing\Domain\Projects\UseCase\ListProjects;
use Pricing\Domain\Projects\UseCase\ListProjectsPresenterInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListProjectsAction
{
    #[Route('/projects', name: 'list_projects', methods: ['GET'])]
    public function __invoke(ListProjects $useCase, ListProjectsPresenterInterface $presenter): Response
    {
        $useCase->execute($presenter);

        return new Response($presenter->getData(), $presenter->getStatusCode());
    }
}
