<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 04.07.2018
 * Time: 10:59
 */

namespace BinaryStudioAcademy\Game\Factories;


use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;
use BinaryStudioAcademy\Game\Traits\CommandFactoryTrait;

abstract class AbstractCommandFactory
{
    abstract public function create(string $command):CommandInterface;
}