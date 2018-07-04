<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 04.07.2018
 * Time: 9:22
 */

namespace BinaryStudioAcademy\Game\Contracts\Items;


interface Craftable extends Creatable
{
    public function craft(): string;
}