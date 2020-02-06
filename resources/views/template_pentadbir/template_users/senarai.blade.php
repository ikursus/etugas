
@extends('layouts.app')

@section('content')

<div class="container">
        
<div class="row pt-4">

<div class="col-12">

<div class="card">
  <div class="card-header">{!! $page_title !!}</div>
  <div class="card-body">

    <p>
        <a href="/pentadbir/users/create" class="btn btn-primary">
            Tambah User
        </a>
    </p>
  
  <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>NAMA</th>
                <th>NRIC</th>
                <th>EMAIL</th>
                <th>JAWATAN</th>
                <th>PENEMPATAN</th>
                <th>TINDAKAN</th>
            </tr>
        </thead>
        <tbody>
            @foreach($senarai_users as $user)
            <tr>
                <td scope="row">{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->nric }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->jawatan }}</td>
                <td>{{ $user->penempatan_id }}</td>
                <td>
                    <a href="/pentadbir/users/{{ $user->id }}/edit" class="btn btn-info">
                        EDIT
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Comment Dalam Blade --}}

    {!! $senarai_users->links() !!}
    {!! $senarai_users->render() !!}

  </div>
</div>
    
</div><!-- /.col -->

</div><!-- /.row -->

</div><!-- /.container -->
@endsection