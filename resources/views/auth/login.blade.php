@extends('layouts.app')


@section('content')

<div class="wrapper">
    <div class="logo">
        <img src="{{ url('images/logo.jpg') }}" alt="">
    </div>
    <div class="text-center mt-4 name">
        Log in to your account
    </div>
    <div class="text-center mt-2 welcome">
        Welcome Back !
    </div>
    <div class="p-3 mt-3 ">
        <div class="col-md-12">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                        <input id="email" type="email" placeholder="admin@gmail.com"
                        class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                          name="password" placeholder="**********" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </div>
                </div>
            </form>    
        </div>
    </div>

</div>
@endsection
