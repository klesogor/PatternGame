<?php

namespace BinaryStudioAcademy\Game\Contracts\Observers;

interface Observable
{
    public function attach(Observer $observer):void;

    public function deattach(Observer $observer):void;

    public function emmit(Event $event):void;
}