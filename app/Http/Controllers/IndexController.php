<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;
use \App\Services\OpenWeather;

class IndexController extends Controller
{
    public function index(Request $request) {
        if ($request->method() == 'POST') {
            $openWeather = new OpenWeather();
            $openWeather->getResult();
        }

        $countries = CountryListFacade::getList('en');

        return view('default', compact('countries'));
    }
}
