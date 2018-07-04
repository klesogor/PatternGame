<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Config\Config;
use BinaryStudioAcademy\Game\Contracts\Io\Reader;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Factories\ConcreteResourceFactory;
use BinaryStudioAcademy\Game\Factories\SchemeFactory;
use BinaryStudioAcademy\Game\Specifications\VictorySpecification;

class Game
{
    private $storage;
    private $spec;
    private $gameWorld;

    public function __construct()
    {
        $config = new Config();
        $this->spec = new VictorySpecification();
        $this->storage = $config->getStorage(new ConcreteResourceFactory());
        $this->gameWorld = new GameWorld($config->getCommandFactory(),$this->storage,new SchemeFactory(),$this->spec);
    }

    public function start(Reader $reader, Writer $writer): void
    {
        $writer->writeln('Hello there!');
        $this->gameWorld->setWriter($writer);
        while(!empty($this->spec->validate($this->storage))) {
            $input = trim($reader->read());
            $this->gameWorld->makeTurn($input);
        }

    }

    public function run(Reader $reader, Writer $writer): void
    {
        $this->gameWorld->setWriter($writer);
        $input = trim($reader->read());
        $this->gameWorld->makeTurn($input);
    }
}
