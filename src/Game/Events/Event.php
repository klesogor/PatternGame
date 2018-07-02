<?php

namespace BinaryStudioAcademy\Game\Events;

use BinaryStudioAcademy\Game\Contracts\Resources\Item;

abstract class Event
{
    protected $sender;

    public function __construct(Item $sender)
    {
        $this->sender = $sender;
    }

    public function getSender():Item
    {
        return $this->sender;
    }
}