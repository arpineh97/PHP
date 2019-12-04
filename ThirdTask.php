<?php
abstract class carDetails {
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

class Lexus extends carDetails {
    public function info() : string {
        return "Car name: $this->name ; Color: $this->color ; Engine power: $this->engine ; Transmission: $this->transmission ";
    }
}

class Mazda extends carDetails {
    public function info() : string {
        return "Car name: $this->name ; Color: $this->color ; Engine power: $this->engine ; Transmission: $this->transmission ";
    }
}

$lexus = new lexus("Lexus", "Black", "3.5 L 2GR-FE V6", "4-speed U140E/F automatic");
echo $lexus->info();
echo "<br>";

$mazda = new mazda("Mazda", "Blue", "2.0 L MZR-CD I4", "6-speed A26MX-R manual");
echo $mazda->info();
echo "<br>";

?>
