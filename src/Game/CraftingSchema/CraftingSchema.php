<?php

namespace BinaryStudioAcademy\Game\CraftingSchema;

use BinaryStudioAcademy\Game\Contracts\CraftingSchemas\CraftingSchemaInterface;
use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;

class CraftingSchema implements CraftingSchemaInterface
{
    private $missing = null;

    private $state = null; // State pattern for poor

    private $alias = null;

    private $components = null;

    function __construct(array $components,string $alias)
    {
        $this->alias = $alias;
        $this->components = $components;
    }

    public function canCraft(StorageInterface $storage): bool
    {
        $failed = [];
        foreach($this->components as $alias => $quantity){
            if($storage->itemQuantity($alias) < $quantity)
                $failed[] = $alias;
        }
        $this->missing = $failed;
        $this->state = 'validated';
        return empty($failed);
    }

    public function missingResources(): array
    {
        if($this->state !== 'validated')
            throw new \RuntimeException('You should validate storage first!');
        return $this->missing;
    }

    public function getAlias(): string
    {
        return $this->alias;
    }

    public function getSchema(): string
    {
        $keys = array_map(function($item){return strtolower($item);},array_keys($this->components));
        $components = implode('|',$keys);
        return "{$this->alias} => {$components}";
    }

    public function getComponents(): array
    {
        return $this->components;
    }
}