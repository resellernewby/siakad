@extends('layouts.app')

@section('title','Input Data Kurikulum')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form method="POST" action="/kurikulum">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Nama Jurusan</label>

                            <div class="col-md-6">
                                {{ Form::select('kode_jurusan',$jurusan,null,['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Nama Matakuliah</label>

                            <div class="col-md-6">
                                {{ Form::select('kode_mk',$matakuliah,null,['class'=>'form-control'])}}
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Fakultas</label>

                            <div class="col-md-6">
                                {{ Form::select('kode_fakultas',$fakultas,null,['class'=>'form-control'])}}
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Semester</label>

                            <div class="col-md-6">
                                {{ Form::select('semester',['1'=>'SEMESTER 1','2'=>'SEMESTER 2','3'=>'SEMESTER 3','4'=>'SEMESTER 4','5'=>'SEMESTER 5','6'=>'SEMESTER 6','7'=>'SEMESTER 7','8'=>'SEMESTER 8'],null,['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Simpan',['class'=>'btn btn-primary'])}}
                                <a href="/kurikulum" class='btn btn-primary'>Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
