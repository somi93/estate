<!DOCTYPE html>
<html lang="{{ config('app.locale') }}"  ng-app="lacasa">
<head>
    <title>La Casa - Real Estate HTML5 Home Page Template</title>
    <meta charset="utf-8">
    <meta name="author" content="pixelhint.com">
    <meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="https://js.cit.api.here.com/v3/3.0/mapsjs-ui.css" />
    <script type="text/javascript" src="https://js.cit.api.here.com/v3/3.0/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.cit.api.here.com/v3/3.0/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.cit.api.here.com/v3/3.0/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.cit.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
    <script src="https://use.fontawesome.com/24158f24c4.js"></script>
</head>
<body>
<header>
    <div class="wrapper">
        <a href="#"><img src="{{ asset('img/logo.png') }}" class="logo" alt="" titl=""/></a>
        <a href="#" class="hamburger"></a>
        <nav ng-controller="navigation">
            <ul>
                <li ng-repeat="link in links"><a href="@{{ link.link }}">@{{ link.name }}</a></li>
            </ul>
            @if (Auth::check())
                <a href="{{ URL::route('logout') }}" class="login_btn">Logout</a>
            @else
                <a href="{{ URL::route('login') }}" class="login_btn">Login</a>
            @endif
        </nav>
    </div>
</header><!--  end header section  -->

@yield('content')

<footer ng-controller="footer">
    <div class="wrapper footer">
        <ul>
            <li class="links">
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Policy</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </li>

            <li class="links">
                <ul>
                    <li ng-repeat="estate_type in estate_types"><a href="#">@{{ estate_type.type }}</a></li>
                </ul>
            </li>

            <li class="links">
                <ul>
                    <li ng-repeat="city in cities"><a href="#">@{{ city.name }}</a></li>
                </ul>
            </li>

            <li class="about">
                <p>La Casa is real estate minimal html5 website template, designed and coded by pixelhint, tellus varius, dictum erat vel, maximus tellus. Sed vitae auctor ipsum</p>
                <ul>
                    <li><a href="http://facebook.com/pixelhint" class="facebook" target="_blank"></a></li>
                    <li><a href="http://twitter.com/pixelhint" class="twitter" target="_blank"></a></li>
                    <li><a href="http://plus.google.com/+Pixelhint" class="google" target="_blank"></a></li>
                    <li><a href="#" class="skype"></a></li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="copyrights wrapper">
        Copyright © 2015 lacasa. All Rights Reserved.
    </div>
</footer><!--  end footer  -->

<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/angular/angular.min.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9DCC4QmoZLRu16i1wBDvGUmTGO7Ui9_g&callback=initMap"
        async defer></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
</script>
<!-- AngularJS Application Scripts -->
<script src="{{ asset('app.js') }}"></script>
<script src="{{ asset('controllers/navigation.js') }}"></script>
<script src="{{ asset('controllers/city.js') }}"></script>
<script src="{{ asset('controllers/area.js') }}"></script>
<script src="{{ asset('controllers/street.js') }}"></script>
<script src="{{ asset('controllers/furnishment.js') }}"></script>
<script src="{{ asset('controllers/maps.js') }}"></script>
<script src="{{ asset('controllers/estate.js') }}"></script>
<script src="{{ asset('js/footerAng.js') }}"></script>
</body>
</html>