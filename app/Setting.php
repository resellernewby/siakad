<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    protected $fillable = ['nama_univ','email','web','no_telp','no_fax','alamat'];
}
