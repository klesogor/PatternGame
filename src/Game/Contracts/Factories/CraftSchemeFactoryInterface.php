<?php

namespace  BinaryStudioAcademy\Game\Contracts\Factories;

use BinaryStudioAcademy\Game\Contracts\CraftingSchemas\CraftingSchemaInterface;

interface CraftSchemeFactoryInterface
{
    public function create(string $alias,array $components): CraftingSchemaInterface;
}