<?php

namespace Pricing\Domain\Projects\UseCase;

use Pricing\Domain\Projects\Model\CfgCategoryCourseRepositoryInterface;

final class ListProjects
{
    public function __construct(private CfgCategoryCourseRepositoryInterface $repository){}

    public function execute(ListProjectsPresenterInterface $presenter): void
    {
        $models = $this->repository->listAllProjects();
        $response = new ListProjectsResponse($models);
        $presenter->present($response);
    }
}
