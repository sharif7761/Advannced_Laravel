<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CommonController extends Controller
{
    public function localeIndex($lang=null){
        App::setlocale($lang);
        return view('locale.index');
    }
}
