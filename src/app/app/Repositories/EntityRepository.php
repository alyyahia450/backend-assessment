<?php

namespace App\Repositories;

abstract class EntityRepository
{
    private string $entityClassName;

    public function __construct(string $entityClassName = null)
    {
        $this->entityClassName = $entityClassName;
    }
}