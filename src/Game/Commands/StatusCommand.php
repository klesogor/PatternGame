<?php

namespace BinaryStudioAcademy\Game\Commands;


class StatusCommand extends AbstractCommand
{
    public function execute(): void
    {
        $this->handler->status();
    }
}