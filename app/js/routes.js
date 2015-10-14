angular.module('recycleTracker').config(['$routeProvider',
    function($routeProvider) {
        $routeProvider
            .when('/register', {
                templateUrl: 'app/partials/protected/register/register.html',
                controller: 'View2Ctrl'
            })
            .when('/viewTotal', {
                templateUrl: 'app/partials/viewTotal/viewTotal.html',
                controller: 'viewTotalController'
            })
            .when('/viewTotalUser', {
                templateUrl: 'app/partials/protected/viewTotalUser/viewTotalUser.html',
                controller: 'View2Ctrl'
            })
            .otherwise({redirectTo: '/viewTotal'});
}]);