@extends('layouts.app')

@section('title','Input Data Jurusan')
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

                    <form method="POST" action="/jurusan">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Kode Jurusan</label>

                            <div class="col-md-6">
                                {{ Form::text('kode_jurusan',null,['class'=>'form-control','placeholder'=>'Kode Jurusan'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Nama Jurusan</label>

                            <div class="col-md-6">
                                {{ Form::text('nama_jurusan',null,['class'=>'form-control','placeholder'=>'Nama Jurusan'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Fakultas</label>

                            <div class="col-md-6">
                                {{ Form::select('kode_fakultas',$fakultas,null,['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Jenjang</label>

                            <div class="col-md-6">
                                {{ Form::select('jenjang',['d3'=>'D3','d4'=>'D4'],null,['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Simpan',['class'=>'btn btn-primary'])}}
                                <a href="/jurusan" class='btn btn-primary'>Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
