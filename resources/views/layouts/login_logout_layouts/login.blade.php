@extends('layouts\login_logout_layouts\base')
@section('form')
<form class="cd-form" action="{{ route('login_coustomer') }}" method="POST">
    @csrf
    <p class="fieldset">
        <label class="image-replace cd-email" for="signin-email">E-mail</label>
        <input class="full-width has-padding has-border" id="" name="email" type="email" placeholder="E-mail">
        <span class="cd-error-message">Error message here!</span>
    </p>

    <p class="fieldset">
        <label class="image-replace cd-password" for="signin-password">Password</label>
        <input class="full-width has-padding has-border" id="" name="password" type="text"  placeholder="Password">
        <a href="#0" class="hide-password">Hide</a>
        <span class="cd-error-message">Error message here!</span>
    </p>

    <p class="fieldset">
        <input type="checkbox" id="" checked>
        <label for="remember-me">Remember me</label>
    </p>

    <p class="fieldset">
        <input class="full-width" type="submit" value="Login">
    </p>
</form>

<p class="cd-form-bottom-message">
    <a href="#0">Forgot your password?</a>
</p>
<a href="#0" class="cd-close-form">Close</a>

@endsection
