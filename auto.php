<?php

class Automovil {
  var $marca;
  var $color;
  var $puertas;
  var $combustible;

  function __construct($marca, $color, $puertas, $combustible) {
    $this->marca = $marca;
    $this->color = $color;
    $this->puertas = $puertas;
    $this->combustible = $combustible;
  }

  function descriptionAuto(){
    return $this->marca .' de color '. $this->color . ' con '. $this->puertas . ' que usa '. $this->combustible;
  }

}

$auto1 = new Automovil('Toyota', 'Rojo', '2', 'Diesel');

echo "Tengo un {$auto1->descriptionAuto()}";

?>
