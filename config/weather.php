<?php
return [
    'api' => [
        'openweather' => [
            'class' => 'OpenWeather',
            'url' => 'api.openweathermap.org/data/2.5/weather',
            'key' => '43b653b5f06326e330d606aed09e1c84'
        ],
        'weatherstack' => [
            'class' => 'WeatherStack',
            'url' => 'http://api.weatherstack.com/current',
            'key' => '3c0a0aceccbfbc5b9cfe3147e34b2e15'
        ],
    ] 
];