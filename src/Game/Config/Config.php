<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 16:01
 */

namespace BinaryStudioAcademy\Game\Config;


use BinaryStudioAcademy\Game\Commands\BuildCommand;
use BinaryStudioAcademy\Game\Commands\ExitCommand;
use BinaryStudioAcademy\Game\Commands\HelpCommand;
use BinaryStudioAcademy\Game\Commands\InfoCommand;
use BinaryStudioAcademy\Game\Commands\MineCommand;
use BinaryStudioAcademy\Game\Commands\ProduceCommand;
use BinaryStudioAcademy\Game\Commands\SchemeCommand;
use BinaryStudioAcademy\Game\Commands\StatusCommand;
use BinaryStudioAcademy\Game\Contracts\Factories\ItemFactoryInterface;
use BinaryStudioAcademy\Game\Contracts\Registries\CommandRegistryInterface;
use BinaryStudioAcademy\Game\Contracts\Registries\ItemsRegistryInterface;
use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;
use BinaryStudioAcademy\Game\Factories\CraftingSchemaFactory;
use BinaryStudioAcademy\Game\Registries\CommandRegistry;
use BinaryStudioAcademy\Game\Registries\CraftingSchemaRegistry;
use BinaryStudioAcademy\Game\Registries\ItemRegistry;
use BinaryStudioAcademy\Game\Storage\Storage;
use BinaryStudioAcademy\Game\Contracts\Registries\CraftingSchemaRegistryInteface;

class Config
{
    public function getItemRegistry(ItemFactoryInterface $factory): ItemsRegistryInterface
    {
        $registry = new ItemRegistry();
        foreach($this->basic as $resource)
            $registry->add($factory->create('basic',$resource));
        foreach($this->advanced as $resource)
            $registry->add($factory->create('advanced',$resource));
        foreach($this->parts as $resource)
            $registry->add($factory->create('part',$resource));
        foreach($this->final_parts as $resource)
            $registry->add($factory->create('finalPart',$resource));
        return $registry;
    }
    public function getStorage(): StorageInterface
    {
        return new Storage();
    }
    public function getCommandRegistry(): CommandRegistryInterface
    {
        $registry = new CommandRegistry();
        $registry->add(new ProduceCommand('produce'));
        $registry->add(new BuildCommand('build'));
        $registry->add(new MineCommand('mine'));
        $registry->add(new SchemeCommand('scheme'));
        $registry->add(new ExitCommand('exit'));
        $registry->add(new StatusCommand('status'));
        $registry->add(new InfoCommand('info'));
        $registry->add(new HelpCommand('help'));
        return $registry;
    }
    public function getSchemaRegistry(CraftingSchemaFactory $factory): CraftingSchemaRegistryInteface
    {
        $registry = new CraftingSchemaRegistry();
        foreach($this->advanced as $resource)
            $registry->addSchema($factory->create($resource['name'],$resource['schema']));
        foreach($this->parts as $resource)
            $registry->addSchema($factory->create($resource['name'],$resource['schema']));
        foreach($this->final_parts as $resource)
            $registry->addSchema($factory->create($resource['name'],$resource['schema']));
        return $registry;
    }

    private $basic = [ //set quantity here probably?
        ['name' => 'Iron'],
        ['name' => 'Copper'],
        ['name' => 'Carbon'],
        ['name' => 'Silicon'],
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
        ['name' => 'Wires','schema' => ['Copper'=>1,'Fire'=>1]],
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