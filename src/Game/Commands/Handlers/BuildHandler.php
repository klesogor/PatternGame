<?php

namespace BinaryStudioAcademy\Game\Commands\Handlers;


use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Contracts\Resources\Craftable;
use BinaryStudioAcademy\Game\Contracts\Specifications\StorageSpecificationInterface;
use BinaryStudioAcademy\Game\Contracts\Storage;

class BuildHandler extends AbstractHandler
{
    private $chekcer;
    public function __constructor(Storage $storage, Writer $writer, StorageSpecificationInterface $checker)
    {
        $this->checker = $checker;
        parent::__constructor($storage, $writer);
    }

    public function execute($data = null): void
    {
        try {
            $creating = $this->storage->getItem($data);
            if(!$creating instanceof Craftable)
                throw new \Exception();
            $message = $creating->craft();
            if(empty($this->chekcer->isSatisfiedBy($this->storage))) {
                $message .= ' => You won!';
            }
            $this->writer->writeln($message);


        } catch(\Exception $exception) {$this->writer->writeln('There is no such spaceship module.');}
    }
}