<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    protected $table = 'tahunakademik';

    protected $fillable = ['kode_tahunakademik','tahunakademik','status'];

    public function getStatusAttribute($value)
    {
      return $value=='Y'?'AKTIF':'TIDAK AKTIF';
    }
}
