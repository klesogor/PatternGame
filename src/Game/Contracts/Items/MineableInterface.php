<?php

namespace BinaryStudioAcademy\Game\Contracts\Items;


interface Mineable
{
    public function mine():string;

    public function setYield(int $yield): void;
}