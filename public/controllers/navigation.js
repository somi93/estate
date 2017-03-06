app.controller('navigation', function($scope, $http, BASE_URL) {

    //Fetch links
    $http.get(BASE_URL+"api/links")
        .success(function(response) {
            $scope.links = response;
        });

    //Delete record
    $scope.confirmDelete = function(id) {
        $http({
            method: 'DELETE',
            url: BASE_URL + 'api/links/delete/' + id
        }).success(function (data) {
            location.reload();
        }).error(function (data) {
            alert('Unable to delete');
        });
    }

    //Update record
    $scope.update = function(id) {
        $http({
            method: 'POST',
            url: BASE_URL+'api/links/update/' + id,
            data: $.param($scope.singleLink),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (){
            window.location.reload();
        }).error(function(msg){
            console.log(msg);
        })
    }

    //Insert record
    $scope.insert = function () {
        $http({
            url: BASE_URL + 'api/links/insert',
            method: 'POST',
            data: $.param($scope.insertLink),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function () {
            window.location.reload();
        })
    }

    //Show edit table
    $scope.showEdit = function(id) {
        $scope.id = id;
        $http.get(BASE_URL + 'api/links?id=' + id)
            .success(function(response) {
                $scope.singleLink = response;
                angular.element(document.getElementsByClassName("update-table")).removeClass("hidden");
            });
    }
    //Show insert table
    $scope.shownavtable = function () {
        angular.element(document.getElementsByClassName("insert-nav-table")).removeClass("hidden");
    }

});