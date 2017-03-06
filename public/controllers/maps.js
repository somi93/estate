app.controller('map', function ($scope, $http, BASE_URL) {
    $scope.initialize = function() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 44.807, lng: 20.444},
            zoom: 8
        });
        $http.get(BASE_URL + 'api/estate')
            .success(function (response) {
                var markers = [];
                for(var i = 0; i<response.length; i++){
                    var marker = new google.maps.Marker({
                        position: {lat:  response[i].latitude, lng:  response[i].longitude},
                        label: '1',
                        icon: '/img/marker.png'
                    });
                    var content =
                        '<div class="info-box">'+
                            '<div class="info-title">' +
                                '<a href="#">' +
                                    response[i].title+ ', '+response[i].street.name+', ' + response[i].price + '&euro;' +
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
                    attachSecretMessage(marker, content);
                    markers.push(marker);
                }
                var mcOptions = {gridSize: 50, maxZoom: 15, styles: [{
                    height: 48,
                    url: "img/marker.png",
                    width: 40
                }]};

                var markerCluster = new MarkerClusterer(map, markers, mcOptions);
            })
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