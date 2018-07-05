<?php
/**
 * Created by PhpStorm.
 * User: Anatolich
 * Date: 05.07.2018
 * Time: 12:03
 */

namespace BinaryStudioAcademy\Game\Contracts\Items;


interface ItemInterface
{
    public function getName():string;

    public function getInfo():string;

    //this potentially can be used to save game in DB or serialize it
    public function getId(): int;
}