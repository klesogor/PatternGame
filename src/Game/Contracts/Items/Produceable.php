<?php

namespace BinaryStudioAcademy\Game\Contracts\Items;


interface Produceable extends Creatable
{
    public function produce(): string;
}