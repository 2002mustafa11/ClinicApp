@extends('clinic.inc.master')
@section('container')
            <div class="d-flex flex-column gap-3 account-form  mx-auto mt-5">
                <form class="form" method="POST" action="{{ route('login') }}">
@csrf
                    <div class="mb-3">
                        @error('email')
                        {{ $message }}
                        @enderror
                        <label class="form-label required-label" for="email">Email</label>
                        <input name="email" type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="password">password</label>
                        <input name="password" type="password" class="form-control" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <div class="d-flex justify-content-center gap-2 flex-column flex-lg-row flex-md-row flex-sm-column">
                    <span>don't have an account?</span><a class="link" href="{{ route('register.user') }}">create account</a>
                </div>
            </div>

        </div>
    </div>
    @endsection