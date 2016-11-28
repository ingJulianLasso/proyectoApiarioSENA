'use strict';

function middlewareComprobarUsuarioLogin($this, $localStorage, $sessionStorage) {
  if ($sessionStorage.autenticado >= 1) {
    $this.redirectTo('/index');
  } else if ($localStorage.autenticado >= 1) {
    $this.redirectTo('/index');
  } else {
    $this.next();
  }
}