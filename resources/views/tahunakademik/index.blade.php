@extends('layouts.app')

@section('title','Tahun Akademik')
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

                    <a href="/tahunakademik/create" class='btn btn-primary btn-sm'>Input Data Tahun Akademik</a>
                    <hr>
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>Kode Tahun Akademik</th>
                                <th>Tahun Akademik</th>
                                <th>Status</th>
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
        ajax: '/tahunakademik/json',
        columns: [
            { data: 'kode_tahunakademik', name: 'kode_tahunakademik' },
            { data: 'tahunakademik', name: 'tahunakademik' },
            { data: 'status', name: 'status'},
            { data: 'action' , name: 'action' }
        ]
    });
});
</script>
@endpush
