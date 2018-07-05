<?php

namespace BinaryStudioAcademy\Game\Contracts\Commands;

use BinaryStudioAcademy\Game\Contracts\GameWorld\GameWorldInterface;

interface CommandInterface
{
    public function execute():void;

    public function setData($data):CommandInterface;

    public function setExecutor(GameWorldInterface $execotur):CommandInterface;

    public function getAlias():string ;
}