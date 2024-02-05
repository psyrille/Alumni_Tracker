@extends('layouts/contentNavbarLayout')

@section('title', 'My Profile')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('content')
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="m-0">My Profile</h5>
                </div>
                <hr>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <span>About</span>
                        <span class="m-0 {{ Auth::user()->status == 'pending' ? 'text-secondary' : '' }}"
                            style="cursor: pointer; color: #0000EE; {{ Auth::user()->status == 'pending' ? 'pointer-events:none' : '' }}"
                            data-bs-toggle="modal" data-bs-target="#editAboutModal">Edit</span>
                    </div>
                    <ul class="list-group mb-3" id="profile-list">
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Full Name:</span>
                            <span>{{ Auth::user()->firstName . ' ' . substr(Auth::user()->middleName, 0, 1) . '. ' . Auth::user()->lastName }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Course:</span>
                            <span>{{ Auth::user()->course }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Year Graduated:</span>
                            <span>{{ Auth::user()->yearGrad }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Address:</span>
                            <span>{{ Auth::user()->address }}</span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-between">
                        <span>Contact</span>
                        <span class="m-0 {{ Auth::user()->status == 'pending' ? 'text-secondary' : '' }}"
                            style="cursor: pointer; color: #0000EE; {{ Auth::user()->status == 'pending' ? 'pointer-events:none' : '' }}"
                            data-bs-toggle="modal" data-bs-target="#editModal">Edit</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Facebook Account:</span>
                            <span>{{ Auth::user()->facebook }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Contact No:</span>
                            <span>{{ Auth::user()->contactNo }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Work History</h5>
                    <button class="btn badge text-bg-secondary m-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                        {{ Auth::user()->status == 'pending' ? 'disabled' : '' }}>+</button>
                </div>
                <hr>
                <div class="card-body table-responsive" id="history-record">
                    <ul class="list-group">
                        @foreach ($works as $work)
                            <li class="list-group-item">
                                <span class="text-nowrap"> <b>{{ $work->year }}</b> • | {{ $work->name }} |
                                    {{ $work->address }} | {{ $work->company_name }} |
                                    {{ $work->company_contact }}</span>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">Account</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-row-reverse">
                        <span class="m-0 {{ Auth::user()->status == 'pending' ? 'text-secondary' : '' }}"
                            style="cursor: pointer; color: #0000EE; {{ Auth::user()->status == 'pending' ? 'pointer-events:none' : '' }}"
                            data-bs-toggle="modal" data-bs-target="#editModal">Edit</span>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Email:</span>
                            <span id="user-email">{{ Auth::user()->email }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Password:</span>
                            <span id="user-id" class="m-0" data-bs-toggle="modal"
                                data-bs-target="#editPasswordModal">************</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    @include('content.user.profile-modal')


@endsection

@section('page-script')
    <script src="{{ asset('storage/js/user/profile.js?id=' . Illuminate\Support\Carbon::now() . '') }}"></script>
@endsection
