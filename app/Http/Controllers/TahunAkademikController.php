<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TahunAkademik;
use DataTables;

class TahunAkademikController extends Controller
{
  function json(){
      return Datatables::of(TahunAkademik::all())
          ->addColumn('action', function ($row) {
              $action  = '<a href="/tahunakademik/'.$row->kode_tahunakademik.'/edit" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
              $action .= \Form::open(['url'=>'/tahunakademik/'.$row->kode_tahunakademik,'method'=>'delete','style'=>'float:right']);
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
      return view('tahunakademik.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('tahunakademik.create');
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
          'kode_tahunakademik' => 'required|unique:tahunakademik|min:4',
          'tahunakademik' => 'required|min:4'
      ]);

      $tahunakademik = New TahunAkademik();
      $tahunakademik->create($request->all());
      return redirect('/tahunakademik')->with('status','Data berhasil ditambahkan');
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
      $data['tahunakademik'] = TahunAkademik::where('kode_tahunakademik',$id)->first();
      return view('tahunakademik.edit',$data);
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
          'tahunakademik' => 'required|min:3'
      ]);

      $tahunakademik = TahunAkademik::where('kode_tahunakademik',$id);
      $tahunakademik->update($request->except('_method','_token'));
      return redirect('/tahunakademik')->with('status','Data berhasil diupdate');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $tahunakademik = TahunAkademik::where('kode_tahunakademik', $id);
      $tahunakademik->delete();
      return redirect('/tahunakademik')->with('status','Data berhasil dihapus');
  }
}
