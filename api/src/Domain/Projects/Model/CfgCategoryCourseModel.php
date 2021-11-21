<?php

namespace Pricing\Domain\Projects\Model;

final class CfgCategoryCourseModel
{
    private string $id;

    private string $name;

    private array $courses;

    public static function createFromDatabase(string $id, string $name, array $courses): CfgCategoryCourseModel
    {
        $self = new self();
        $self->id = $id;
        $self->name = $name;
        $self->courses = $courses;

        return $self;
    }

    final public function getId(): string
    {
        return $this->id;
    }

    final public function getName(): string
    {
        return $this->name;
    }

    final public function getCourses(): array
    {
        return $this->courses;
    }
}
