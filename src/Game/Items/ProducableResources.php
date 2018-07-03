<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 03.07.2018
 * Time: 11:26
 */

namespace BinaryStudioAcademy\Game\Items;


use BinaryStudioAcademy\Game\Contracts\Resources\Item;
use BinaryStudioAcademy\Game\Contracts\Resources\Produceable;

class ProducableResources extends BasicItem implements Produceable
{
    protected $quantity = 0;
    protected $produceQuantity = 1;
    protected $name = 'Advanced resource. Implement unique name!';

    public function produce(): void
    {
        $this->quantity += $this->produceQuantity;
    }
}