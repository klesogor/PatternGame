<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 16:01
 */

namespace BinaryStudioAcademy\Game\Config;


use BinaryStudioAcademy\Game\Contracts\Factories\ItemFactoryInterface;
use BinaryStudioAcademy\Game\Contracts\Registries\CommandRegistryInterface;
use BinaryStudioAcademy\Game\Contracts\Registries\ItemsRegistryInterface;
use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;
use BinaryStudioAcademy\Game\Registries\CraftingSchemaRegistryInteface;

class Config
{
    public function getItemRegistry(ItemFactoryInterface $factory): ItemsRegistryInterface
    {

    }
    public function getStorage(): StorageInterface
    {

    }
    public function getCommandRegistry(): CommandRegistryInterface
    {

    }
    public function getSchemaRegistry(): CraftingSchemaRegistryInteface
    {

    }

    private $basic = [ //set quantity here probably?
        ['name' => 'Iron'],
        ['name' => 'Copper'],
        ['name' => 'Carbon'],
        ['name' => 'Sand'],
        ['name' => 'Fire'],
        ['name' => 'Fuel'],
        ['name' => 'Water'],
    ];

    private $advanced = [
        ['name' => 'Metal','schema' => ['Iron'=>1,'Fire'=>1]],
    ];

    private $parts = [
        ['name' => 'Ic','schema' => ['Metal'=>1,'Silicon'=>1]],
        ['name' => 'Wires','schema' => ['Cooper'=>1,'Fire'=>1]],
    ];

    private $final_parts = [
        ['name' => 'Shell','schema' => ['Metal'=>1,'Fire'=>1]],
        ['name' => 'Tank','schema' => ['Metal'=>1,'Fuel'=>1]],
        ['name' => 'Launcher','schema' => ['Water'=>1,'Fire'=>1,'Fuel'=>1]],
        ['name' => 'Porthole','schema' => ['Sand'=>1,'Fire'=>1]],
        ['name' => 'Control_unit','schema' => ['Ic'=>1,'Wires'=>1]],
        ['name' => 'Engine','schema' => ['Metal'=>1,'Carbon'=>1,'Fire'=>1]],
    ];
}