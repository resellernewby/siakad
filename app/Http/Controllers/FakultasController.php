<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;
use DataTables;

class FakultasController extends Controller
{

    function json(){
        return Datatables::of(Fakultas::all())
            ->addColumn('action', function ($row) {
                $action  = '<a href="/fakultas/'.$row->kode_fakultas.'/edit" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $action .= \Form::open(['url'=>'/fakultas/'.$row->kode_fakultas,'method'=>'delete','style'=>'float:right']);
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
        return view('fakultas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fakultas.create');
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
            'kode_fakultas' => 'required|unique:fakultas|min:4',
            'nama_fakultas' => 'required|min:3'
        ]);

        $fakultas = New Fakultas();
        $fakultas->create($request->all());
        return redirect('/fakultas')->with('status','Data berhasil ditambahkan');
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
        $data['fakultas'] = Fakultas::where('kode_fakultas',$id)->first();
        return view('fakultas.edit',$data);
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
            'nama_fakultas' => 'required|min:3'
        ]);

        $fakultas = Fakultas::where('kode_fakultas',$id);
        $fakultas->update($request->except('_method','_token'));
        return redirect('/fakultas')->with('status','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fakultas = Fakultas::where('kode_fakultas', $id);
        $fakultas->delete();
        return redirect('/fakultas')->with('status','Data berhasil dihapus');
    }
}
