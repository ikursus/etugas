@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    Selamat Datang {{ auth()->user()->name ?? null }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('layouts/alerts')

                    @if (auth()->user()->role == 'pentadbir')
                    <p>
                        <a href="{{ route('pentadbir.dashboard') }}" class="btn btn-primary btn-block">Bahagian Pentadbiran</a>
                    </p>
                    @endif
                    <p>
                        <a href="{{ route('laporan.index') }}" class="btn btn-success btn-block">Rekod Laporan Bertugas Peribadi</a>
                    </p>
                    <p>
                        <a href="{{ route('laporan.create') }}" class="btn btn-warning btn-block">Daftar Laporan Bertugas Baru</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
