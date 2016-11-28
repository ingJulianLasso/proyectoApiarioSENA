<?php

session_name('APISoftWebApp');
session_start();

require 'src/headers.php';
require 'src/class/class.config.php';
require 'src/class/class.database.php';
require 'src/config.php';

require 'src/interface/table.php';
require 'src/model/model.usuario.php';
require 'src/model/table.usuario.php';

try {
  /*
   * Conexión a base de datos
   */
  $db = new database();
  $conn = $db->getConexion($config);

  /*
   * Captura de datos
   */
  $request = json_decode(file_get_contents("php://input"));

  /*
   * Validación de datos
   */
  $flag = false;

  if (is_null($request->user) === true) {
    $error['user'] = 'Escriba un nombre de usuario válido';
    $flag = true;
  }

  if (is_null($request->pass) === true) {
    $error['pass'] = 'Por favor escriba una contraseña válida';
    $flag = true;
  }

  if (is_bool($request->rememberme) === false) {
    $error['rememberme'] = 'Seleccione una opción válida para "Recordar me"';
    $flag = true;
  }

  if ($flag === true) {
    $data = array(
        'code' => 500,
        'error' => $error
    );
  } else {

    /*
     * Logica del negocio
     */
    $usuario = new usuario($conn, $request->user, $request->pass);
    $id = $usuario->verificarLogin();
    if ($id === false) {
      $data = array(
          'code' => 300,
          'msg' => 'Los datos de usuario y contraseña son inválidos'
      );
    } else {
      $data = array(
          'code' => 200,
          'id' => (integer) $id
      );
    }
  }

  /*
   * Impresión de la respuesta en JSON
   */
  echo json_encode($data);
} catch (Exception $exc) {
  $data = array(
      'code' => 600,
      'msg' => 'Error ' . $exc->getCode() . ': ' . $exc->getMessage(),
      'trace' => $exc->getTraceAsString()
  );
  echo json_encode($data);
}