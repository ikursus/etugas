@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rebutiran perkara</div>

                <div class="card-body">

                    @include('layouts/alerts')

                    <form method="POST" action="{{ route('pentadbir.perkara.update', $perkara->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="butiran" class="col-md-4 col-form-label text-md-right">butiran</label>

                            <div class="col-md-6">
                                <input id="butiran" type="text" class="form-control @error('butiran') is-invalid @enderror" name="butiran" value="{{ $perkara->butiran }}" required autocomplete="butiran" autofocus>

                                @error('butiran')
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