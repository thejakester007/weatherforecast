<?php

namespace \App\Services;

use \App\Services\WeatherInterface;

class OpenWeather implements WeatherInterface
{
    public function getResult() 
    {
        dd('open weather');
    }
}