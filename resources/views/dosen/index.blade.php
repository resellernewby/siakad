@extends('layouts.app')

@section('title','Dosen')
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

                    <a href="/dosen/create" class='btn btn-primary btn-sm'>Input Data Dosen</a>
                    <hr>
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>NIDN</th>
                                <th>Nama Dosen</th>
                                <th>No Handphone</th>
                                <th>Email</th>
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
        ajax: '/dosen/json',
        columns: [
            { data: 'nidn', name: 'nidn' },
            { data: 'nama', name: 'nama' },
            { data: 'no_hp', name: 'no_hp' },
            { data: 'email', name: 'email'},
            { data: 'action' , name: 'action' }
        ]
    });
});
</script>
@endpush
