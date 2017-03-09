app.controller('estate', function ($http, $scope, BASE_URL) {

    //Fetch estates
    $http.get(BASE_URL + 'api/estate')
        .success(function (response) {
            $scope.estates = response;
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
        $http.get(BASE_URL + 'api/city?id=' + id)
            .success(function (response) {
                $scope.cityName = response['name'];
            })
        $http.get(BASE_URL + 'api/city/areas/' + id)
            .success(function (response) {
                $scope.areas = response;
            })

    }

    //Fetch streets for selected area
    $scope.areaStreets = function (id) {
        $http.get(BASE_URL + 'api/area/streets/' + id)
            .success(function (response) {
                $scope.streets = response;
            })
    }

    $scope.street = function (id) {
        $http.get(BASE_URL + 'api/street?id=' + id)
            .success(function (response) {
                $scope.streetName = response['name'];
            })
    }

    //Insert record
    $scope.insertEstate = function () {
        var Indata = {'estate': $scope.newEstate, 'lat': $scope.latitude, 'lng': $scope.longitude };
        $http({
            url: BASE_URL+'api/estate/insert',
            method: 'POST',
            params: Indata,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {

        })
    }
    $scope.initialize = function() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 44.807, lng: 20.444},
            zoom: 8
        });
        var numberofMarkers = 0;
        var marker;
        var number;
        document.getElementById('insert_city').addEventListener('click', function () {
            $http.get(BASE_URL+'api/city/streets/2')
                .success(function (response) {
                    var i = 0;
                    response.forEach(function(obj) {
                        $http.get(BASE_URL + 'api/street/estates/'+obj.id)
                            .success(function (estates) {
                                var numberofestates = estates.length;
                                if(numberofestates == 0) {
                                     number = Math.floor(Math.random() * 40) + 1;
                                     var address = obj.city+", "+obj.name+" "+number;
                                     var geocoder = new google.maps.Geocoder();
                                     geocoder.geocode({'address': address}, function(results, status) {
                                         $scope.latitude = results[0].geometry.location.lat();
                                         $scope.longitude = results[0].geometry.location.lng();
                                         $scope.newEstate.street_id = obj.id;
                                         var Indata = {'estate': $scope.newEstate, 'lat': $scope.latitude, 'lng': $scope.longitude };
                                         $http({
                                             url: BASE_URL+'api/estate/insert',
                                             method: 'POST',
                                             params: Indata,
                                             headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                                         }).success(function (response) {

                                         })
                                     })
                                }
                            });
                    });
                });
        })
        /*document.getElementById('nmbr').addEventListener('change', function() {
            var number = document.getElementById('nmbr').value;
            var address = $scope.cityName+", "+$scope.streetName+" "+number;
            geocoder.geocode({'address': address}, function(results, status) {
                if (status === 'OK') {
                    map.setCenter(results[0].geometry.location);
                    if(numberofMarkers === 1) {
                        marker.setPosition(results[0].geometry.location);
                    } else {
                        marker = new google.maps.Marker({
                            position: results[0].geometry.location,
                            map: map
                        });
                    }
                    numberofMarkers = 1;
                    $scope.latitude = results[0].geometry.location.lat();
                    $scope.longitude = results[0].geometry.location.lng();
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        });*/
    }
    google.maps.event.addDomListener(window, 'load', $scope.initialize);
})