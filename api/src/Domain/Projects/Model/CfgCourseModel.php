<?php

namespace Pricing\Domain\Projects\Model;

final class CfgCourseModel
{
    private string $id;

    private string $name;

    private string $image;

    /** @var array|CfgProjectModel[]  */
    private array $projects;

    public static function createFromDatabase(
        string $id,
        string $name,
        string $image,
        array $projects
    ): CfgCourseModel {
        $self = new self();
        $self->id = $id;
        $self->name = $name;
        $self->image = $image;
        $self->projects = $projects;

        return $self;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getProjects(): array
    {
        return $this->projects;
    }
}
