<?php

namespace BinaryStudioAcademy\Game\Items;


use BinaryStudioAcademy\Game\Contracts\Resources\Craftable;

abstract class SpaceshipPart extends BasicItem implements Craftable
{
    protected $maxAmount = 1;
    protected $craftAmount = 1;
    public function craft(): void
    {
        if($this->quantity >= $this->maxAmount) {
            throw new \Exception('Max capacity reached!');
        }
        $this->quantity +=  $this->craftAmount;
    }
}