@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection


@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                <span class=""><img
                                        src="https://hrmis.southernleytestateu.edu.ph/images/logo/logo.png" class="logoslsu"
                                        alt="Sign In" width="65"></span>
                                <span
                                    class="text-uppercase text-primary fw-bold ">{{ config('variables.templateName') }}</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <div class="divider">
                            <div class="divider-text text-uppercase text-muted"><b> In order to register, please enter your
                                    <br> SIS account.</b>
                            </div>
                        </div>
                        <form id="formAuthentication" class="mb-3" action="{{ url('/') }}" method="GET">
                            <div class="mb-3">
                                <label class="form-label">Student No.</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter your Student Number" autofocus>
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>



                            <button class="btn btn-primary d-grid w-100">
                                Sign up
                            </button>
                        </form>

                        <p class="text-center">
                            <span>Already have an account?</span>
                            <a href="{{ url('auth/login-basic') }}">
                                <span>Sign in instead</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('storage/js/register.js?id=' . Illuminate\Support\Carbon::now() . '') }}"></script>
@endsection
