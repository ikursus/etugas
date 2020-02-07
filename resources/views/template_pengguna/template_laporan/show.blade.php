@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Maklumat Laporan {{ auth()->user()->name }}</div>

                <div class="card-body">

                    @include('layouts/alerts')

                        <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>PERKARA</th>
                                    <th>TANDAKAN</th>
                                    <th>CATATAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan->details as $detail)
                                <tr>
                                    <td scope="row">{{ $detail->perkara_id }}</td>
                                    <td>
                                        {{ $detail->perkara->butiran }}
                                        
                                    </td>
                                    <td>
                                        {{ $detail->tandakan }}
                                    </td>
                                    <td>
                                        {{ $detail->catatan }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>

                        <div class="card">
                            <div class="card-header">Catatan Tambahan</div>
                            <div class="card-body">
                                {{ $laporan->catatan_tambahan }}
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('laporan.index') }}" class="btn btn-default">Kembali</a>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection