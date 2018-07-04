<?php

namespace BinaryStudioAcademy\Game\Factories;


use BinaryStudioAcademy\Game\Contracts\Specifications\StorageSpecificationInterface;

abstract class AbstractSchemeFactory
{
    abstract  public function create(array $components): StorageSpecificationInterface;
}