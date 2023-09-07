@extends('clinic.inc.master')
@section('container')
            <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
                <form class="form" method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="form-items">
                        <div class="mb-3">
                        @error('name')
                        {{ $message }}
                        @enderror
                            <label class="form-label required-label" for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            @error('phone')
                        {{ $message }}
                        @enderror
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input name="phone" type="tel" class="form-control" id="phone" required>
                        </div>
                        <div class="mb-3">
                            @error('email')
                        {{ $message }}
                        @enderror
                            <label class="form-label required-label" for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            @error('password')
                        {{ $message }}
                        @enderror
                            <label class="form-label required-label" for="password">password</label>
                            <input name="password" type="password" class="form-control" id="password" required>
                        </div>

                        <div class="mb-3">
                            @error('password_confirmation')
                        {{ $message }}
                        @enderror
                            <label class="form-label required-label" for="password">password_confirmation</label>
                            <input name="password_confirmation" type="password" class="form-control" id="password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create account</button>
                </form>
                <div class="d-flex justify-content-center gap-2">
                    <span>already have an account?</span><a class="link" href="{{ route('login.user') }}"> login</a>
                </div>
            </div>

        </div>
    </div>

    @endsection