<?php

namespace BinaryStudioAcademy\Game\traits;


trait SchemaTrait
{
    protected $components;

    public function getComponentsList():array
    {
        return $this->components;
    }

    public function setComponentList(array $components):void
    {
        if(!empty($components))
            $this->components = $components;
    }
}