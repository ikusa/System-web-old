<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\Mahasiswa;
use app\Course;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SubmitController extends Controller
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
    $idArray =\app\mahasiswa::select('id')
             ->where('user_id', Auth::id())
             ->take(1)
             ->get();
    $id = $idArray[0]->id;
		$length=count($request->input('checkbox'));
    //input array id krs ke variable idkrs
    $idkrs = $request->input('checkbox');
    //loop insert array id_course ke table student_course
		for($i=0;$i<$length;$i++)
		{
      DB::table('student_course')->insert(
        ['id_mahasiswa' => $id, 'id_course' => $idkrs[$i]]
      );

		}
		return redirect('krs');
    }

    public function submit(Request $request)
    {
    $idArray =\app\mahasiswa::select('id')
             ->where('user_id', Auth::id())
             ->take(1)
             ->get();
    $id = $idArray[0]->id;


    $id_krs = $request->input('data');
    for ($i=0; $i < sizeof($id_krs) ; $i++) {
      DB::table('student_course')
            ->where('id', $id_krs[$i])
            ->update(['final'=>1]);
    }
    DB::table('mahasiswa')
          ->where('id', $id)
          ->update(['status_krs'=>0]);


		return ('succes');
    }


}
