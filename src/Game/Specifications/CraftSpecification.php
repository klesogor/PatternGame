<?php
namespace BinaryStudioAcademy\Game\Specifications;

use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;

final class CraftSpecification extends AbstractSpecification
{
    private $components;

    public function __construct(array $components)
    {
        $this->components = $components;
    }

    public function validate(StorageInterface $storage): array
    {
        $failed = [];
        foreach ($this->components as $component=>$amount) {
            $item = $storage->get($component);
            if($item->getQuantity() < $amount)
                $failed[] = strtolower($component);
        }
        $this->valid = empty($failed);
        return $failed;
    }

}