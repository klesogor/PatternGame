<?php

namespace BinaryStudioAcademy\Game\Contracts\GameWorld;

use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;
use BinaryStudioAcademy\Game\Contracts\Items\ItemInterface;
use BinaryStudioAcademy\Game\Contracts\Specifications\StorageSpecificationInterface;

interface GameWorldInterface
{
    public function makeTurn(string $command): void;

    public function addItem(ItemInterface $item): void;

    public function addSpecification(StorageSpecificationInterface $specification): void;

    public function addCommand(CommandInterface $command): void;

    public function getItemsNameList(): array;

    public function craft(string $name): void;

    public function produce(string $name): void;

    public function mine(string $name): void;

    public function help(): void;

    public function status(): void;
}