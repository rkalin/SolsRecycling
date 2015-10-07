angular.module('recycleTracker').controller('viewTotalController', function($scope, $http) {
    $scope.ShowBy = {};
    
    $scope.$watch('ShowBy', function(value) {
        if (value == 'user') {
         $http.get('app/php/allUsers.php').
         success(function(data) {
            $scope.tableInfo = data;
         });
        } else if (value == 'group') {
         $http.get('app/php/groups.php').
         success(function(data) {
            $scope.tableInfo = data;
         });
        } else if (value == 'subgroup') {
         $http.get('app/php/subGroups.php').
         success(function(data) {
            $scope.tableInfo = data;
         });
        } else if (value == 'product') {
         $http.get('app/php/products.php').
         success(function(data) {
            $scope.tableInfo = data;
         });
        }
    });
});