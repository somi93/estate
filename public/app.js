
var app = angular.module('lacasa', [])
                 .constant("CSRF_TOKEN", '{{ csrf_token() }}')
                 .constant('BASE_URL', 'http://localhost:8000/');

