<?php

namespace BinaryStudioAcademy\Game\Contracts;

//This is kinda proxe, but not really. It uses same idea though.
use BinaryStudioAcademy\Game\Contracts\Io\Writer;

interface StorageProxy
{
    public function build($name):void;

    public function help($data):void;

    public function exit():void;

    public function sheme($name):void;

    public function mine($name):void;

    public function produce($name):void;

    public function status():void;

    public function setWriter(Writer $writer):void;
}