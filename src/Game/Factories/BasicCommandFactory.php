<?php

namespace BinaryStudioAcademy\Game\Factories;


use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;
use BinaryStudioAcademy\Game\Contracts\Factories\CommandFactory;
use BinaryStudioAcademy\Game\Contracts\StorageProxy;


final class BasicCommandFactory implements CommandFactory
{
    private $knownCommands;
    private $resources;
    private $storage;

    public function __construct(array $knownCommands,array $resources,StorageProxy $storage)
    {
        $this->storage = $storage;
        $this->knownCommands = $knownCommands;
        $this->resources = $resources;
    }

    public function make(string $command): CommandInterface
    {
        $command = explode(':',$command);
        if(count($command)===2 && array_key_exists($command[0],$this->knownCommands)) {
            return new $this->knownCommands[$command[0]] ($this->storage,$command[1]);
        } else if(count($command) === 1){
            if($command[0] === 'help')
                return new $this->knownCommands['help']($this->storage,array_keys($this->knownCommands));
            else if ($command[0] === 'status')
                return new $this->knownCommands['status']($this->storage,null);
            else if (array_key_exists($command[0],$this->knownCommands))
                return new $this->knownCommands[$command[0]]($this->storage,null);
            else
                return $this->evalResource($command[0]);
        }
        throw new \Exception("There is no command {$command[0]}");
    }

    private function evalResource($resource)
    {
        $resource = strtolower($resource);
        if(in_array($resource,$this->resources))
            return $this->make('produce',$resource);
        throw new \Exception("There is no command {$resource}");
    }
}