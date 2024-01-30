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
                <div class="divider-text text-uppercase text-muted"><b> REGISTER</b>
                </div>
          </div>

          <div class="d-flex justify-content-center flex-column gap-4">
            <input type="text" class="form-control" placeholder="Student Number">
            <input type="password" class="form-control" placeholder="Password">
            <select name="" id="" class="form-select">
              <option value="0">- - Select Campus - -</option>
              @foreach(GENERAL::Campuses() as $index => $campus)
              <option value="{{$index}}">{{$campus['Campus']}}</option>
              @endforeach

            </select>
          </div>
          <button class="btn btn-primary w-100 mt-3"> LOGIN</button>
          <button class="btn btn-primary w-100 mt-3"> Register Now</button>
                      
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
</div>
@endsection
