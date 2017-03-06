app.controller('street', function ($http, $scope, BASE_URL) {
    //Fetch streets
    $http.get(BASE_URL + 'api/street')
        .success(function (response) {
            $scope.streets = response;
        })

    //Fetch areas
    $http.get(BASE_URL + 'api/area')
        .success(function (response) {
            $scope.areas = response;
        })

    //Fetch cities
    $http.get(BASE_URL + 'api/city')
        .success(function (response) {
            $scope.cities = response;
        })

    //Show insert table
    $scope.showtable = function () {
        angular.element(document.getElementsByClassName('insert-table')).removeClass('hidden');
    }

    //Fetch areas for selected city
    $scope.cityAreas = function (id) {
        $http.get(BASE_URL + 'api/city/areas/' + id)
            .success(function (response) {
                $scope.cityareas = response;
            })
    }

    //Insert record
    $scope.insertStreet = function () {
        $http({
            url: BASE_URL+'api/street/insert',
            method: 'POST',
            data: $.param($scope.newStreet),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function () {
        })
    }

    //Show update table
    $scope.showEdit = function (id) {
        $scope.id = id;
        $http.get(BASE_URL + 'api/street?id=' + id)
            .success(function (response) {
                $scope.singleStreet = response;
                angular.element(document.getElementsByClassName('update-table')).removeClass('hidden');
            })
    }

    //Update record
    $scope.updateStreet = function (id) {
        $scope.id = id;
        $http({
            url: BASE_URL + 'api/street/update/' + id,
            method: 'POST',
            data: $.param($scope.singleStreet),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function () {
            window.location.reload();
        })
    }

    //Delete record
    $scope.deleteStreet = function (id) {
        $http.delete(BASE_URL + 'api/street/' + id)
            .success(function () {
                window.location.reload();
            })
    }


})