@extends('layouts.app')

@section('title','Fakultas')
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

                    <a href="/fakultas/create" class='btn btn-primary btn-sm'>Input Data Fakultas</a>
                    <hr>
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>Kode Fakultas</th>
                                <th>Nama Fakultas</th>
                                <th width='83'>Action</th>
                            </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/fakultas/json',
        columns: [
            { data: 'kode_fakultas', name: 'kode_fakultas' },
            { data: 'nama_fakultas', name: 'nama_fakultas' },
            { data: 'action' , name: 'action' }
        ]
    });
});
</script>
@endpush
