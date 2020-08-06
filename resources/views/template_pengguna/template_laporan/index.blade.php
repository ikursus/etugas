@extends('layouts.app')

@section('header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-print-1.5.6/cr-1.5.0/r-2.2.2/sc-2.0.0/datatables.min.css"/>
@endsection

@section('content')

<div class="container">
        
<div class="row pt-4">

<div class="col-12">

<div class="card">
  <div class="card-header">Senarai Laporan Bertugas {{ auth()->user()->name }}</div>
  <div class="card-body">

    @include('layouts.alerts')

    <p>
        <a href="{{ route('laporan.create') }}" class="btn btn-primary">
            Hantar Laporan
        </a>
    </p>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm table-hover" id="datatables-table">
            <thead class="table-light">
                <tr>
                    <th>BIL</th>
                    <th>TARIKH</th>
                    <th>PETUGAS</th>
                    <th>PENEMPATAN</th>
                    <th>CATATAN</th>
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
            url: '{!! route('laporan.datatables') !!}',
            type:'POST',
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'created_at', name: 'laporans.created_at' },
            { data: 'user.name', name: 'user.name' },
            { data: 'penempatan.bahagian', name: 'penempatan.bahagian' },
            { data: 'catatan_tambahan', name: 'laporans.catatan_tambahan' },
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