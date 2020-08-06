@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    Selamat Datang Pentadbir, {{ auth()->user()->name ?? null }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('layouts/alerts')

                    <p>
                        <a href="{{ route('pentadbir.laporan.index') }}" class="btn btn-success btn-block">Rekod Laporan Pegawai Bertugas</a>
                    </p>
                    <p>
                        <a href="{{ route('pentadbir.users.index') }}" class="btn btn-primary btn-block">Senarai Akaun Pengguna</a>
                    </p>
                    <p>
                        <a href="{{ route('pentadbir.perkara.index') }}" class="btn btn-warning btn-block">Senarai Perkara Laporan</a>
                    </p>
                    <p>
                        <a href="{{ route('pentadbir.penempatan.index') }}" class="btn btn-info btn-block">Senarai Penempatan</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
