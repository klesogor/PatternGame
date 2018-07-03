<?php

namespace BinaryStudioAcademy\Game\Factories;


use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;
use BinaryStudioAcademy\Game\Contracts\Factories\CommandFactory;


final class BasicCommandFactory implements CommandFactory
{
    private $knownCommands;
    private $resources;

    public function __construct(array $knownCommands,array $resources)
    {
        $this->knownCommands = $knownCommands;
        $this->resources = $resources;
    }

    public function make(string $type,$data): CommandInterface
    {
        if(!arrayHasKey($type,$this->knownCommands))
        {
            return $this->evalResource($type);
        }
        return new ($this->knownCommands[$type]['command']($this->knownCommands[$type]['handler'],$data));
    }

    private function evalResource($resource)
    {
        if(in_array($resource,$this->resources))
            return $this->make('produce',$resource);
        throw new \Exception('Unknown command!');
    }
}