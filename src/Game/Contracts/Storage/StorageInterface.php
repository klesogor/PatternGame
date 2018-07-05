<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 12:41
 */

namespace BinaryStudioAcademy\Game\Contracts\Storage;


use BinaryStudioAcademy\Game\Contracts\Items\ItemInterface;

interface StorageInterface
{
    public function hasItem(string $alias): bool;

    public function takeItem(string $alias,int $quantity);

    public function addItem(ItemInterface $item);

    public function getItemsList() : array;
}