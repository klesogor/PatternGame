<?php

namespace BinaryStudioAcademy\Game;


use BinaryStudioAcademy\Game\Commands\BuildCommand;
use BinaryStudioAcademy\Game\Commands\HelpCommand;
use BinaryStudioAcademy\Game\Commands\MineCommand;
use BinaryStudioAcademy\Game\Commands\ProduceCommand;
use BinaryStudioAcademy\Game\Commands\ShemeCommand;
use BinaryStudioAcademy\Game\Commands\StatusCommand;
use BinaryStudioAcademy\Game\Contracts\Commands\CommandInterface;
use BinaryStudioAcademy\Game\Contracts\GameWorld\GameWorldInterface;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Contracts\Items\Craftable;
use BinaryStudioAcademy\Game\Contracts\Items\Mineable;
use BinaryStudioAcademy\Game\Contracts\Items\MineableInterface;
use BinaryStudioAcademy\Game\Contracts\Items\Produceable;
use BinaryStudioAcademy\Game\Contracts\Storage\StorageInterface;
use BinaryStudioAcademy\Game\Factories\AbstractCommandFactory;
use BinaryStudioAcademy\Game\Factories\AbstractSchemeFactory;
use BinaryStudioAcademy\Game\Items\FinalSpaceshipPart;
use BinaryStudioAcademy\Game\Specifications\VictorySpecification;

final class GameWorld implements GameWorldInterface
{
    private $commandFactory;
    private $storage;
    private $schemeFactory;
    private $specification;
    private $writer;

    public function __construct(AbstractCommandFactory $command,StorageInterface $storage,
                                AbstractSchemeFactory $schemes,VictorySpecification $specification)
    {
        $this->commandFactory = $command;
        $this->storage = $storage;
        $this->schemeFactory = $schemes;
        $this->specification = $specification;
    }

    public function makeTurn(string $command): void
    {
        try {
            $command = $this->commandFactory->create($command);
            $command->setExecutor($this);
            $command->execute();
        }catch(\Exception $exception){
            $this->writer->writeln($exception->getMessage());
        }
    }

    public function setWriter(Writer $writer)
    {
        $this->writer = $writer;
    }

    public function execute(CommandInterface $command): void
    {
        if($command instanceof HelpCommand)
            $this->help($command->getData());
        else if($command instanceof ShemeCommand)
            $this->sheme($command->getData());
        else if($command instanceof BuildCommand)
            $this->build($command->getData());
        else if($command instanceof ProduceCommand)
            $this->produce($command->getData());
        else if($command instanceof MineCommand)
            $this->mine($command->getData());
        else if($command instanceof StatusCommand)
            $this->status($command->getData());
    }

    private function help(array $params)
    {
        $this->writer->writeln('Availeable commands:');
        foreach($params as $param)
            $this->writer->writeln($param);
    }

    private function sheme(array $data)
    {
        $fail_message = 'There is no such spaceship module.';
        try {
            $item = $this->storage->get($data[0]);
        }catch (\Exception $exception){
            $this->writer->writeln($fail_message);
            return;
        }
        if(!$item instanceof Craftable)
        {
            $this->writer->writeln($fail_message);
            return;
        }
        $message = "{$item->getName()} => ";
        $components = array_keys($item->getComponentsList());
        $components = array_map(function($component){
            return strtolower($component);
        },$components);
        $message.= implode('|', $components);
        $this->writer->writeln($message);
    }

    private function produce(array $data)
    {
        $fail_message = 'There is no such resource';
        try {
            $item = $this->storage->get($data[0]);
        }catch (\Exception $exception){
            $this->writer->writeln($fail_message);
            return;
        }
        if(!$item instanceof Produceable)
        {
            $this->writer->writeln($fail_message);
            return;
        }
        $validator = $this->schemeFactory->create($item->getComponentsList());
        $failed = $validator->validate($this->storage);
        if($validator->isValid()){
            $this->writer->writeln($item->produce());
            foreach ( $item->getComponentsList() as $key=>$value)
                $this->storage->get($key)->use($value);
        }
        else{
            $this->writer->writeln('You need to mine: '.$this->resources($failed));
        }
    }

    private function build(array $data)
    {
        $fail_message = 'There is no such spaceship module.';
        try {
            $item = $this->storage->get($data[0]);
        }catch (\Exception $exception){
            $this->writer->writeln($fail_message);
            return;
        }
        if(!$item instanceof Craftable)
        {
            $this->writer->writeln($fail_message);
            return;
        }
        $validator = $this->schemeFactory->create($item->getComponentsList());
        $failed = $validator->validate($this->storage);
        if($item->getQuantity()>0) {
            $this->writer->writeln("Attention! {$item->getName()} is ready!");
        } else if($validator->isValid()) {
            foreach ( $item->getComponentsList() as $key=>$value)
                $this->storage->get($key)->use($value);
            $message = $item->craft();
            if(empty($this->specification->validate($this->storage)))
                $message.= ' => You win!';
            $this->writer->writeln($message);
        }
        else{
            $this->writer->writeln('Inventory should have: '.$this->resources($failed));
        }

    }

    private function mine(array $data)
    {
        $fail_message = 'There is no such resource';
        try {
            $item = $this->storage->get($data[0]);
        }catch (\Exception $exception){
            $this->writer->writeln($fail_message);
            return;
        }
        if(!$item instanceof MineableInterface)
        {
            $this->writer->writeln($fail_message);
            return;
        }
        $this->writer->writeln($item->mine());
    }

    private function status(array $data)
    {
        $have = [];
        $ready = [];
        $needed = [];
        foreach($this->storage->getItems() as $item){
            if($item instanceof FinalSpaceshipPart&& $item->getQuantity()>0)
                $ready[] = $item->getName();
            else if ($item instanceof FinalSpaceshipPart&& $item->getQuantity()===0)
                $needed[] = $item-> getName();
            else if($item->getQuantity()>0)
                $have[] = "{$item->getName()} - {$item->getQuantity()}";
        }
        $message = "You have: ";
        $message.= implode(', ',$have);
        $message.= ". Spaceship parts ready: ";
        $message.= implode(', ',$ready);
        $message.= '. Spaceship parts to be built: ';
        $message.= implode(', ',$needed);
        $this->writer->writeln($message);
    }

    private function resources(array $resources)
    {
        $ready = array_map(function($item){
            return strtolower($item);
        },$resources);
        return implode(',',$ready);
    }
}