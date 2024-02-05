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
                        <div id="message">
                        </div>
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
                            <div class="divider-text text-uppercase text-muted">Alumni Association <br> SLSU Alumni Network
                                Registration
                            </div>
                        </div>

                        <form id="formFinalRegister">
                            <input type="text" class="form-control mb-2" id="student-no" name="studentNo"
                                placeholder="ID#">

                            <div class="input-group mb-2 gap-1">
                                <input type="text" class="form-control w-25" id="first-name" name="firstName"
                                    placeholder="FirstName">
                                <input type="text" class="form-control w-25" id="middle-name" name="middleName"
                                    placeholder="MiddleName">
                                <input type="text" class="form-control w-25" id="last-name" name="lastName"
                                    placeholder="LastName">
                                <input type="text" class="form-control" id="sex" name="sex" placeholder="Sex"
                                    disabled>
                            </div>
                            <input type="text" class="form-control mb-2" id="email" name="email"
                                placeholder="Valid Email">
                            <input type="text" class="form-control mb-2" id="course" name="course"
                                placeholder="Course">
                            <input type="text" class="form-control mb-2" id="year-grad" name="yearGrad"
                                placeholder="Year Graduated" required>
                            <input type="number" class="form-control mb-2" id="contact-no" name="contactNo"
                                placeholder="Contact No.">
                            <input type="text" class="form-control mb-2" id="fb-acc" name="fbAcc"
                                placeholder="FB Account">
                            <input type="text" class="form-control mb-2" id="address" name="address"
                                placeholder="Address">
                            <input type="hidden" value="" id="password" name="password">

                            <button class="btn btn-primary w-100 mt-3" id="btn-register-edit">Register</button>
                        </form>


                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('storage/js/register-edit.js?id=' . Illuminate\Support\Carbon::now() . '') }}"></script>
@endsection
