<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;

class IndexController extends Controller
{
    public function index(Request $request) {
        if ($request->method() == 'POST') {
            
        }

        $countries = CountryListFacade::getList('en');

        return view('default', compact('countries'));
    }
}
