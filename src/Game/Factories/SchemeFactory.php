<?php

namespace BinaryStudioAcademy\Game\Factories;

use BinaryStudioAcademy\Game\Contracts\Specifications\StorageSpecificationInterface;
use BinaryStudioAcademy\Game\Specifications\CraftSpecification;

class SchemeFactory
{
    public function create(array $components): StorageSpecificationInterface
    {
        return new CraftSpecification($components);
    }
}