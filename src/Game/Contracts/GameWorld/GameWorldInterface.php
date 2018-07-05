<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 12:44
 */

namespace BinaryStudioAcademy\Game\Contracts\GameWorld;


use BinaryStudioAcademy\Game\Contracts\Io\Writer;

interface GameWorldInterface
{
    public function build(string $alias):void;

    public function produce(string $alias):void;

    public function scheme(string $alias):void;

    public function mine(string  $alias):void;

    public function status():void;

    public function help():void;

    public function info(string $alias):void;

    public function process(string $command):void;

    public function setWriter(Writer $writer):void;

    public function setMode(string $mode):void;
}