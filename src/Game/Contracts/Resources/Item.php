<?php

namespace BinaryStudioAcademy\Game\Contracts\Resources;

interface Item
{
    public function getName():string;

    public function use(int $quantity):void;

    public function getQuantity():int;
}