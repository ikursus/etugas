@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    Selamat Datang ke {{ config('app.name') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection