@extends('layouts.app')

@section('title','Setting Aplikasi')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                    {{Form::model($setting,['url'=>'setting','method'=>'PUT'])}}
                    {{-- <form method="POST" action="/setting"> --}}
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Nama Universitas</label>

                            <div class="col-md-6">
                                {{ Form::text('nama_univ',null,['class'=>'form-control','placeholder'=>'Nama Universitas'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Email & Web</label>

                            <div class="col-md-3">
                                {{ Form::text('email',null,['class'=>'form-control','placeholder'=>'Email'])}}
                            </div>
                            <div class="col-md-3">
                                {{ Form::text('web',null,['class'=>'form-control','placeholder'=>'Alamat Web'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Telp & Fax</label>

                            <div class="col-md-3">
                                {{ Form::text('no_telp',null,['class'=>'form-control','placeholder'=>'Nomor Telepon'])}}
                            </div>
                            <div class="col-md-3">
                                {{ Form::text('no_fax',null,['class'=>'form-control','placeholder'=>'Nomor Fax'])}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Alamat</label>

                            <div class="col-md-6">
                                {{ Form::text('alamat',null,['class'=>'form-control','placeholder'=>'Alamat Lokasi'])}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{ Form::submit('Update Data',['class'=>'btn btn-primary'])}}
                                {{-- <a href="/ruangan" class='btn btn-primary'>Kembali</a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
