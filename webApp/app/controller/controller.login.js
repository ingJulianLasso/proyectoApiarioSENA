'use strict';

angular.module('apiarioApp').
        controller('loginController', ['urlServer', '$scope', '$location', '$http', '$localStorage', '$sessionStorage', function (urlServer, $scope, $location, $http, $localStorage, $sessionStorage) {
            $scope.login = {
              rememberme: false
            };
            $scope.alertError = false;
            $scope.alertWarning = false;
            $scope.msgAlertError = null;
            $scope.msgAlertWarning = null;
            $scope.submit = function () {
              var options = {
                method: 'POST',
                url: urlServer + 'login.php',
                data: $scope.login,
                responseType: 'json',
                headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8'}
              };
              $http(options).
                      success(function (data, status, headers, config) {
                        if (data.code === 200 && $scope.login.rememberme === true) {
                          $localStorage.autenticado = data.id;
                          $location.path('/index');
                        } else if (data.code === 200 && $scope.login.rememberme === false) {
                          $sessionStorage.autenticado = data.id;
                          $location.path('/index');
                        } else if (data.code === 300) {
                          $scope.alertWarning = true;
                          $scope.alertError = false;
                          $scope.msgAlertWarning = data.msg;
                        } else if (data.code === 500) {
                          $scope.alertError = true;
                          $scope.alertWarning = false;
                          $scope.msgAlertError = data.error;
                        } else if (data.code === 600) {
                          $('#msgErrorServer').text(data.msg);
                          $('#msgErrorTrace').text(data.trace);
                          $('#errorModalServer').modal('show');
                        }
                      }).
                      error(function (data, status, headers, config) {
                        console.log(data);
                      });
            };
          }]);