<?php

define ("CONTINENTES", [
  "eu" => "Europa",
  "af" => "Africa",
  "as" => "Asia",
  "am" => "America"
]);  

abstract class Anfibio {
  protected string $codigo;
  protected int $fechaAlta;
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

  function setPrecio (float $precio): void {
    $this->precio = $precio;
  }

  public function getCodigo() {
    return $this->codigo;
  }

  public function getFechaAlta() {
    return $this->fechaAlta;
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

 public function getPrecio() {
  switch($this->continente) {
    case CONTINENTES ['eu']:
        return $this->precio;
      break;
    case CONTINENTES ['af']:
    case CONTINENTES ['as']:
        return $this->precio * 1.15;
      break;
    case  CONTINENTES['am']:
        return $this->precio * 1.25;
      break;
  }
  return $this->precio;
}

function __toString(): string {
   return parent::__toString().'-'.$this->continente.'-'.$this->getPrecio();
}

  
}





class Urodelo extends Anfibio {
  protected string $tipo;

  function setTipo (string $tipo = 'anfibio') {
    $this-> tipo = $tipo;
  }
  function getPrecio() {
    return $this->precio * 1.05;
  }

  function __toString(): string {
    return parent::__toString().'-'.$this->tipo.'-'.$this->getPrecio();
 }

}

 $rana = new Anuro ('Hyla arborea', 'Ranita de San Antonio', 34.6, 2024, 'charcas', 'Africa');

$triton= new Urodelo ('Triturus marmoratus', 'Tritón jaspeado', 47, 2023, 'estanque');

echo $rana;



