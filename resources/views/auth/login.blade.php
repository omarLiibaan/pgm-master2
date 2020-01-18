@extends('layouts.landingpage')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="myinput_wrapper">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror myinput" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        <label for="email">Adresse&nbsp;e-mail&nbsp;:</label>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <br>
    <div class="myinput_wrapper">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror myinput" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label for="password">Mot&nbsp;de&nbsp;passe&nbsp;:</label>
    </div>

    <!-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    <label class="form-check-label" for="remember">
        {{ __('Remember Me') }}
    </label> -->
    
    <button type="submit" class="btn btn-primary">
        {{ __('Login') }}
    </button>

    @if (Route::has('password.request'))
        <a class="reset_pass" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
</form>
@endsection
