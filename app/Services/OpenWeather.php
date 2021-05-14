<?php

namespace App\Services;

use \App\Services\Interfaces\WeatherInterface;

class OpenWeather implements WeatherInterface
{
    public function getResult($body) 
    {
        $response = json_decode($body, true);
        
        return $response['main']['temp'];
    }

    public function getParams($params)
    {
        $formattedParams = [
            'q' => "{$params['city']}, {$params['country']}",
            'appid' => $params['api'],
            'units' => 'metric'
        ];

        return $formattedParams;
    }
}