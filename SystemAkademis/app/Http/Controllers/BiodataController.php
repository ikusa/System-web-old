<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\Mahasiswa;

class BiodataController extends Controller
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
    public function index()
    {
      $columns = DB::getSchemaBuilder()->getColumnListing('mahasiswa');
      return view('Biodata',['name' => $columns]);
    }
    public function data(Request $request)
    {
      $email = $request->input('email');


      $mahasiswa = \app\mahasiswa::select('nama','program_studi','nim')
             ->where('email', $email)
             ->orderBy('id', 'desc')
             ->take(1)
             ->get();
        return $mahasiswa ;
    }
}
