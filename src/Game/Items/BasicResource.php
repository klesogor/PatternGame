<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 13:58
 */

namespace BinaryStudioAcademy\Game\Items;


use BinaryStudioAcademy\Game\Contracts\Items\Mineable;

class BasicResource extends AbstractItem implements Mineable
{
    public function getInfo(): string
    {
        return "This is basic resource {$this->name}. You can mine it.";
    }
}