<?php

namespace BinaryStudioAcademy\Game\Contracts\Specifications;

use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;

interface StorageSpecificationInterface
{
    public function validate(StorageInterface $storage):  array;

    public function isValid():bool;
}