<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 12:39
 */

namespace BinaryStudioAcademy\Game\Contracts\CraftingSchemas;


use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;

interface CraftingSchemaInterface
{
    public function canCraft(StorageInterface $storage): bool;

    public function missingResources(): array;

    public function getAlias():string;

    public function getSchema():string ;
}