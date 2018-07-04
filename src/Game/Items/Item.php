<?php

namespace BinaryStudioAcademy\Game\Items;


use BinaryStudioAcademy\Game\Contracts\Items\ItemInterface;

abstract class Item implements ItemInterface
{
    private $name;
    protected $quantity;

    function __construct(string $name, int $quantity)
    {
        if($quantity < 0)
            throw new \Exception('Quantity must be 0 or greater!');
        $this->quantity = $quantity;
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function use (int $quantity): void
    {
        if($quantity<0 || $this->quantity < $quantity)
            throw new \Exception('Not enough materials!');
        $this->quantity -= $quantity;
    }
}