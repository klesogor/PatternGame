<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 14:00
 */

namespace BinaryStudioAcademy\Game\Items;


use BinaryStudioAcademy\Game\Contracts\Items\Producable;

class AdvancedResource extends AbstractItem implements Producable
{
    public function getInfo(): string
    {
        return "This is advanced resource {$this->name}. You can produce it as much as you want.";
    }
}