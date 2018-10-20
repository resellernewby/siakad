@extends('layouts.app')

@section('title','Kurikulum')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{Form::open(['url'=>'/kurikulum','method'=>'GET'])}}
                    <table class="table table-bordered">
                      <tr>
                        <td>Jurusan</td>
                        <td>{{ Form::select('jurusan',$jurusan,$jurusan_terpilih,['class'=>'form-control'])}}</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <button type="submit" class="btn btn-primary btn-sm">Refresh Data</button>
                          <a href="/kurikulum/create" class='btn btn-primary btn-sm'>Input Data Baru</a>
                        </td>
                      </tr>
                    </table>
                    {{Form::close()}}

                    {{-- <a href="/jurusan/create" class='btn btn-primary btn-sm'>Input Data Jurusan</a> --}}
                    <hr>
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>Kode Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>Jumlah SKS</th>
                                <th>Semester</th>
                                <th width='83'>Action</th>
                            </tr>

                            @foreach ($kurikulum as $row)
                              <tr>
                                <td>{{$row->kode_mk}}</td>
                                <td>{{$row->nama_mk}}</td>
                                <td>{{$row->jml_sks}}</td>
                                <td>{{$row->semester}}</td>
                                <td>
                                  {{ Form::open(['url'=>'/kurikulum/'.$row->id,'method'=>'delete'])}}
                                    <button type="submit" class='btn btn-primary btn-sm'>Hapus</button>
                                  {{ Form::close()}}
                                </td>
                              </tr>
                            @endforeach
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
