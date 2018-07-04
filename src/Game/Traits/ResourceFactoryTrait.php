<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 04.07.2018
 * Time: 12:30
 */

namespace BinaryStudioAcademy\Game\Traits;


use BinaryStudioAcademy\Game\Items\AdvancedResource;
use BinaryStudioAcademy\Game\Items\BasicResource;
use BinaryStudioAcademy\Game\Items\FinalSpaceshipPart;
use BinaryStudioAcademy\Game\Items\SpaceshipPart;

trait ResourceFactoryTrait
{
    public function basic(array $data)
    {
        return new BasicResource($data['name'],$data['quantity']);
    }

    public function advanced(array $data)
    {
        $resource = new AdvancedResource($data['name'],$data['quantity']);
        $resource->setComponentList($data['components']);
        return $resource;
    }

    public function part(array $data)
    {
        $resource = new SpaceshipPart($data['name'],$data['quantity']);
        $resource->setComponentList($data['components']);
        return $resource;
    }

    public function finalPart(array $data)
    {
        $resource = new FinalSpaceshipPart($data['name'],$data['quantity']);
        $resource->setComponentList($data['components']);
        return $resource;
    }
}