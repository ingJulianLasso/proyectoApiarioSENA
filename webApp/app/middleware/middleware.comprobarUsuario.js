'use strict';

function middlewareComprobarUsuario($this, $localStorage, $sessionStorage) {
  if ($sessionStorage.autenticado === undefined) {
    if ($localStorage.autenticado === undefined) {
      $this.redirectTo('/login');
    } else {
      $this.next();
    }
  } else {
    $this.next();
  }
}