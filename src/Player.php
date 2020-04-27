<?php

namespace App;

class Player
{
    public $name;
    public int $points = 0;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function score()
    {
        $this->points++;
    }
}