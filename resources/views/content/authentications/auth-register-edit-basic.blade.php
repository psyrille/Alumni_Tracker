@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
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
            <a href="{{url('/')}}" class="app-brand-link gap-2">
            <span class="" ><img src="https://hrmis.southernleytestateu.edu.ph/images/logo/logo.png" class="logoslsu" alt="Sign In" width="65"></span>
              <span class="text-uppercase text-primary fw-bold ">{{config('variables.templateName')}}</span>
            </a>
          </div>
          <!-- /Logo -->
          <div class="divider">
                <div class="divider-text text-uppercase text-muted">Alumni Association <br> SLSU Alumni Network Registration
                </div>
          </div>
                   

          <input type="text" class="form-control mb-2" placeholder="ID#" >
                   
            <div class="input-group mb-2 gap-1" >
              <input type="text" class="form-control" placeholder="FirstName">
              <input type="text" class="form-control" placeholder="MiddleName">
              <input type="text" class="form-control" placeholder="LastName">
            </div>
            <input type="text" class="form-control mb-2" placeholder="Valid Email">
            <input type="text" class="form-control mb-2" placeholder="Course">
            <input type="text" class="form-control mb-2" placeholder="Year Graduated">
            <input type="number" class="form-control mb-2" placeholder="Contact No.">
            <input type="text" class="form-control mb-2" placeholder="FB Account">
            <input type="text" class="form-control mb-2" placeholder="Address">

            <button class="btn btn-primary w-100 mt-3"">Register</button>


       
        </div>
      </div>
      <!-- Register Card -->
    </div>
  </div>
</div>
@endsection
