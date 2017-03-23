<?php

namespace app\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Mahasiswa;
use Illuminate\Support\Facades\Log;

use app\User_mahasiswa;
class script extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'script:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      {
        $MahasiswaArray =\app\mahasiswa::select('id','nama','email','nim')
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
                   ->take(1)
                   ->get();
          Log::info('Special super debug : '.$id);
          $user_id = $id[0]->id;
          DB::table('mahasiswa')
                ->where('email', $data->email)
                ->update(['user_id'=>$user_id]);
        }


          
      }
    }
}
