<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;
use BinaryStudioAcademy\Game\Contracts\Commands\HandlerInterface;

abstract class AbstractCommand implements CommandInterface
{
    protected $handler;
    protected $data;
    public function __construct(HandlerInterface $handler,$data = null)
    {
        $this->handler = $handler;
        $this->data = $data;
    }

    public function setData($data):void
    {
        $this->data = $data;
    }

    //override in child classes for additional logic
    public function execute(): void
    {
        $this->handler->execute($this->data);
    }
}