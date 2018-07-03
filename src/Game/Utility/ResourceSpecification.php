<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 03.07.2018
 * Time: 15:23
 */

namespace BinaryStudioAcademy\Game\Utility;


use BinaryStudioAcademy\Game\Contracts\Specifications\StorageSpecificationInterface;
use BinaryStudioAcademy\Game\Contracts\Storage;
use BinaryStudioAcademy\Game\Items\BasicResource;
use BinaryStudioAcademy\Game\Items\CraftableResources;

class ResourceSpecification implements StorageSpecificationInterface
{

    public function isSatisfiedBy(Storage $storage): array
    {
        $result = [];
        foreach ($storage->getItems() as $item )
        {
            if(($item instanceof BasicResource||$item instanceof CraftableResources) && $item->getQuantity()>0)
                $result[] = ['name' => $item->getName(),'quantity'=>$item->getQuantity()];
        }
        return $result;
    }
}