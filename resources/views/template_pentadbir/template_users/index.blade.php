@extends('layouts.app')

@section('header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-print-1.5.6/cr-1.5.0/r-2.2.2/sc-2.0.0/datatables.min.css"/>
@endsection

@section('content')

<div class="container">
        
<div class="row pt-4">

<div class="col-12">

<div class="card">
  <div class="card-header">Senarai Pengguna</div>
  <div class="card-body">

    @include('layouts.alerts')

    <p>
        <a href="{{ route('pentadbir.users.create') }}" class="btn btn-primary">
            Tambah User
        </a>
    </p>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm table-hover" id="datatables-table">
            <thead class="table-light">
                <tr>
                    <th>BIL</th>
                    <th>NAMA</th>
                    <th>NRIC</th>
                    <th>NO. STAF</th>
                    <th>EMAIL</th>
                    <th>TELEFON</th>
                    <th>JAWATAN</th>
                    <th>PENEMPATAN</th>
                    <th>ROLE</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>
        </table>
    </div><!-- /.table-responsive -->

  </div>
</div>
    
</div><!-- /.col -->

</div><!-- /.row -->

</div><!-- /.container -->
@endsection

@section('footer')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-print-1.5.6/cr-1.5.0/r-2.2.2/sc-2.0.0/datatables.min.js"></script>
<script>
$(function() {
    $('#datatables-table').DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 500,
        ajax: {
            url: '{!! route('pentadbir.users.datatables') !!}',
            type:'POST',
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'name', name: 'users.name' },
            { data: 'nric', name: 'users.nric' },
            { data: 'no_staf', name: 'users.no_staf' },
            { data: 'email', name: 'users.email' },
            { data: 'telefon', name: 'users.telefon' },
            { data: 'jawatan', name: 'users.jawatan' },
            { data: 'penempatan.bahagian', name: 'penempatan.bahagian' },
            { data: 'role', name: 'users.role' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ],
        'ordering': true,
        'info': true,
        'autoWidth': false,
        order: [[1, 'desc']],
    });
});
</script>
@endsection