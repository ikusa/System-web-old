<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\Mahasiswa;
use app\User;

class PesertaController extends Controller
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
        $table = null;
        $search_param = $request->input('id', null);
        $name = \app\user::select('name')
                ->where('id', Auth::id())
                ->orderBy('id', 'desc')
                ->first();

        if (!empty($search_param)) {
            $table = \app\student_course::select('id_mahasiswa', 'id_kelas', 'nim', 'program_studi')
                 ->join('mahasiswa', 'mahasiswa.id', '=', 'student_course.id_mahasiswa')
                 ->join('studi_program', 'mahasiswa.id_program_studi', '=', 'studi_program.id')
                 ->where('id_kelas', $search_param)
                 ->get();
        }

        $course = \app\course::select('*')
               ->join('kelas', 'kelas.id_course', '=', 'course.id')
               ->where('kelas.id', $search_param)
               ->get();

        return view('peserta', ['table' => $table,'name'=>$name,'course'=>$course,'idKelas'=>$search_param]);
    }

    public function create(Request $request)
    {
        $term  = \app\term::select('*')
               ->get();
        $dosen = \app\Dosen::select('*')
               ->get();
        $name = \app\user::select('name')
               ->where('id', Auth::id())
               ->orderBy('id', 'desc')
               ->first();
        return view('insertcourse', ['name'=>$name,'dosen'=>$dosen,'term'=>$term]);
    }

    public function edit(Request $request)
    {
        $input = $request->all();
        $id = $request->input('id', null);
        unset($input['_token']);
        DB::table('mahasiswa')
            ->where('id', $id)
            ->update($input);
        return redirect()->action(
          'BiodataController@index',
          ['id' => $id]
      );
    }

    public function submit(Request $request)
    {
        $input = $request->except('_token', 'idKelas', 'banyakPeserta');
        $idKelas = intval($request->input('idKelas'));

        Log::info('Debug input: '.print_r($input, true));
        Log::info('Debug idkelas: '.$idKelas);

        foreach ($input as $key => $value) {
            $value = intval($value);

            Log::info('Debug idmhs: '.$value);
            Log::info('Debug idmhs type: '.gettype($value));

            /* Old ver with lookup from nim
            $idMahasiswa = \app\mahasiswa::select('mahasiswa.id')
                           ->where('mahasiswa.nim', $value)
                           ->first();

            $idMahasiswa = $idMahasiswa['id'];
            Log::info('Debug idmhs: '.$idMahasiswa);
            Log::info('Debug idmhs type: '.gettype($idMahasiswa));

            // Need confirmation for db model
            DB::table('student_course')->insert(
               ['id_mahasiswa' => $idMahasiswa, 'id_kelas' => $idKelas]
            );*/
        }
        return redirect()->action(
         'PesertaController@index',
          ['id' => $idKelas]
      );
    }
}
