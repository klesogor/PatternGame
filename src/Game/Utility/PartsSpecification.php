<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 03.07.2018
 * Time: 15:24
 */

namespace BinaryStudioAcademy\Game\Utility;


use BinaryStudioAcademy\Game\Contracts\FinalPart;
use BinaryStudioAcademy\Game\Contracts\Specifications\StorageSpecificationInterface;
use BinaryStudioAcademy\Game\Contracts\Storage;

class PartsSpecification implements StorageSpecificationInterface
{

    public function isSatisfiedBy(Storage $storage): array
    {
        $result = [
            'done' =>[],
            'to_do' =>[]
        ];

        foreach ($storage->getItems() as $item) {
            if($item instanceof FinalPart) {
                if ($item->getQuantity()>0){
                    $result['done'][] = $item->getName();
                } else {
                    $result['to_do'][] = $item->getName();
                }
            }
        }
    }
}