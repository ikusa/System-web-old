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
        $id =\app\mahasiswa::select('id')
             ->where('user_id', Auth::id())
             ->first();
        $id = $request->input('id', '*');

        $name = \app\user::select('name')
             ->where('id', Auth::id())
             ->orderBy('id', 'desc')
             ->first();
        $data = \app\mahasiswa::select('*')
             ->where('id', $id)
             ->orderBy('id', 'desc')
             ->first();
        return view('name', ['name'=>$name,'data'=>$data]);
    }
    // acces /createbiodata
    public function create(Request $request)
    {
        $id =\app\mahasiswa::select('id')
               ->where('user_id', Auth::id())
               ->first();
        $id->id;

        $name = \app\user::select('name')
               ->where('id', Auth::id())
               ->orderBy('id', 'desc')
               ->first();
        return view('insertbiodata', ['name'=>$name]);
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
          'BiodataController@index',
          ['id' => $id]
      );
    }
    public function submitcreate(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        $name = $input['nama'];
        $email = $input['email'];
        $password = $input['password'];
        unset($input['password']);
        User::create([
          'name' => $name,
          'email' => $email,
          'password' => bcrypt($password),
      ]);
        $id =\app\user::select('id')
               ->where('email', $email)
               ->first();
        $input['user_id'] = $id->id;
        DB::table('mahasiswa')->insert($input);

        return redirect()->action('HomeController@index');
    }
}
