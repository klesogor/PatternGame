<?php

namespace BinaryStudioAcademy\Game\Contracts\Commands;

interface CommandInterface
{
    public function execute():void;

    public function setData($data):void;
}