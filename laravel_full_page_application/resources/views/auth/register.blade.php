@extends('layouts.guest')

@section('login-header')
    <div class="top-section-header-container">
        <div class="top-section-header container">
            <h2>Signup</h2>
            <div class="options">
                <a href="/">Home</a>
                <span>/</span>
                <a href="#">Pages</a>
                <span>/</span>
                <a href="#" class="current">Singup</a>
            </div>
        </div>
    </div>
@endsection

@section('login-section')
    <div class="loging-form-container">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="login-form">
            @csrf
            <h2>Signup to NFTs</h2>
            <span>Signup with social</span>
            <div class="social-logins">
                <a href="{{ url('/auth/google') }}" class="google">Google</a>
                <a href="{{ url('/auth/facebook') }}" class="facebook">Facebook</a>
            </div>
            <span>Or signup with email</span>

            <div class="name-email-inputs">
                <input
                    type="text"
                    name="name"
                    placeholder="Your Full Name"
                />
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
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Password Confirmation"
                />

                <div class="avatar__section">
                    <div class="avatar__preview--container">
                        <img src="" alt="" class="avatar__preview"/>
                    </div>

                    <label class="input__file input__avatar">
                        <span class="input__file--upload input__avatar--upload">Upload avatar</span>
                        <input type="file" name="avatar" class="image__input avatar__input"/>
                        <span class="input__file--url input__avatar--url">PNG, JPG, GIF, WEBP or MP4. Max 200mb.</span>
                    </label>
                </div>

            </div>

            <div class="login-options">
                <div class="checkbox-container">
                    <input type="checkbox" name="remember" id="remember" />
                    <label for="remember">Remember me</label>
                </div>
                <a href="#">Forgot Password ?</a>
            </div>

            <input type="submit" value="Register" />
        </form>
    </div>
    <script src="js/avatar.js"></script>
@endsection
