<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 16:21
 */

namespace BinaryStudioAcademy\Game;


use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;
use BinaryStudioAcademy\Game\Contracts\VictorySpecificationInterface;

class VictorySpecification implements VictorySpecificationInterface
{
    private $final_parts;

    public function __construct(array $final_parts)
    {
        $this->final_parts = array_keys($final_parts);
    }

    public function haveWon(StorageInterface $storage): bool
    {
        foreach($this->final_parts as $part)
            if($storage->itemQuantity($part)<1)
                return false;
        return true;
    }
}