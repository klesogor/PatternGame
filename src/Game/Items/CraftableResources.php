<?php

namespace BinaryStudioAcademy\Game\Items;


use BinaryStudioAcademy\Game\Contracts\Resources\Craftable;
use BinaryStudioAcademy\Game\CraftingSchemas\CraftingSchema;

class CraftableResources extends BasicItem implements Craftable
{
    protected $craftAmount = 1;
    protected $maxAmount = 10;
    protected $schema;

    public function __construct($name, $quantity,$storage,CraftingSchema $schema)
    {
        parent::__construct($name, $quantity,$storage);
        $this->schema = $schema;
    }

    public function craft(): string
    {
        $failed = $this->schema->isSatisfiedBy($this->storage);
        if($this->maxCapacityReached()) {
            return "Attention! {$this->name} is full!";
        } else if(!empty($failed)) {
            return $this->componentList(array_keys($failed));
        } else {
            foreach($this->schema->getComponents() as $component=>$value){
                $this->storage->getItem($component)->use($value);
            }
            $this->quantity += $this->craftAmount;
            return "{$this->name} added to inventory.";
        }
    }

    protected function componentList(array $failedFields)
    {
        $lowerCase = array_map(function($item){
            return strtolower($item);
        },$failedFields);
        $message = implode(',',$lowerCase);
        return "You need to mine: {$message}.";
    }

    public function getComponentList(): string
    {
        $failed = $this->schema->isSatisfiedBy($this->storage);
        if(!empty($failed))
            return $this->componentList(array_keys($failed));
        else
            return "You can produce {$this->name}";
    }

    public function maxCapacityReached(): bool
    {
        return $this->maxAmount < $this->quantity;
    }

    public function getSchema(): CraftingSchema
    {
        return $this->schema;
    }
}