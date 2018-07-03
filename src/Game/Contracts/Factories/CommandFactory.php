<?php

namespace BinaryStudioAcademy\Game\Contracts\Factories;

use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;

interface CommandFactory
{
    public function make(string $commandName):CommandInterface;
}