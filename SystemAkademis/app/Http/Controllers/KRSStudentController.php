<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\Mahasiswa;
use app\Course;
use Illuminate\Support\Facades\Auth;

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
    $idArray =\app\Mahasiswa::select('id')
             ->where('user_id', Auth::id())
             ->take(1)
             ->get();
    $id = $idArray[0]->id;
		$biodata = \app\Mahasiswa::select('*')
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
    //ambil term aktif
    $idTerm=\app\term::select('id')
                ->where('current',1)
                ->get();
    //ambil course dari database
		$course = \app\Course::select('*')
			 ->where('program_studi', $biodata[0]->program_studi)
       ->where('status_terbuka','terbuka')
       ->where('id_term',$idTerm[0]->id)
       ->whereNotIn('id', $array)//menghindari menampilkan course yang sudah diambil
             ->get();
		return view('krsstudent',['biodata'=>$biodata,'course'=>$course]);
    }



}
