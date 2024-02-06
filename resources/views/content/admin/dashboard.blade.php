@extends('layouts/adminContentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
@endsection

@section('content')

    <div class="card">
        <h5 class="card-header">Users</h5>
        <div class="card-body">
        <div class="table-responsive">
          <table class="table table-sm">
            
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Student No.</th>
                    <th>Campus</th>
                    <th>Course</th>
                    <th>Year Graduated</th>
                    <th>Facebook</th>
                    <th>Contact No.</th>
                    <th>Address</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="text-nowrap">{{$user->firstName}} {{$user->lastName}} </td>
                    <td class="text-nowrap">{{$user->studentNo}}</td>
                    <td class="text-nowrap">{{$user->campus}}</td>
                    <td class="text-nowrap">{{$user->course}}</td>
                    <td class="text-nowrap">{{$user->yearGrad}}</td>
                    <td class="text-nowrap">{{$user->facebook}}</td>
                    <td class="text-nowrap">{{$user->contactNo}}</td>
                    <td class="text-nowrap">{{$user->address}}</td>    
                    <td class="text-nowrap">{{$user->email}}</td>                
                </tr>
                @endforeach
            </tbody>
          </table>
            </div>
        </div>
    </div>

@endsection
