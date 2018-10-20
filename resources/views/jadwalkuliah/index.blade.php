@extends('layouts.app')

@section('title','Jadwal Kuliah')
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

                    <div class="row">
                        <div class="col-md-4">
                            <table class="table table-bordered">
                                <tr>
                                  <td>Jurusan</td>
                                  <td>{{Form::select('jurusan',$jurusan,null,['class'=>'form-control'])}}</td>
                                </tr>
                                <tr>
                                  <td>Semester</td>
                                  <td>{{ Form::select('semester',['1'=>'SEMESTER 1','2'=>'SEMESTER 2','3'=>'SEMESTER 3','4'=>'SEMESTER 4','5'=>'SEMESTER 5','6'=>'SEMESTER 6','7'=>'SEMESTER 7','8'=>'SEMESTER 8'],null,['class'=>'form-control'])}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                      <a href="/jadwalkuliah/create" class="btn btn-primary btn-sm">Input Jadwal</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tr>
                                  <th>HARI</th><th>JAM</th><th>MATAKULIAH</th><th>DOSEN</th><th>RUANG</th>
                                </tr>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
