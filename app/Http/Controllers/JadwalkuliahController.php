<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;

class JadwalkuliahController extends Controller
{
    public function index()
    {
        $data['jurusan'] = Jurusan::pluck('nama_jurusan','kode_jurusan');
        return view('jadwalkuliah.index',$data);
    }
}
