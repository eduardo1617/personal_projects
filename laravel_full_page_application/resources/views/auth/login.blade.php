@extends('layouts.guest')

@section('login-header')
    <div class="top-section-header-container">
        <div class="top-section-header login-header container">
            <h2>Login</h2>
            <div class="options">
                <a href="/">Home</a>
                <span>/</span>
                <a href="#">Pages</a>
                <span>/</span>
                <a href="#" class="current">Login</a>
            </div>
        </div>
    </div>
@endsection

@section('login-section')
    <div class="loging-form-container">
        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <h2>Login to NFTs</h2>
            <span>Login with social</span>
            <div class="social-logins">
                <a href="{{ url('/auth/google') }}" class="google">Google</a>
                <a href="{{ url('/auth/facebook') }}" class="facebook">Facebook</a>
            </div>
            <span>Or login with email</span>

            <div class="name-email-inputs">
                <input
                    type="email"
                    name="email"
                    placeholder="Your Email Address"
                />
                <input
                    type="password"
                    name="password"
                    placeholder="Your Password"
                />
            </div>

            <div class="login-options">
                <div class="checkbox-container">
                    <input type="checkbox" name="remember" id="remember" />
                    <label for="remember">Remember me</label>
                </div>
                <a href="#">Forgot Password ?</a>
            </div>

            <input type="submit" value="Login" />
        </form>
    </div>
@endsection
