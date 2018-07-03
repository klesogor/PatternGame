<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 03.07.2018
 * Time: 14:48
 */

namespace BinaryStudioAcademy\Game\Contracts\Commands;


interface HandlerInterface
{
    public function execute($data):void;
}