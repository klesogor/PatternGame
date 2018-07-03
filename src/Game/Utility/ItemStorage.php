<?php

namespace BinaryStudioAcademy\Game\Utility;

use  BinaryStudioAcademy\Game\Contracts\Resources\Item;
use BinaryStudioAcademy\Game\Contracts\Storage;

final class ItemStorage implements Storage
{
    private $items = [];

    public function addItem(Item $item): void
    {
        $name = strtolower($item->getName());
        if(!arrayHasKey($name))
            $this->items[$name] = $item;
        else
            throw new \Exception('Item already exists!');
    }

    public function getItems(): array
    {
        return array_keys($this->items);
    }

    public function getItem(string $item): Item
    {
        $item = strtolower($item);
        if(isset($this->items[$item]))
            return $this->items[$item];
        throw new \Exception('Unknown item!');
    }

}