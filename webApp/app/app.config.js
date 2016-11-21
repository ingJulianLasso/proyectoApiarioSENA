angular.module('apiarioApp').
        config(['$locationProvider', '$routeProvider',
          function config($locationProvider, $routeProvider) {
            // $locationProvider.hashPrefix('!');
            $routeProvider.
                    when('/', {
                      controller: 'indexController',
                      templateUrl: 'app/template/index.html'
                    }).
                    when('/index', {
                      controller: 'indexController',
                      templateUrl: 'app/template/index.html'
                    }).
                    otherwise('/');
          }
        ]);