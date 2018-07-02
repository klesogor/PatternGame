<?php 

namespace BinaryStudioAcademy\Game\Events;

use BinaryStudioAcademy\Game\Contracts\Resources\Item;

final class Mined extends Event
{
    protected $quantity;

    public function __consturct(Item $item,number $mined)
    {
        parent::__consturct($item);
        $this->quantity = $mined;
    }
}