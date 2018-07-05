<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Config\Config;
use BinaryStudioAcademy\Game\Config\GameWorldBuilder;
use BinaryStudioAcademy\Game\Contracts\Io\Reader;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Factories\CraftingSchemaFactory;
use BinaryStudioAcademy\Game\Factories\ItemFactory;

class Game
{
    private $gameWorld;
    public function __construct()
    {
        $config = new Config();
        $builder = new GameWorldBuilder();
        $items = $config->getItemRegistry(new ItemFactory());
        $commands =$config->getCommandRegistry();
        $crafts = $config->getSchemaRegistry(new CraftingSchemaFactory());
        $storage = $config->getStorage();
        $victory = new VictorySpecification($items->getFinalParts());
        $this->gameWorld = $builder->setItems($items)
            ->setCommands($commands)
            ->setCrafts($crafts)
            ->setStorage($storage)
            ->setVictory($victory)
            ->build();

    }

    public function start(Reader $reader, Writer $writer): void
    {
        $this->gameWorld->setWriter($writer);
        while(true) {
            $this->gameWorld->process(trim($reader->read()));
        }
    }

    public function run(Reader $reader, Writer $writer): void
    {
        $this->gameWorld->setWriter($writer);
        $this->gameWorld->setMode('testing');
        $this->gameWorld->process(trim($reader->read()));
    }
}
