<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    //
    protected $table = 'mahasiswa';
    protected $guarded = ['id'];
    protected $fillable=['angkatan'];
    public $timestamps = false;
}
