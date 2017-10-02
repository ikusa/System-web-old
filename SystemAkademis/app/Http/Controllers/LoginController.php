<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use app\Mahasiswa;


class LoginController extends Controller
{
    //
    public function index(Request $request)
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
