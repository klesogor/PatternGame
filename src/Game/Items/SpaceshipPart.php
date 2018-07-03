<?php

namespace BinaryStudioAcademy\Game\Items;

class SpaceshipPart extends CraftableResources //could probably have used decorator, but inheritance seems more reasonable
{
    protected $maxAmount = 1;
}