<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\Mahasiswa;
use app\User;


class BiodataController extends Controller
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
    // acces /biodata?id=*
    public function index(Request $request)
    {
    $idArray =\app\mahasiswa::select('id')
             ->where('user_id', Auth::id())
             ->take(1)
             ->get();
    $id = $request->input('id', '*');

		$biodata = \app\mahasiswa::select('*')
             ->where('id', $id)
             ->orderBy('id', 'desc')
             ->take(1)
             ->get();
		return view('biodata',['biodata'=>$biodata]);
    }
    // acces /createbiodata
    public function create(Request $request)
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
  		return view('insertbiodata',['biodata'=>$biodata]);
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
    public function submitcreate(Request $request)
    {
      $input = $request->all();
      unset($input['_token']);
      $nama = $input['nama'];
      $email = $input['email'];
      $password = $input['password'];
      unset($input['password']);
      User::create([
          'name' => $nama,
          'email' => $email,
          'password' => bcrypt($password),
      ]);
      $id =\app\user::select('id')
               ->where('email', $email)
               ->take(1)
               ->get();
      $input['user_id'] = $id[0]->id;
      DB::table('mahasiswa')->insert($input);

      return redirect()->action('HomeController@index');
    }
}
