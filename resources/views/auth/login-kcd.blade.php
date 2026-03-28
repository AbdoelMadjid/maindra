@extends('layouts.index', ['CreativeLayout' => true])
@section('styles')
    <link href="{{ asset('assets/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-image: url('assets/media/auth/bg4.jpg');
            }

            [data-bs-theme="dark"] body {
                background-image: url('assets/media/auth/bg4-dark.jpg');
            }

            .password-toggle-icon {
                color: #6c757d !important;
            }
        </style>
        <!--end::Page bg image-->
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <!--begin::Aside-->
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                <!--begin::Aside-->
                <div class="d-flex flex-center flex-lg-start flex-column">
                    <!--begin::Logo-->
                    <a href="index" class="mb-7">
                        <img alt="Logo" src="assets/media/logos/custom-3.svg" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Title-->
                    <h2 class="text-white fw-normal m-0">
                        Manajemen Informasi Data dan Regulasi KCD 9
                    </h2>
                    <!--end::Title-->
                </div>
                <!--begin::Aside-->
            </div>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div
                class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
                <!--begin::Card-->
                <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
                            action="{{ route('login') }}" method="POST"
                            data-has-server-errors="{{ $errors->any() ? '1' : '0' }}">
                            @php
                                $usernameHasError = $errors->has('username');
                                $passwordHasError = $errors->has('password');
                            @endphp
                            @csrf
                            <input type="hidden" name="locale" value="{{ app()->getLocale() }}">
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-gray-900 fw-bolder mb-3">Sign In</h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div class="text-gray-500 fw-semibold fs-6">
                                    MAINDRA (Manajemen Informasi Data dan Regulasi)
                                </div>
                                <!--end::Subtitle=-->
                            </div>
                            <!--begin::Heading-->
                            @if (session('status'))
                                <div class="alert alert-success mb-8" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger mb-8" role="alert">
                                    <strong>{{ __('auth.login_failed') }}</strong>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" id="usernameInput" placeholder="{{ __('auth.username') }}" name="username"
                                    autocomplete="username"
                                    class="form-control bg-transparent @if ($usernameHasError) is-invalid @endif"
                                    value="{{ old('username') }}" />
                                <!--end::Email-->
                                <div id="usernameFieldError"
                                    class="invalid-feedback @if ($usernameHasError) d-block @endif">
                                    {{ $errors->first('username') }}
                                </div>
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-3 position-relative">
                                <!--begin::Password-->
                                <input type="password" id="passwordInput" placeholder="Password" name="password"
                                    autocomplete="off"
                                    class="form-control bg-transparent @if ($passwordHasError) is-invalid @endif"
                                    style="padding-right: 44px;" />
                                <button type="button" id="togglePassword"
                                    class="btn border-0 shadow-none bg-transparent position-absolute @if ($errors->any()) d-none @endif"
                                    style="right: 6px; top: 50%; transform: translateY(-50%); z-index: 3; padding: 4px;"
                                    aria-label="Toggle password visibility">
                                    <i id="togglePasswordIconOff"
                                        class="bi bi-eye-slash fs-4 password-toggle-icon"></i>
                                    <i id="togglePasswordIconOn"
                                        class="bi bi-eye fs-4 d-none password-toggle-icon"></i>
                                </button>
                                <!--end::Password-->
                                <div id="passwordFieldError"
                                    class="invalid-feedback @if ($passwordHasError) d-block @endif">
                                    {{ $errors->first('password') }}
                                </div>
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Wrapper-->
                            {{-- <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>
                                <!--begin::Link-->
                                <a href="{{ route('password.request') }}" class="link-primary">Forgot
                                    Password ?</a>
                                <!--end::Link-->
                            </div> --}}
                            <!--end::Wrapper-->
                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Sign In</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                            <!--begin::Sign up-->
                            {{-- <div class="text-gray-500 text-center fw-semibold fs-6">
                                Not a Member yet?
                                <a href="{{ route('register') }}" class="link-primary">Sign
                                    up</a>
                            </div> --}}
                            <!--end::Sign up-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Footer-->
                    {{-- <div class="d-flex flex-stack px-lg-10">
                        <!--begin::Languages-->
                        <div class="me-0">
                            <!--begin::Toggle-->
                            <button class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                                data-kt-menu-offset="0px, 0px">
                                <img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3"
                                    src="assets/media/flags/united-states.svg" alt="" />
                                <span data-kt-element="current-lang-name" class="me-1">English</span>
                                <i class="ki-duotone ki-down fs-5 text-muted rotate-180 m-0"></i>
                            </button>
                            <!--end::Toggle-->
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7"
                                data-kt-menu="true" id="kt_auth_lang_menu">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:void(0)" class="menu-link d-flex px-5" data-kt-lang="English">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1"
                                                src="assets/media/flags/united-states.svg" alt="" />
                                        </span>
                                        <span data-kt-element="lang-name">English</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:void(0)" class="menu-link d-flex px-5" data-kt-lang="Spanish">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1"
                                                src="assets/media/flags/spain.svg" alt="" />
                                        </span>
                                        <span data-kt-element="lang-name">Spanish</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:void(0)" class="menu-link d-flex px-5" data-kt-lang="German">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1"
                                                src="assets/media/flags/germany.svg" alt="" />
                                        </span>
                                        <span data-kt-element="lang-name">German</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:void(0)" class="menu-link d-flex px-5" data-kt-lang="Japanese">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1"
                                                src="assets/media/flags/japan.svg" alt="" />
                                        </span>
                                        <span data-kt-element="lang-name">Japanese</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:void(0)" class="menu-link d-flex px-5" data-kt-lang="French">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1"
                                                src="assets/media/flags/france.svg" alt="" />
                                        </span>
                                        <span data-kt-element="lang-name">French</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Languages-->
                        <!--begin::Links-->
                        <div class="d-flex fw-semibold text-primary fs-base gap-5">
                            <a href="/pages/general/corporate/team" target="_blank">Terms</a>
                            <a href="/pages/general/pricing/column" target="_blank">Plans</a>
                            <a href="/pages/general/corporate/contact" target="_blank">Contact Us</a>
                        </div>
                        <!--end::Links-->
                    </div> --}}
                    <!--end::Footer-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const usernameInput = document.getElementById('usernameInput');
            const passwordInput = document.getElementById('passwordInput');
            const togglePassword = document.getElementById('togglePassword');
            const togglePasswordIconOff = document.getElementById('togglePasswordIconOff');
            const togglePasswordIconOn = document.getElementById('togglePasswordIconOn');
            const form = document.getElementById('kt_sign_in_form');
            const usernameFieldError = document.getElementById('usernameFieldError');
            const passwordFieldError = document.getElementById('passwordFieldError');

            if (!form || !usernameInput || !passwordInput || !usernameFieldError || !passwordFieldError) {
                return;
            }

            if (togglePassword && togglePasswordIconOff && togglePasswordIconOn) {
                togglePassword.addEventListener('click', function() {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
                    togglePasswordIconOff.classList.toggle('d-none', isPassword);
                    togglePasswordIconOn.classList.toggle('d-none', !isPassword);
                });
            }

            function updatePasswordToggleVisibility() {
                if (!togglePassword) {
                    return;
                }

                const hasServerErrors = form.dataset.hasServerErrors === '1';
                const hasInlineErrors = usernameInput.classList.contains('is-invalid') ||
                    passwordInput.classList.contains('is-invalid') ||
                    usernameFieldError.classList.contains('d-block') ||
                    passwordFieldError.classList.contains('d-block');

                togglePassword.classList.toggle('d-none', hasServerErrors || hasInlineErrors);
            }

            function setFieldError(input, feedback, message) {
                input.classList.add('is-invalid');
                feedback.textContent = message;
                feedback.classList.add('d-block');
                updatePasswordToggleVisibility();
            }

            function clearFieldError(input, feedback) {
                input.classList.remove('is-invalid');
                feedback.classList.remove('d-block');
                updatePasswordToggleVisibility();
            }

            function validateUsernameInline() {
                const value = usernameInput.value.trim();
                if (value.length === 0) {
                    setFieldError(usernameInput, usernameFieldError, @json(__('auth.js.username_required')));
                    return false;
                }

                clearFieldError(usernameInput, usernameFieldError);
                return true;
            }

            function validatePasswordInline() {
                if (passwordInput.value.length === 0) {
                    setFieldError(passwordInput, passwordFieldError, @json(__('auth.js.password_required')));
                    return false;
                }

                clearFieldError(passwordInput, passwordFieldError);
                return true;
            }

            usernameInput.addEventListener('input', validateUsernameInline);
            usernameInput.addEventListener('blur', validateUsernameInline);
            passwordInput.addEventListener('input', validatePasswordInline);
            passwordInput.addEventListener('blur', validatePasswordInline);

            form.addEventListener('submit', function(e) {
                const validUsername = validateUsernameInline();
                const validPassword = validatePasswordInline();
                if (!validUsername || !validPassword) {
                    e.preventDefault();
                }
            });

            updatePasswordToggleVisibility();
        });
    </script>
@endsection
