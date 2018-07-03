<?php

namespace BinaryStudioAcademy\Game\Contracts\Resources;

interface Item
{
    public function getName():string;

    public function use(number $quantity):void;

    public function getQuantity():number;
}