<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\Mahasiswa;
use app\Course;

class KRSStudentController extends Controller
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
		$id = $request->cookie('id');
		$biodata = \app\mahasiswa::select('*')
             ->where('id', $id)
             ->orderBy('id', 'desc')
             ->take(1)
             ->get();
    //looping course yang sudah diambil
    $idKRS=\app\student_course::select('id_course')
                ->where('id_mahasiswa',$id)
                ->get();
    $array=array();
    foreach($idKRS as $idK)
      {
        array_push($array,$idK->id_course);
      }

    //ambil course dari database
		$course = \app\course::select('*')
			 ->where('program_studi', $biodata[0]->program_studi)
       ->where('status_terbuka',1)
       ->whereNotIn('id', $array)//menghindari menampilkan course yang sudah diambil
             ->get();
		return view('krsstudent',['biodata'=>$biodata,'course'=>$course]);
    }
    public function coloumn(Request $request)
    {
      $email = $request->input('email');


      $table = \app\mahasiswa::select('*')
             ->where('email', $email)
             ->orderBy('id', 'desc')
             ->take(1)
             ->get();
        return $table ;
    }
}
