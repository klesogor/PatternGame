<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;
use BinaryStudioAcademy\Game\Contracts\StorageProxy;

abstract class AbstractCommand implements CommandInterface
{
    protected $handler;
    protected $data;
    public function __construct(StorageProxy $proxy,$data = null)
    {
        $this->handler = $proxy;
        $this->data = $data;
    }

    public function setData($data):void
    {
        $this->data = $data;
    }

}