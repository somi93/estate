app.controller('map', function ($scope, $http, BASE_URL) {

    var map;
    var markers = [];
    var markerCluster;
    var mcOptions;
    mcOptions = {gridSize: 50, maxZoom: 15, styles: [{
        height: 40,
        url: "img/cluster.png",
        width: 40,
        textColor: 'white'
    }]};
    $scope.initialize = function() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 44.807, lng: 20.444},
            zoom: 8
        });
        $http.get(BASE_URL + 'api/estate')
            .success(function (response) {
                for(var i = 0; i<response.length; i++){
                    var link = "estate/"+response[i].id;
                    var content =
                        '<div class="info-box">'+
                        '<div class="info-title">' +
                        '<a href="'+link+'">' +
                        response[i].title+ ', '+response[i].street+', ' + response[i].price + '&euro;' +
                        '</a>' +
                        '</div>' +
                        '<div class="info-content">' +
                        '<div class="info-description">' +
                        response[i].description +
                        '</div>' +
                        '<div class="info-photo">' +
                        '<img src="/img/property_1.jpg" />' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    addMarker({lat:  response[i].latitude, lng:  response[i].longitude}, content);
                }
                markerCluster = new MarkerClusterer(map, markers, mcOptions);
            })

        document.getElementById('filter-estates').addEventListener('click', function() {
            var minPrice = $scope.minPrice;
            var maxPrice = $scope.maxPrice;
            var minSize = $scope.minSize;
            var maxSize = $scope.maxSize;
            var central_heating = $scope.centralh;
            var ta = $scope.tah;
            var etag_heating = $scope.etagh;
            var floor_heating = $scope.floorh;
            var current_heating = $scope.currenth;
            var internet = $scope.internet;
            var intercom = $scope.intercom;
            var cameras = $scope.cameras;
            var climate = $scope.climate;
            var fridge = $scope.fridge;
            var tv = $scope.tv;
            var garage = $scope.garage;
            var parking = $scope.parking;
            var elevator = $scope.elevator;
            var furnished = $scope.furnished;
            var halffurnished = $scope.halffurnished;
            var unfurnished = $scope.unfurnished;
            var filter = "?1=1";
            if(minPrice) {
                filter += "&minPrice="+minPrice;
            }
            if(maxPrice) {
                filter += "&maxPrice="+maxPrice;
            }
            if(minSize) {
                filter += "&minSize="+minSize;
            }
            if(maxSize) {
                filter += "&maxSize="+maxSize;
            }
            if(central_heating) {
                filter += "&central_heating=true";
            }
            if(ta) {
                filter += "&ta=true";
            }
            if(etag_heating) {
                filter += "&etag_heating=true";
            }
            if(floor_heating) {
                filter += "&floor_heating=true";
            }
            if(current_heating) {
                filter += "&current_heating=true";
            }
            if(internet) {
                filter += "&internet=true";
            }
            if(intercom) {
                filter += "&intercom=true";
            }
            if(cameras) {
                filter += "&cameras=true";
            }
            if(climate) {
                filter += "&climate=true";
            }
            if(fridge) {
                filter += "&fridge=true";
            }
            if(tv) {
                filter += "&tv=true";
            }
            if(garage) {
                filter += "&garage=true";
            }
            if(parking) {
                filter += "&parking=true";
            }
            if(elevator) {
                filter += "&elevator=true";
            }
            if(furnished) {
                filter += "&furnished=true";
            }
            if(halffurnished) {
                filter += "&halffurnished=true";
            }
            if(unfurnished) {
                filter += "&unfurnished=true";
            }

            $http.get(BASE_URL + 'api/estate'+filter)
                .success(function (response) {
                    deleteMarkers();
                    markerCluster.clearMarkers();
                    for(var i = 0; i<response.length; i++) {
                        var content =
                            '<div class="info-box">'+
                            '<div class="info-title">' +
                            '<a href="#">' +
                            response[i].title+ ', '+response[i].street+', ' + response[i].price + '&euro;' +
                            '</a>' +
                            '</div>' +
                            '<div class="info-content">' +
                            '<div class="info-description">' +
                            response[i].description +
                            '</div>' +
                            '<div class="info-photo">' +
                            '<img src="/img/property_1.jpg" />' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                        addMarker({lat: response[i].latitude, lng: response[i].longitude}, content);
                    }
                    markerCluster = new MarkerClusterer(map, markers, mcOptions);
                })
        });
    }

    // Adds a marker to the map and push to the array.
    function addMarker(location, content) {
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            icon: '/img/marker.png',
        });
        attachSecretMessage(marker, content);
        markers.push(marker);
    }

    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    // Removes the markers from the map, but keeps them in the array.
    function clearMarkers() {
        setMapOnAll(null);
    }

    // Shows any markers currently in the array.
    function showMarkers() {
        setMapOnAll(map);
    }

    // Deletes all markers in the array by removing references to them.
    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }
    function attachSecretMessage(marker, secretMessage) {
        var infowindow = new google.maps.InfoWindow({
            content: secretMessage
        });

        marker.addListener('click', function() {
            infowindow.open(marker.get('map'), marker);
        });
    }
    //
    google.maps.event.addDomListener(window, 'load', $scope.initialize);
})