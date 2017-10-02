<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\Mahasiswa;
use app\User;


class APIController extends Controller
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

    public function cekNIM(Request $request)
    {
        $listPeserta = [];

        $search_param = $request->except('_token', 'inputTambah', 'idKelas');

        if (!empty($search_param)) {
            foreach ($search_param as $key => $value) {
                Log::info("Key = ".$key);
                Log::info("Value = ".$value);

                $peserta = \app\mahasiswa::select('mahasiswa.id', 'nim', 'program_studi', 'nama')

                       ->join('studi_program', 'mahasiswa.id_program_studi', '=', 'studi_program.id')
                       ->where('mahasiswa.nim', $value)
                       ->first();

                //Log::info("Peser ". print_r($peserta,true));

                // Try slicing the key for easier response handling later.
                // Omitting 'nim' in the key.
                $i = substr($key, 3);
                Log::info("Keypot = ".$i);

                if (count($peserta)) {
                    $listPeserta[$i] = $peserta;
                    $listPeserta[$i]['doesExist'] = true;
                    //Log::info("Ada gan, si ". print_r($peserta,true));
                } else {
                    $listPeserta[$i]['nim'] = $value;
                    $listPeserta[$i]['doesExist'] = false;
                    Log::info("Kosong gan");
                }
            }
        } else {
            $listPeserta = null;
        }

        return response()->json(['result' => $listPeserta]);
    }

}
