<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\mahasiswa;
use app\course;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class KRSController extends Controller
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
		$biodata = \app\mahasiswa::select('*')
             ->where('id', $id)
             ->orderBy('id', 'desc')
             ->take(1)
             ->get();
       /*SELECT kodeMK, namaMK, sks, nama, status_terbuka
       FROM student_course
       INNER JOIN course ON course.id = student_course.id_course
       INNER JOIN dosen ON dosen.id = course.id_dosen
       WHERE id_mahasiswa = 1*/
       $KRS = \app\student_course::join('course', 'course.id', '=', 'student_course.id_course')
              ->select('student_course.id','kodeMK', 'namaMK', 'sks', 'dosen', 'status_terbuka')
              ->where('id_mahasiswa',$id)
              ->get();

		return view('krs',['biodata'=>$biodata,'course'=>$KRS]);
    }
    public function delete(Request $request)
    {

    $idstudent_course = $request->input('subject');
    DB::table('student_course')->where('id', '=', $idstudent_course)->delete();

		return redirect('/krs');
    }

}
