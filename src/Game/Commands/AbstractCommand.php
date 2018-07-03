<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;
use BinaryStudioAcademy\Game\Contracts\Commands\HandlerInterface;

abstract class AbstractCommand implements CommandInterface
{
    protected $handler;
    protected $data;
    public function __construct(HandlerInterface $handler,$data)
    {
        $this->handler = $handler;
        $this->data = $data;
    }

    public function setData($data):void
    {
        $this->data = $data;
    }
}