<?php
abstract class Anfibio {
  protected string $codigo;
  protected dateTime $fechaAlta;
  protected float $precio = 0;
  protected string $nombreCientifico;
  protected string $nombreComun;
  protected string $habitat;

  function __construct($fechaAlta, $precio, $nombreCientifico, $nombreComun, $habitat) {
    $this -> codigo = uniqid('ANF-');
 
    $this -> fechaAlta = $fechaAlta;
    $this -> precio = $precio;
    $this -> nombreCientifico = $nombreCientifico;
    $this -> nombreComun = $nombreComun;
    $this -> habitat = $habitat;

  }

  public function getCodigo() {
    return $this->codigo;
  }

  public function getFechaAlta() {
    return $this->fechaAlta;
  }

  public function getPrecio() {
    return $this->precio;
  }

  public function getNombreCientifico() {
    return $this->nombreCientifico;
  }

  public function getNombreComun() {
    return $this->nombreComun;
  }

  public function getHabitat() {
    return $this->habitat;
  }

  //abstract public function getCategoria();


}

class Anuro extends Anfibio {
 protected string $continente;

 function __construct ($fechaAlta, $precio, $nombreCientifico, $nombreComun, $habitat, ?string $continente) {
 parent::__construct($fechaAlta, $precio, $nombreCientifico, $nombreComun, $habitat);
  $this->continente = $continente ? $continente : 'Europa';
 }



}

class Urodelo extends Anfibio {

}

 $rana = new Anuro('Hyla arborea', 'Ranita de San Antonio', 34.6, 2024, 'charcas', 'Africa');

$triton= new Urodelo('Triturus marmoratus', 'Tritón jaspeado', 47, 2023, 'estanque');

echo $rana;



