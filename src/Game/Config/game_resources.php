<?php
//basic minable materials
$basicResources = [
    ['name'=>'Water','quantity'=>0],
    ['name'=>'Iron','quantity'=>0],
    ['name'=>'Fuel','quantity'=>0],
    ['name'=>'Metal','quantity'=>0],
    ['name'=>'Carbon','quantity'=>0],
    ['name'=>'Cooper','quantity'=>0],
    ['name'=>'Fire','quantity'=>0],
    ['name'=>'Silicon','quantity'=>0],
    ['name'=>'Sand','quantity'=>0],

];

//producable materials
$craftableResource = [
    ['name'=>'Metal','quantity'=>0,
        'components' => ['Iron'=>1,'Fire'=>1],
        ],
];

//spaceship components
$spaceshipParts = [
    ['name'=>'IC','quantity'=>0,
        'components' => ['Metal'=>1,'Silicon'=>1],
    ],
    ['name'=>'Wires','quantity'=>0,
        'components' => ['Cooper'=>1,'Fire'=>1],
    ],
];

//parts, that are necessary to build to win the game
$finalParts = [
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