<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 14:02
 */

namespace BinaryStudioAcademy\Game\Items;


use BinaryStudioAcademy\Game\Contracts\Items\Craftable;

class SpaceshipPart extends AbstractItem implements Craftable
{
    public function getInfo(): string
    {
        return "This is spaceship part {$this->name}. You can build only one copy of it.";
    }
}