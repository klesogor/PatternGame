<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 03.07.2018
 * Time: 11:35
 */

namespace BinaryStudioAcademy\Game\Items;


use BinaryStudioAcademy\Game\Contracts\Resources\Item;

abstract class BasicItem  implements Item
{
    protected $name;
    protected  $quantity;

    public function __construct(string $name,number $quantity)
    {
        $this->name = $name;
        $this->quantity = $quantity;
    }

    public function use(number $quantity):void
    {
        if($this->quantity < $quantity)
            throw new \Exception('Not enough raw materials');
        $this->quantity -= $quantity;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getQuantity(): number
    {
        return $this->quantity;
    }
}