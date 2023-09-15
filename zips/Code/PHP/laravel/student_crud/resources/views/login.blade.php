@extends('layouts.main')

@section('container')
    @if ($message = Session::get('failed'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif

    <form action="/prolog" method="POST">
        @csrf
        <section class="vh-100" style="background-color: #508bfc;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <h3 class="mb-5">Login Form</h3>

                                <div class="form-outline mb-4">
                                    <input type="email" id="email" class="form-control form-control-lg" name="email"
                                        required />
                                    <label class="form-label" for="email">Email</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="password" class="form-control form-control-lg"
                                        name="password" required />
                                    <label class="form-label" for="password">Password</label>
                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                                <hr class="my-4">

                                <div>
                                    <p class="mb-0">Don't have an account? <a href="/register" class="link-info">Sign
                                            In</a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </form>
@endsection
