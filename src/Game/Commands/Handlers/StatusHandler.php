<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 03.07.2018
 * Time: 15:42
 */

namespace BinaryStudioAcademy\Game\Commands\Handlers;


use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Contracts\Specifications\StorageSpecificationInterface;
use BinaryStudioAcademy\Game\Contracts\Storage;

class StatusHandler extends  AbstractHandler
{
    private $part;
    private $resource;

    public function __constructor(Storage $storage, Writer $writer,StorageSpecificationInterface $resourceSpecification
        ,StorageSpecificationInterface $partsSpecification)
    {
        $this->part = $partsSpecification;
        $this->resource = $partsSpecification;
        parent::__constructor($storage, $writer);
    }

    public function execute($data = null): void
    {
        $message = 'You have :';
        $resources = $this->resource->isisSatisfiedBy($this->storage);
        $parts = $this->part->isisSatisfiedBy($this->storage);
        foreach($resources as $resource)
            $message.= " {$resource['name']} - {$resource['quantity']};";
        $message.=' Parts ready:';
        foreach($parts['done'] as $part)
            $message.= " {$part}";
        $message.=' Parts to build';
        foreach($parts['to_do'] as $part)
            $message.= " {$part}";
        $this->writer->writeln($message);
    }
}