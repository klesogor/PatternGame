<?php

namespace BinaryStudioAcademy\Game\Factories;


use BinaryStudioAcademy\CraftingSchemas\CraftingSchema;
use BinaryStudioAcademy\Game\Contracts\Factories\ResourceFactory;
use BinaryStudioAcademy\Game\Contracts\Resources\Item;
use BinaryStudioAcademy\Game\Contracts\Storage;
use BinaryStudioAcademy\Game\Items\BasicResource;
use BinaryStudioAcademy\Game\Items\CraftableResources;
use BinaryStudioAcademy\Game\Items\FinalSpaceshipPart;
use BinaryStudioAcademy\Game\Items\SpaceshipPart;

final class BasicResourceFactory implements ResourceFactory
{
    private $storage;
    private $types = ['basic','produceable','part','final_part'];
    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }

    public function make(string $type, array $parameters): Item
    {
        if(!in_array($type,$this->types))
            throw new \Exception('incorrect type');
        return call_user_func_array(array($this,$type),$parameters);
    }

    public function basic(array $params)
    {
        return new BasicResource($params['name'],$params['quantity'],$this->storage);
    }

    public function produceable(array $params)
    {
        return new CraftableResources($params['name'],$params['quantity'],$this->storage,new CraftingSchema($params['components']));
    }

    public function part(array $params)
    {
        return new SpaceshipPart($params['name'],$params['quantity'],$this->storage,new CraftingSchema($params['components']));
    }

    public function final_part(array $params)
    {
        return new FinalSpaceshipPart($params['name'],$params['quantity'],$this->storage,new CraftingSchema($params['components']));
    }
}