<?php
    
namespace BinaryStudioAcademy\Game\Items;

use BinaryStudioAcademy\Game\Contracts\Resources\Item;
use BinaryStudioAcademy\Game\Contracts\Resources\Mineable;
use BinaryStudioAcademy\Game\Events;
use BinaryStudioAcademy\Game\Contracts\Observers\Observable;
use BinaryStudioAcademy\Game\Contracts\Observers\Observer;

abstract class BasicResource implements Item, Mineable, Observable
{
    protected $mineQuantity = 1;
    protected $listeners = [];

    public function mine():void
    {
        
    }

    public function use(number $quantity):void
    {
        if($this->quantity < $quantity)
            throw new \Exception('Not enough raw materials');
        $this->quantity -= $quantity;
    }

    public function attach(Observer $observer):void
    {
        foreach($this->listeners as $listener){
            if($listener === $observer)
                return;
        }
        $this->listeners[] = $observer;
    }

    public function deattach(Observer $observer)
    {
        foreach($this->listeners as $key => $listener){
            if($listener === $observer){
                unset($this->listeners[$key]);
            }
        }
    }   

    public function emmit(Event $event):void
    {
        foreach($this->listeners as $listener)
            $listener->invoke($event);
    }
}