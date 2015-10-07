angular.module('recycleTracker').controller('viewTotalController', function($scope, $http) {
    $scope.ShowBy = {};
    $scope.tableInfo = {};
    
    $scope.$watch('ShowBy', function(value) {
        if (value == 'user') {
         $http.get('../php/allUsers.php').
         success(function(data) {
            $scope.tableInfo = data;
         });
        } else if (value == 'group') {
         $http.get('../php/groups.php').
         success(function(data) {
            $scope.tableInfo = data;
         });
        } else if (value == 'subgroup') {
         $http.get('../php/subGroups.php').
         success(function(data) {
            $scope.tableInfo = data;
         });
        } else if (value == 'product') {
         $http.get('../php/products.php').
         success(function(data) {
            $scope.tableInfo = data;
         });
        }
    });
});