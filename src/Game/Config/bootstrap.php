<?php
require 'game_resources.php';
$storage = new \BinaryStudioAcademy\Game\Utility\ItemStorage();
$factory = new \BinaryStudioAcademy\Game\Factories\BasicResourceFactory($storage);

foreach($basicResources as $basicResource){
    $storage->addItem($factory->make('basic',$basicResource));
}

foreach($craftableResource as $resource){
    $storage->addItem($factory->make('produceable',$resource));
}

foreach($spaceshipParts as $resource){
    $storage->addItem($factory->make('part',$resource));
}

foreach($finalParts as $resource){
    $storage->addItem($factory->make('final_part',$resource));
}

$commands = [];
