<?php

namespace BinaryStudioAcademy\Game\Commands;



final class BuildCommand extends  AbstractCommand
{

    public function execute(): void
    {
        $this->executor->build($this->data[0]);
    }
}