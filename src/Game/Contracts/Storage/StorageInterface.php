<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 04.07.2018
 * Time: 11:20
 */

namespace BinaryStudioAcademy\Game\Contracts\Storage;


use BinaryStudioAcademy\Game\Contracts\Items\ItemInterface;

interface StorageInterface
{
    public function add(ItemInterface $item):void;

    public function remove(string $item): void;

    public function get(string  $item): ItemInterface;

    public function has(string  $item): bool;

    public function getItems():array ;
}