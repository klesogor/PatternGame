<?php

namespace BinaryStudioAcademy\Game\Contracts\Resources;

interface Craftable
{
    public function Craft(CraftSchema $schema):void;
}