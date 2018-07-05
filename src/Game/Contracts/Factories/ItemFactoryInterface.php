<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 12:35
 */

namespace BinaryStudioAcademy\Game\Contracts\Factories;


use BinaryStudioAcademy\Game\Contracts\Items\ItemInterface;

interface ItemFactoryInterface
{
    public function create(string $type,array $parameters):ItemInterface;
}