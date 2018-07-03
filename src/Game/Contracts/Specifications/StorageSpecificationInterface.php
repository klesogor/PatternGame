<?php

namespace BinaryStudioAcademy\Game\Contracts\Specifications;

use BinaryStudioAcademy\Game\Contracts\Storage;

interface StorageSpecificationInterface
{
    public function isSatisfiedBy(Storage $storage):array;
}