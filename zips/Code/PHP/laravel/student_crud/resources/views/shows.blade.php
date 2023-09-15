@extends('layouts.main')

@section('container')
    <center>

        <br>
        <h1 class="text-center mb-4"> Edit Data User </h1>

        {{-- @foreach ($cr as $rc) --}}

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">

                            <form action="/users/update/{{ $data->id }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required=""
                                        aria-describedby="emailHelp" value="{{ $data->email }}">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required=""
                                        value="{{ $data->name }}">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        required="" value="{{ $data->password }}">
                                </div>

                                <div class="mb-3">

                                    <label for="exampleInputPassword1" class="form-label">Hak Akses</label>
                                    {{-- <input type="text" class="form-control" id="tier" name="tier" required=""
                                        value="{{ $data->tier }}"> --}}

                                    <select class="form-control" name="tier" id="tier" required>
                                        <option value="">Choose option</option>
                                        <option value="1">
                                            @if ($data->tier == 'admin')
                                              selected
                                            @endif Admin
                                        </option>

                                        <option value="2">
                                            @if ($data->tier == 'user')
                                              selected
                                            @endif User
                                        </option>

                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>

                                <a href="/users">
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

    </center>
@endsection
