<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 03.07.2018
 * Time: 15:09
 */

namespace BinaryStudioAcademy\Game\Commands;


class ExitCommand extends AbstractCommand
{
    public function execute(): void
    {
        $this->handler->exit();
    }
}