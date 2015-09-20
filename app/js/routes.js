angular.module('recycleTracker').config(['$routeProvider',
    function($routeProvider) {
        $routeProvider
            .when('/home', {
                templateUrl: 'partials/home/home.html'
                //controller: 'View1Ctrl'
            })
            .when('/register', {
                templateUrl: 'partials/register/register.html'
                //controller: 'View2Ctrl'
            })
            .when('/signin', {
                templateUrl: 'partials/signin/signin.html'
                //controller: 'View2Ctrl'
            })
            .when('/viewTotal', {
                templateUrl: 'partials/viewTotal/viewTotal.html'
                //controller: 'View2Ctrl'
            })
            .when('/viewTotalUser', {
                templateUrl: 'partials/viewTotalUser/viewTotalUser.html'
                //controller: 'View2Ctrl'
            })
            .otherwise({redirectTo: '/home'});
}]);