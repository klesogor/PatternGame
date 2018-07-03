<?php

namespace BinaryStudioAcademy\Game\Contracts;

use BinaryStudioAcademy\CraftingSchemas\CraftingSchema;

interface BlueprintStorage
{
    public function addSchema(CraftingSchema $schema):void;

    public function getSchemas():array;

    public function getSchema(string $item):CraftingSchema;
}
