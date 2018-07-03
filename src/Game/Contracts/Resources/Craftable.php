<?php

namespace BinaryStudioAcademy\Game\Contracts\Resources;

use BinaryStudioAcademy\CraftingSchemas\CraftingSchema;
use BinaryStudioAcademy\Game\Contracts\Storage;

interface Craftable
{
    public function craft():string;

    public function getSchema():CraftingSchema;

    public function maxCapacityReached():bool;

    public function getComponentList():string;
}