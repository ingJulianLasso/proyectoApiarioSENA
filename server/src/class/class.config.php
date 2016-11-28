<?php

class config {

  private $dsn;
  private $drive;
  private $host;
  private $port;
  private $user;
  private $pass;
  private $dbName;
  
  public function getDsn() {
    return $this->dsn;
  }

  public function getDrive() {
    return $this->drive;
  }

  public function getHost() {
    return $this->host;
  }

  public function getPort() {
    return $this->port;
  }

  public function getUser() {
    return $this->user;
  }

  public function getPass() {
    return $this->pass;
  }

  public function getDbName() {
    return $this->dbName;
  }

  public function setDsn($dsn) {
    $this->dsn = $dsn;
  }

  public function setDrive($drive) {
    $this->drive = $drive;
  }

  public function setHost($host) {
    $this->host = $host;
  }

  public function setPort($port) {
    $this->port = $port;
  }

  public function setUser($user) {
    $this->user = $user;
  }

  public function setPass($pass) {
    $this->pass = $pass;
  }

  public function setDbName($dbName) {
    $this->dbName = $dbName;
  }
}