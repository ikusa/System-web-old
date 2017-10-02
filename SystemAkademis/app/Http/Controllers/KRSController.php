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
        $biodata = \app\mahasiswa::select('user_id', 'mahasiswa.id', 'nama', 'nim', 'program_studi', 'status_krs')
            ->join('studi_program', 'studi_program.id', '=', 'mahasiswa.id_program_studi')
            ->where('user_id', Auth::id())
            ->first();
        $id = $biodata->id;
        Log::info("ID = ".$id);

        /*SELECT kodeMK, namaMK, sks, nama, status_terbuka
        FROM student_course
        INNER JOIN course ON course.id = student_course.id_course
        INNER JOIN dosen_kelas on dosen_kelas.id_kelas = student_course.id_kelas
        INNER JOIN dosen ON dosen.id = dosen_kelas.id_dosen
        WHERE id_mahasiswa = 1*/
        $KRS = DB::table('student_course')
                  ->join('kelas', 'kelas.id', '=', 'student_course.id_kelas')
                  ->join('dosen_kelas', 'dosen_kelas.id_kelas', '=', 'kelas.id')
                  ->join('dosen', 'dosen.id', '=', 'dosen_kelas.id_dosen')
                  ->join('term', 'term.id', '=', 'kelas.id_term')
                  ->join('course', 'course.id', '=', 'kelas.id_course')
                  ->join('studi_program', 'studi_program.id', '=', 'kelas.id_program_studi')
                  ->select('kodeMK', 'namaMK', 'sks', 'namaDosen', 'status_terbuka')
                  ->where([
                        ['term.current', '=', 1],
                        ['student_course.id_mahasiswa', '=', $id],
                    ])
                  ->get();
        //       ->select('student_course.id', 'kodeMK', 'namaMK', 'sks', 'dosen', 'status_terbuka')
        //       ->where('id_mahasiswa', $id)
        //       ->get();
        Log::info("Classes = ".$biodata);

        return view('krs', ['biodata'=>$biodata,'classesTaken'=>$KRS]);
    }
    public function delete(Request $request)
    {
        $idstudent_course = $request->input('subject');
        DB::table('student_course')->where('id', '=', $idstudent_course)->delete();

        return redirect('/krs');
    }
}
