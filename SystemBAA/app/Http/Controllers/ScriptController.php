<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Mahasiswa;
use Illuminate\Support\Facades\Log;

use app\User_mahasiswa;

class ScriptController extends Controller
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
        $MahasiswaArray =\app\mahasiswa::select('id', 'nama', 'email', 'nim')
                      ->get();
        foreach ($MahasiswaArray as $data) {
            # code...
            ini_set('max_execution_time', 3000);
            User_mahasiswa::create([
            'name' => $data->nama,
            'email' => $data->email,
            'password' => bcrypt($data->email),
        ]);
            $id =\app\user_mahasiswa::select('id')
                 ->where('email', $data->email)
                 ->first();
            Log::info('Special super debug : '.$id);
            $user_id = $id->id;
            DB::table('mahasiswa')
              ->where('email', $data->email)
              ->update(['user_id'=>$user_id]);
        }

        return 'succes';
    }
}
