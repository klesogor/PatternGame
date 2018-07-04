<?php

namespace BinaryStudioAcademy\Game\Contracts\Commands;


use BinaryStudioAcademy\Game\Contracts\GameWorld\GameWorldInterface;

interface CommandInterface
{
    public function setExecutor(GameWorldInterface $executor): void;

    public function setData(array $data):void;

    public function execute(): void;

    public function getAlias(): string ;

    public function getData(): array;
}