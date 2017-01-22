<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function welcome()
    {
        return view('welcome');
    }
    public function about()
    {
        return view('testing');
    }
}
