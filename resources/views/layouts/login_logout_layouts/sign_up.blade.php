@extends('layouts.login_logout_layouts.base')
@section('form')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<form class="cd-form" action="{{ route('signup_details') }}" method="post">
    @csrf
    <p class="fieldset">
        <label class="image-replace cd-username" for="signup-username">Username</label>
        <input class="full-width has-padding has-border" name="name" id="signup-username" type="text" placeholder="Username">
        <span class="cd-error-message">Error message here!</span>
    </p>

    <p class="fieldset">
        <label class="image-replace cd-email" for="signup-email">E-mail</label>
        <input class="full-width has-padding has-border" id="signup-email" type="email" name="email" placeholder="E-mail">
        <span class="cd-error-message">Error message here!</span>
    </p>

    <p class="fieldset">
        <label class="image-replace cd-password" for="signup-password">Password</label>
        <input class="full-width has-padding has-border" id="signup-password" type="password" name="password" placeholder="Password">
        <a href="#0" class="hide-password">Hide</a>
        <span class="cd-error-message">Error message here!</span>
    </p>

    <p class="fieldset">
        <input type="checkbox" id="accept-terms">
        <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
    </p>

    <p class="fieldset">
        <input class="full-width has-padding" type="submit" value="Create account">
    </p>
</form>

<a href="#0" class="cd-close-form">Close</a>

@endsection
