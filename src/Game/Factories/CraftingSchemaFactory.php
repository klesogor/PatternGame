<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 14:44
 */

namespace BinaryStudioAcademy\Game\Factories;


use BinaryStudioAcademy\Game\Contracts\CraftingSchemas\CraftingSchemaInterface;
use BinaryStudioAcademy\Game\Contracts\Factories\CraftSchemeFactoryInterface;
use BinaryStudioAcademyTests\Game\CraftingSchema\CraftingSchema;

class CraftingSchemaFactory implements CraftSchemeFactoryInterface
{

    public function create(string $alias, array $components): CraftingSchemaInterface
    {
       return new CraftingSchema($components,$alias);
    }
}