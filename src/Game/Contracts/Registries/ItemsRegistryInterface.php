<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 12:24
 */

namespace BinaryStudioAcademy\Game\Contracts\Registries;


use BinaryStudioAcademy\Game\Contracts\Items\ItemInterface;

interface ItemsRegistryInterface
{
    public function add(ItemInterface $item): void;

    public function getNewItem(string $alias): ItemInterface;

    public function getFinalParts() : array;
}