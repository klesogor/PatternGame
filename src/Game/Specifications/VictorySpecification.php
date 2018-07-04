<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 04.07.2018
 * Time: 11:55
 */

namespace BinaryStudioAcademy\Game\Specifications;


use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;
use BinaryStudioAcademy\Game\Items\FinalSpaceshipPart;

final class VictorySpecification extends AbstractSpecification
{

    public function validate(StorageInterface $storage): array
    {
        $failed = [];
        foreach ($storage->getItems() as $item)
        {
            if($item instanceof FinalSpaceshipPart && $item->getQuantity()<1)
                $failed[] = $item->getName();
        }
        $this->valid = empty($failed);
        return $failed;
    }
}