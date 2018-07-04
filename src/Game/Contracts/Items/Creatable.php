<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 04.07.2018
 * Time: 9:23
 */

namespace BinaryStudioAcademy\Game\Contracts\Items;


interface Creatable
{
    public function getComponentsList():array;

    public function setComponentList(array $components):void;
}