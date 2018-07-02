<?php

namespace BinaryStudioAcademy\Game\Contracts;

use  BinaryStudioAcademy\Game\Contracts\Resources\Item;

interface Storage
{
    public function addItem(Item $item):void;

    public function getItems():array;

    public function getItem(string $item):Item;

    public function validateHasItem(string $name,$quantity):bool;

}
