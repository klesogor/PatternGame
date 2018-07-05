<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 12:52
 */

namespace BinaryStudioAcademy\Game\Contracts;


use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;

interface VictorySpecificationInterface
{
    public function haveWon(StorageInterface $storage): bool;
}