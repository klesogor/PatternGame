<?php


namespace BinaryStudioAcademy\Game\Specifications;


use BinaryStudioAcademy\Game\Contracts\Specifications\StorageSpecificationInterface;

abstract class AbstractSpecification implements  StorageSpecificationInterface
{
    protected $valid;

    public function isValid(): bool
    {
        return $this->valid;
    }
}