<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;
use DataTables;

class RuanganController extends Controller
{
  function json(){
      return Datatables::of(Ruangan::all())
          ->addColumn('action', function ($row) {
              $action  = '<a href="/ruangan/'.$row->kode_ruangan.'/edit" class="btn btn-xs btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
              $action .= \Form::open(['url'=>'/ruangan/'.$row->kode_ruangan,'method'=>'delete','style'=>'float:right']);
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
      return view('ruangan.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('ruangan.create');
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
          'kode_ruangan' => 'required|unique:ruangan|min:4',
          'nama_ruangan' => 'required|min:3'
      ]);

      $ruangan = New Ruangan();
      $ruangan->create($request->all());
      return redirect('/ruangan')->with('status','Data berhasil ditambahkan');
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
      $data['ruangan'] = Ruangan::where('kode_ruangan',$id)->first();
      return view('ruangan.edit',$data);
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
          'nama_ruangan' => 'required|min:3'
      ]);

      $ruangan = Ruangan::where('kode_ruangan',$id);
      $ruangan->update($request->except('_method','_token'));
      return redirect('/ruangan')->with('status','Data berhasil diupdate');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $ruangan = Ruangan::where('kode_ruangan', $id);
      $ruangan->delete();
      return redirect('/ruangan')->with('status','Data berhasil dihapus');
  }
}
