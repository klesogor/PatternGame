<?php

namespace BinaryStudioAcademy\Game\Commands;


class ProduceCommand extends  AbstractCommand
{
    public function execute(): void
    {
        $this->handler->produce($this->data);
    }
}