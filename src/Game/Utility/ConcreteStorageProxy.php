<?php

namespace BinaryStudioAcademy\Game\Utility;


use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Contracts\Resources\Mineable;
use BinaryStudioAcademy\Game\Contracts\Specifications\StorageSpecificationInterface;
use BinaryStudioAcademy\Game\Contracts\Storage;
use BinaryStudioAcademy\Game\Contracts\StorageProxy;
use BinaryStudioAcademy\Game\Items\CraftableResources;
use BinaryStudioAcademy\Game\Items\SpaceshipPart;

final class ConcreteStorageProxy implements StorageProxy
{
    private $storage;
    private $writer;
    private $victory;

    public function __construct(Storage $storage,StorageSpecificationInterface $victory)
    {
        $this->storage = $storage;
        $this->victory = $victory;
    }

    public function build($name):void
    {
        try{
            $item = $this->storage->getItem($name);
            if(!$item instanceof SpaceshipPart)
                throw new \Exception();
            $message = $item->craft();
            if($this->victory->isSatisfiedBy($this->storage))
                $message .= ' => You won!';
            $this->writer->writeln($message);
        }
        catch(\Exception $exception){$this->writer->writeln('There is no such spaceship module.');}
    }

    public function help($data): void
    {
        $this->writer->writeln('Available commands:');
        foreach($data as $command)
            $this->writer->writeln($command);
    }

    public function exit(): void
    {
        die('Goodbye...');
    }

    public function sheme($name): void
    {
        try{
            $item = $this->storage->getItem($name);
            if(!$item instanceof SpaceshipPart)
                throw new \Exception();
            $message = "$item->getName() => ";
            $components = $item->getSchema()->getComponents();
            $components = array_map(function($item){
                return strtolower($item);
            },array_keys($components));
            $message .= implode('|',$components);
            $this->writer->writeln($message);
        }
        catch(\Exception $exception){$this->writer->writeln('There is no such spaceship module.');}
    }

    public function mine($name): void
    {
        try{
            $item = $this->storage->getItem($name);
            if(!$item instanceof Mineable)
                throw new \Exception();
            $message = $item->mine();
            $this->writer->writeln($message);
        }
        catch(\Exception $exception){$this->writer->writeln('There is no such material.');}
    }

    public function produce($name): void
    {
        try{
            $item = $this->storage->getItem($name);
            if(!$item instanceof CraftableResources)
                throw new \Exception();
            $message = $item->craft();
            $this->writer->writeln($message);
        }
        catch(\Exception $exception){$this->writer->writeln('There is no such material.');}
    }

    public function status(): void
    {
       $this->writer->write(':::STATUS:::');
    }

    public function setWriter(Writer $writer): void
    {
        $this->writer = $writer;
    }
}