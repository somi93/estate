app.controller('footer', function ($scope, $http, BASE_URL) {

    //fetch estate type
    $http.get(BASE_URL + 'api/estate_type?limit=4&offset=0')
        .success(function (response) {
            $scope.estate_types = response;
        })

    //fetch cities
    $http.get(BASE_URL + 'api/city?limit=4&offset=0')
        .success(function (response) {
            $scope.cities = response;
        })
})