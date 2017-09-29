<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\Mahasiswa;
use app\User;

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
        $search_param = $request->input('search_param', null);
        $input= $request->input('x', null);
        $name = \app\user::select('name')
              ->where('id', Auth::id())
              ->orderBy('id', 'desc')
              ->first();
        if (!empty($search_param)) {
            $table = \app\kelas::select('namaMK', 'kodeMK', 'sks', 'kelas.*', 'term')
                ->join('course', 'course.id', '=', 'kelas.id_course')
                ->join('term', 'term.id', '=', 'kelas.id_term')
                ->where($search_param, 'like', '%'.$input.'%')
                ->get();

            Log::info('Special super debug:'.$table);

            foreach ($table as $key => $value) {
                # code...
                $value['dosen'] = DB::table('dosen_kelas')->select('*')
                ->join('dosen', 'dosen.id', '=', 'dosen_kelas.id_dosen')
                ->where('id_kelas', $value['id'])
                ->get();
            }
        } else {
            $table = null;
            $dosen = null;
        }
        return view('kelas', ['table' => $table,'name'=>$name]);
    }

    public function create(Request $request)
    {
        $course = \app\course::select('*')
                ->get();
        $term  = \app\term::select('*')
               ->get();
        $dosen = \app\dosen::select('*')
               ->get();
        $name = \app\user::select('name')
               ->where('id', Auth::id())
               ->orderBy('id', 'desc')
               ->take(1)
               ->get();
        $program_studi = \app\program_studi::select('*')
                     ->get();
        Log::info('Special super debug:'.$course);
        Log::info('Special super debug:'.$term);
        return view('insertkelas', ['name'=>$name,'dosen'=>$dosen,'course'=>$course,'program_studi'=>$program_studi,'term'=>$term]);
    }

    public function edit(Request $request)
    {
        $id = $request->input('id', null);
        $name = \app\user::select('name')
                ->where('id', Auth::id())
                ->orderBy('id', 'desc')
                ->first();
        $term  = \app\term::select('*')
               ->get();
        $course  = \app\course::select('*')
               ->get();
        $dosen = \app\dosen::select('*')
               ->get();
        $program_studi = \app\program_studi::select('*')
                     ->get();
        if (!empty($id)) {
            $table = \app\kelas::select('namaMK', 'kodeMK', 'sks', 'kelas.*', 'term')
                  ->join('course', 'course.id', '=', 'kelas.id_course')
                  ->join('term', 'term.id', '=', 'kelas.id_term')
                  ->where('kelas.id', $id)
                  ->get();

            Log::info('Special super debug:'.$table);

            foreach ($table as $key => $value) {
                # code...
                $array_push= DB::table('dosen_kelas')->select('dosen.id')
                  ->join('dosen', 'dosen.id', '=', 'dosen_kelas.id_dosen')
                  ->where('id_kelas', $value['id'])
                  ->get();
                $test=[];//temporary array
                foreach ($array_push as $data) {
                    array_push($test, $data->id);
                }
                $value['dosen']=$test;
            }
        } else {
            $table = null;
            $dosen = null;
        }
        Log::info('Special super debug:'.$table);

        return view('editkelas', ['course'=>$course,'table' => $table,'name'=>$name,'dosen'=>$dosen,'program_studi'=>$program_studi,'term'=>$term]);
    }

    public function submitedit(Request $request)
    {
        $input = $request->all();
        $id = $input['id'];
        $array_dosen = $input['id_dosen'];
        unset($input['_token']);
        unset($input['id']);
        unset($input['id_dosen']);
        DB::table('kelas')
            ->where('id', $id)
            ->update($input);
        DB::table('dosen_kelas')->where('id_kelas', $id)->delete();
        foreach ($array_dosen as $value) {
            DB::table('dosen_kelas')->insert(['id_kelas'=>$id,'id_dosen'=>$value]);
        }
        Log::info('Special super debug:'.print_r($array_dosen, true));

        return redirect()->action('HomeController@index');
    }
    public function submit(Request $request)
    {
        $input = $request->all();
        $array_dosen = $input['id_dosen'];
        unset($input['_token']);
        unset($input['id_dosen']);
        $id=DB::table('kelas')->insertGetId($input);
        foreach ($array_dosen as $value) {
            DB::table('dosen_kelas')->insert(['id_kelas'=>$id,'id_dosen'=>$value]);
        }
        Log::info('Special super debug:'.print_r($array_dosen, true));

        return redirect()->action('HomeController@index');
    }
}
