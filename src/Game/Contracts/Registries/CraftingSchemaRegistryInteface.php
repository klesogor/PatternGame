<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 13:04
 */

namespace BinaryStudioAcademy\Game\Registries;


use BinaryStudioAcademy\Game\Contracts\CraftingSchemas\CraftingSchemaInterface;

interface CraftingSchemaRegistryInteface
{
    public function addSchema(CraftingSchemaInterface $schema);

    public function getSchema(string $alias);
}