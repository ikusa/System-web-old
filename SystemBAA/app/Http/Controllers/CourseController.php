<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\Mahasiswa;
use app\User;


class CourseController extends Controller
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
       $table = \app\course::select('*')
                ->where($search_param,'like', '%'.$input.'%')
                ->get();
                Log::info('Special super debug:'.$table);
     }


     if ($search_param=='null') {
       $table = null;
       $dosen = null;

     }
         return view('course', ['table' => $table,'biodata'=>$biodata]);
     }

    public function create(Request $request)
    {

      $biodata = \app\user::select('name')
               ->where('id', Auth::id())
               ->orderBy('id', 'desc')
               ->take(1)
               ->get();
  		return view('insertcourse',['biodata'=>$biodata]);
    }

    public function edit(Request $request)
    {
      $id = $request->input('id');
      $biodata = \app\user::select('name')
                ->where('id', Auth::id())
                ->orderBy('id', 'desc')
                ->take(1)
                ->get();
       if ($id!='null') {
         $table = \app\course::select('*')
                  ->where('course.id',$id)
                  ->get();

                  Log::info('Special super debug:'.$table);
       }
       if ($id=='null') {
         $table = null;
         $dosen = null;

       }
       Log::info('Special super debug:'.$table);

      return view('editcourse', ['table' => $table,'biodata'=>$biodata]);
    }

    public function submitedit(Request $request)
    {

      $input = $request->all();
      $id = $input['id'];
      unset($input['_token']);
      unset($input['id']);
      DB::table('course')
            ->where('id', $id)
            ->update($input);

      return redirect()->action('HomeController@index');
    }
    public function submit(Request $request)
    {
      $input = $request->all();
      unset($input['_token']);
      DB::table('course')->insert($input);



      return redirect()->action('HomeController@index');
    }
}
