<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use app\mahasiswa;
use app\course;

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
        $id =\app\mahasiswa::select('id')
             ->where('user_id', Auth::id())
             ->first()->id;
        $biodata = \app\mahasiswa::select('*')
             ->where('id', $id)
             ->first();
        //looping course yang sudah diambil
        $idKRS=\app\student_course::select('id_kelas')
                ->where('id_mahasiswa', $id)
                ->get();
        $array=array();
        foreach ($idKRS as $idK) {
            array_push($array, $idK->id_course);
        }
        //ambil term aktif
        $idTerm=\app\term::select('id')
                ->where('current', 1)
                ->first()->id;
        //ambil course dari database
        $course = \app\course::select('*')
            //  ->where('program_studi', $biodata->id_program_studi)
      //  ->where('status_terbuka','terbuka')
      //  ->where('id_term',$idTerm)
      //  ->whereNotIn('id', $array)//menghindari menampilkan course yang sudah diambil
             ->get();
        return view('krsstudent', ['biodata'=>$biodata,'course'=>$course]);
    }
}
