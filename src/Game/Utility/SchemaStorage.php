<?php

namespace BinaryStudioAcademy\Game\Utility;

use BinaryStudioAcademy\CraftingSchemas\CraftingSchema;
use BinaryStudioAcademy\Game\Contracts\BlueprintStorage;

final class SchemaStorage implements BlueprintStorage
{
    private $items = [];

    public function addSchema(CraftingSchema $schema): void
    {
        if(!arrayHasKey($schema->getResult()))
            $this->items[$schema->getResult()] = $schema;
        else
            throw new \Exception('Schema already exists!');
    }

    public function getSchemas(): array
    {
        return $this->items;
    }

    public function getSchema(string $item): CraftingSchema
    {
        if(isset($this->items[$item]))
            return $this->items[$item];
        throw new \Exception('Unknown schema!');
    }

}