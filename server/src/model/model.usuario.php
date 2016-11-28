<?php

class mdlUsuario {
  
  private $id;
  private $usuario;
  private $contrasena;
  
  public function __construct($usuario, $contrasena, $id = null) {
    $this->id = $id;
    $this->usuario = $usuario;
    $this->contrasena = $contrasena;
  }

  public function getId() {
    return $this->id;
  }

  public function getUsuario() {
    return $this->usuario;
  }

  public function getContrasena() {
    return hash('md5', $this->contrasena);
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setUsuario($usuario) {
    $this->usuario = $usuario;
  }

  public function setContrasena($contrasena) {
    $this->contrasena = $contrasena;
  }

}
