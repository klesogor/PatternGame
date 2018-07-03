<?php

namespace BinaryStudioAcademy\Game\Commands\Handlers;


use BinaryStudioAcademy\Game\Contracts\Resources\Craftable;

class SchemeHandler extends AbstractHandler
{
    public function execute($data = null): void
    {
        try{
            $item = $this->storage->getItem($data);
            if(!$item instanceof Craftable)
                throw new \Exception();
            $message = "{$item->getName()} => ";
            $components = array_map(function($item){
                return strtolower($item);
            },array_keys($item->getSchema()->getComponents()));
            $message.= implode('|',$components);
            $this->writer->writeln($message);

        }catch( \Exception $exception){$this->writer->writeln('There is no such spaceship module.');}
    }
}