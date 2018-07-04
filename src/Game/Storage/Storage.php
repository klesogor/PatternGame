<?php

namespace BinaryStudioAcademy\Game\Storage;


use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;
use BinaryStudioAcademy\Game\Items\Item;

final class Storage implements StorageInterface
{
    private $container = [];

    public function add(Item $item): void
    {
        $name = strtolower($item->getName());
        if(array_key_exists($name,$this->container))
            throw new \Exception('Item already exists!');
        $this->container [$name] = $item;
    }

    public function remove(string $item): void
    {
        $name = strtolower($item);
        if(array_key_exists($name,$this->container))
            unset($this->container[$name]);
    }

    public function get(string $item): Item
    {
        $name = strtolower($item);
        if(array_key_exists($name,$this->container))
            return $this->container [$name];
        throw new \Exception('Unknown resource!');
    }

    public function has(string $item): bool
    {
        $name = strtolower($item);
        if(array_key_exists($name,$this->container))
            return true;
        return false;
    }

    public function getItems(): array
    {
        return array_keys($this->container);
    }
}