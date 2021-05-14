<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Monarobase\CountryList\CountryListFacade;
use App\Services\Weather;

class IndexController extends Controller
{
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
                $data = [
                    'city' => $request->get('city'),
                    'country' => $request->get('country'),
                    'temperature' => array_sum($temp) / count($temp)
                ];
            }
        }

        $countries = CountryListFacade::getList('en');
    
        return view('default', compact('countries'), compact('data'));
    }
}
