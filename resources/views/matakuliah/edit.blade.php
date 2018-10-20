@extends('layouts.app')

@section('title','Ubah Data Matakuliah')
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
                
                    {{Form::model($matakuliah,['url'=>'/matakuliah/'.$matakuliah->kode_mk,'method'=>'PUT'])}}
                        @csrf                        

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Kode Matakuliah</label>

                            <div class="col-md-6">
                                {{ Form::text('kode_mk',null,['class'=>'form-control','placeholder'=>'Kode Matakuliah'])}}  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Nama Matakuliah</label>

                            <div class="col-md-6">
                                {{ Form::text('nama_mk',null,['class'=>'form-control','placeholder'=>'Nama Matakuliah'])}}  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Jumlah SKS</label>

                            <div class="col-md-6">
                                {{ Form::text('jml_sks',null,['class'=>'form-control','placeholder'=>'Jumlah SKS'])}}  
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Simpan',['class'=>'btn btn-primary'])}}
                                <a href="/matakuliah" class='btn btn-primary'>Kembali</a>                                
                            </div>
                        </div>
                    {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
