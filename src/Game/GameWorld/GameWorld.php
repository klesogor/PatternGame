<?php

namespace BinaryStudioAcademy\Game\GameWorld;


use BinaryStudioAcademy\Game\Contracts\GameWorld\GameWorldInterface;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Contracts\Items\Craftable;
use BinaryStudioAcademy\Game\Contracts\Items\Mineable;
use BinaryStudioAcademy\Game\Contracts\Items\Producable;
use BinaryStudioAcademy\Game\Contracts\Registries\CommandRegistryInterface;
use BinaryStudioAcademy\Game\Contracts\Registries\CraftingSchemaRegistryInteface;
use BinaryStudioAcademy\Game\Contracts\Registries\ItemsRegistryInterface;
use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;
use BinaryStudioAcademy\Game\Contracts\VictorySpecificationInterface;
use BinaryStudioAcademy\Game\Exceptions\ItemNotFountException;
use BinaryStudioAcademy\Game\Exceptions\UnknownCommandException;


final class GameWorld implements GameWorldInterface
{
    private $writer;
    private $storage;
    private $itemRegistry;
    private $schemeRegistry;
    private $commandRegistry;
    private $victorySpec;
    private $mode = 'normal';

    public function __construct(StorageInterface $storage,
                                ItemsRegistryInterface $itemsRegistry,
                                CommandRegistryInterface $commandRegistry,
                                CraftingSchemaRegistryInteface $schemaRegistryInterface,
                                VictorySpecificationInterface $victory)
    {
        $this->storage = $storage;
        $this->itemRegistry = $itemsRegistry;
        $this->schemeRegistry = $schemaRegistryInterface;
        $this->commandRegistry = $commandRegistry;
        $this->victorySpec = $victory;
    }

    public function build(string $alias): void
    {
        try {
            $item = $this->itemRegistry->getNewItem($alias);
            if(!$item instanceof Craftable)
                throw new ItemNotFountException();
            if ($this->storage->itemQuantity($alias) > 0) {
                $this->writer->writeln("Attention! {$item} is ready.");
                return;
            }
            $scheme = $this->schemeRegistry->getSchema($alias);
            if ($scheme->canCraft($this->storage)) {
                foreach ($scheme->getComponents() as $component => $amount)
                    $this->storage->takeItem($component, $amount);

                $this->storage->addItem($item);
                $this->writer->write("{$item->getName()} is ready!");
                if($this->victorySpec->haveWon($this->storage)) {
                    $this->writer->write(' => You won!');
                    if($this->mode ==='normal')
                        die();
                }
                $this->writer->write(PHP_EOL);
            } else {
                $message = 'Inventory should have: ';
                $message .= implode(',', $this->arrayToLowerCase($scheme->missingResources()));
                $this->writer->writeln($message);
            }
        }catch (ItemNotFountException $exception){
            $this->writer->writeln('There is no such spaceship module.');
        }
    }

    public function produce(string $alias): void
    {
        try {
            $item = $this->itemRegistry->getNewItem($alias);
            if(!$item instanceof Producable)
                throw new ItemNotFountException();
            $scheme = $this->schemeRegistry->getSchema($alias);
            if ($scheme->canCraft($this->storage)) {
                foreach ($scheme->getComponents() as $component => $amount)
                    $this->storage->takeItem($component, $amount);

                $this->storage->addItem($item);
                $this->writer->writeln("{$item->getName()} added to your inventory!");
            } else {
                $message = 'You should mine: ';
                $message .= implode(',', $this->arrayToLowerCase($scheme->missingResources()));
                $this->writer->writeln($message);
            }
        }catch (ItemNotFountException $exception){
            $this->writer->writeln('There is no such resource.');
        }
    }

    public function scheme(string $alias): void
    {
        try {
            $representation = $this->schemeRegistry->getSchema($alias)->getSchema();
            $this->writer->writeln($representation);
        }catch (ItemNotFountException $exception){
            $this->writer->writeln('There is no such spaceship module.');
        }
    }

    public function mine(string $alias): void
    {
        try {
            $item = $this->itemRegistry->getNewItem($alias);
            if(!$item instanceof Mineable)
                throw new ItemNotFountException();
            $this->storage->addItem($this->itemRegistry->getNewItem($alias));
            $this->writer->writeln("{$item->getName()} added to your inventory!");
        }catch (ItemNotFountException $exception){
            $this->writer->writeln('There is no such resource.');
        }
    }

    public function status(): void
    {
        $finalParts = $this->itemRegistry->getFinalParts();
        $ready = [];
        $items = [];
        foreach ($this->storage->getItemsList() as $key=>$value)
        {
            if(array_key_exists($key,$finalParts)) {
                $ready[] = $finalParts[$key];
                unset($finalParts[$key]);
            } else {
                $items[] ="$key - " . count($value);
            }
        }
        $this->writer->writeln("You have: ");
        $this->writer->writeln(implode(', ',$items));
        $this->writer->writeln("Spaceship parts ready: ");
        $this->writer->writeln(implode(', ',$ready));
        $this->writer->writeln("You need to build: ");
        $this->writer->writeln(implode(', ',$finalParts));
    }

    public function help(): void
    {
        $commands = $this->commandRegistry->getCommandList();
        $this->writer->writeln('Available commands:');
        foreach($commands as $command)
            $this->writer->writeln($command);
    }

    public function info(string $alias):void
    {
        try{
            $info = $this->itemRegistry->getNewItem($alias)->getInfo();
            $this->writer->writeln($info);
        }catch (ItemNotFountException $exception) {
            $this->writer->writeln("There is no such item");
        }
    }

    public function process(string $command):void
    {
        $commandArray = explode(':',strtolower($command));
        try{
            $command = $this->commandRegistry->get($commandArray[0]);
            $data = isset($commandArray[1]) ? $commandArray[1] : '';
            $command->setData($data)->setExecutor($this)->execute();
            return;
        } catch (UnknownCommandException $exception) {
            try {
                $item = $this->itemRegistry->getNewItem($commandArray[0]);
                if(!$item instanceof Producable)
                    throw new ItemNotFountException();
                $command = $this->commandRegistry->get('produce');
                $command->setData($commandArray[0])->setExecutor($this)->execute();
            } catch (ItemNotFountException $exception){
                $this->writer->writeln("Unknown command {$commandArray[0]}");
            }
        }
    }

    public function setWriter(Writer $writer):void
    {
        $this->writer = $writer;
    }

    private function arrayToLowerCase(array $input)
    {
        return array_map(function($item){
            return strtolower($item);
        },$input);
    }

    public function setMode(string $mode): void
    {
        $this->mode = $mode;
    }
}