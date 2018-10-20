<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Matakuliah;
use App\Kurikulum;

class KurikulumController extends Controller
{
    public function index(Request $request)
    {
        $jurusan = $request->get('jurusan');

        $data['kurikulum'] = \DB::table('kurikulum')
                ->join('matakuliah','matakuliah.kode_mk','=','kurikulum.kode_mk')
                ->join('jurusan','jurusan.kode_jurusan','=','kurikulum.kode_jurusan')
                ->where('kurikulum.kode_jurusan',$jurusan)
                ->get();
        $data['jurusan'] = Jurusan::pluck('nama_jurusan','kode_jurusan');
        $data['jurusan_terpilih'] = $jurusan;
        return view('kurikulum.index',$data);
    }

    public function create()
    {
        $data['jurusan'] = Jurusan::pluck('nama_jurusan','kode_jurusan');
        $data['matakuliah'] = Matakuliah::pluck('nama_mk','kode_mk');
        return view('kurikulum.create',$data);
    }

    public function store(Request $request)
    {
        $kurikulum = New Kurikulum();
        $kurikulum->create($request->all());
        return redirect('/kurikulum')->with('status','Data berhasil ditambahkan');
    }

    public function destroy($id)
    {
       $kurikulum = Kurikulum::find($id);
       $kurikulum->delete();
       return redirect('/kurikulum')->with('status','Data berhasil dihapus');
    }
}
