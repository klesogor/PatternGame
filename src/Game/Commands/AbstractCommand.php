<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 14:48
 */

namespace BinaryStudioAcademy\Game\Commands;


use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;
use BinaryStudioAcademy\Game\Contracts\GameWorld\GameWorldInterface;

abstract class AbstractCommand implements  CommandInterface
{
    protected $data = null;
    private $alias;
    protected $executor = null;
    public function __construct(string $alias)
    {
        $this->alias = $alias;
    }

    public function setData($data): CommandInterface
    {
        $this->data = $data;
        return $this;
    }

    public function setExecutor(GameWorldInterface $executor): CommandInterface
    {
        $this->executor = $executor;
        return $this;
    }

    final public function getAlias(): string
    {
        return $this->alias;
    }
}