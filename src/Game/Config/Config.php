<?php

namespace BinaryStudioAcademy\Game\Config;


class Config
{
    public function getStorage()
    {
        $storage = new \BinaryStudioAcademy\Game\Utility\ItemStorage();
        $factory = new \BinaryStudioAcademy\Game\Factories\BasicResourceFactory($storage);

        foreach ($this->basicResources as $basicResource) {
            $storage->addItem($factory->make('basic', $basicResource));
        }
        foreach ($this->craftableResource as $resource) {
            $storage->addItem($factory->make('produceable', $resource));
        }
        foreach ($this->spaceshipParts as $resource) {
            $storage->addItem($factory->make('part', $resource));
        }
        foreach ($this->finalParts as $resource) {
            $storage->addItem($factory->make('final_part', $resource));
        }
        return $storage;
    }

    public function getCommands()
    {
        return $this->possible_commands;
    }

        private $basicResources = [
            ['name'=>'Water','quantity'=>0],
            ['name'=>'Iron','quantity'=>0],
            ['name'=>'Fuel','quantity'=>0],
            ['name'=>'Carbon','quantity'=>0],
            ['name'=>'Cooper','quantity'=>0],
            ['name'=>'Fire','quantity'=>0],
            ['name'=>'Silicon','quantity'=>0],
            ['name'=>'Sand','quantity'=>0],
        ];

//producable materials
        private $craftableResource = [
            ['name'=>'Metal','quantity'=>0,
                'components' => ['Iron'=>1,'Fire'=>1],
            ],
        ];

//spaceship components
        private $spaceshipParts = [
            ['name'=>'IC','quantity'=>0,
                'components' => ['Metal'=>1,'Silicon'=>1],
            ],
            ['name'=>'Wires','quantity'=>0,
                'components' => ['Cooper'=>1,'Fire'=>1],
            ],
        ];

//parts, that are necessary to build to win the game
        private $finalParts = [
            ['name'=>'Shell','quantity'=>0,
                'components' => ['Metal'=>1,'Fire'=>1],
            ],
            ['name'=>'Porthole','quantity'=>0,
                'components' => ['Sand'=>1,'Fire'=>1],
            ],
            ['name'=>'Control_unit','quantity'=>0,
                'components' => ['IC'=>1,'Wires'=>1],
            ],
            ['name'=>'Engine','quantity'=>0,
                'components' => ['Metal'=>1,'Carbon'=>1,'Fire'=>1],
            ],
            ['name'=>'Launcher','quantity'=>0,
                'components' => ['Water'=>1,'Fire'=>1,'Fuel'=>1],
            ],
            ['name'=>'Tank','quantity'=>0,
                'components' => ['Metal'=>1,'Fuel'=>1],
            ],
        ];

        //commands
        private $possible_commands = [
            'scheme' => \BinaryStudioAcademy\Game\Commands\ShemeCommand::class,
            'help' => \BinaryStudioAcademy\Game\Commands\HelpCommand::class,
            'build' => \BinaryStudioAcademy\Game\Commands\BuildCommand::class,
            'produce' => \BinaryStudioAcademy\Game\Commands\ProduceCommand::class,
            'mine' => \BinaryStudioAcademy\Game\Commands\MineCommand::class,
            'exit' => \BinaryStudioAcademy\Game\Commands\ExitCommand::class,
        ];

}