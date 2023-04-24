<?php

abstract class Anfibio {
  protected $codigo;
  protected $anioAltaCatalogo;
  protected $precio;
  protected $nombreCientifico;
  protected $nombreComun;
  protected $habitat;

  public function __construct($codigo, $anioAltaCatalogo, $precio, $nombreCientifico, $nombreComun, $habitat) {
    $this->codigo = $codigo;
    $this->anioAltaCatalogo = $anioAltaCatalogo;
    $this->precio = $precio;
    $this->nombreCientifico = $nombreCientifico;
    $this->nombreComun = $nombreComun;
    $this->habitat = $habitat;
  }

  public function getCodigo() {
    return $this->codigo;
  }

  public function getAnioAltaCatalogo() {
    return $this->anioAltaCatalogo;
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

  // Método abstracto para obtener la categoría del anfibio
  abstract public function getCategoria();
}

class Anuro extends Anfibio {
  protected $continente;

  public function __construct($codigo, $anioAltaCatalogo, $precio, $nombreCientifico, $nombreComun, $habitat, $continente) {
    parent::__construct($codigo, $anioAltaCatalogo, $precio, $nombreCientifico, $nombreComun, $habitat);
    $this->continente = $continente;
  }

  public function getContinente() {
    return $this->continente;
  }

  public function getCategoria() {
    return "Anuro";
  }

  public function getPrecioFinal() {
    $precioFinal = $this->getPrecio();

    switch ($this->continente) {
      case "Europa":
        break;
      case "Africa":
      case "Asia":
        $precioFinal *= 1.15;
        break;
      case "America":
        $precioFinal *= 1.25;
        break;
      default:
        throw new Exception("Continente inválido");
    }

    return $precioFinal;
  }
}

class Urodelo extends Anfibio {
  protected $tipo;

  public function __construct($codigo, $anioAltaCatalogo, $precio, $nombreCientifico, $nombreComun, $habitat, $tipo) {
    parent::__construct($codigo, $anioAltaCatalogo, $precio, $nombreCientifico, $nombreComun, $habitat);
    $this->tipo = $tipo;
  }

  public function getTipo() {
    return $this->tipo;
  }

  public function getCategoria() {
    return "Urodelo";
  }

  public function getPrecioFinal() {
    return $this->getPrecio() * 1.05;
  }
}

?>
