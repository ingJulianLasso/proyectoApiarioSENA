<?php

class database {

  private $instancia = null;

  /**
   * 
   * @param config $config
   * @return PDO
   */
  public function getConexion(config $config) {
    try {
      if ($this->instancia === null) {
        $opciones = array(PDO::ATTR_PERSISTENT => true);
        $this->instancia = new PDO($config->getDsn(), $config->getUser(), $config->getPass(), $opciones);
        $this->instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      return $this->instancia;
    } catch (PDOException $exc) {
      throw new Exception($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
    }
  }

}
