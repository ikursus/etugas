@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Daftar Pengguna') }}</div>

                <div class="card-body">

                    @include('layouts/alerts')

                    <form method="POST" action="{{ route('pentadbir.users.update', $user->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nric" class="col-md-4 col-form-label text-md-right">{{ __('NRIC') }}</label>

                            <div class="col-md-6">
                                <input id="nric" type="text" class="form-control @error('nric') is-invalid @enderror" name="nric" value="{{ $user->nric }}" required autocomplete="nric" autofocus>

                                @error('nric')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_staf" class="col-md-4 col-form-label text-md-right">{{ __('No. Staf') }}</label>

                            <div class="col-md-6">
                                <input id="no_staf" type="text" class="form-control @error('no_staf') is-invalid @enderror" name="no_staf" value="{{ $user->no_staf }}" required autocomplete="no_staf" autofocus>

                                @error('no_staf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefon" class="col-md-4 col-form-label text-md-right">{{ __('No. Telefon') }}</label>

                            <div class="col-md-6">
                                <input id="telefon" type="text" class="form-control @error('telefon') is-invalid @enderror" name="telefon" value="{{ $user->telefon }}" required autocomplete="telefon" autofocus>

                                @error('telefon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="penempatan_id" class="col-md-4 col-form-label text-md-right">{{ __('Penempatan') }}</label>

                            <div class="col-md-6">
                                <select id="penempatan_id" class="form-control @error('penempatan_id') is-invalid @enderror" name="penempatan_id" required autocomplete="penempatan_id" autofocus>
                                    <option value="">-- Sila Pilih --</option>
                                    @foreach($senarai_penempatan as $penempatan)
                                    <option value="{{ $penempatan->id }}"{{ $user->penempatan_id == $penempatan->id ? ' selected="selected"' : null }}>{{ $penempatan->bahagian }}</option>
                                    @endforeach
                                </select>

                                @error('penempatan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jawatan" class="col-md-4 col-form-label text-md-right">{{ __('Jawatan') }}</label>

                            <div class="col-md-6">
                                <input id="jawatan" type="text" class="form-control @error('jawatan') is-invalid @enderror" name="jawatan" value="{{ $user->jawatan }}" required autocomplete="jawatan" autofocus>

                                @error('jawatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                <span>Biarkan kosong jika tiada perubahan</span>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select name="role" class="form-control">
                                    <option value="">-- Sila Pilih --</option>
                                    <option value="pentadbir" {{ $user->role == 'pentadbir' ? 'selected="selected"' : null }}>Pentadbir</option>
                                    <option value="pengguna" {{ $user->role == 'pengguna' ? 'selected="selected"' : null }}>Pengguna</option>
                                </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Kemaskini') }}
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