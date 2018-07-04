<?php

namespace BinaryStudioAcademy\Game\Commands;



final class ShemeCommand extends  AbstractCommand
{

    public function execute(): void
    {
        $this->executor->sheme($this->data[0]);
    }
}