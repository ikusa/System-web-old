<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use app\Mahasiswa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_param = $request->input('search_param', null);
        $input= $request->input('x', null);
        $name = \app\user::select('name')
               ->where('id', Auth::id())
               ->first();

        if (!empty($search_param)) {
            $table = \app\mahasiswa::select('*')
              ->join('studi_program', 'studi_program.id', '=', 'mahasiswa.id_program_studi')
              ->where($search_param, 'like', '%'.$input.'%')
              ->get();
        } else {
            $table = null;
        }
        return view('home', ['table' => $table,'name'=>$name]);
    }
}
