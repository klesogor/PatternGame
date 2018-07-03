<?php

namespace BinaryStudioAcademy\Game\Items;


use BinaryStudioAcademy\CraftingSchemas\CraftingSchema;
use BinaryStudioAcademy\Game\Contracts\Resources\Craftable;
use BinaryStudioAcademy\Game\Contracts\Storage;

class CraftableResources extends BasicItem implements Craftable
{
    protected $craftAmount = 1;
    protected $maxAmount = 10;
    protected $schema;

    public function __construct($name, $quantity,CraftingSchema $schema)
    {
        parent::__construct($name, $quantity);
        $this->schema = $schema;
    }

    public function craft(Storage $storage): string
    {
        $failed = $this->schema->isSatisfiedBy($storage);
        if($this->maxCapacityReached()) {
            return "Attention! {$this->name} is ready!";
        } else if(!empty($failed)) {
            return $this->fieldsFailRender(array_keys($failed));
        } else {
            foreach($this->schema->getComponents() as $component=>$value){
                $storage->getItem($component)->use($value);
            }
            $this->quantity += $this->craftAmount;
        }
    }

    protected function fieldsFailRender(array $failedFields)
    {
        $lowerCase = array_map(function($item){
            return strtolower($item);
        },$failedFields);
        $message = implode(',',$lowerCase);
        return "You need to mine: {$message}.";
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