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

     $search_param = $request->input('search_param', 'null');
     $input= $request->input('x','null');
 		$biodata = \app\user::select('name')
              ->where('id', Auth::id())
              ->orderBy('id', 'desc')
              ->take(1)
              ->get();
     if ($search_param!='null') {
       $table = \app\course::select('course.*','term')
                ->join('term', 'term.id', '=', 'course.id_term')
                ->where($search_param,'like', '%'.$input.'%')
                ->get();

                Log::info('Special super debug:'.$table);

       foreach ($table as $key => $value) {
         # code...
         $value['dosen'] = DB::table('dosen_course')->select('*')
                ->join('dosen', 'dosen.id', '=', 'dosen_course.id_dosen')
                ->where('id_course',$value['id'])
                ->get();
       }


     }


     if ($search_param=='null') {
       $table = null;
       $dosen = null;

     }
         return view('course', ['table' => $table,'biodata'=>$biodata]);
     }

    public function create(Request $request)
    {

      $term  = \app\term::select('*')
               ->get();
      $dosen = \app\dosen::select('*')
               ->get();
      $biodata = \app\user::select('name')
               ->where('id', Auth::id())
               ->orderBy('id', 'desc')
               ->take(1)
               ->get();
      $program_studi = \app\program_studi::select('*')
                     ->get();
  		return view('insertcourse',['biodata'=>$biodata,'dosen'=>$dosen,'program_studi'=>$program_studi,'term'=>$term]);
    }

    public function edit(Request $request)
    {
      $id = $request->input('id');
      $biodata = \app\user::select('name')
                ->where('id', Auth::id())
                ->orderBy('id', 'desc')
                ->take(1)
                ->get();
      $term  = \app\term::select('*')
               ->get();
      $dosen = \app\dosen::select('*')
               ->get();
      $program_studi = \app\program_studi::select('*')
                     ->get();
       if ($id!='null') {
         $table = \app\course::select('course.*','term')
                  ->join('term', 'term.id', '=', 'course.id_term')
                  ->where('course.id',$id)
                  ->get();

                  Log::info('Special super debug:'.$table);

         foreach ($table as $key => $value) {
           # code...
            $array_push= DB::table('dosen_course')->select('dosen.id')
                  ->join('dosen', 'dosen.id', '=', 'dosen_course.id_dosen')
                  ->where('id_course',$value['id'])
                  ->get();
            $test=[];
            foreach ($array_push as $data) {
              array_push($test,$data->id);
            }
            $value['dosen']=$test;
         }
       }
       if ($id=='null') {
         $table = null;
         $dosen = null;

       }
       Log::info('Special super debug:'.$table);

      return view('editcourse', ['table' => $table,'biodata'=>$biodata,'dosen'=>$dosen,'program_studi'=>$program_studi,'term'=>$term]);
    }

    public function submitedit(Request $request)
    {
    
      $input = $request->all();
      $id = $input['id'];
      $array_dosen = $input['id_dosen'];
      unset($input['_token']);
      unset($input['id']);
      unset($input['id_dosen']);
      DB::table('course')
            ->where('id', $id)
            ->update($input);
      DB::table('dosen_course')->where('id_course',$id)->delete();
      foreach ($array_dosen as $value) {
        DB::table('dosen_course')->insert(['id_course'=>$id,'id_dosen'=>$value]);
      }
      Log::info('Special super debug:'.print_r($array_dosen,true));

      return redirect()->action('HomeController@index');
    }
    public function submit(Request $request)
    {
      $input = $request->all();
      $array_dosen = $input['id_dosen'];
      unset($input['_token']);
      unset($input['id_dosen']);
      $id=DB::table('course')->insertGetId($input);
      foreach ($array_dosen as $value) {
        DB::table('dosen_course')->insert(['id_course'=>$id,'id_dosen'=>$value]);
      }
      Log::info('Special super debug:'.print_r($array_dosen,true));

      return redirect()->action('HomeController@index');
    }
}
