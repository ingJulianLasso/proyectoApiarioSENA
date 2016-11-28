'use strict';

angular.module('apiarioApp').constant('urlServer', 'http://www.apisoftserver.com/');

/**
 * Configure the middleware provider
 */
angular.module('apiarioApp').
        config(['$middlewareProvider',
          function middlewareProviderConfig($middlewareProvider) {
            $middlewareProvider.map({
              'comprobarUsuario': ['$localStorage', '$sessionStorage', function comprobarUsuario($localStorage, $sessionStorage) {
                  middlewareComprobarUsuario(this, $localStorage, $sessionStorage)
                }],
              'comprobarUsuarioLogin': ['$localStorage', '$sessionStorage', function comprobarUsuarioLogin($localStorage, $sessionStorage) {
                  middlewareComprobarUsuarioLogin (this, $localStorage, $sessionStorage)
                }],
            });
          }]);

/**
 * Configure the route provider
 */
angular.module('apiarioApp').
        config(['$routeProvider',
          function config($routeProvider) {
            $routeProvider.
                    when('/', {
                      controller: 'indexController',
                      templateUrl: 'app/template/index.html',
                      middleware: 'comprobarUsuario'
                    }).
                    when('/index', {
                      controller: 'indexController',
                      templateUrl: 'app/template/index.html',
                      middleware: 'comprobarUsuario'
                    }).
                    when('/login', {
                      controller: 'loginController',
                      templateUrl: 'app/template/login.html',
                      middleware: 'comprobarUsuarioLogin'
                    }).
                    when('/logout', {
                      controller: 'logoutController',
                      template: '<div class="text-center" style="margin-top: 80px"><i class="fa fa-cog fa-spin fa-5x"></i></div>',
                      middleware: 'comprobarUsuario'
                    }).
                    otherwise('/');
          }
        ]);