<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\mahasiswa;
use app\course;
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
      //update final krs
      DB::table('student_course')
            ->where('id', $id_krs[$i])
            ->update(['final'=>1]);
      //create di nilai dengan value kosong
      $id_course =\app\student_course::select('id_course')
               ->where('id', $id_krs[$i])
               ->take(1)
               ->get();
      for ($j=1; $j <9 ; $j++) {
        DB::table('nilai')->insert(
            ['id_mahasiswa' => $id, 'id_course' => $id_course[0]->id_course,'id_tipenilai'=>$j]
        );
      }

    }
    //ganti eligible status isi krs
    DB::table('mahasiswa')
          ->where('id', $id)
          ->update(['status_krs'=>0]);
          return response()->json([
          'name' => 'Abigail',
          'state' => 'CA'
      ]);


    }


}
