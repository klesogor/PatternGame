<?php
namespace BinaryStudioAcademy\Game\Storage;

use BinaryStudioAcademy\Game\Contracts\Items\ItemInterface;
use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;
use BinaryStudioAcademy\Game\Exceptions\ItemNotFountException;

final class Storage implements StorageInterface
{
    private $items = [];

    public function itemQuantity(string $alias): int
    {
        $lower_name = strtolower($alias);
       if(!array_key_exists($lower_name,$this->items))
           return 0;
       return count($this->items[$lower_name]);
    }

    public function takeItem(string $alias, int $quantity)
    {
        $lower_name = strtolower($alias);
        if(!array_key_exists($lower_name,$this->items))
            throw new ItemNotFountException();
        if(count($this->items[$lower_name])<$quantity)
            throw new \Exception('not enough items in inventory!');
        $result = [];
        for($i = 0;$i<$quantity;$i++)
            $result[] = array_pop($this->items[$lower_name]);
        if(count($this->items[$lower_name]) === 0)
            unset($this->items[$lower_name]);
        return $result;
    }

    public function addItem(ItemInterface $item)
    {
        $this->items[strtolower($item->getName())] [] = $item;
    }

    public function getItemsList(): array
    {
        return $this->items;
    }
}