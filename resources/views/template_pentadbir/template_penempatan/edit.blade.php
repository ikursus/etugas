@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rekod Penempatan</div>

                <div class="card-body">

                    @include('layouts/alerts')

                    <form method="POST" action="{{ route('pentadbir.penempatan.update', $penempatan->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="kod" class="col-md-4 col-form-label text-md-right">Kod</label>

                            <div class="col-md-6">
                                <input id="kod" type="text" class="form-control @error('kod') is-invalid @enderror" name="kod" value="{{ $penempatan->kod}}" required autocomplete="kod" autofocus>

                                @error('kod')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="negeri" class="col-md-4 col-form-label text-md-right">Negeri</label>

                            <div class="col-md-6">
                                <input id="negeri" type="text" class="form-control @error('negeri') is-invalid @enderror" name="negeri" value="{{ $penempatan->negeri}}" required autocomplete="negeri" autofocus>

                                @error('negeri')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bahagian" class="col-md-4 col-form-label text-md-right">Bahagian</label>

                            <div class="col-md-6">
                                <input id="bahagian" type="text" class="form-control @error('bahagian') is-invalid @enderror" name="bahagian" value="{{ $penempatan->bahagian}}" required autocomplete="bahagian" autofocus>

                                @error('bahagian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tingkat" class="col-md-4 col-form-label text-md-right">Tingkat</label>

                            <div class="col-md-6">
                                <input id="tingkat" type="text" class="form-control @error('tingkat') is-invalid @enderror" name="tingkat" value="{{ $penempatan->tingkat}}" required autocomplete="tingkat" autofocus>

                                @error('tingkat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="unit" class="col-md-4 col-form-label text-md-right">Unit</label>

                            <div class="col-md-6">
                                <input id="unit" type="text" class="form-control @error('unit') is-invalid @enderror" name="unit" value="{{ $penempatan->unit}}" autocomplete="unit" autofocus>

                                @error('unit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
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