<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 03.07.2018
 * Time: 13:54
 */

namespace BinaryStudioAcademy\Game\Contracts\Factories;


use BinaryStudioAcademy\Game\Contracts\Resources\Item;

interface ResourceFactory
{
    public function make(string $type, array $parameters):Item;
}