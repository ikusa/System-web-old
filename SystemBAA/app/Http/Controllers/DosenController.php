<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\Mahasiswa;
use app\User;


class DosenController extends Controller
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


    $name = \app\user::select('name')
             ->where('id', Auth::id())
             ->orderBy('id', 'desc')
             ->take(1)
             ->get();
		return view('name',['name'=>$name]);
    }

    public function create(Request $request)
    {

      $program_studi = \app\program_studi::select('*')
                       ->get();
      $name = \app\user::select('name')
               ->where('id', Auth::id())
               ->orderBy('id', 'desc')
               ->take(1)
               ->get();
  		return view('insertdosen',['name'=>$name,'program_studi'=>$program_studi]);
    }

    public function edit(Request $request)
    {
      $input = $request->all();
      $id = $request->input('id');
      unset($input['_token']);
      DB::table('mahasiswa')
            ->where('id', $id)
            ->update($input);
      return redirect()->action(
          'BiodataController@index', ['id' => $id]
      );
    }
    public function submit(Request $request)
    {
      $input = $request->all();
      unset($input['_token']);
      if ($input['email'] == null) {
        # code...

      }

      DB::table('dosen')->insert($input);

      return redirect()->action('HomeController@index');
    }
}
