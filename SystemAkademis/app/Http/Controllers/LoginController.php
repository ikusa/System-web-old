<?php

namespace app\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use app\Mahasiswa;

class LoginController extends Controller
{
    //
    public function index()
    {
		$response = new Response('Hello World');
		$response->withCookie(cookie('id', '1', 60));
		return $response;
	}
    public function about()
    {
        return view('testing');
    }

}
