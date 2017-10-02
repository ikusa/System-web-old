<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\mahasiswa;
use app\course;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class KHSController extends Controller
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
        $biodata = \app\mahasiswa::select('*')
            ->join('studi_program', 'studi_program.id', '=', 'mahasiswa.id_program_studi')
            ->where('user_id', Auth::id())
            ->first();
        $term = \app\nilai::join('course', 'course.id', '=', 'nilai.id_course')
            ->join('term', 'term.id', '=', 'course.id_term')
            ->select('term', 'term.id')
            ->where('id_mahasiswa', $id)
            ->distinct()
            ->get();
        $nilai = \app\nilai::join('course', 'course.id', '=', 'nilai.id_course')
            ->join('term', 'term.id', '=', 'course.id_term')
            ->select('kodeMK', 'namaMK', 'dosen', 'sks', 'nilai', 'term.id', 'term')
            ->where('id_mahasiswa', $id)
            ->where('id_tipenilai', 4)
            ->get();
        return view('khs', ['biodata'=>$biodata,'nilai'=>$nilai,'term'=>$term]);
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
