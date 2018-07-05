<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 13:53
 */

namespace BinaryStudioAcademy\Game\Items;


use BinaryStudioAcademy\Game\Contracts\Items\ItemInterface;

abstract class AbstractItem implements ItemInterface
{
    protected $name;
    private $id;
    protected $info;

    public function __construct(string $name,int $id, string $info = null)
    {
        $this->name = $name;
        $this->id = $id;
        $this->info = $info ?? "This is item.";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getInfo(): string
    {
        return $this->info;
    }

    public function getId(): int
    {
        return $this->id;
    }
}