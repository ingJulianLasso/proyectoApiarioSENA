'use strict';

angular.module('apiarioApp').
        controller('logoutController', ['urlServer', '$scope', '$location', '$http', '$localStorage', '$sessionStorage', function (urlServer, $scope, $location, $http, $localStorage, $sessionStorage) {
            $localStorage.$reset();
            $sessionStorage.$reset();
            $location.path('/login');
          }]);