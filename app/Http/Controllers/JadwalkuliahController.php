<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Matakuliah;
use App\Dosen;
use App\Ruangan;
use App\Jam;

class JadwalkuliahController extends Controller
{
    public function index()
    {
        $data['jurusan'] = Jurusan::pluck('nama_jurusan','kode_jurusan');
        return view('jadwalkuliah.index',$data);
    }

    public function create()
    {
        $data['jurusan'] = Jurusan::pluck('nama_jurusan','kode_jurusan');
        $data['matakuliah'] = Matakuliah::pluck('nama_mk','kode_mk');
        $data['dosen'] = Dosen::pluck('nama','nidn');
        $data['ruangan'] = Ruangan::pluck('nama_ruangan','kode_ruangan');
        $data['jam'] = Jam::pluck('jam','id');
        $data['hari'] = ['senin'=>'senin','selasa'=>'selasa'];
        return view('jadwalkuliah.create',$data);
    }
}
