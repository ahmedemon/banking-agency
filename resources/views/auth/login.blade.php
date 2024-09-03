@extends('layouts.app')
@push('css')
    <link href="https://fonts.googleapis.com/css2?family=Atma:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endpush
@section('content')

    <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="modal-dialog-centered d-flex align-self-center" style="width: max-content;">
            <div class="modal-content" style="background-color: #ffffffea;">
                <div class="p-5 mx-md-4">
                    <div class="text-center" style="color: #ffffff82;">
                        <h1 class="display-4 bangla_font">
                            <span style="color: #3890fc;">ব্লু-স্টার</span>
                            <span style="color: #ff8b3d;">সমিতি</span>
                        </h1>
                    </div>
                    <form action="{{ route('login') }}" method="POST" class="text-center mx-auto">
                        @csrf
                        <i class="fa fa-user display-1"></i>
                        <p class="text-dark font-weight-bold text-uppercase mt-5">Dashboard Login</p>

                        {{-- <!-- form button  --> --}}
                        {{-- <!-- <button type="button" class="btn btn-sm btn-outline-secondary border"> Admin</button> --> --}}
                        {{-- <!-- <button type="button" class="btn btn-sm btn-outline-secondary border"> Manager</button> --> --}}
                        {{-- <!-- <button type="button" class="btn btn-sm btn-outline-secondary border"> Officer</button> --> --}}

                        <div class="row">
                            <div class="col-md-12">
                                <input type="text"
                                    class="border-secondary form-control mx-0 @error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}" required autocomplete="username" autofocus
                                    placeholder="Please enter your valid username" style="background-color: #ffffff6e;">
                                @error('username')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror

                                <input type="password"
                                    class="border-secondary form-control mx-0 @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password"
                                    placeholder="Enter correct password" style="background-color: #ffffff6e;">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>
                                {{-- @if (Route::has('password.request'))
                                    <a class="text-decoration-none" href="{{ route('password.request') }}">Forgot Your Password?</a>
                                @endif --}}
                                <input type="submit" class="form-control mx-0 btn btn-danger" value="Login">
                            </div>
                        </div>
                    </form>
                </div>
                <a href="https://bluestarsomithi.com" class="text-muted text-center mb-3 text-decoration-none bangla_font2"> ব্লু স্টার সঞ্চয় ও ঋণদান সমবায় সমিতি </a>
            </div>
        </div>
    </div>

@endsection
