@extends('layouts.main')

@section('container')
    <br>
    <h1 class="text-center mb-4"> Edit Data Siswa </h1>

    {{-- @foreach ($cr as $rc) --}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">

                        <form action="/profile/update/{{ $data->id }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Gmail</label>
                                <input type="email" class="form-control" id="gmail" name="gmail" required=""
                                    aria-describedby="emailHelp" value="{{ $data->gmail }}">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" required=""
                                    value="{{ $data->nama }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Umur</label>
                                <input type="number" class="form-control" id="umur" name="umur" required=""
                                    value="{{ $data->umur }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Kelas</label>
                                <input type="text" class="form-control" id="kelas" name="kelas" required=""
                                    value="{{ $data->kelas }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">No Absen</label>
                                <input type="number" class="form-control" id="no_absen" name="no_absen" required=""
                                    value="{{ $data->no_absen }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Sekolah</label>
                                <input type="text" class="form-control" id="sekolah" name="sekolah" required=""
                                    value="{{ $data->sekolah }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required=""
                                    value="{{ $data->alamat }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Magang</label>
                                <input type="text" class="form-control" id="magang" name="magang" required=""
                                    value="{{ $data->magang }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                            <a href="/profile">
                                <button type="button" class="btn-btn-primary">Back To Table</button>
                            </a>
                            <br>


                            <a href="/logout" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Logout
                                </p>
                            </a>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
