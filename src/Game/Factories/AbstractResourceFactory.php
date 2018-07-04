<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 04.07.2018
 * Time: 12:16
 */

namespace BinaryStudioAcademy\Game\Factories;


use BinaryStudioAcademy\Game\Contracts\Items\ItemInterface;

abstract class AbstractResourceFactory
{
    public function create(string $type,array $data): ItemInterface
    {
        if(method_exists($this,$type))
            return call_user_func(array($this,$type),$data);
        throw new \Exception('Unknown type');
    }
}