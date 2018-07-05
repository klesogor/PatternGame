<?php

namespace  BinaryStudioAcademy\Game\Contracts\Factories;

interface CraftSchemeFactory
{
    public function create(string $alias,array $components);
}