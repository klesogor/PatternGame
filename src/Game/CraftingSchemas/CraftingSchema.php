<?php

namespace BinaryStudioAcademy\CraftingSchemas;

use BinaryStudioAcademy\Game\Contracts\Specifications\StorageSpecificationInterface;
use BinaryStudioAcademy\Game\Contracts\Storage;

class CraftingSchema implements StorageSpecificationInterface
{
    protected $components;

    function __construct(array  $components)
    {
        $this->components = $components;
    }

    public function isSatisfiedBy(Storage $storage): array
    {
        $failed = [];
        foreach($this->components as $component=>$quantity){
            if($storage->getItem($component)->getQuantity()<$quantity)
                $failed[] = $component;
        }
        return $failed;
    }

    public function getComponents():array
    {
        return $this->components;
    }
}