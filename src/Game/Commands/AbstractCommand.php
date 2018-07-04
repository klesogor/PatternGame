<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 04.07.2018
 * Time: 12:03
 */

namespace BinaryStudioAcademy\Game\Commands;


use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;
use BinaryStudioAcademy\Game\Contracts\GameWorld\GameWorldInterface;

abstract class AbstractCommand implements CommandInterface
{
    protected $name;
    protected $executor;
    protected $data;

    public function setExecutor(GameWorldInterface $executor): void
    {
        $this->executor = $executor;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function getAlias(): string
    {
        return $this->name;
    }
}