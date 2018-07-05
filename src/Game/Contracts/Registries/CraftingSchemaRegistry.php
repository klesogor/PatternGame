<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 13:04
 */

namespace BinaryStudioAcademy\Game\Contracts\Registries;


use BinaryStudioAcademy\Game\Contracts\CraftingSchemas\CraftingSchemaInterface;

interface CraftingSchemaRegistry
{
    public function addSchema(CraftingSchemaInterface $schema);

    public function getSchema(string $alias);
}