<?php
    
namespace BinaryStudioAcademy\Game\Items;

use BinaryStudioAcademy\Game\Contracts\Resources\Item;
use BinaryStudioAcademy\Game\Contracts\Resources\Mineable;


abstract class BasicResourc extends BasicItem implements Mineable
{
    protected $mineQuantity = 1;

    public function mine():void
    {
        $this->quantity += $this->mineQuantity;
    }


}