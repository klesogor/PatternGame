<?php

namespace BinaryStudioAcademy\Game\Commands;


class BuildCommand extends  AbstractCommand
{
    public function execute(): void
    {
        $this->handler->build($this->data);
    }
}