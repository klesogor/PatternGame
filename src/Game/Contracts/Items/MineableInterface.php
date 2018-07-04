<?php

namespace BinaryStudioAcademy\Game\Contracts\Items;


interface MineableInterface
{
    public function mine():string;

    public function setYield(int $yield): void;
}