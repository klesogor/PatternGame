<?php

namespace BinaryStudioAcademy\Game\Items;

use BinaryStudioAcademy\Game\Contracts\Items\MineableInterface;

final class BasicResource extends Item implements MineableInterface
{

    private $yieldAmount = 1;

    public function mine(): string
    {
        $this->quantity += $this->yieldAmount;
        return "{$this->getName()} added to inventory.";
    }

    public function setYield(int $yield): void
    {
        if($yield <= 0 )
            throw new \Exception('Yield must be greater than zero!');
        $this->yieldAmount = $yield;
    }
}