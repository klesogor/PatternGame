<?php

namespace BinaryStudioAcademy\Game\Items;


use BinaryStudioAcademy\Game\Contracts\Items\Craftable;
use BinaryStudioAcademy\Game\traits\SchemaTrait;

class SpaceshipPart extends Item implements Craftable
{
    use SchemaTrait;

    public function craft(): string
    {
        if($this->quantity > 0)
            return "Attention! {$this->getName()} is ready!";
        $this->quantity += 1;
        return "{$this->getName()} is ready!";
    }
}