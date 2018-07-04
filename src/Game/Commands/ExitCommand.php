<?php

namespace BinaryStudioAcademy\Game\Commands;



final class ExitCommand extends  AbstractCommand
{

    public function execute(): void
    {
        die('See you later...');
    }
}