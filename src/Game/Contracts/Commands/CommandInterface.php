<?php

namespace BinaryStudioAcademy\Game\Contracts\Commands;

interface CommandInterface
{
    public function execute():void;

    public function setData($data):CommandInterface;

    public function setExecutor($executor):CommandInterface;

    public function getAlias():string ;
}