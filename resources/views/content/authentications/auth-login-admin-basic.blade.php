@extends('layouts/blankLayout')

@section('title', 'AlmaLink')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div id="loginmsg"></div>
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
                            <div class="divider-text text-uppercase text-muted"><b> LOGIN</b>
                            </div>
                        </div>

                        <div class="mt-2 text-center">
                            <div id="g_id_onload" data-client_id="{{ GENERAL::API()['ClientID'] }}"
                                data-callback="onSignIn">
                            </div>
                            <div class="g_id_signin form-control" data-type="standard"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
    </div>


@endsection

@section('page-script')
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="{{ asset('storage/js/login-admin.js?id=' . Illuminate\Support\Carbon::now() . '') }}"></script>
@endsection
