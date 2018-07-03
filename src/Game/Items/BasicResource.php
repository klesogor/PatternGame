<?php
    
namespace BinaryStudioAcademy\Game\Items;

use BinaryStudioAcademy\Game\Contracts\Resources\Mineable;

class BasicResource extends BasicItem implements Mineable
{
    protected $mineQuantity = 1;

    public function mine():string
    {
        $this->quantity += $this->mineQuantity;
        return "Added {$this->getName()} to inventory.";
    }
}