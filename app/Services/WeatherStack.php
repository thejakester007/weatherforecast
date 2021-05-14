<?php

namespace App\Services;

use \App\Services\Interfaces\WeatherInterface;

class WeatherStack implements WeatherInterface
{
    public function getResult($body) 
    { 
        $response = json_decode($body, true);
        
        return $response['current']['temperature'];
    }

    public function getParams($params)
    {
        $formattedParams = [
            'query' => "{$params['city']}, {$params['country']}",
            'access_key' => $params['api']
        ];

        return $formattedParams;
    }
}