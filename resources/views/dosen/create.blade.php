@extends('layouts.app')

@section('title','Input Data Dosen')
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

                    <form method="POST" action="/dosen">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Kode Dosen</label>

                            <div class="col-md-6">
                                {{ Form::text('nidn',null,['class'=>'form-control','placeholder'=>'NIDN'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Nama Dosen</label>

                            <div class="col-md-6">
                                {{ Form::text('nama',null,['class'=>'form-control','placeholder'=>'Nama Lengkap Dosen'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">No Handphone</label>

                            <div class="col-md-6">
                                {{ Form::text('no_hp',null,['class'=>'form-control','placeholder'=>'No Handphone Aktif'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                {{ Form::text('email',null,['class'=>'form-control','placeholder'=>'Email Aktif'])}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Simpan',['class'=>'btn btn-primary'])}}
                                <a href="/dosen" class='btn btn-primary'>Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
