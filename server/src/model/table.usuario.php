<?php

/**
 * Description of table
 *
 * @author jalf
 */
class usuario extends mdlUsuario implements table {
  /**
   *
   * @var PDO
   */
  private $conn;
  
  public function __construct(PDO $conn, $usuario, $contrasena, $id = null) {
    $this->conn = $conn;
    parent::__construct($usuario, $contrasena, $id);
  }

  public function delete($id) {
    try {
      $sql = 'DELETE FROM usuario WHERE id = :id';
      $params = array(
          ':id' => $id
      );
      $stmt = $this->conn->prepare($sql);
      $stmt->execute($params);
      return true;
    } catch (PDOException $exc) {
      throw new Exception($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
    }
  }

  public function findById($id) {
    try {
      $sql = 'SELECT id, usuario, contrasena FROM usuario WHERE id = :id';
      $params = array(
          ':id' => $id
      );
      $stmt = $this->conn->prepare($sql);
      $stmt->execute($params);
      $cnt = $stmt->rowCount();
      if ($cnt > 0) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
      } else {
        return false;
      }
    } catch (PDOException $exc) {
      throw new Exception($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
    }
  }

  public function getAll() {
    try {
      $sql = 'SELECT id, usuario, contrasena FROM usuario';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $cnt = $stmt->rowCount();
      if ($cnt > 0) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      } else {
        return false;
      }
    } catch (PDOException $exc) {
      throw new Exception($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
    }
  }

  public function insert() {
    try {
      $sql = 'INSERT INTO usuario (usuario, contrasena) VALUES (:user, :pass)';
      $params = array(
          ':user' => $this->getUsuario(),
          ':pass' => $this->getContrasena()
      );
      $stmt = $this->conn->prepare($sql);
      $stmt->execute($params);
      return true;
    } catch (PDOException $exc) {
      throw new Exception($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
    }
  }

  public function update($id) {
    try {
      $sql = 'UPDATE usuario SET usuario = :user, contrasena = :pass WHERE id = :id';
      $params = array(
          ':id' => $id,
          ':user' => $this->getUsuario(),
          ':pass' => $this->getContrasena()
      );
      $stmt = $this->conn->prepare($sql);
      $stmt->execute($params);
      return true;
    } catch (PDOException $exc) {
      throw new Exception($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
    }
  }
  
  /**
   * Verifica la existencia de un usuario y contraseña dados previamente
   * @return boolean or ID
   * @throws Exception
   * @author Inst. Julian Lasso <jlassof@sena.edu.co>
   */
  public function verificarLogin() {
    try {
      $sql = 'SELECT id FROM usuario WHERE usuario = :user AND contrasena = :pass';
      $params = array(
          ':user' => $this->getUsuario(),
          ':pass' => $this->getContrasena()
      );
      $stmt = $this->conn->prepare($sql);
      $stmt->execute($params);
      $cnt = $stmt->rowCount();
      if ($cnt > 0) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
      } else {
        return false;
      }
    } catch (PDOException $exc) {
      throw new Exception($exc->getMessage(), $exc->getCode(), $exc->getPrevious());
    }
  }

}