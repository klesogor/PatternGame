<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 04.07.2018
 * Time: 10:18
 */

namespace BinaryStudioAcademy\Game\Items;


use BinaryStudioAcademy\Game\Contracts\Items\Produceable;
use BinaryStudioAcademy\Game\Traits\SchemaTrait;

final class AdvancedResource extends Item implements Produceable
{
    use SchemaTrait;

    public function produce(): string
    {
       $this->quantity += 1;
       return "{$this->getName()} added to inventory.";
    }
}
