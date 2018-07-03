<?php
namespace BinaryStudioAcademy\Game\Commands;


class ShemeCommand extends AbstractCommand
{
    public function execute(): void
    {
        $this->handler->sheme($this->data);
    }
}