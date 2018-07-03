<?php

namespace BinaryStudioAcademy\Game\Commands;


class MineCommand extends AbstractCommand
{
    public function execute(): void
    {
       $this->handler->mine($this->data);
    }
}