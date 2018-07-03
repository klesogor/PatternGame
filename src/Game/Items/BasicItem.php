<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 03.07.2018
 * Time: 11:35
 */

namespace BinaryStudioAcademy\Game\Items;


use BinaryStudioAcademy\Game\Contracts\Resources\Item;
use BinaryStudioAcademy\Game\Contracts\Storage;

abstract class BasicItem  implements Item
{
    protected $name;
    protected  $quantity;
    protected $storage;

    public function __construct(string $name,int $quantity,Storage $storage)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->storage = $storage;
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
        if($this->quantity < $quantity)
            throw new \Exception('Not enough raw materials');
        $this->quantity -= $quantity;
    }
}