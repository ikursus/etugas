
@extends('layouts.app')

@section('content')

<div class="container">
        
<div class="row pt-4">

<div class="col-12">

<div class="card">
  <div class="card-header">Dashboard</div>
  <div class="card-body">

    @include('layouts.alerts')

    <ul>
      <li><a href="{{ route('pentadbir.laporan.index') }}">Semak Rekod Laporan</a></li>
      <li><a href="{{ route('pentadbir.users.index') }}">Semak Rekod Pengguna</a></li>
    </ul>

  </div>
</div>
    
</div><!-- /.col -->

</div><!-- /.row -->

</div><!-- /.container -->
@endsection