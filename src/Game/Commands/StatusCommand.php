<?php

namespace BinaryStudioAcademy\Game\Commands;



final class StatusCommand extends  AbstractCommand
{

    public function execute(): void
    {
        $this->executor->status();
    }
}