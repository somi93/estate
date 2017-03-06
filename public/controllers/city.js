app.controller('city', function ($scope, $http, BASE_URL) {

    //Fetch Cities
    $http.get(BASE_URL+'api/city')
        .success(function (response) {
            $scope.cities = response;
    })

    //Show insert table
    $scope.showtable = function () {
        angular.element(document.getElementsByClassName('insert-table')).removeClass('hidden');
    }

    //Insert record
    $scope.insertCity = function () {
        $http({
            url: BASE_URL+'api/city/insert',
            method: 'POST',
            data: $.param($scope.newCity),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function () {
            window.location.reload();
        })
    }

    //Show edit table
    $scope.showEdit = function (id) {
        $scope.id = id;
        $http.get(BASE_URL + 'api/city?id=' + id)
            .success(function (response) {
                $scope.singleCity = response;
                angular.element(document.getElementsByClassName("update-table")).removeClass("hidden");
            })
    }

    //Edit record
    $scope.updateCity = function (id) {
        $http({
            url: BASE_URL + 'api/city/update/' + id,
            method: 'POST',
            data: $.param($scope.singleCity),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
                window.location.reload();
            })
    }

    //Delete record
    $scope.deleteCity = function (id) {
        $http.delete(BASE_URL + 'api/city?id=' + id)
            .success(function () {
                window.location.reload();
            })
    }
})