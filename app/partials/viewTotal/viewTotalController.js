angular.module('recycleTracker').controller('viewTotalController', function($scope, $http) {
    $scope.ShowBy = {};
    
    $scope.$watch('ShowBy', function(value) {
        if (value == 'user') {
          allUsers();
        } else if (value == 'group') {
         $http.get('app/php/mainTableView/groups.php').
         success(function(data) {
            $scope.tableInfo = data;
         });
        } else if (value == 'subgroup') {
         $http.get('app/php/mainTableView/subGroups.php').
         success(function(data) {
            $scope.tableInfo = data;
         });
        } else if (value == 'product') {
         $http.get('app/php/mainTableView/products.php').
         success(function(data) {
            $scope.tableInfo = data;
         });
        }
    });
    
    allUsers();
    
    function allUsers() {
        $http.get('app/php/mainTableView/allUsers.php').
         success(function(data) {
            $scope.tableInfo = data;
         });
    }
});