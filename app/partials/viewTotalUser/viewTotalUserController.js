angular.module('recycleTracker').controller('viewTotalUserController', function($scope, $http) {
    $scope.user = {};
    //first = first name
    //sn = last name
    //userID = rit username
    $http.get('app/php/getUser.php').
       success(function(data) {
          $scope.user = data;
    });
});