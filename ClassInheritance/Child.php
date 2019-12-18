<?php
require_once "Parent.php";

class Lexus extends CarDetails {
    public function info() : string {
        return "Car name: $this->name ; Color: $this->color ; Engine power: $this->engine ; Transmission: $this->transmission ";
    }
}

class Mazda extends CarDetails {
    public function info() : string {
        return "Car name: $this->name ; Color: $this->color ; Engine power: $this->engine ; Transmission: $this->transmission ";
    }
}