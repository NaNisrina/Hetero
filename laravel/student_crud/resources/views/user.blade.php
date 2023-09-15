@extends('layouts.main')

@section('container')

  <h1> Welcome, User {{ Auth::user()->name }} </h1>

  <a href="/profil" class="nav-link">
    <i class="nav-icon fas fa-th"></i>
      <p>
        Data Siswa
      </p>
  </a>

    <a href="/logout" class="nav-link">
      <i class="nav-icon fas fa-th"></i>
        <p>
          Logout
        </p>
    </a>

@endsection
