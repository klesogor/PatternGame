<?php

namespace BinaryStudioAcademy\Game\Contracts\Observers;

interface Observer
{
    public function invoke(Event $event):void;
}