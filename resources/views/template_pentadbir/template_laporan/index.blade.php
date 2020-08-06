
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
        <a href="{{ route('pentadbir.laporan.create') }}" class="btn btn-primary">
            Hantar Laporan
        </a>
        <a href="{{ route('pentadbir.export.laporan') }}" class="btn btn-success">
            Export Laporan
        </a>
    </p>

    <form method="GET" action="{{ route('pentadbir.laporan.index') }}">

    <div class="row">
        <div class="col-4">
            <select name="year" class="form-control">
                <option value="">-- Sila Pilih Tahun --</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
        </div>
        
        <div class="col-4">

            <select name="month" class="form-control">
                <option value="">-- Sila Pilih Bulan --</option>
                <option value="01">Jan</option>
                <option value="02">Feb</option>
                <option value="03">Mac</option>
                <option value="04">Apr</option>
                <option value="05">Mei</option>
                <option value="06">Jun</option>
                <option value="07">Jul</option>
                <option value="08">Ogo</option>
                <option value="09">Sep</option>
                <option value="10">Okt</option>
                <option value="11">Nov</option>
                <option value="12">Dis</option>
            </select>
            
        </div>
        
        <div class="col-4">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </div>

    </form>

    <hr>
  
    @if (!is_null($senarai_laporan))
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
                    <a href="{{ route('pentadbir.laporan.show', $laporan->id) }}" class="btn btn-info">
                        Lihat Detail
                    </a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $laporan->id }}">
                        Delete
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modal-delete-{{ $laporan->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">

                            <form method="POST" action="{{ route('pentadbir.laporan.destroy', $laporan->id) }}}}">
                                @csrf
                                @method('DELETE')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            Adakah anda pasti ingin menghapuskan rekod laporan bertarikh {{ $laporan->created_at }}?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $senarai_laporan->links() !!}
    @else
    <div class="alert alert-info">Sila filter dahulu</div>
    @endif
    {{-- Comment Dalam Blade --}}

  </div>
</div>
    
</div><!-- /.col -->

</div><!-- /.row -->

</div><!-- /.container -->
@endsection