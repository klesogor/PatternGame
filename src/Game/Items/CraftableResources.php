<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 03.07.2018
 * Time: 11:26
 */

namespace BinaryStudioAcademy\Game\Items;


use BinaryStudioAcademy\Game\Contracts\Resources\Craftable;

class CraftableResources extends BasicItem implements Craftable
{
    protected $craftAmount = 1;
    protected $maxAmount = 10;

    public function craft(): void
    {
        if($this->quantity >= $this->maxAmount) {
            throw new \Exception('Max capacity reached!');
        }
       $this->quantity += $this->craftAmount;
    }

    public function getMaxCapacity(): number
    {
        return $this->maxAmount;
    }
}