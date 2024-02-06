@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div id="message">

                    </div>
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
                            <div class="divider-text text-uppercase text-muted"><b>login</b>
                            </div>
                        </div>
                        <span id="error-message" style="font-size: 0.8rem"></span>
                        <form id="formLogin">
                            <div class="d-flex justify-content-center flex-column gap-4">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                                <div class="mb-3 form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="Password" aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse"><a href="/auth/forgot-password-basic">Forget Password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mt-3"> Login</button>
                        </form>

                        <a href="/auth/register-basic"><button class="btn btn-primary w-100 mt-3"> Register Now</button></a>

                    </div>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('storage/js/login-user.js?id=' . Illuminate\Support\Carbon::now() . '') }}"></script>
@endsection
