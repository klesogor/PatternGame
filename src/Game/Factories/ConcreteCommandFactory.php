<?php

namespace BinaryStudioAcademy\Game\Factories;


use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;
use BinaryStudioAcademy\Game\Traits\CommandFactoryTrait;

class ConcreteCommandFactory extends AbstractCommandFactory
{
    protected $resourceList;
    use CommandFactoryTrait;
    public function __construct(array $resources)
    {
        $resources = array_map(function($item){
            return strtolower($item);},$resources);
        $this->resourceList = $resources;
    }
    public function create(string $command):CommandInterface
    {
        $command = explode(':',strtolower($command)); //who needs regular expressions?
        if(method_exists($this,$command[0])) {
            $args = count($command)>1 ? array_slice($command,1) : [];
            return call_user_func([$this, $command[0]], $args);
        }
        else if(in_array($command[0],$this->resourceList)) {
            return call_user_func(array($this,'produce'),$command);
        } else{
            throw new \Exception('Unknown command: '.$command[0]);
        }
    }
}