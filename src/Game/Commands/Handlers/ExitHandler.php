<?php

namespace BinaryStudioAcademy\Game\Commands\Handlers;


class ExitHandler extends AbstractHandler
{
    public function execute($data = null):void
    {
        die('See you later...');
    }
}