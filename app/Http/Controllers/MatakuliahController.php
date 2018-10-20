<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matakuliah;
use DataTables;

class MatakuliahController extends Controller
{

    function json(){
        return Datatables::of(Matakuliah::all())
            ->addColumn('action', function ($row) {
                $action  = '<a href="/matakuliah/'.$row->kode_mk.'/edit" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $action .= \Form::open(['url'=>'/matakuliah/'.$row->kode_mk,'method'=>'delete','style'=>'float:right']);
                $action .= "<button type='submit' class='btn btn-primary btn-sm'>Hapus</button>";
                $action .= \Form::close();
                return $action;
            })
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('matakuliah.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:matakuliah|min:4',
            'nama_mk' => 'required|min:6',
            'jml_sks' => 'required'
        ]);

        $matakuliah = New Matakuliah();
        $matakuliah->create($request->all());
        return redirect('/matakuliah')->with('status','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['matakuliah'] = Matakuliah::where('kode_mk',$id)->first();
        return view('matakuliah.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([            
            'nama_mk' => 'required|min:6',
            'jml_sks' => 'required'
        ]);

        $matakuliah = Matakuliah::where('kode_mk',$id);
        $matakuliah->update($request->except('_method','_token'));
        return redirect('/matakuliah')->with('status','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matakuliah = Matakuliah::where('kode_mk', $id);
        $matakuliah->delete();
        return redirect('/matakuliah')->with('status','Data berhasil dihapus');
    }
}
