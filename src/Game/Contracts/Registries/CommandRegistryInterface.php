<?php


namespace BinaryStudioAcademy\Game\Contracts\Registries;


use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;

interface CommandRegistryInterface
{
    public function add(CommandInterface $command,string $alias): void;

    public function get(string $alias) : CommandInterface ;

    public function has(string $alias) : CommandInterface ;
}