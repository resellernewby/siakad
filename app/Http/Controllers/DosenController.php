<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use DataTables;

class DosenController extends Controller
{

    function json(){
        return Datatables::of(Dosen::all())
            ->addColumn('action', function ($row) {
                $action  = '<a href="/dosen/'.$row->nidn.'/edit" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $action .= \Form::open(['url'=>'/dosen/'.$row->nidn,'method'=>'delete','style'=>'float:right']);
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
        return view('dosen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.create');
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
            'nidn' => 'required|unique:dosen|min:4',
            'nama' => 'required|min:6',
            'no_hp' => 'required',
            'email' => 'required'
        ]);

        $dosen = New Dosen();
        $dosen->create($request->all());
        return redirect('/dosen')->with('status','Data berhasil ditambahkan');
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
        $data['dosen'] = Dosen::where('nidn',$id)->first();
        return view('dosen.edit',$data);
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
            'nama' => 'required|min:6',
            'no_hp' => 'required',
            'email' => 'required'
        ]);

        $Dosen = Dosen::where('nidn',$id);
        $Dosen->update($request->except('_method','_token'));
        return redirect('/dosen')->with('status','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::where('nidn', $id);
        $dosen->delete();
        return redirect('/dosen')->with('status','Data berhasil dihapus');
    }
}
