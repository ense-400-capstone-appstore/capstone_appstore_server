@extends('layouts.app')

@section('title', 'Login')

@section('html')
    {{-- Login, Register tabs --}}
    <div id="page-login" class="page-content mdc-layout-grid">
        <div class="mdc-layout-grid__inner page-content-item">
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                <div class="mdc-tab-bar" role="tablist">
                    <div class="mdc-tab-scroller">
                        <div class="mdc-tab-scroller__scroll-area">
                            <div class="mdc-tab-scroller__scroll-content">
                                <button id="button-tab-login" class="mdc-tab mdc-tab--active" role="tab" aria-selected="true" tabindex="0">
                                    <span class="mdc-tab__content">
                                        <i class="mdc-tab__icon fas fa-sign-in-alt" aria-hidden="true"></i>
                                        <span class="mdc-tab__text-label">Login</span>
                                    </span>
                                    <span class="mdc-tab-indicator mdc-tab-indicator--active">
                                        <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                    </span>
                                    <span class="mdc-tab__ripple"></span>
                                </button>

                                <button id="button-tab-register" class="mdc-tab" role="tab" tabindex="-1">
                                    <span class="mdc-tab__content">
                                        <i class="mdc-tab__icon fas fa-plus"></i>
                                        <span class="mdc-tab__text-label">Register</span>
                                    </span>
                                    <span class="mdc-tab-indicator">
                                        <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                    </span>
                                    <span class="mdc-tab__ripple"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mdc-layout-grid__inner page-content-item">
            @if ($errors->any())
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 errors">
                    <span>Please correct the errors below and try again:</span>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="error">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                <p class="login-required-warning">
                    Fields marked * are required.
                </p>
            </div>
        </div>

        <div class="mdc-layout-grid__inner page-content-item">
            <div id="tab-login" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 tab">
                <form method="POST" action="login" id="login">
                    @csrf
                    <input type="hidden" name="g-recaptcha-token" class="g-recaptcha-token">

                    {{-- Email field --}}
                    @textfield([
                        "name" => "email",
                        "required" => "true"
                    ])
                        Email
                    @endtextfield

                    {{-- Password field --}}
                    @textfield([
                        "name" => "password",
                        "type" => "password",
                        "required" => "true"
                    ])
                        Password
                    @endtextfield

                    {{-- Remember checkbox --}}
                    <div class="mdc-form-field">
                        <div class="mdc-checkbox">
                            <input type="checkbox"
                                class="mdc-checkbox__native-control"
                                name="remember"
                                id="remember"/>
                            <div class="mdc-checkbox__background">
                            <svg class="mdc-checkbox__checkmark"
                                viewBox="0 0 24 24">
                                <path class="mdc-checkbox__checkmark-path"
                                    fill="none"
                                    d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                            </svg>
                            <div class="mdc-checkbox__mixedmark"></div>
                            </div>
                        </div>
                        <label for="remember">Remember Me</label>
                    </div>

                    {{-- Submit button --}}
                    <button class="mdc-button mdc-button--raised submit" type="submit" disabled>
                        <span class="mdc-button__label">Submit</span>
                    </button>
                </form>
            </div>

            <div id="tab-register" class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 tab tab--invisible">
                <form method="POST" action="register" id="register">
                    @csrf
                    <input type="hidden" name="g-recaptcha-token" class="g-recaptcha-token">

                    {{-- Full Name field --}}
                    @textfield([
                        "name" => "name",
                        "required" => "true"
                    ])
                        Full Name
                    @endtextfield

                    {{-- Email field --}}
                    @textfield([
                        "name" => "email",
                        "required" => "true"
                    ])
                        Email
                    @endtextfield

                    {{-- Password field --}}
                     @textfield([
                        "name" => "password",
                        "type" => "password",
                        "required" => "true"
                    ])
                        Password
                    @endtextfield

                    {{-- Password confirmation field --}}
                     @textfield([
                        "name" => "password_confirmation",
                        "type" => "password",
                        "required" => "true"
                    ])
                        Confirm Password
                    @endtextfield

                    {{-- Submit button --}}
                    <button class="mdc-button mdc-button--raised submit" type="submit" disabled>
                        <span class="mdc-button__label">Submit</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- <div id="login-grid" class="mdl-grid">

    {{-- <div class="mdl-grid">
        <div id="register-card-container" class="mdl-cell mdl-cell--3-offset-desktop mdl-cell--6-col mdl-cell--12-col-tablet mdl-typography--text-center center-justified">
            <div id="register-card" class="mdl-card mdl-shadow--4dp">
                <div class="mdl-card__title center-justified">
                    <h2 class="mdl-card__title-text">Sign Up</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <form method="POST" action="register" id="register">
                        @csrf
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="first_name">
                            <label class="mdl-textfield__label" for="first_name">First Name</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="last_name">
                            <label class="mdl-textfield__label" for="last_name">Last Name</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="email">
                            <label class="mdl-textfield__label" for="email">Email</label>
                        </div>
                        <br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="password" name="password">
                            <label class="mdl-textfield__label" for="password">Password</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="password" name="password_confirmation">
                            <label class="mdl-textfield__label" for="password_confirmation">Confirm Password</label>
                        </div>
                    </form>
                </div>
                <div class="mdl-card__actions mdl-card--border center-justified">
                    <button
                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored"
                        type="submit"
                        form="register"
                    >
                        Register
                    </button>
                </div>
            </div>
        </div>
    </div> --}}

@section('js')
    <script>
        initRecaptcha("{{ config('recaptcha.v3_site_key') }}");
    </script>
@endsection
