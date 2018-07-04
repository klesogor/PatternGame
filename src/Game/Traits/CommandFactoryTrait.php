<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 04.07.2018
 * Time: 11:13
 */

namespace BinaryStudioAcademy\Game\traits;


use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;

trait CommandFactoryTrait
{
    protected function scheme(array $name):CommandInterface{}

    protected function produce(array $name):CommandInterface{}

    protected function build(array $name):CommandInterface{}

    protected function status(array $name):CommandInterface{}

    protected function help(array $name):CommandInterface{}

    protected function exit(array $name):CommandInterface{}
}