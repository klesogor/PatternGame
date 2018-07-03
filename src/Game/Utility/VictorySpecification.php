<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 03.07.2018
 * Time: 15:35
 */

namespace BinaryStudioAcademy\Game\Utility;


use BinaryStudioAcademy\Game\Contracts\FinalPart;
use BinaryStudioAcademy\Game\Contracts\Specifications\StorageSpecificationInterface;
use BinaryStudioAcademy\Game\Contracts\Storage;

class VictorySpecification implements StorageSpecificationInterface
{

    public function isSatisfiedBy(Storage $storage): array
    {
        $failed = [];
        foreach($storage->getItems() as $item)
            if($item instanceof FinalPart && $item->getQuantity<1)
                $failed[] = $item;
        return $failed;
    }
}