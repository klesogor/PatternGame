<?php

namespace BinaryStudioAcademy\Game\Utility;

use  BinaryStudioAcademy\Game\Contracts\Resources\Item;
use BinaryStudioAcademy\Game\Contracts\Storage;

final class ItemStorage implements Storage
{
    private $items = [];

    public function addItem(Item $item): void
    {
        if(!arrayHasKey($item->getName()))
            $this->items[$item->getName()] = $item;
        else
            throw new \Exception('Item already exists!');
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getItem(string $item): Item
    {
        if(isset($this->items[$item]))
            return $this->items[$item];
        throw new \Exception('Unknown item!');
    }

}