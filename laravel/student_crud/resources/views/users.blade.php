
@extends('layouts.main')

@section('container')

  <center>

      <br>
      <h1> Halaman User </h1>
      <br>

      @if($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
          {{ $message }}
        </div>
      @endif

      <table class="table table-striped" 
             style="width: auto">

          <thead class="thead-dark">
            
              <tr>
                  <th scope="col">No</th>
                  <th scope="col">Email</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Password</th>
                  <th scope="col">Hak Akses</th>
                  <th scope="col">Aksi</th>
              </tr>

          </thead>

          @php
            $no = 1;
          @endphp

          @foreach($prof as $sis)

          <tbody>

              <th scope="row"> {{ $no++ }}        </th>
              <td scope="row"> {{ $sis->email }}     </td>
              <td scope="row"> {{ $sis->name }}      </td>
              <td scope="row"> {{ $sis->password }}      </td>
              <td scope="row"> {{ $sis->tier }}     </td>

              <td scope="row">
                <a href="users/shows/{{ $sis->id }}" class="btn btn-warning">Edit</a>
              {{-- </td>

              <td> --}}
                <a href="/users/delete/{{ $sis->id }}" class="btn btn-danger">Delete</a>
              </td>

          </tbody>

          @endforeach

      </table>

      {{-- <p> 
        <a href="/users/create" >
          <button type="button" class="btn-btn-success">Create New Data</button> 
        </a>
      </p> --}}

      <a href="/admin" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
          <p>
            Back To Admin Page
          </p>
      </a>

      <a href="/logout" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
          <p>
            Logout
          </p>
      </a>

  </center>

@endsection
