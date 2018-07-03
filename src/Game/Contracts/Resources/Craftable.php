<?php

namespace BinaryStudioAcademy\Game\Contracts\Resources;

use BinaryStudioAcademy\Game\CraftingSchemas\CraftingSchema;

interface Craftable
{
    public function craft():string;

    public function getSchema():CraftingSchema;

    public function maxCapacityReached():bool;

    public function getComponentList():string;
}