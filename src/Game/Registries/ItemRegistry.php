<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 13:47
 */

namespace BinaryStudioAcademy\Game\Registries;


use BinaryStudioAcademy\Game\Contracts\Items\ItemInterface;
use BinaryStudioAcademy\Game\Contracts\Registries\ItemsRegistryInterface;
use BinaryStudioAcademy\Game\Exceptions\ItemNotFountException;

class ItemRegistry implements ItemsRegistryInterface
{

    private $items = [];
    public function add(ItemInterface $item): void
    {
        $this->items[strtolower($item->getName())] = $item;
    }

    public function getNewItem(string $alias): ItemInterface
    {
        if(!array_key_exists(strtolower($alias),$this->items)){
            throw new ItemNotFountException($alias);
        }
        return clone $this->items[strtolower($alias)];
    }

    public function getFinalParts(): array
    {
        $finals = [];
        foreach ($this->items as $key=>$value)
            $finals[] = $value;
        return $finals;
    }
}