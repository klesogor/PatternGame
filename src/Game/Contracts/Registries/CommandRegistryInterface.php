<?php


namespace BinaryStudioAcademy\Game\Contracts\Registries;


use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;

interface CommandRegistryInterface
{
    public function add(CommandInterface $command): void;

    public function get(string $alias) : CommandInterface ;

    public function getCommandList() : array;
}