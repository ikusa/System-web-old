<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use app\course;
use app\dosen;
use app\dosen_kelas;
use app\kelas;
use app\mahasiswa;
use app\term;

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
        $biodata = \app\mahasiswa::select('user_id', 'mahasiswa.id', 'nama', 'nim', 'program_studi', 'status_krs')
            ->join('studi_program', 'studi_program.id', '=', 'mahasiswa.id_program_studi')
            ->where('user_id', Auth::id())
            ->first();
        $id = $biodata->id;
        //looping course yang sudah diambil -> should be replaced with kelas
        // Select student_course join dosen_kelas join kelas join course join term
        // $ClassesAlreadyTaken=\app\student_course::select('student_course.id_kelas,student_course.id_mahasiswa,term.current')
        //       ->join('kelas', 'kelas.id', '=', 'student_course.id_kelas')
        //       ->join('term', 'term.id', '=', 'kelas.id_term')
        //       ->where([
        //             ['term.current', '=', 1],
        //             ['student_course.id_mahasiswa', '=', $id],
        //         ])
        //       ->get();
        $ClassesAlreadyTaken=DB::table('student_course')
              ->join('kelas', 'kelas.id', '=', 'student_course.id_kelas')
              ->join('term', 'term.id', '=', 'kelas.id_term')
              ->select('term.current', 'student_course.id_mahasiswa', 'kelas.id', 'student_course.id_kelas')
              ->where([
                    ['term.current', '=', 1],
                    ['student_course.id_mahasiswa', '=', $id],
                ])
              ->get();
        $idClassesTaken=array();
        foreach ($ClassesAlreadyTaken as $kelas) {
            array_push($idClassesTaken, $kelas->id_kelas);
        }
        //ambil term aktif
        $idTerm=\app\term::select('id')
                ->where('current', 1)
                ->first()->id;
        //ambil course dari database -> change into select kelas
        // $possibleClasses=\app\kelas::select('*')
        $possibleClasses=DB::table('kelas')
              ->join('dosen_kelas', 'dosen_kelas.id_kelas', '=', 'kelas.id')
              ->join('dosen', 'dosen.id', '=', 'dosen_kelas.id_dosen')
              ->join('term', 'term.id', '=', 'kelas.id_term')
              ->join('course', 'course.id', '=', 'kelas.id_course')
              ->join('studi_program', 'studi_program.id', '=', 'kelas.id_program_studi')
              ->select(['kodeMK', 'namaMK', 'sks', 'namaDosen', 'status_terbuka'
              , 'angkatan', 'term.term', 'program_studi', 'ruang', 'hari'
              , 'jam', 'dosen_kelas.id_kelas', 'kelas.id'
              , 'dosen.id', 'dosen_kelas.id_dosen'
              , 'term.id', 'kelas.id_term', 'course.id'
              , 'studi_program.id', 'kelas.id_program_studi'])
              ->where([
                    ['kelas.id_term', '=', $idTerm],
                    ['kelas.status_terbuka', '=', 1],
                ])
              ->whereNotIn('kelas.id', $idClassesTaken)
              ->get();
        // $kelas = \app\course::select('*')
        //  ->where('program_studi', $biodata->id_program_studi)
        //  ->where('status_terbuka','terbuka')
        //  ->where('id_term',$idTerm)
        //  ->whereNotIn('id', $idClassesTaken)//menghindari menampilkan course yang sudah diambil
        //  ->get();

        return view('krsstudent', ['biodata'=>$biodata,'Classes'=>$possibleClasses]);
    }
}
