<?php

namespace BinaryStudioAcademy\Game\Contracts\Resources;

interface Craftable
{
    public function craft():void;

    public function getMaxCapacity():number;
}