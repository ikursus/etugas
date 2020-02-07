
@extends('layouts.app')

@section('content')

<div class="container">
        
<div class="row pt-4">

<div class="col-12">

<div class="card">
  <div class="card-header">Senarai Laporan</div>
  <div class="card-body">

    @include('layouts.alerts')

    <p>
        <a href="{{ route('laporan.create') }}" class="btn btn-primary">
            Hantar Laporan
        </a>
    </p>
  
  <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>PETUGAS</th>
                <th>PENEMPATAN</th>
                <th>CATATAN</th>
                <th>TARIKH</th>
                <th>TINDAKAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach($senarai_laporan as $laporan)
            <tr>
                <td scope="row">{{ $laporan->id }}</td>
                <td>{{ $laporan->user->name }}</td>
                <td>{{ $laporan->penempatan->kod }}</td>
                <td>{{ $laporan->catatan_tambahan }}</td>
                <td>{{ $laporan->created_at }}</td>
                <td>
                    <a href="{{ route('laporan.show', $laporan->id) }}" class="btn btn-info">
                        Lihat Detail
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Comment Dalam Blade --}}

    {!! $senarai_laporan->links() !!}

  </div>
</div>
    
</div><!-- /.col -->

</div><!-- /.row -->

</div><!-- /.container -->
@endsection