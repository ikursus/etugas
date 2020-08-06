@extends('layouts.app')

@section('header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/b-print-1.5.6/cr-1.5.0/r-2.2.2/sc-2.0.0/datatables.min.css"/>
@endsection

@section('content')

<div class="container">
        
<div class="row pt-4">

<div class="col-12">

<div class="card">
  <div class="card-header">Senarai Penempatan</div>
  <div class="card-body">

    @include('layouts.alerts')

    <p>
        <a href="{{ route('pentadbir.penempatan.create') }}" class="btn btn-primary">
            Tambah Penempatan
        </a>
    </p>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm table-hover" id="datatables-table">
            <thead class="table-light">
                <tr>
                    <th>BIL</th>
                    <th>KOD</th>
                    <th>NEGERI</th>
                    <th>BAHAGIAN</th>
                    <th>TINGKAT</th>
                    <th>UNIT</th>
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
            url: '{!! route('pentadbir.penempatan.datatables') !!}',
            type:'POST',
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'kod', name: 'kod' },
            { data: 'negeri', name: 'negeri' },
            { data: 'bahagian', name: 'bahagian' },
            { data: 'tingkat', name: 'tingkat' },
            { data: 'unit', name: 'unit' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ],
        'ordering': true,
        'info': true,
        'autoWidth': false,
        order: [[1, 'asc']],
    });
});
</script>
@endsection