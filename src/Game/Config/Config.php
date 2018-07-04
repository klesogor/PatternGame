<?php

namespace BinaryStudioAcademy\Game\Config;
use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;
use BinaryStudioAcademy\Game\Factories\AbstractCommandFactory;
use BinaryStudioAcademy\Game\Factories\AbstractResourceFactory;
use BinaryStudioAcademy\Game\Factories\ConcreteCommandFactory;
use BinaryStudioAcademy\Game\Storage\Storage;

final class Config
{
    public function getStorage(AbstractResourceFactory $factory): StorageInterface
    {
        $storage = new Storage();
        foreach($this->basicResources as $resource)
            $storage->add($factory->create('basic',$resource));
        foreach($this->advancedResources as $resource)
            $storage->add($factory->create('advanced',$resource));
        foreach($this->parts as $resource)
            $storage->add($factory->create('part',$resource));
        foreach($this->finalParts as $resource)
            $storage->add($factory->create('finalPart',$resource));
        return $storage;
    }
    public function getCommandFactory(): AbstractCommandFactory
    {
        $res = [];
        foreach($this->advancedResources as $resource)
            $res[] = $resource['name'];
        return new ConcreteCommandFactory($res);
    }

    private $basicResources = [
        ['name' => 'Carbon','quantity'=>0],
        ['name' => 'Copper','quantity'=>0],
        ['name' => 'Fire','quantity'=>0],
        ['name' => 'Fuel','quantity'=>0],
        ['name' => 'Iron','quantity'=>0],
        ['name' => 'Silicon','quantity'=>0],
        ['name' => 'Sand','quantity'=>0],
        ['name' => 'Water','quantity'=>0],
    ];

    private $advancedResources = [
        ['name' => 'Metal','quantity'=>0, 'components'=> ['Iron'=>1,"Fire"=>1]],
    ];
    private $parts = [
        ['name' => 'IC','quantity'=>0, 'components'=> ['Metal'=>1,"Silicon"=>1]],
        ['name' => 'Wires','quantity'=>0, 'components'=> ['Copper'=>1,"Fire"=>1]],
    ];
    private $finalParts = [
        ['name' => 'Tank','quantity'=>0, 'components'=> ['Metal'=>1,"Fuel"=>1]],
        ['name' => 'Launcher','quantity'=>0, 'components'=> ['Water'=>1,"Fire"=>1,"Fuel"=>1]],
        ['name' => 'Engine','quantity'=>0, 'components'=> ['Metal'=>1,"Fire"=>1,"Carbon"=>1]],
        ['name' => 'Control_unit','quantity'=>0, 'components'=> ['IC'=>1,"Wires"=>1]],
        ['name' => 'Porthole','quantity'=>0, 'components'=> ['Sand'=>1,"Fire"=>1]],
        ['name' => 'Shell','quantity'=>0, 'components'=> ['Fire'=>1,"Metal"=>1]],
    ];

}