<?php

namespace BinaryStudioAcademy\Game\Contracts\Items;


interface ItemInterface
{
    public function getName(): string ;

    public function getQuantity(): int ;

    public function use(int $quantity): void;
}