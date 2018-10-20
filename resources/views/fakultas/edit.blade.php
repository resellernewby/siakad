@extends('layouts.app')

@section('title','Ubah Data Fakultas')
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

                    {{Form::model($fakultas,['url'=>'/fakultas/'.$fakultas->kode_fakultas,'method'=>'PUT'])}}
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Kode Fakultas</label>

                            <div class="col-md-6">
                                {{ Form::text('kode_fakultas',null,['class'=>'form-control','placeholder'=>'Kode Fakultas'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Nama Fakultas</label>

                            <div class="col-md-6">
                                {{ Form::text('nama_fakultas',null,['class'=>'form-control','placeholder'=>'Nama Fakultas'])}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Simpan',['class'=>'btn btn-primary'])}}
                                <a href="/fakultas" class='btn btn-primary'>Kembali</a>
                            </div>
                        </div>
                    {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
