<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 14:52
 */

namespace BinaryStudioAcademy\Game\Commands;


final class InfoCommand extends AbstractCommand
{

    public function execute(): void
    {
        $this->executor->info($this->data);
    }
}