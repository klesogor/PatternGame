<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Config\Config;
use BinaryStudioAcademy\Game\Contracts\Io\Reader;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Factories\BasicCommandFactory;
use BinaryStudioAcademy\Game\Utility\ConcreteStorageProxy;
use BinaryStudioAcademy\Game\Utility\VictorySpecification;

class Game
{
    private $storage;
    private $storageProxy;
    private $commandFactory;
    private $victory;

    public function __construct()
    {
        $config = new Config();
        $this->victory = new VictorySpecification();
        $this->storage = $config->getStorage();
        $this->storageProxy = new ConcreteStorageProxy($this->storage,$this->victory);
        $this->commandFactory = new BasicCommandFactory($config->getCommands(),
            array_keys($this->storage->getItems()),$this->storageProxy);

    }

    public function start(Reader $reader, Writer $writer): void
    {
        $this->storageProxy->setWriter($writer);
        while(!empty($this->victory->isSatisfiedBy($this->storage)))
        {
            $input = trim($reader->read());
            try{
                $this->commandFactory->make($input)->execute();
            }catch (\Exception $exception){$writer->writeln("Unknown command {$input}");}
        }
    }

    public function run(Reader $reader, Writer $writer): void
    {

        $writer->writeln("You can't play yet. Please read input and convert it to commands.");
        $writer->writeln("Don't forget to create game's world.");
    }
}
