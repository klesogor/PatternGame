<?php


namespace BinaryStudioAcademy\Game\Registries;


use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;
use BinaryStudioAcademy\Game\Contracts\Registries\CommandRegistryInterface;
use BinaryStudioAcademy\Game\Exceptions\UnknownCommandException;

class CommandRegistry implements CommandRegistryInterface
{
    private $commands = [];

    public function add(CommandInterface $command): void
    {
        $this->commands[strtolower($command->getAlias())] = $command;
    }

    public function get(string $alias) : CommandInterface
    {
        if(!array_key_exists(strtolower($alias),$this->commands)){
            throw new UnknownCommandException("Unknown command {$alias}");
        }
        return clone $this->commands[strtolower($alias)];
    }


    public function getCommandList(): array
    {
        return array_keys($this->commands);
    }
}