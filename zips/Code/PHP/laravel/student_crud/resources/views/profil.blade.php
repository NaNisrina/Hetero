
@extends('layouts.main')

  @section('container')

    <center>

        <br>
        <h1> Halaman Siswa </h1>
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
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">No Absen</th>
                    <th scope="col">Sekolah</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Magang</th>
                </tr>

            </thead>

            @php
              $no = 1;
            @endphp

            @foreach($prof as $sis)

            <tbody>

                <th scope="row"> {{ $no++ }}        </th>
                <td scope="row"> {{ $sis->nama }}      </td>
                <td scope="row"> {{ $sis->umur }}      </td>
                <td scope="row"> {{ $sis->kelas }}     </td>
                <td scope="row"> {{ $sis->no_absen }}  </td>
                <td scope="row"> {{ $sis->sekolah }}   </td>
                <td scope="row"> {{ $sis->alamat }}    </td>
                <td scope="row"> {{ $sis->magang }}    </td>

            </tbody>

            @endforeach

        </table>

        <a href="/user" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
            <p>
              Back To User Page
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

    <!--
  <p> Nama          : { {$nama}} </p>
  <p> Tanggal Lahir : { {$tgl_lahir}} </p>
  <p> Kelas         : { {$kelas}} </p>
  <p> No. Absen     : { {$no_absen}} </p>
  <p> Sekolah       : { {$sekolah}} </p>
  <p> Alamat        : { {$alamat}} </p>
  <p> Tempat Magang : { {$magang}} </p>

   <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">No Absen</th>
                    <th scope="col">Sekolah</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Magang</th>
  -->
