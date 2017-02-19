<?php

namespace app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use app\Mahasiswa;
use app\Course;
use Illuminate\Support\Facades\Log;
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
    $id = $request->cookie('id');
		$length=count($request->input());

    //loop insert array id_course ke table student_course
		for($i=1;$i<$length;$i++)
		{
      DB::table('student_course')->insert(
        ['id_mahasiswa' => $id, 'id_course' => $request->input('checkbox'.$i)]
      );

		}

		return redirect('krs');
    }

    public function coloumn(Request $request)
    {
      $email = $request->input('email');


      $table = \app\mahasiswa::select('*')
             ->where('email', $email)
             ->orderBy('id', 'desc')
             ->take(1)
             ->get();
        return $table ;
    }
}
