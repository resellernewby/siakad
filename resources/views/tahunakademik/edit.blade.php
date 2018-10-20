@extends('layouts.app')

@section('title','Ubah Data Tahun Akademik')
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

                    {{Form::model($tahunakademik,['url'=>'/tahunakademik/'.$tahunakademik->kode_tahunakademik,'method'=>'PUT'])}}
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Kode Tahun Akademik</label>

                            <div class="col-md-6">
                                {{ Form::text('kode_tahunakademik',null,['class'=>'form-control','placeholder'=>'Kode TahunAkademik'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Tahun Akademik</label>

                            <div class="col-md-6">
                                {{ Form::text('tahunakademik',null,['class'=>'form-control','placeholder'=>'Tahun Akademik'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Status</label>

                            <div class="col-md-6">
                                {{ Form::select('status',['Y'=>'AKTIF','N'=>'TIDAK AKTIF'],null,['class'=>'form-control'])}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Simpan',['class'=>'btn btn-primary'])}}
                                <a href="/tahunakademik" class='btn btn-primary'>Kembali</a>
                            </div>
                        </div>
                    {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
