<?php
require 'game_resources.php';
$container = new \Pimple\Container();
$storage = new \BinaryStudioAcademy\Game\Utility\ItemStorage();

foreach($basicResources as $basicResource){
    $storage->addItem(new \BinaryStudioAcademy\Game\Items\BasicResource($basicResource['name'],$basicResource['quantity']));
}

foreach($craftableResource as $resource){
    $storage->addItem(new \BinaryStudioAcademy\Game\Items\CraftableResources(
        $resource['name'],
        $resource['quantity'],
        new \BinaryStudioAcademy\CraftingSchemas\CraftingSchema($resource['components'])
    ));
}

foreach($spaceshipParts as $resource){
    $storage->addItem(new \BinaryStudioAcademy\Game\Items\SpaceshipPart(
        $resource['name'],
        $resource['quantity'],
        new \BinaryStudioAcademy\CraftingSchemas\CraftingSchema($resource['components'])
    ));
}

foreach($finalParts as $resource){
    $storage->addItem(new \BinaryStudioAcademy\Game\Items\FinalSpaceshipPart(
        $resource['name'],
        $resource['quantity'],
        new \BinaryStudioAcademy\CraftingSchemas\CraftingSchema($resource['components'])
    ));
}