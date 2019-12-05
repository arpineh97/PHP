<?php
abstract class CarDetails {
    public $name;
    public $color;
    public $engine;
    public $transmission;
    public function __construct($name, $color, $engine, $transmission) {
        $this->name = $name;
        $this->color = $color;
        $this->engine = $engine;
        $this->transmission = $transmission;
    }
    abstract public function info() : string;
}

