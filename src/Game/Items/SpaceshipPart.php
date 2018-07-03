<?php

namespace BinaryStudioAcademy\Game\Items;

class SpaceshipPart extends CraftableResources //could probably have used decorator, but inheritance seems more reasonable
{
    protected $maxAmount = 1;

    public function craft(): string
    {
        $failed = $this->schema->isSatisfiedBy($this->storage);
        if($this->maxCapacityReached()) {
            return "Attention! {$this->name} is ready!";
        } else if(!empty($failed)) {
            return $this->componentList(array_keys($failed));
        } else {
            foreach($this->schema->getComponents() as $component=>$value){
                $this->storage->getItem($component)->use($value);
            }
            $this->quantity += $this->craftAmount;
            return "{$this->name} is ready!";
        }
    }

    protected function componentList(array $failedFields)
    {
        $lowerCase = array_map(function($item){
            return strtolower($item);
        },$failedFields);
        $message = implode(',',$lowerCase);
        return "Inventory should have: {$message}.";
    }
}