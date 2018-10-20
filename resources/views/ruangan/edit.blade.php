@extends('layouts.app')

@section('title','Ubah Data Ruangan')
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

                    {{Form::model($ruangan,['url'=>'/ruangan/'.$ruangan->kode_ruangan,'method'=>'PUT'])}}
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Kode Ruangan</label>

                            <div class="col-md-6">
                                {{ Form::text('kode_ruangan',null,['class'=>'form-control','placeholder'=>'Kode Ruangan'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Nama Ruangan</label>

                            <div class="col-md-6">
                                {{ Form::text('nama_ruangan',null,['class'=>'form-control','placeholder'=>'Nama Ruangan'])}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Simpan',['class'=>'btn btn-primary'])}}
                                <a href="/ruangan" class='btn btn-primary'>Kembali</a>
                            </div>
                        </div>
                    {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
