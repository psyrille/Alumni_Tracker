@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
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
                <div class="divider-text text-uppercase text-muted"><b> LOGIN</b>
                </div>
          </div>

          <div class="d-flex justify-content-center flex-column gap-4">
            <button type="button" class="btn btn-outline-primary" style="width: 97%"><i class="fa-brands fa-google"></i>&nbsp Sign In with Google</button>
            <button type="button" class="btn btn-outline-primary" style="width: 97%"><i class="fa-solid fa-tv"></i>&nbsp Sign In with Institutional Email</button>
          </div>

                      
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
</div>
@endsection
