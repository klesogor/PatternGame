<?php

namespace BinaryStudioAcademy\Game\Contracts\Commands;


interface CommandInterface
{
    public function setExecutor(): void;

    public function execute(): void;

    public function getAlias(): string ;
}