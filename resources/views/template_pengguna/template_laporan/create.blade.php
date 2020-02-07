@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Daftar Pengguna') }}</div>

                <div class="card-body">

                    @include('layouts/alerts')

                    <form method="POST" action="{{ route('laporan.store') }}">
                        @csrf

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
                                @foreach ($senarai_perkara as $perkara)
                                <tr>
                                    <td scope="row">{{ $perkara->id }}</td>
                                    <td>
                                        {{ $perkara->butiran }}
                                        <input type="hidden" name="perkara[]" value="{{ $perkara->id }}">
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="tandakan[{{ $perkara->id }}]" class="form-control @error('tandakan') is-invalid @enderror">
                                                <option value="">-- Sila Pilih --</option>
                                                <option value="YA">YA</option>
                                                <option value="TIDAK">TIDAK</option>
                                            </select>
                                            @error('tandakan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="catatan[{{ $perkara->id }}]" class="form-control @error('catatan') is-invalid @enderror">
                                            @error('catatan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>

                        <div class="card">
                            <div class="card-header">Catatan Tambahan</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <textarea name="catatan_tambahan" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('laporan.index') }}" class="btn btn-default">Kembali</a>
                                <button type="submit" class="btn btn-primary">
                                    Hantar
                                </button>
                            </div>
                        </div>
                        

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection