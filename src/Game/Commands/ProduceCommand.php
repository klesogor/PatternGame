<?php

namespace BinaryStudioAcademy\Game\Commands;



final class ProduceCommand extends  AbstractCommand
{

    public function execute(): void
    {
        $this->executor->produce($this->data[0]);
    }
}