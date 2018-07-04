<?php

namespace BinaryStudioAcademy\Game\Commands;



final class HelpCommand extends  AbstractCommand
{

    public function execute(): void
    {
        $this->executor->help();
    }
}