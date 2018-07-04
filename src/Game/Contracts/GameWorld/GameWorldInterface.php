<?php

namespace BinaryStudioAcademy\Game\Contracts\GameWorld;


use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;

interface GameWorldInterface
{
    public function makeTurn(string $command): void;

    public function execute(CommandInterface $command): void;

    public function setWriter(Writer $writer);

}