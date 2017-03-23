<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Mahasiswa;
use Illuminate\Support\Facades\Log;

class NilaiController extends Controller
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

    $search_param = $request->input('search_param', 'null');
    $input= $request->input('x','null');
		$biodata = \app\user::select('name')
             ->where('id', Auth::id())
             ->orderBy('id', 'desc')
             ->take(1)
             ->get();
    if ($search_param!='null') {
      $table = \app\Course::select('*')
               ->join('term', 'term.id', '=', 'course.id_term')
               ->where($search_param,'like', '%'.$input.'%')
               ->get();
      Log::info('Special super debug : '.$table);


    }

    if ($search_param=='null') {
      $table = null;

    }
        return view('nilai', ['table' => $table,'biodata'=>$biodata]);
    }


    public function edit(Request $request)
    {

    $search_param = $request->input('id', 'null');
    $input= $request->input('x','null');
		$biodata = \app\user::select('name')
             ->where('id', Auth::id())
             ->orderBy('id', 'desc')
             ->take(1)
             ->get();
    if ($search_param!='null') {

      $table = \app\nilai::select('*')
               ->join('mahasiswa','nilai.id_mahasiswa' , '=', 'mahasiswa.id')
               ->where('id_course',$search_param)
               ->get();
               Log::info('Special loop debug : '.$table);


    }
    if ($search_param=='null') {

      $table = null;

    }
        return view('insertnilai', ['table' => $table,'biodata'=>$biodata]);
    }


    public function submit(Request $request)
    {


    $id = $request->input('id', 'null');
    $input= $request->input('nilai','null');
    for ($i=0; $i < sizeof($id) ; $i++) {
       Log::info('Special loop debug : '.$id[$i]);
    }

      return redirect()->action('nilaiController@index');
    }

}
