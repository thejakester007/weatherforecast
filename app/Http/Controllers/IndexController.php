<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Arr;
use Monarobase\CountryList\CountryListFacade;
use App\Traits\WeatherReportTrait;

class IndexController extends Controller
{
    use WeatherReportTrait;

    public function index(Request $request) {
        $data = [];
        if ($request->method() == 'POST') {
            $params = [
                        'country' => $request->get('country'),
                        'city' => $request->get('city')
                      ];
                        
            $config = app('config')->get('weather');

            foreach($config['api'] as $value) {
                $params['api'] = $value['key'];
                $className = 'App\\Services\\' . $value['class'];
                $object = new $className;
                $objectParams = $object->getParams($params);
                
                $query = Http::get($value['url'], $objectParams);
                
                $temp[] = $object->getResult($query->body());
            }

            $data = [
                'city' => $request->get('city'),
                'country' => $request->get('country'),
                'temperature' => array_sum($temp) / count($temp)
            ];

            $query = base64_encode("{$request->get('name')} {$request->get('email')} {$request->get('city')} {$request->get('country')}");

            if (Cache::has($query)) {
                $data['error'] = 'Please wait 10 minutes before trying again. Thank you.';
            } else {
                Cache::add($query, json_encode($data), now()->addMinutes(10));

                $this->saveData($request, $data);
            }
        }

        $countries = CountryListFacade::getList('en');
    
        return view('default', compact('countries'), compact('data'));
    }
}
