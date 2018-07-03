<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 03.07.2018
 * Time: 15:56
 */

namespace BinaryStudioAcademy\Game\Commands\Handlers;


use BinaryStudioAcademy\Game\Contracts\Resources\Mineable;

class MineHandler extends AbstractHandler
{
    public function execute($data = null): void
    {
        try {
            $item = $this->storage->getItem($data);
            if(!$item instanceof Mineable)
                throw new \Exception();
            $this->writer->writeln($item->mine());
        }catch (\Exception $exception){$this->writer->writeln('There is no such resource.');}
    }
}