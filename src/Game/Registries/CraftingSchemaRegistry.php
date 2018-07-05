<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 13:42
 */

namespace BinaryStudioAcademy\Game\Registries;


use BinaryStudioAcademy\Game\Contracts\CraftingSchemas\CraftingSchemaInterface;
use BinaryStudioAcademy\Game\Exceptions\ItemNotFountException;

class CraftingSchemaRegistry implements CraftingSchemaRegistryInteface
{

    private $schemas = [];
    public function addSchema(CraftingSchemaInterface $schema)
    {
        $$this->schema[strtolower($schema->getAlias())] = $schema;
    }

    public function getSchema(string $alias)
    {
        if(!array_key_exists(strtolower($alias),$this->schemas)){
            throw new ItemNotFountException($alias);
        }
        return clone $this->schemas[strtolower($alias)];
    }
}