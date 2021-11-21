<?php

namespace Pricing\Infrastructure\Doctrine\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Pricing\Domain\Projects\Model\CfgCategoryCourseModel;
use Pricing\Domain\Projects\Model\CfgCategoryCourseRepositoryInterface;
use Pricing\Domain\Projects\Model\CfgCourseModel;
use Pricing\Domain\Projects\Model\CfgProjectModel;
use Pricing\Domain\Projects\Model\CfgTarificationModel;
use Pricing\Infrastructure\Doctrine\Entity\CfgCategoryCourse;
use Pricing\Infrastructure\Doctrine\Entity\CfgCourse;
use Pricing\Infrastructure\Doctrine\Entity\CfgProject;

class CfgCategoryCourseRepository extends ServiceEntityRepository implements CfgCategoryCourseRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CfgCategoryCourse::class);
    }

    final public function listAllProjects(): array
    {
        return array_map(function (CfgCategoryCourse $category) {
            $courses = array_map(function (CfgCourse $course) {
                $projects = array_map(function (CfgProject $project) {
                    return CfgProjectModel::createFromDatabase(
                        $project->getId(),
                        $project->getName(),
                        $project->getNumber(),
                        $project->getCreatedAt(),
                        $project->getUpdatedAt(),
                        CfgTarificationModel::createFromDatabase(
                            $project->getCfgTarification()->getId(),
                            $project->getCfgTarification()->getName(),
                            $project->getCfgTarification()->getName()
                        )
                    );
                }, $course->getProjects()->toArray());
                return CfgCourseModel::createFromDatabase(
                    $course->getId(),
                    $course->getName(),
                    $course->getImage(),
                    $projects
                );
            }, $category->getCourses()->toArray());
            return CfgCategoryCourseModel::createFromDatabase(
                $category->getId(),
                $category->getName(),
                $courses
            );
        }, $this->findAll());
    }
}
