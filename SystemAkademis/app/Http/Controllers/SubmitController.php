<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use app\course;
use app\mahasiswa;

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
        $id = \app\mahasiswa::select('id')
          ->where('user_id', Auth::id())
          ->first()->id;

        $length=count($request->input('checkbox'));
        Log::info("Leng = ".$length);

        //input array id krs ke variable idkrs
        $idClasses = $request->input('checkbox');
        Log::info("Classes = ".print_r($idClasses));
        //loop insert array id_course ke table student_course
        for ($i=0;$i<$length;$i++) {
            Log::info("Classes ".$i." = ".$idClasses[$i]);
            DB::table('student_course')->insert(
              ['id_mahasiswa' => $id, 'id_kelas' => $idClasses[$i]]
            );
        }
        return redirect('krs');
    }

    public function submit(Request $request)
    {
        $id = \app\mahasiswa::select('id')
          ->where('user_id', Auth::id())
          ->first()->id;

        $id_krs = $request->input('data');
        for ($i=0; $i < sizeof($id_krs) ; $i++) {
            //update final krs
            DB::table('student_course')
            ->where('id', $id_krs[$i])
            ->update(['final'=>1]);
            //create di nilai dengan value kosong
            $id_course =\app\student_course::select('id_course')
               ->where('id', $id_krs[$i])
               ->first();
            for ($j=1; $j <9 ; $j++) {
                DB::table('nilai')->insert(
            ['id_mahasiswa' => $id, 'id_course' => $id_course->id_course,'id_tipenilai'=>$j]
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
