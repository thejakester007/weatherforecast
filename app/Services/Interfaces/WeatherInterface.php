<?php

namespace App\Services\Interfaces;

interface WeatherInterface 
{
    public function getResult($body);

    public function getParams($params);
}