<?php

namespace BinaryStudioAcademy\Game\Factories;
use BinaryStudioAcademy\Game\Contracts\Factories\ItemFactoryInterface;
use BinaryStudioAcademy\Game\Contracts\Items\ItemInterface;
use BinaryStudioAcademy\Game\Items\AdvancedResource;
use BinaryStudioAcademy\Game\Items\BasicResource;
use BinaryStudioAcademy\Game\Items\FinalSpaceshipPart;
use BinaryStudioAcademy\Game\Items\SpaceshipPart;

class ItemFactory implements  ItemFactoryInterface
{
    private $id = 0;
    public function create(string $type, array $parameters): ItemInterface
    {
        if(method_exists($this,$type))
            return call_user_func([$this,$type],$parameters);
        throw new \Exception('Unknown item type');
    }

    private function basic(array  $parameters): ItemInterface
    {
        return new BasicResource($parameters['name'],$this->id++);
    }

    private function advanced(array  $parameters): ItemInterface
    {
        return new AdvancedResource($parameters['name'],$this->id++);
    }

    private function part(array  $parameters): ItemInterface
    {
        return new SpaceshipPart($parameters['name'],$this->id++);
    }

    private function finalPart(array  $parameters): ItemInterface
    {
        return new FinalSpaceshipPart($parameters['name'],$this->id++);
    }
}