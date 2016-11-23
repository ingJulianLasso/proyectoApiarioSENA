'use strict';

/**
 * Configure the middleware provider
 */
//angular.module('apiarioApp').
//        config(['$middlewareProvider',
//          function middlewareProviderConfig($middlewareProvider) {
//
//            $middlewareProvider.map({
//
//              /** Middleware One - only resolve if tester.val === 3 */
//              'middleware-one': ['tester', function middlewareOne(tester) {
//                  if (tester.val === 3) {
//                    return this.next();
//                  }
//
//                  tester.val = 1;
//                  this.redirectTo('/two');
//                }],
//
//              /** Middleware Two - wait 1 second, then go to next */
//              'middleware-two': ['tester', function middlewareTwo(tester) {
//                  setTimeout(function timeout() {
//                    tester.val++;
//                    this.next();
//                  }.bind(this), 1000);
//                }],
//
//              /** Middleware 3 - slowly increment tester.val, then go to one */
//              'middleware-three': ['tester', function middlewareThree(tester) {
//                  setTimeout(function timeoutTwo() {
//                    tester.val++;
//
//                    this.redirectTo('/one');
//                  }.bind(this), 1000);
//                }]
//
//            });
//
//          }]);

/**
 * Configure the routes
 */
angular.module('apiarioApp').
        config(['$locationProvider', '$routeProvider',
          function config($routeProvider) {
            $routeProvider.
                    when('/', {
                      controller: 'indexController',
                      templateUrl: 'app/template/index.html',
//                      middleware: 'middleware-one'
                    }).
                    when('/index', {
                      controller: 'indexController',
                      templateUrl: 'app/template/index.html',
//                      middleware: ['middleware-two', 'middleware-three']
                    }).
                    otherwise('/');
          }
        ]);