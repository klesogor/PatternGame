<?php


namespace BinaryStudioAcademy\Game\Commands;


class HelpCommand extends  AbstractCommand
{
   public function execute(): void
   {
       $this->handler->help($data);
   }
}