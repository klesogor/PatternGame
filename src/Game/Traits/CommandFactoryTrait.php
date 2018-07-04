<?php

namespace BinaryStudioAcademy\Game\Traits;


use BinaryStudioAcademy\Game\Commands\BuildCommand;
use BinaryStudioAcademy\Game\Commands\ExitCommand;
use BinaryStudioAcademy\Game\Commands\HelpCommand;
use BinaryStudioAcademy\Game\Commands\MineCommand;
use BinaryStudioAcademy\Game\Commands\ProduceCommand;
use BinaryStudioAcademy\Game\Commands\ShemeCommand;
use BinaryStudioAcademy\Game\Commands\StatusCommand;
use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;

trait CommandFactoryTrait
{
    protected function scheme(array $name):CommandInterface
    {
        $item = new ShemeCommand();
        $item->setData($name);
        return $item;
    }

    protected function mine(array  $name):CommandInterface
    {
        $item = new MineCommand();
        $item->setData($name);
        return $item;
    }

    protected function produce(array $name):CommandInterface
    {
        $item = new ProduceCommand();
        $item->setData($name);
        return $item;
    }

    protected function build(array $name):CommandInterface
    {
        $item = new BuildCommand();
        $item->setData($name);
        return $item;
    }

    protected function status(array $name):CommandInterface
    {
        $item = new StatusCommand();
        $item->setData($name);
        return $item;
    }

    protected function help(array $data):CommandInterface
    {
        $item = new HelpCommand();
        $ref = new \ReflectionClass($this);
        $methods = $ref->getMethods(\ReflectionMethod::IS_PROTECTED);
        $commands = array_map(function($item){
            return $item->name;
        },$methods);
        $item->setData($commands);
        return $item;
    }

    protected function exit(array $name):CommandInterface
    {
        $item = new ExitCommand();
        $item->setData($name);
        return $item;
    }
}