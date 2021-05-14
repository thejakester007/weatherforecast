<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Services;

class Weather 
{
    public function getData()
    {
        $config = app('config')->get('weather');

        foreach ($config as $value) {
            $class = $value['class'];
            
        }
    }
    // public function getData() 
    // {
    //     $data = [];

    //     $response = Http::get('http://api.weatherstack.com/current?access_key=3c0a0aceccbfbc5b9cfe3147e34b2e15&query=Cebu City, Philippines');
    //     $result = $response->body();

    //     dd($response->body());

    //     return $data;
    // }
}