app.controller('furnishment', function($scope, $http, BASE_URL){
    //fetch furnishments
    $http.get(BASE_URL + 'api/furnishment')
        .success(function (response) {
            $scope.furnishment = response;
        })
})