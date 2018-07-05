<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 16:01
 */

namespace BinaryStudioAcademy\Game\Config;


use BinaryStudioAcademy\Game\Contracts\Registries\CommandRegistryInterface;
use BinaryStudioAcademy\Game\Contracts\Registries\ItemsRegistryInterface;
use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;
use BinaryStudioAcademy\Game\Contracts\VictorySpecificationInterface;
use BinaryStudioAcademy\Game\GameWorld\GameWorld;

use BinaryStudioAcademy\Game\Contracts\Registries\CraftingSchemaRegistryInteface;

class GameWorldBuilder
{
    private $storage;
    private $itemRegistry;
    private $schemaRegistry;
    private $commandRegistry;
    private $victory_spec;

    public function setStorage(StorageInterface $storage)
    {
        $this->storage = $storage;
        return $this;
    }

    public function setItems(ItemsRegistryInterface $items)
    {
        $this->itemRegistry = $items;
        return $this;
    }

    public function setCrafts(CraftingSchemaRegistryInteface $crafts)
    {
        $this->schemaRegistry = $crafts;
        return $this;
    }
    public function setCommands(CommandRegistryInterface $registry)
    {
        $this->commandRegistry = $registry;
        return $this;
    }
    public function setVictory(VictorySpecificationInterface $spec)
    {
        $this->victory_spec = $spec;
        return $this;
    }

    public function build()
    {
        return new GameWorld($this->storage,
            $this->itemRegistry,
            $this->commandRegistry,
            $this->schemaRegistry,
            $this->victory_spec);
    }
}