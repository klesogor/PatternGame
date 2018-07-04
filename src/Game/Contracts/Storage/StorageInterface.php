<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 04.07.2018
 * Time: 11:20
 */

namespace BinaryStudioAcademy\Game\Contracts\Storage;


use BinaryStudioAcademy\Game\Items\Item;

interface StorageInterface
{
    public function add(Item $item):void;

    public function remove(string $item): void;

    public function get(string  $item): Item;

    public function has(string  $item): bool;
}