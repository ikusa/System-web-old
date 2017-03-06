<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\Mahasiswa;
use app\Course;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class PengumumanController extends Controller
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
		$id = Auth::id();
		$biodata = \app\mahasiswa::select('*')
             ->where('id', $id)
             ->orderBy('id', 'desc')
             ->take(1)
             ->get();
    $term = \app\nilai::join('course', 'course.id', '=', 'nilai.id_course')
            ->join('term', 'term.id', '=', 'course.id_term')
            ->select('term','term.id')
            ->where('id_mahasiswa',$id)
            ->distinct()
            ->get();
		$nilai = \app\nilai::join('course', 'course.id', '=', 'nilai.id_course')
            ->join('term', 'term.id', '=', 'course.id_term')
            ->join('dosen', 'dosen.id', '=', 'course.id_dosen')
            ->select('kodeMK','namaMK','namaDosen','sks','nilai','term.id','term')
            ->where('id_mahasiswa',$id)
            ->where('id_tipenilai',4)
            ->get();
		return view('pengumuman',['biodata'=>$biodata,'nilai'=>$nilai,'term'=>$term]);
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
