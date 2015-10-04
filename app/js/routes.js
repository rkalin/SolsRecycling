angular.module('recycleTracker').config(['$routeProvider',
    function($routeProvider) {
        $routeProvider
            .when('/register', {
                templateUrl: 'app/partials/register/register.html'
                //controller: 'View2Ctrl'
            })
            .when('/viewTotal', {
                templateUrl: 'app/partials/viewTotal/viewTotal.html'
                //controller: 'View2Ctrl'
            })
            .when('/viewTotalUser', {
                templateUrl: 'app/partials/viewTotalUser/viewTotalUser.html'
                //controller: 'View2Ctrl'
            })
            .otherwise({redirectTo: '/viewTotal'});
}]);