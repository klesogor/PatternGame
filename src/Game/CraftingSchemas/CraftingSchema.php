<?php

namespace BinaryStudioAcademy\CraftingSchemas;

use BinaryStudioAcademy\Game\Contracts\Specifications\StorageSpecificationInterface;
use BinaryStudioAcademy\Game\Contracts\Storage;

abstract class CraftingSchema implements StorageSpecificationInterface
{
    protected $components;

    protected $result;

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
        return array_keys($this->components);
    }

    public function getResult():string
    {
        return $this->result;
    }
}