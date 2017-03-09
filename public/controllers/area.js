
app.controller('area', function ($http, $scope, BASE_URL) {
    //Fetch areas
    $http.get(BASE_URL + 'api/area')
        .success(function (response) {
            console.log(response);
            $scope.areas = response;
        })
    
    //Fetch cities
    $http.get(BASE_URL+'api/city')
        .success(function (response) {
            $scope.cities = response;
        })
    
    //Show insert table
    $scope.showtable = function () {
        angular.element(document.getElementsByClassName('insert-table')).removeClass('hidden');
    }
    
    //Insert record
    $scope.insertArea = function () {
        $http({
            url: BASE_URL+'api/area/insert',
            method: 'POST',
            data: $.param($scope.newArea),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function () {
            // window.location.reload();
        })
    }

    //Show update table
    $scope.showEdit = function (id) {
        $scope.id = id;
        $http.get(BASE_URL + 'api/area?id=' + id)
            .success(function (response) {
                $scope.singleArea = response;
                angular.element(document.getElementsByClassName('update-table')).removeClass('hidden');
            })
    }

    //Update record
    $scope.updateArea = function (id) {
        $scope.id = id;
        $http({
            url: BASE_URL + 'api/area/update/' + id,
            method: 'POST',
            data: $.param($scope.singleArea),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function () {
            window.location.reload();
        })
    }

    //Delete record
    $scope.deleteArea = function (id) {
        $http.delete(BASE_URL + 'api/area/' + id)
            .success(function () {
                window.location.reload();
        })
    }
})