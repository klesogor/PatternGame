<?php
namespace BinaryStudioAcademy\Game\Commands\Handlers;

use BinaryStudioAcademy\Game\Contracts\Commands\HandlerInterface;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Contracts\Storage;

abstract class AbstractHandler implements HandlerInterface
{
    protected $writer;
    protected $storage;
    public function __constructor(Storage $storage,Writer $writer)
    {
        $this->storage = $storage;
        $this->writer = $writer;
    }
}