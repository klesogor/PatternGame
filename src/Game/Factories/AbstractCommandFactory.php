<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 04.07.2018
 * Time: 10:59
 */

namespace BinaryStudioAcademy\Game\Factories;


use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;

abstract class AbstractCommandFactory
{
    protected $resourceList;

    public function __construct(array $resources)
    {
        $this->resourceList = $resources;
    }
    public function create(string $command):CommandInterface
    {
        $command = explode(':',$command); //who needs regular expressions?
        if(method_exists($this,$command[0])) {
            $args = count($command)>1 ? array_slice($command,1) : [];
            return call_user_func([$this, $command[0]], $args);
        }
        else if(in_array($command[0],$this->resourceList)) {
            return call_user_func(array($this,'produce'),$command[0]);
        } else{
            throw new \Exception('Unknown command');
        }
    }
}