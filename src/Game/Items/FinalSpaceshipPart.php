<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 14:03
 */

namespace BinaryStudioAcademy\Game\Items;


use BinaryStudioAcademy\Game\Contracts\Items\Craftable;

class FinalSpaceshipPart extends AbstractItem implements Craftable
{
    public function getInfo(): string
    {
        return "This is spaceship part {$this->name}. You can build only one copy of it.You need to build all parts to win the game";
    }
}